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
use App\Models\BitTransaction;
use App\Models\BitSubmission;
use App\Models\OrderItem;
use App\Models\ProductReview;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use App\CentralLogics\SalesAnalytics;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        // Get filter period from request
        $period = $request->input('period', '30days');
        
        // Date ranges based on selected period
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();
        
        // Calculate date ranges based on selected period
        switch ($period) {
            case '7days':
                $startDate = Carbon::now()->subDays(7)->startOfDay();
                $endDate = Carbon::now()->endOfDay();
                $previousStartDate = Carbon::now()->subDays(14)->startOfDay();
                $previousEndDate = Carbon::now()->subDays(8)->endOfDay();
                $salesOverviewPeriod = 'Last 7 Days';
                $chartDays = 7;
                break;
            case 'month':
                $startDate = Carbon::now()->startOfMonth();
                $endDate = Carbon::now()->endOfDay();
                $previousStartDate = Carbon::now()->subMonth()->startOfMonth();
                $previousEndDate = Carbon::now()->subMonth()->endOfMonth();
                $salesOverviewPeriod = 'This Month';
                $chartDays = Carbon::now()->daysInMonth;
                break;
            case 'year':
                $startDate = Carbon::now()->startOfYear();
                $endDate = Carbon::now()->endOfDay();
                $previousStartDate = Carbon::now()->subYear()->startOfYear();
                $previousEndDate = Carbon::now()->subYear()->endOfYear();
                $salesOverviewPeriod = 'This Year';
                $chartDays = 12; // Show monthly data for year view
                break;
            default: // 30days
                $startDate = Carbon::now()->subDays(30)->startOfDay();
                $endDate = Carbon::now()->endOfDay();
                $previousStartDate = Carbon::now()->subDays(60)->startOfDay();
                $previousEndDate = Carbon::now()->subDays(31)->endOfDay();
                $salesOverviewPeriod = 'Last 30 Days';
                $chartDays = 30;
                break;
        }

        // Total revenue stats
        $totalRevenue = Order::where('payment_status', 'completed')->sum('total');
        $currentPeriodRevenue = Order::where('payment_status', 'completed')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('total');
        $previousPeriodRevenue = Order::where('payment_status', 'completed')
            ->whereBetween('created_at', [$previousStartDate, $previousEndDate])
            ->sum('total');
        
        // Calculate percentage change
        $revenueChange = $previousPeriodRevenue > 0 
            ? round((($currentPeriodRevenue - $previousPeriodRevenue) / $previousPeriodRevenue) * 100, 2) 
            : ($currentPeriodRevenue > 0 ? 100 : 0);
            
        // Assume a target of 10% increase over previous period, calculate progress
        $revenueTarget = $previousPeriodRevenue > 0 
            ? round(($currentPeriodRevenue / ($previousPeriodRevenue * 1.1)) * 100, 2) 
            : 50;
        $revenueTarget = min($revenueTarget, 100); // Cap at 100%

        // Orders stats
        $totalOrders = Order::count();
        $currentPeriodOrders = Order::whereBetween('created_at', [$startDate, $endDate])->count();
        $previousPeriodOrders = Order::whereBetween('created_at', [$previousStartDate, $previousEndDate])->count();
        
        $ordersChange = $previousPeriodOrders > 0 
            ? round((($currentPeriodOrders - $previousPeriodOrders) / $previousPeriodOrders) * 100, 2) 
            : ($currentPeriodOrders > 0 ? 100 : 0);

        // Order status counts
        $orderStatusCounts = Order::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();
        
        $completedOrders = $orderStatusCounts['completed'] ?? 0;
        $pendingOrders = $orderStatusCounts['pending'] ?? 0;
        $processingOrders = $orderStatusCounts['processing'] ?? 0;
        $cancelledOrders = $orderStatusCounts['cancelled'] ?? 0;
        
        // Calculate percentages for order statuses
        $totalStatusCount = array_sum($orderStatusCounts);
        $orderStatusPercentages = [];
        foreach ($orderStatusCounts as $status => $count) {
            $orderStatusPercentages[$status] = $totalStatusCount > 0 
                ? round(($count / $totalStatusCount) * 100) 
                : 0;
        }

        // User stats
        $totalCustomers = User::count();
        $currentPeriodCustomers = User::whereBetween('created_at', [$startDate, $endDate])->count();
        $previousPeriodCustomers = User::whereBetween('created_at', [$previousStartDate, $previousEndDate])->count();
        
        $customersChange = $previousPeriodCustomers > 0 
            ? round((($currentPeriodCustomers - $previousPeriodCustomers) / $previousPeriodCustomers) * 100, 2) 
            : ($currentPeriodCustomers > 0 ? 100 : 0);
            
        $newCustomersThisMonth = User::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
        $activeCustomers = User::has('orders')->count();

        // Product stats
        $totalProducts = Product::count();
        $currentPeriodProducts = Product::whereBetween('created_at', [$startDate, $endDate])->count();
        $previousPeriodProducts = Product::whereBetween('created_at', [$previousStartDate, $previousEndDate])->count();
        
        $productsChange = $previousPeriodProducts > 0 
            ? round((($currentPeriodProducts - $previousPeriodProducts) / $previousPeriodProducts) * 100, 2)
            : ($currentPeriodProducts > 0 ? 100 : 0);
            
        $activeProducts = Product::where('status', 1)->count();
        $lowStockProducts = Product::where('quantity', '<=', 5)->where('quantity', '>', 0)->count();
        $lowStockProductsList = Product::where('quantity', '<=', 5)->orderBy('quantity')->limit(5)->get();

        // Sales chart data
        $salesChartData = [];
        $ordersChartData = [];
        $salesChartLabels = [];
        
        if ($period === 'year') {
            // Monthly data for the year
            for ($i = 1; $i <= 12; $i++) {
                $monthDate = Carbon::createFromDate(Carbon::now()->year, $i, 1);
                $salesChartLabels[] = $monthDate->format('M');
                
                $monthSales = Order::where('payment_status', 'completed')
                    ->whereYear('created_at', Carbon::now()->year)
                    ->whereMonth('created_at', $i)
                    ->sum('total');
                    
                $monthOrders = Order::whereYear('created_at', Carbon::now()->year)
                    ->whereMonth('created_at', $i)
                    ->count();
                
                $salesChartData[] = round($monthSales, 2);
                $ordersChartData[] = $monthOrders;
            }
        } else {
            // Daily data for the period
            for ($i = $chartDays - 1; $i >= 0; $i--) {
                $date = Carbon::now()->subDays($i)->format('Y-m-d');
                $displayDate = Carbon::now()->subDays($i)->format('d M');
                $salesChartLabels[] = $displayDate;
                
                $daySales = Order::where('payment_status', 'completed')
                    ->whereDate('created_at', $date)
                    ->sum('total');
                    
                $dayOrders = Order::whereDate('created_at', $date)
                    ->count();
                
                $salesChartData[] = round($daySales, 2);
                $ordersChartData[] = $dayOrders;
            }
        }

        // Recent orders
        $recentOrders = Order::with('user')
            ->latest()
            ->take(5)
            ->get();

        // Top selling products with improved query
        $topSellingProducts = Product::withCount([
                'orderItems as total_sold' => function($query) {
                    $query->select(DB::raw('SUM(quantity)'));
                    $query->whereHas('order', function($q) {
                        $q->where('payment_status', 'completed');
                    });
                },
                'orderItems as total_revenue' => function($query) {
                    $query->select(DB::raw('SUM(price * quantity)'));
                    $query->whereHas('order', function($q) {
                        $q->where('payment_status', 'completed');
                    });
                }
            ])
            ->with('category')
            ->having('total_sold', '>', 0)
            ->orderByDesc('total_sold')
            ->take(5)
            ->get();

        // Recent activity log
        $recentActivity = $this->getRecentActivity();

        return view('admin.dashboard', compact(
            'totalRevenue', 'revenueChange', 'revenueTarget', 
            'totalOrders', 'ordersChange', 'completedOrders', 'pendingOrders', 'cancelledOrders',
            'orderStatusCounts', 'orderStatusPercentages', 'processingOrders',
            'totalCustomers', 'customersChange', 'newCustomersThisMonth', 'activeCustomers',
            'totalProducts', 'productsChange', 'activeProducts', 'lowStockProducts', 'lowStockProductsList',
            'salesChartData', 'ordersChartData', 'salesChartLabels',
            'recentOrders', 'topSellingProducts', 'recentActivity', 'salesOverviewPeriod', 'period'
        ));
    }

    private function getRecentActivity()
    {
        $activity = [];
        
        // Recent orders
        $recentOrders = Order::with('user')
            ->latest()
            ->take(5)
            ->get();
            
        foreach ($recentOrders as $order) {
            $customerName = $order->user ? $order->user->name : 'Guest';
            $activity[] = [
                'type' => 'order',
                'message' => "New order <strong>#$order->order_number</strong> placed by <strong>$customerName</strong> for <strong>" . Helpers::formatPrice($order->total) . "</strong>",
                'time' => $order->created_at->diffForHumans()
            ];
        }
        
        // Recent users
        $recentUsers = User::latest()
            ->take(3)
            ->get();
            
        foreach ($recentUsers as $user) {
            $activity[] = [
                'type' => 'user',
                'message' => "New user <strong>$user->name</strong> registered",
                'time' => $user->created_at->diffForHumans()
            ];
        }
        
        // Recent products
        $recentProducts = Product::latest()
            ->take(3)
            ->get();
            
        foreach ($recentProducts as $product) {
            $activity[] = [
                'type' => 'product',
                'message' => "New product <strong>$product->name</strong> added to inventory",
                'time' => $product->created_at->diffForHumans()
            ];
        }
        
        // Recent reviews
        $recentReviews = ProductReview::with(['product', 'user'])
            ->latest()
            ->take(3)
            ->get();
            
        foreach ($recentReviews as $review) {
            if ($review->product && $review->user) {
                $activity[] = [
                    'type' => 'review',
                    'message' => "<strong>{$review->user->name}</strong> reviewed <strong>{$review->product->name}</strong> with {$review->rating} stars",
                    'time' => $review->created_at->diffForHumans()
                ];
            }
        }
        
        // Sort by time (most recent first)
        usort($activity, function($a, $b) {
            return strtotime(Carbon::parse($b['time'])->toDateTimeString()) - strtotime(Carbon::parse($a['time'])->toDateTimeString());
        });
        
        return array_slice($activity, 0, 10);
    }

    public function generalsettings(Request $request)
    {
        $data = GeneralSetting::find(1);
        return view('admin.generalsettings', compact('data'));
    }

    public function generalsettingsupdate(Request $request)
    {
        $request->validate([
            'favicon' => 'mimes:jpeg,jpg,png,svg',
            'logo' => 'mimes:jpeg,jpg,png,svg',
        ]);

        $input = $request->all();
        $data = GeneralSetting::find(1);
        if ($file = $request->file('favicon')) {
            $name = time() . $file->getClientOriginalName();
            $name = str_replace(' ', '', $name);
            $file->move('assets/images/', $name);
            if ($data->favicon != null) {
                if (file_exists(public_path() . '/assets/images/' . $data->favicon)) {
                    unlink(public_path() . '/assets/images/' . $data->favicon);
                }
            }
            $data->favicon = $name;
        }
        if ($file = $request->file('logo')) {
            $name = time() . $file->getClientOriginalName();
            $name = str_replace(' ', '', $name);
            $file->move('assets/images/logo/', $name);
            if ($data->logo != null) {
                if (file_exists(public_path() . '/assets/images/logo/' . $data->logo)) {
                    unlink(public_path() . '/assets/images/logo/' . $data->logo);
                }
            }
            $data->logo = $name;
        }
        if ($file = $request->file('admin_logo')) {
            $name = time() . $file->getClientOriginalName();
            $name = str_replace(' ', '', $name);
            $file->move('assets/images/logo/', $name);
            if ($data->admin_logo != null) {
                if (file_exists(public_path() . '/assets/images/logo/' . $data->admin_logo)) {
                    unlink(public_path() . '/assets/images/logo/' . $data->admin_logo);
                }
            }
            $data->admin_logo = $name;
        }
        if ($file = $request->file('landing_page_img_1')) {
            $name = time() . $file->getClientOriginalName();
            $name = str_replace(' ', '', $name);
            $file->move('assets/images/', $name);
            if ($data->landing_page_img_1 != null) {
                if (file_exists(public_path() . '/assets/images/' . $data->landing_page_img_1)) {
                    unlink(public_path() . '/assets/images/' . $data->landing_page_img_1);
                }
            }
            $data->landing_page_img_1 = $name;
        }
        if ($file = $request->file('intro_video_cover')) {
            $name = time() . $file->getClientOriginalName();
            $name = str_replace(' ', '', $name);
            $file->move('assets/images/', $name);
            if ($data->intro_video_cover != null) {
                if (file_exists(public_path() . '/assets/images/' . $data->intro_video_cover)) {
                    unlink(public_path() . '/assets/images/' . $data->intro_video_cover);
                }
            }
            $data->intro_video_cover = $name;
        }
        if ($file = $request->file('intro_video')) {
            $name = time() . $file->getClientOriginalName();
            $name = str_replace(' ', '', $name);
            $file->move('assets/images/', $name);
            if ($data->intro_video != null) {
                if (file_exists(public_path() . '/assets/images/' . $data->intro_video)) {
                    unlink(public_path() . '/assets/images/' . $data->intro_video);
                }
            }
            $data->intro_video = $name;
        }

        $data->name = $request->name;
        $data->slogan = $request->slogan;
        $data->bit_value = $request->bit_value;
        $data->update();

        Session::flash('message', 'Successfully updated Data');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }

    public function passwordreset($value = '')
    {
        return view('admin.cpassword');
    }

    public function changepass(Request $request)
    {
        $request->validate([
            'cpass' => 'required',
            'newpass' => 'required',
            'renewpass' => 'required|same:newpass'
        ]);
        $admin = Auth::guard('admin')->user();
        if ($request->cpass) {
            if (Hash::check($request->cpass, $admin->password)) {
                $input['password'] = Hash::make($request->newpass);
            } else {
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
        return view('admin.profile', compact('data'));
    }

    public function profileupdate(Request $request)
    {
        $request->validate([
            'photo' => 'mimes:jpeg,jpg,png,svg',
            'email' => 'unique:admins,email,' . Auth::guard('admin')->user()->id
        ]);

        $input = $request->all();
        $data = Auth::guard('admin')->user();

        if ($file = $request->file('photo')) {
            $data->photo = Helpers::update('admin/images/', $data->photo, config('fileformats.image'), $request->file('photo'));
        }

        $data->update($input);
        Session::flash('message', 'Data Updated Successfully !');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }

    public function social($value = '')
    {
        $data = SocialSetting::find(1);
        return view('admin.socialsettings', compact('data'));
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

    public function livechat($id = null)
    {
        $messenger_color = Auth::user()->messenger_color;
        return view('admin.livechat.messenger', [
            'id' => $id ?? 0,
            'messengerColor' => $messenger_color ? $messenger_color : Chatify::getFallbackColor(),
            'dark_mode' => 'light',
        ]);
    }

    public function tawk($value = '')
    {
        return view('admin.livechat.index');
    }
}