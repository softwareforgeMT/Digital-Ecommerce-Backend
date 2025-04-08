<?php

namespace App\Http\Controllers\Admin;

use App\CentralLogics\Helpers;
use App\Helpers\AppHelper;
use App\Http\Controllers\Controller;
use App\Models\SubFeature;
use App\Models\SubPlan;
use DB;
use DataTables;
use Illuminate\Http\Request;
class SubPlanController extends Controller
{
    public function __construct(){

     $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function datatables()
    {   
        $datas=SubPlan::orderBy('id','desc')->get();  
        return DataTables::of($datas)
                            ->addIndexColumn()

                             ->editColumn('name', function(SubPlan $data) {
                                return $data->is_featured==1?'<div>'.$data->name. '<span class="badge badge-soft-success ml-10">Featured</span></div>':$data->name.'<p class="text-muted"> Slug: '.$data->slug.'</p>';
                            })
                            ->editColumn('interval', function(SubPlan $data) {
                                return Helpers::setInterval($data->interval);
                            })
                            ->editColumn('price', function(SubPlan $data) {
                               return Helpers::setCurrency($data->price);
                            })
                            ->addColumn('status', function(SubPlan $data) {
                                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin.subplan.status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin.subplan.status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option></select></div>';
                            })

                            ->addColumn('action', function(SubPlan $data) {
                                return '<div class="action-list">
                                
                                <a href="'.route('admin.subplan.edit',$data->id).'" class="btn btn-info btn-sm fs-13 waves-effect waves-light"><i class="ri-edit-box-fill align-middle fs-16 me-2"></i>Edit</a> 
                                </div>';
                            }) 
                            ->rawColumns(['name','status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side

       
    }

    public function index()
    {
        return view('admin.subplans.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $subfeatures=SubFeature::where('status',1)->get();
        return view('admin.subplans.create',compact('subfeatures'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
       // $validated = $request->validate([
       //      'name'=>'required|max:255',
       //      'price'=>'required',
       //      'interval'=>'required',
       //      'details'=>'required',
       //      'features' => 'present|array',
       //      'permissions.*' => 'required|string|in:interviewAccess,quizbankAccess,eventsAccess',
       // ]);

        $validated = $request->validate([
            'name'=>'required|string|max:255|unique:sub_plans,name',
            'price'=>'required',
            'interval'=>'required',
            'details'=>'required',

            
        ]);



        
        $slug=Helpers::slug($request->name.'-'.$request->interval);
        $subplan=SubPlan::where('slug',$slug)->first();
        if($subplan){
            return back()->with('error','Plan already exists with this name & time interval.');
        }

        $data=new SubPlan();
        $input=$request->all();
        
        $data->slug=$slug;
        $data->name=$request->name;
        $data->price=$request->price;
        $data->details=$request->details;

       
         // Upload intro video
        if ($request->hasFile('photo')) {
            $data->photo = Helpers::upload('subplan/', config('fileformats.image'), $request->file('photo'));
        }

        $data->fill($input)->save();
      
        toastr()->success('Data has been saved successfully!');
        return redirect()->route('admin.subplan.edit',$data->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data=SubPlan::find($id);
        $subfeatures=SubFeature::where('status',1)->get();

        return view('admin.subplans.edit',compact('subfeatures','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            
        $validated = $request->validate([
           'name'                => 'required|string|max:255|unique:sub_plans,name,' . $id,
            'price'=>'required',
            'interval'=>'required',
            'details'=>'required',

        ]);
        
        $slug = Helpers::slug($request->name.'-'.$request->interval);
        $subplan = SubPlan::where('slug', $slug)
                          ->where('id', '<>', $id)
                          ->first();
        if ($subplan) {
            return back()->with('error', 'Plan already exists with this name & time interval.');
        }

        $data=SubPlan::find($id);
        $input=$request->all();

        $data->slug=$slug;
        $data->name=$request->name;
        $data->price=$request->price;
        $data->details=$request->details;



        if ($request->hasFile('photo')) {

            $data->photo = Helpers::update('subplan/',$data->photo, config('fileformats.image'), $request->file('photo'));
        }

        $data->update($input);
        

        toastr()->success('Data has been Updated successfully!');
        return redirect()->route('admin.subplan.edit',$data->id);
    }

     public function status($id1,$id2)
    {
        $data = SubPlan::findOrFail($id1);
        $data->status = $id2;
        $data->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = SubPlan::findOrFail($id);
        $data->delete();
    }
}
