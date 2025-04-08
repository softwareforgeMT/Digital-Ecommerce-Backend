<?php

namespace App\Http\Controllers\User;

use App\CentralLogics\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Banner;
use App\Models\CareerEventRegistration;
use App\Models\Company;
use App\Models\Country;
use App\Models\Favorite;
use App\Models\GeneralSetting;
use App\Models\QuizBankManagement;
use App\Models\QuizProgress;
use App\Models\SubFeature;
use App\Models\SubPlan;
use App\Models\Product;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Hash;
use Illuminate\Http\Request;
use Session;
use DB;
class DashboardController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->request = $request;
    }

   public function index($value='')
   {
       $gs = GeneralSetting::find(1);
       $created_at = Carbon::parse(Auth::user()->created_at);
       $products = \App\Models\Product::active()->latest()->take(2)->get(); // Add this line
       
       return view('user.dashboard', compact('gs', 'created_at', 'products'));
   }

    public function profile()
    {
        $data = Auth::user();
        $gs=GeneralSetting::find(1);
        $documents=Banner::active()->where('for_section','document')->orderBy('id','asc')->take(10)->get();
        $alldocuments=Banner::active()->where('for_section','document')->count();
        $link=route('front.index').'?reff='.Auth::user()->affiliate_code;
            $title=$gs->name;
            $socialShare = \Share::page($link,$title)
            ->facebook()
            ->twitter()
            // ->reddit()
            ->linkedin()
            ->whatsapp()
            ->getRawLinks();
            // ->telegram();
        $products = Product::active()->latest()->take(2)->get();
        return view('user.profile',compact('data','socialShare','documents','alldocuments','products'));
    }

    public function accountSettings()
    {
        $data = Auth::user();
        $countries=Country::where('status',1)->get();
        return view('user.account-settings',compact('data','countries'));
    }

    public function accountSettingsUpdate(Request $request)
    {
        //--- Validation Section
        $request->validate([
         'photo' => 'mimes:jpeg,jpg,png,svg',
         'name' => 'unique:users,name,'.Auth::user()->id,
        ]);

        //--- Validation Section Ends
         $data = Auth::user();
        //image upload
        $data->photo = Helpers::update('user/avatar/', $data->photo=='user.png'?'':$data->photo, config('fileformats.image'), $request->file('photo'));
        $data->name=$request->name;
        $data->phone=$request->phone;
        if(!$data->country_id){
            $data->country_id=$request->country_id;
        }
        

        $data->gender=$request->gender;
        $data->university=$request->university;
        $data->maj_sub=$request->maj_sub;

        $data->update();

        Session::flash('message', 'Data Updated Successfully !');
        Session::flash('alert-class', 'alert-success');
        if (Session::has('add_payment_gateway')) {
             Session::forget('add_payment_gateway');
            // Redirect to the earnings route
            return redirect()->route('user.earnings');       
        }else{
            return redirect()->back();
        }
        
    }

    public function resetform()
    {
        return view('user.cpassword');
    }

    public function reset(Request $request)
    {
       $request->validate([
         'cpass'=>'required',
         'newpass'=>'required',
         'renewpass' => 'required|same:newpass'
        ]);
        $user = Auth::user();
        if ($request->cpass){
            if (Hash::check($request->cpass, $user->password)){
                    $input['password'] = Hash::make($request->newpass);
            }else{
               Session::flash('message', 'Current password Does not match.');
               Session::flash('alert-class', 'alert-danger');
               return redirect()->back();
            }
        }
        $user->update($input);
        Session::flash('message', 'Successfully change your password');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }



    public function storeMedia(Request $request)
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

    public function pricing()
    {  
       $subplans=SubPlan::active()->get(); 
       $subfeatures=SubFeature::active()->get();
       return view('user.subplans.pricing',compact('subplans','subfeatures'));
    }
    

    public function help()
    {
       return view('user.help');
    }



    public function customerSupport()
    {  

        $id=1;
        $type='user';
        $messengerColor='#2180f3';
        $dark_mode='light';
        return view('user.livechat.show',compact('id','type','messengerColor','dark_mode'));
    }


}
