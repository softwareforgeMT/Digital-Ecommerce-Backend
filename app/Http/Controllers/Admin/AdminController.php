<?php

namespace App\Http\Controllers\Admin;

use App\CentralLogics\Helpers;
use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\Order;
use App\Models\Product;
use App\Models\SocialSetting;
use App\Models\Transaction;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use App\CentralLogics\SalesAnalytics;

class AdminController extends Controller
{
   public function __construct(){

     $this->middleware('auth:admin');
   }

    public function index(Request $request)
    {
        $autoDate = $request->input('auto_date');
        $customDate = $request->input('custom_date');

        //$orders = Order::query();
        $previousorders = Order::query();
        $users = User::user();
        $previoususers = User::user();
        $dateRange='';
        $previousSales=0;
        $previousStartDate='';
        $previousEndDate='';
        $totalOrders=0;
        $previousOrders=0;
        $ordersPercentage=0;
        $usersPercentage=0;

        $dateRangeValue = $autoDate ? $autoDate : (!empty($customDate) ? $customDate : '');
        $dateRange = $this->getDateRangeByCustomDate($dateRangeValue); 
        
        $selectedDates=$dateRange[0]->format('d M, Y').' to '.$dateRange[1]->format('d M, Y');
        
        $orders=Order::whereBetween('created_at', $dateRange);     
        
        $salesGraphData = SalesAnalytics::getSalesGraphData(clone $orders);

        $salesByPreferences = SalesAnalytics::getSalesByPreferences(clone $orders);
        $salesByCoupon = SalesAnalytics::getSalesByCoupon(clone $orders);
        
        $topsellingPackages=SalesAnalytics::getTopSellingPackages(clone $orders);
        $topBookingTutors=SalesAnalytics::getTopBookingTutors(clone $orders);
        $topPayingCustomers=SalesAnalytics::getTopPayingCustomers(clone $orders);

        $currentSales = $orders->sum('pay_amount');
        $currentOrders = $orders->count();

        $totalusers=$users->whereBetween('created_at', $dateRange)->count();
   
        if($dateRangeValue!='all'){

            $diffinDays = $dateRange[0]->diffInDays($dateRange[1]);
            
            $previousStartDate = $dateRange[0]->copy()->subDays($diffinDays+1);
            $previousEndDate = $dateRange[1]->copy()->subDays($diffinDays+1);
 

            $previousSales = $previousorders->whereBetween('created_at', [$previousStartDate, $previousEndDate])->sum('pay_amount');
            $previousOrders = $previousorders->whereBetween('created_at', [$previousStartDate, $previousEndDate])->count();
      
            $totalprevioususers=$previoususers->whereBetween('created_at',[$previousStartDate, $previousEndDate])->count();

            $ordersPercentage = number_format($this->calculatePercentageChange($previousOrders, $currentOrders), 2);
            $usersPercentage = number_format($this->calculatePercentageChange($totalprevioususers, $totalusers), 2);
        }

        $salesPercentage = number_format($this->calculatePercentageChange($previousSales, $currentSales),2);
        // dd($selectedDates);
        return view('admin.dashboard', compact('currentSales', 'currentOrders', 'previousSales', 'salesPercentage','ordersPercentage','selectedDates','previousStartDate','previousEndDate','totalusers','usersPercentage','salesGraphData','salesByPreferences','salesByCoupon','topsellingPackages','topBookingTutors','topPayingCustomers'));
    }


    private function getDateRangeByCustomDate($customDate='')
    {   
        $currentDate = Carbon::now()->endOfDay();
        if($customDate){
           if($customDate==='all'){
             return [Carbon::now()->subYears(100)->startOfDay(), $currentDate];
           }else{

                $dateRange = explode(' to ', $customDate);
                if (count($dateRange) == 2) {
                    $startDate = Carbon::createFromFormat('d M, Y', trim($dateRange[0]))->startOfDay();
                    $endDate = Carbon::createFromFormat('d M, Y', trim($dateRange[1]))->endOfDay();
                    return [$startDate, $endDate];
                }
           }
        }
        // By default 1month
        return [Carbon::now()->subMonth()->startOfDay(), $currentDate];   
    }

    private function calculatePercentageChange($previousSales, $currentSales)
    {
        if ($previousSales != 0) {
            return (($currentSales - $previousSales) / $previousSales) * 100;
        }
        return 0;
    }


    // private function getDateRangeByAutoDate($autoDate)
    // {
    //     $currentDate = Carbon::now()->endOfDay();

    //     switch ($autoDate) {
    //         case 'all':
    //             return [Carbon::now()->subYears(100)->startOfDay(), $currentDate];
    //         case '1M':
    //             return [Carbon::now()->subMonth()->startOfDay(), $currentDate];
    //         case '6M':
    //             return [Carbon::now()->subMonths(6)->startOfDay(), $currentDate];
    //         case '1Y':
    //             return [Carbon::now()->subYear()->startOfDay(), $currentDate];
    //         default:
    //             return [Carbon::now()->subYears(100)->startOfDay(), $currentDate];
    //     }
    // }


   public function generalsettings(Request $request)
   {
      $data=GeneralSetting::find(1);
      return view('admin.generalsettings',compact('data'));
   }

   public function generalsettingsupdate(Request $request)
   {
       //dd($request->all());
        //--- Validation Section
        $request->validate([
         'favicon' => 'mimes:jpeg,jpg,png,svg',
         'logo' => 'mimes:jpeg,jpg,png,svg',
        ]);


        //--- Validation Section Ends
        $input = $request->all();
        $data = GeneralSetting::find(1);
            if ($file = $request->file('favicon'))
            {
                $name = time().$file->getClientOriginalName();
                $name=str_replace(' ','',$name);
                $file->move('assets/images/',$name);
                if($data->favicon != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$data->favicon)) {
                        unlink(public_path().'/assets/images/'.$data->favicon);
                    }
                }
                $data->favicon = $name;
            }
            if ($file = $request->file('logo'))
            {
                $name = time().$file->getClientOriginalName();
                $name=str_replace(' ','',$name);
                $file->move('assets/images/logo/',$name);
                if($data->logo != null)
                {
                    if (file_exists(public_path().'/assets/images/logo/'.$data->logo)) {
                        unlink(public_path().'/assets/images/logo/'.$data->logo);
                    }
                }
                $data->logo = $name;
            }
            if ($file = $request->file('admin_logo'))
            {
                $name = time().$file->getClientOriginalName();
                $name=str_replace(' ','',$name);
                $file->move('assets/images/logo/',$name);
                if($data->admin_logo != null)
                {
                    if (file_exists(public_path().'/assets/images/logo/'.$data->admin_logo)) {
                        unlink(public_path().'/assets/images/logo/'.$data->admin_logo);
                    }
                }
                $data->admin_logo = $name;
            }
            if ($file = $request->file('landing_page_img_1'))
            {
                $name = time().$file->getClientOriginalName();
                $name=str_replace(' ','',$name);
                $file->move('assets/images/',$name);
                if($data->landing_page_img_1 != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$data->landing_page_img_1)) {
                        unlink(public_path().'/assets/images/'.$data->landing_page_img_1);
                    }
                }
                $data->landing_page_img_1 = $name;
            }
            if ($file = $request->file('intro_video_cover'))
            {
                $name = time().$file->getClientOriginalName();
                $name=str_replace(' ','',$name);
                $file->move('assets/images/',$name);
                if($data->intro_video_cover != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$data->intro_video_cover)) {
                        unlink(public_path().'/assets/images/'.$data->intro_video_cover);
                    }
                }
                $data->intro_video_cover = $name;
            }
            if ($file = $request->file('intro_video'))
            {
                $name = time().$file->getClientOriginalName();
                $name=str_replace(' ','',$name);
                $file->move('assets/images/',$name);
                if($data->intro_video != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$data->intro_video)) {
                        unlink(public_path().'/assets/images/'.$data->intro_video);
                    }
                }
                $data->intro_video = $name;
            }


         $data->name=$request->name;
         $data->slogan=$request->slogan;
        //  $data->alipay_conversion_rate=$request->alipay_conversion_rate;
         $data->update();

      Session::flash('message', 'Successfully updated Data');
      Session::flash('alert-class', 'alert-success');
      return redirect()->back();
   }

   public function passwordreset($value='')
   {
      return view('admin.cpassword');
   }

   public function changepass(Request $request)
   {
        $request->validate([
         'cpass'=>'required',
         'newpass'=>'required',
         'renewpass' => 'required|same:newpass'
        ]);
        $admin = Auth::guard('admin')->user();
        if ($request->cpass){
            if (Hash::check($request->cpass, $admin->password)){
                    $input['password'] = Hash::make($request->newpass);
            }else{
               Session::flash('message', 'Current password Does not match.');
               Session::flash('alert-class', 'alert-danger');
               return redirect()->back();
            }
        }
        $admin->update($input);
        Session::flash('message', 'Successfully change your password');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }

    public function profile()
    {
        $data = Auth::guard('admin')->user();
        return view('admin.profile',compact('data'));
    }

    public function profileupdate(Request $request)
    {
        //--- Validation Section
        $request->validate([
         'photo' => 'mimes:jpeg,jpg,png,svg',
         'email' => 'unique:admins,email,'.Auth::guard('admin')->user()->id
        ]);

        //--- Validation Section Ends
        $input = $request->all();
        $data = Auth::guard('admin')->user();

            if ($file = $request->file('photo')){
                $data->photo = Helpers::update('admin/images/', $data->photo, config('fileformats.image'), $request->file('photo'));
            }


        $data->update($input);
        Session::flash('message', 'Data Updated Successfully !');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();

    }

    public function social($value='')
    {
      $data=SocialSetting::find(1);
      return view('admin.socialsettings',compact('data'));
    }

    public function socialupdate(Request $request)
    {
        $input = $request->all();
        $data = SocialSetting::find(1);

        $data->update($input);
        Session::flash('message', 'Data Updated Successfully !');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }

    public function livechat( $id = null)
    {   
         //dd(Auth::guard('admin')->check());
        $messenger_color = Auth::user()->messenger_color;
        return view('admin.livechat.messenger', [
            'id' => $id ?? 0,
            'messengerColor' => $messenger_color ? $messenger_color : Chatify::getFallbackColor(),
            'dark_mode' => 'light',
        ]);
    }

    public function tawk($value='')
    {
        return view('admin.livechat.index');
    }


}