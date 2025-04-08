<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\GeneralSetting;
use App\Models\JobListing;
use App\Models\Product;
use App\Models\QuizBank;
use App\Models\QuizBankManagement;
use App\Models\User;
use Auth;
use Cookie;
use DB;
use Illuminate\Http\Request;
use Session;
use setasign\Fpdi\Fpdi;
class HomeController extends Controller
{   
    public function __construct(Request $request)
    {
        $this->middleware('auth')->only(['pickInterests', 'pickInterestStore']);
        $this->request = $request;
    }

    public function index(Request $request)
    {  
        if(!empty($request->reff))
        {
            $affiliate_user = User::where('affiliate_code','=',$request->reff)->first();
            if(!empty($affiliate_user))
            {
                $gs = GeneralSetting::findOrFail(1);
                if($gs->is_affilate == 1)
                {
                    Session::put('affilate', $affiliate_user->affiliate_code);
                    return redirect()->route('front.index');
                }
            }

        } 
      $homecheck=true;
      // $query = Company::active()->latest();
      $companies = Company::active()->latest()->take(24)->get();
      $quizmanagements = QuizBankManagement::active()->latest()->take(6)->get();
      $tutors=User::where('role_id', 2)->active()->latest()->take(9)->get();
      $joblistings = JobListing::active()->latest()->take(9)->get();


      $products = Product::active()->latest()->take(3)->get();
           
        



       return view('front.index',compact('products','quizmanagements','companies','homecheck','tutors','joblistings'));
    }

    public function page($slug)
    {
        $page =  DB::table('pages')->where('slug',$slug)->where('status',1)->first();
        if(empty($page))
        {
            return view('errors.404');
        }

        return view('front.page',compact('page'));
    }
    public function pricing()
    {
        return view('front.pricing');
    }
    public function employGuide()
    {
       return view('front.employs-guide');
    }
    public function employDetail()
    {
        return view('front.codetail');
    }

    public function dropzoneStoreMedia(Request $request)
    {
        $path = storage_path('tmp/uploads');       
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');
        $name = uniqid() . '_' . trim($file->getClientOriginalName());
        $file->move($path, $name);
        
        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function pdff(Request $request)
    {
         

        // $quiz = QuizBank::where('slug', $quiz_slug)->active()->firstOrFail();        
        // if($quiz->pdf_file){
            // $token = $this->generateToken();
            return view('front.test', ['token' => '22']);
        // }else{
        //     dd("pdf not found");
        // }
       
    }

    public function servePdf(Request $request, $token)
    {
        // if (!Cache::get($token)) {
        //     abort(403, 'Invalid or expired token');
        // }
        // $quiz = QuizBank::where('slug', $token)->active()->firstOrFail();

        // $imagepath='assets/dynamic/images/quiz/pdf_files/'.$quiz->pdf_file;

        $imagepath = 'assets\sample2.pdf';
        $pdf = new Fpdi();
        $pdf->setSourceFile(public_path($imagepath));
        $totalPages = $pdf->setSourceFile(public_path($imagepath));
  
        // Assuming you want the first 3 pages for now, 
        // Adjust accordingly based on your requirements
        $pagesToExtract = $totalPages;

        for ($pageNo = 1; $pageNo <= $pagesToExtract; $pageNo++) {
            $pdf->AddPage();
            $pdf->setSourceFile(public_path($imagepath));
            $pdf->useTemplate($pdf->importPage($pageNo));
        }

        $pdfContent = $pdf->Output('S');
       
        return response($pdfContent, 200);
    }

}
