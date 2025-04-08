<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Auth;
class OrderController extends Controller
{   
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->request = $request;
    }
    public function index($value='')
    {  
       $orders=Order::where('user_id',Auth::id())->latest()->get(); 
       return view('user.orders.index',compact('orders'));
    }
}
