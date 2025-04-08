@extends('admin.layouts.master')
@section('title') Orders @endsection
@section('css')
<!--datatable css-->
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />

@endsection
@section('content')
@component('components.breadcrumb')

@slot('li_1') <a href="{{ route('admin.orders.index') }}"> Orders</a> @endslot
@slot('title') All @endslot
@endcomponent


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header end-t-end">
                <h5 class="card-title mb-0">Orders</h5>
                {{-- <a href="{{ route('admin.coupon.create') }}" class="btn btn-primary waves-effect waves-light">Add Coupon</a> --}}
            </div>
            <div class="card-body">
                <table id="geniustable" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                    <thead>
                        <tr>
                            
                            <th data-ordering="false">Order ID</th>                           
                            <th data-ordering="false">Customer</th>
                            <th>Order Date</th>                           
                            <th>Amount</th>
                            <th>Payment Status</th>
                            {{-- <th>Status</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>
                   
                </table>
            </div>
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->



<!-- Delete modal -->
<div class="modal fade" id="confirm-delete" aria-hidden="true" aria-labelledby="..." tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-3">
                <lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop"
                    colors="primary:#f7b84b,secondary:#405189" style="width:130px;height:130px">
                </lord-icon>
                <div class="{{-- mt-4 pt-4 --}}">
                    <h4>Uh oh, You are about to delete this Data!</h4>
                    <p class="text-muted"> Do you want to proceed?</p>
                    <!-- Toogle to second dialog -->
                    <div class="col-lg-12">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                             <a href="" class="btn btn-danger btn-ok" >
                                Delete
                            </a>                           
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Delete modal ends-->

@endsection
@section('script')
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

{{-- DATA TABLE --}}

    <script type="text/javascript">

        var table = $('#geniustable').DataTable({
               ordering: false,
               processing: true,
               serverSide: true,
               ajax: '{{ route('admin.orders.datatables') }}',
               columns: [
                        { data: 'order_number', name: 'order_number'},
                        // { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        { data: 'user_id', name: 'user_id'},
                        { data: 'created_at', name: 'created_at'},
                        { data: 'pay_amount', name: 'pay_amount'},
                        { data: 'payment_status', name: 'payment_status'},
                        { data: 'action', searchable: false, orderable: false }
                     ],
                language : {
                   
                }
            });
                      

{{-- DATA TABLE ENDS--}}


</script>


@endsection
