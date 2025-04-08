<div class="card">
    <div class="card-header">
        <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
            {{-- <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#top_selling_package"
                    role="tab">
                   Top Selling Package
                </a>
            </li>
            --}}
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#top_paying_customers"
                    role="tab">
                    Top Paying Customers
                </a>
            </li>
        </ul>
    </div>
    <!-- end card header -->
    <div class="card-body">
        <div class="tab-content">
           


            <!-- end tab-pane -->
            <div class="tab-pane active" id="top_paying_customers" role="tabpanel">    

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive table-card">
                            <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                <thead class="text-muted bg-soft-light">
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Orders Quantity</th>
                                        <th>Total Orders Amount</th>
                                    </tr>
                                </thead><!-- end thead -->
                                <tbody>
                                    @foreach($topPayingCustomers  as $customer)
                                    @if($customer->customer)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="me-2">
                                                    <img src="{!! Helpers::image($customer->customer->photo, 'user/avatar/') !!}" alt="" class="avatar-xs rounded-circle">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1"><a target="_blank" href="{{route('admin.users.show',$customer->customer->id)}}">{{ $customer->customer->name }}</a></h6>
                                                    <p class="text-muted mb-0"> {{ ucfirst($customer->customer->email) }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $customer->ordersCount }}</td>
                                        {{-- <td>
                                            <span class="text-success mb-0"><i class="mdi mdi-trending-up align-middle me-1"></i>5.26
                                            </span>
                                        </td> --}}
                                        
                                        <td>{{ Helpers::setCurrency($customer->total) }}</td>
                                    </tr><!-- end -->
                                    @endif
                                    @endforeach
                                </tbody><!-- end tbody -->
                            </table><!-- end table -->
                        </div><!-- end tbody -->

                    </div>
                </div>

            </div>

            <!-- end tab pane -->
        </div>
        <!-- end tab content -->
    </div>
    <!-- end card body -->
</div>