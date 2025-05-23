@extends('admin.layouts.master')
@section('title') Subscribed Users @endsection
@section('css')
<!--datatable css-->
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />

@endsection
@section('content')
@component('components.breadcrumb')

@slot('li_1') <a href="{{ route('admin.users.subscribed.index') }}"> Subscribed Users</a> @endslot
@slot('title')Users @endslot
@endcomponent


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header end-t-end">
                <h5 class="card-title mb-0">Subscribed Users</h5>
                {{-- <a href="{{ route('admin.user.subscribed.create') }}" class="btn btn-primary waves-effect waves-light">Add Features</a> --}}
      
                <div>
                    <form action="{{route('admin.users.subscribed.index')}}" method="get" id="searchfilters" class="">
                        <select class="form-select filter-select" id="subscribed_users" name="subscription_type"  data-id="column-3">
                            <option value="all-subscriptions" {{$subscription_type=="all-subscriptions"?'selected':''}}>All Users</option>
                            <option value="active-subscriptions" {{$subscription_type=="active-subscriptions"?'selected':''}}  >Active Users</option>
                        </select>
                    </form>

                </div>
                       
            </div>
            <div class="card-body">
                <table id="geniustable" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                    <thead>
                        <tr>
                            
                            <th data-ordering="false">ID</th> 
                            <th >User</th>                           
                            <th >Plan Name</th>
                            <th >Stripe Id</th>
                            {{-- <th>Price</th>                           
                            <th>Create Date</th>
                            <th>Status</th> --}}
                            <th>Status</th>
                            <th>Created At</th>
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
        var url='{!! route('admin.users.subscribed.datatables',compact('subscription_type')) !!}';
        var table = $('#geniustable').DataTable({
               ordering: false,
               processing: true,
               serverSide: true,
               ajax: url,
               columns: [
                        // { data: 'id', name: 'id'},
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        { data: 'user_id', name: 'user_id'},
                        { data: 'stripe_price', name: 'stripe_price'},

                        { data: 'stripe_id', name: 'stripe_id'},
                        { data: 'stripe_status', name: 'stripe_status'},
                        { data: 'created_at',name: 'created_at' },
                        { data: 'action',orderable: false, searchable: false },
                     ],
                language : {
                   
                }
            });

        $('.filter-select').change( function() {
                $('#searchfilters').submit();
        });
                      

{{-- DATA TABLE ENDS--}}


</script>


@endsection
