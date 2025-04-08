<?php

namespace App\Http\Controllers\Admin;




use App\CentralLogics\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;
use Validator;
use PDF;
use Illuminate\Support\Facades\View;
class OrderController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {   
        $datas=Order::orderBy('id','desc')->get();  
        return DataTables::of($datas)
                            
                            ->addColumn('user_id', function(Order $data) {
                                return $data->user?$data->user->name:'';
                            })
                            ->editColumn('created_at', function(Order $data) {
                                $formattedCreatedAt = Carbon::parse($data->created_at)->format('j M, Y');
                                $html = '<p class="mb-0">'.$formattedCreatedAt.'<small class="text-muted ms-1">'.Carbon::parse($data->created_at)->format('h:i A').'</small></p>';
                                return $html;
                            })

                            ->editColumn('pay_amount', function(Order $data) {
                                return Helpers::setCurrency($data->pay_amount);
                               
                            })
                             ->editColumn('payment_status', function(Order $data) {
                                if($data->payment_status=='completed'){
                                    return '<span class="badge badge-soft-success text-uppercase">Completed</span>';
                                }else{
                                    return '<span class="badge badge-soft-danger text-uppercase">'.$data->payment_status.'</span>';
                                }
                            })
                           
                            // ->addColumn('status', function(Order $data) {
                            //     $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                            //     $s = $data->status == 1 ? 'selected' : '';
                            //     $ns = $data->status == 0 ? 'selected' : '';
                            //     return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin.orders.status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin.orders.status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option></select></div>';
                            // })

                            ->addColumn('action', function(Order $data) {
                                return '<div class="action-list">
                                
                                <a href="'.route('admin.orders.show',$data->id).'" class="btn btn-info btn-sm fs-13 waves-effect waves-light"><i class="ri-eye-fill align-middle fs-16 me-2"></i>View</a> 


                                </div>';

                                // <a data-href="' . route('admin.orders.delete',$data->id) . '" data-bs-toggle="modal" data-bs-target="#confirm-delete" class="btn btn-sm fs-13 btn-danger waves-effect waves-light"><i class="ri-delete-bin-fill align-middle fs-16 me-2"></i>Delete</a>
                            }) 
                            ->rawColumns(['payment_status','created_at','action'])
                            ->toJson(); //--- Returning Json Data To Client Side

       
    }

    //*** GET Request
    public function index()
    {
        return view('admin.orders.index');
    }



    //*** GET Request
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.orders.show',compact('order'));
    }

    //*** GET Request
    public function invoice($id)
    {
        $order = Order::findOrFail($id);
        //return view('email.orderemail',compact('order'));
        return view('admin.orders.invoice',compact('order'));
    }

    // //*** GET Request - Download Invoice
    // public function downloadInvoice($id)
    // {
    //     $order = Order::findOrFail($id);
    //     // Logic to generate and download the invoice
    //     // Example code to download a PDF invoice
    //     $pdf = PDF::loadView('admin.orders.invoice', compact('order'));
    //     return $pdf->download('invoice.pdf');
    // }

 

    public function downloadInvoice($id)
    {
        $order = Order::findOrFail($id);
        // Load the invoice view with the order data
        // $view = View::make('admin.orders.invoice', compact('order'));
        // Generate the PDF
        $pdf = PDF::loadView('admin.orders.invoice', compact('order'));
        // Optionally, you can set PDF options such as paper size, orientation, etc.
        // For example:
        // $pdf->setPaper('A4', 'portrait');

        // Output the PDF as a response
        return $pdf->download('invoice.pdf');
    }



    //*** GET Request Status
    public function status($id1,$id2)
    {
        $data = Order::findOrFail($id1);
        $data->status = $id2;
        $data->update();
    }

}