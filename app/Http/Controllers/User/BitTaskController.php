<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BitTask;
use App\Models\BitSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BitTaskController extends Controller
{
     public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->request = $request;
    }
    public function index()
    {
        $tasks = BitTask::where('status', 1)->latest()->paginate(10);
        $completedTasks = BitSubmission::where('user_id', Auth::id())
            ->where('status', '!=', 'rejected')
            ->pluck('bit_task_id')
            ->toArray();
            
        return view('user.bit-tasks.index', compact('tasks', 'completedTasks'));
    }
    
    public function show(BitTask $task)
    {
        if ($task->status == 0) {
            return redirect()->route('user.bit-tasks.index')
                ->with('error', 'This task is currently not available.');
        }
        
        $userSubmission = BitSubmission::where('user_id', Auth::id())
            ->where('bit_task_id', $task->id)
            ->first();
            
        return view('user.bit-tasks.show', compact('task', 'userSubmission'));
    }
    
    public function submit(Request $request, BitTask $task)
    {
        if ($task->status == 0) {
            return redirect()->route('user.bit-tasks.index')
                ->with('error', 'This task is currently not available.');
        }
        
        // Validate request
        $rules = [
            'submission_content' => 'required|string|min:10',
        ];
        
        if ($task->required_proof) {
            $rules['proof'] = 'required|file|mimes:jpeg,png,jpg,pdf|max:2048';
        }
        
        $request->validate($rules);
        
        // Check if user already has a pending or approved submission for this task
        $existingSubmission = BitSubmission::where('user_id', Auth::id())
            ->where('bit_task_id', $task->id)
            ->whereIn('status', ['pending', 'approved'])
            ->first();
            
        if ($existingSubmission) {
            return redirect()->back()->with('error', 'You already have a submission for this task.');
        }
        
        // Check max submissions per task if set
        if ($task->max_submissions) {
            $submissionCount = BitSubmission::where('bit_task_id', $task->id)
                ->where('status', 'approved')
                ->count();
                
            if ($submissionCount >= $task->max_submissions) {
                return redirect()->back()->with('error', 'This task has reached its maximum number of submissions.');
            }
        }
        
        // Handle file upload
        $proofPath = null;
        if ($request->hasFile('proof')) {
            $file = $request->file('proof');
            $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/bit-submissions', $filename);
            $proofPath = $filename;
        }
        
        // Create submission
        BitSubmission::create([
            'user_id' => Auth::id(),
            'bit_task_id' => $task->id,
            'submission_content' => $request->submission_content,
            'proof' => $proofPath,
            'status' => 'pending'
        ]);
        
        // Increment total submissions count
        $task->increment('total_submissions');
        
        return redirect()->route('user.bit-tasks.show', $task)
            ->with('success', 'Your submission has been received and is pending review.');
    }
    
    public function history()
    {
        $submissions = Auth::user()->bitSubmissions()
            ->with('task')
            ->latest()
            ->paginate(10);
            
        return view('user.bit-tasks.history', compact('submissions'));
    }
}
