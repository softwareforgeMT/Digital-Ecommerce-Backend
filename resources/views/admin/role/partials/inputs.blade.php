<div class="row gy-4">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Add Roles</h5>
            </div>
            <div class="card-body">
                    <div class="row gy-4">
                            <div class="col-md-12">
                                    <label class="form-label"> Name</label>
                                    <input type="text" name="name" class="form-control"   placeholder="Enter Name" value="{{ isset($data->name)?$data->name:'' }}" required>
                            </div>                            
                    </div>
                    <hr>
                    <h5 class="text-center">{{ __('Permissions') }}</h5>
                    <hr>

                    <div class="row justify-content-center mt-3 role__permission">

                            <div class="col-lg-6">
                               <div class="form-check form-switch form-switch-right  form-switch-lg d-flex justify-content-between" >
                                    <label class="form-check-label" for="">Dashboard</label>
                                    <input type="checkbox" class="form-check-input" id="" {{ (isset($data) && $data->sectionCheck('dashboard') )? 'checked' : '' }} name="section[]" value="dashboard" >   
                                </div>
                            </div>


                            <div class="col-lg-6">
                               <div class="form-check form-switch form-switch-right  form-switch-lg d-flex justify-content-between" >
                                    <label class="form-check-label" for="">Users</label>
                                    <input type="checkbox" class="form-check-input" id=""  {{ (isset($data) && $data->sectionCheck('users') )? 'checked' : '' }} name="section[]" value="users" >   
                                </div>
                            </div>

                            <div class="col-lg-6">
                               <div class="form-check form-switch form-switch-right  form-switch-lg d-flex justify-content-between" >
                                    <label class="form-check-label" for="">Orders</label>
                                    <input type="checkbox" class="form-check-input" id=""  {{ (isset($data) && $data->sectionCheck('orders') )? 'checked' : '' }} name="section[]" value="orders" >   
                                </div>
                            </div>

                            <div class="col-lg-6">
                               <div class="form-check form-switch form-switch-right  form-switch-lg d-flex justify-content-between" >
                                    <label class="form-check-label" for="">Coupons</label>
                                    <input type="checkbox" class="form-check-input" id=""  {{ (isset($data) && $data->sectionCheck('coupons') )? 'checked' : '' }} name="section[]" value="coupons" >   
                                </div>
                            </div>

                            <div class="col-lg-6">
                               <div class="form-check form-switch form-switch-right  form-switch-lg d-flex justify-content-between" >
                                    <label class="form-check-label" for="">Subscriptions</label>
                                    <input type="checkbox" class="form-check-input" {{ (isset($data) && $data->sectionCheck('subscriptions') )? 'checked' : '' }} name="section[]" value="subscriptions" >   
                                </div>
                            </div>

     
                            <div class="col-lg-6">
                               <div class="form-check form-switch form-switch-right  form-switch-lg d-flex justify-content-between" >
                                    <label class="form-check-label" for="">Live Chat</label>
                                    <input type="checkbox" class="form-check-input" {{ (isset($data) && $data->sectionCheck('live_chat') )? 'checked' : '' }} name="section[]" value="live_chat" >   
                                </div>
                            </div>

                            <div class="col-lg-6">
                               <div class="form-check form-switch form-switch-right  form-switch-lg d-flex justify-content-between" >
                                    <label class="form-check-label" for="">Manage staff</label>
                                    <input type="checkbox" class="form-check-input" {{ (isset($data) && $data->sectionCheck('manage_staff') )? 'checked' : '' }} name="section[]" value="manage_staff" >   
                                </div>
                            </div>

                            <div class="col-lg-6">
                               <div class="form-check form-switch form-switch-right  form-switch-lg d-flex justify-content-between" >
                                    <label class="form-check-label" for="">General Settings</label>
                                    <input type="checkbox" class="form-check-input" {{ (isset($data) && $data->sectionCheck('general_settings') )? 'checked' : '' }} name="section[]" value="general_settings" >   
                                </div>
                            </div>



                            <div class="col-lg-6">
                               <div class="form-check form-switch form-switch-right  form-switch-lg d-flex justify-content-between" >
                                    <label class="form-check-label" for="">Manage Products</label>
                                    <input type="checkbox" class="form-check-input" {{ (isset($data) && $data->sectionCheck('products') )? 'checked' : '' }} name="section[]" value="products" >   
                                </div>
                            </div>
                     </div>

                    

                  
            </div>
        </div>
    </div>
</div>