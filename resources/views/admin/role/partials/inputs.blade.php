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
                        <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ isset($data->name) ? $data->name : '' }}" required>
                    </div>
                </div>

                <hr>
                <h5 class="text-center">{{ __('Permissions') }}</h5>
                <hr>

                <div class="row justify-content-center mt-3 role__permission">

                    {{-- USERS --}}
                    <div class="col-lg-6">
                        <div class="form-check form-switch form-switch-right form-switch-lg d-flex justify-content-between">
                            <label class="form-check-label" for="">Users</label>
                            <input type="checkbox" class="form-check-input" {{ (isset($data) && $data->sectionCheck('users')) ? 'checked' : '' }} name="section[]" value="users">
                        </div>
                    </div>

                    {{-- ORDERS --}}
                    <div class="col-lg-6">
                        <div class="form-check form-switch form-switch-right form-switch-lg d-flex justify-content-between">
                            <label class="form-check-label" for="">Orders</label>
                            <input type="checkbox" class="form-check-input" {{ (isset($data) && $data->sectionCheck('orders')) ? 'checked' : '' }} name="section[]" value="orders">
                        </div>
                    </div>

                    {{-- PRODUCTS --}}
                    <div class="col-lg-6">
                        <div class="form-check form-switch form-switch-right form-switch-lg d-flex justify-content-between">
                            <label class="form-check-label" for="">Products</label>
                            <input type="checkbox" class="form-check-input" {{ (isset($data) && $data->sectionCheck('products')) ? 'checked' : '' }} name="section[]" value="products">
                        </div>
                    </div>

                    {{-- REVIEWS --}}
                    <div class="col-lg-6">
                        <div class="form-check form-switch form-switch-right form-switch-lg d-flex justify-content-between">
                            <label class="form-check-label" for="">Reviews</label>
                            <input type="checkbox" class="form-check-input" {{ (isset($data) && $data->sectionCheck('reviews')) ? 'checked' : '' }} name="section[]" value="reviews">
                        </div>
                    </div>

                    {{-- NOSTALGIA BASE --}}
                    <div class="col-lg-6">
                        <div class="form-check form-switch form-switch-right form-switch-lg d-flex justify-content-between">
                            <label class="form-check-label" for="">Nostalgia Base</label>
                            <input type="checkbox" class="form-check-input" {{ (isset($data) && $data->sectionCheck('nostalgia')) ? 'checked' : '' }} name="section[]" value="nostalgia">
                        </div>
                    </div>

                    {{-- SERVICES --}}
                    <div class="col-lg-6">
                        <div class="form-check form-switch form-switch-right form-switch-lg d-flex justify-content-between">
                            <label class="form-check-label" for="">Services</label>
                            <input type="checkbox" class="form-check-input" {{ (isset($data) && $data->sectionCheck('services')) ? 'checked' : '' }} name="section[]" value="services">
                        </div>
                    </div>

                    {{-- SUPPORT TICKETS --}}
                    <div class="col-lg-6">
                        <div class="form-check form-switch form-switch-right form-switch-lg d-flex justify-content-between">
                            <label class="form-check-label" for="">Support Tickets</label>
                            <input type="checkbox" class="form-check-input" {{ (isset($data) && $data->sectionCheck('support_tickets')) ? 'checked' : '' }} name="section[]" value="support_tickets">
                        </div>
                    </div>

                    {{-- BLOG MANAGEMENT --}}
                    <div class="col-lg-6">
                        <div class="form-check form-switch form-switch-right form-switch-lg d-flex justify-content-between">
                            <label class="form-check-label" for="">Blogs</label>
                            <input type="checkbox" class="form-check-input" {{ (isset($data) && $data->sectionCheck('blogs')) ? 'checked' : '' }} name="section[]" value="blogs">
                        </div>
                    </div>

                    {{-- BIT LOG SYSTEM --}}
                    <div class="col-lg-6">
                        <div class="form-check form-switch form-switch-right form-switch-lg d-flex justify-content-between">
                            <label class="form-check-label" for="">Bit Management</label>
                            <input type="checkbox" class="form-check-input" {{ (isset($data) && $data->sectionCheck('bit_management')) ? 'checked' : '' }} name="section[]" value="bit_management">
                        </div>
                    </div>

                    {{-- LIVE CHAT --}}
                    <div class="col-lg-6">
                        <div class="form-check form-switch form-switch-right form-switch-lg d-flex justify-content-between">
                            <label class="form-check-label" for="">Live Chat</label>
                            <input type="checkbox" class="form-check-input" {{ (isset($data) && $data->sectionCheck('live_chat')) ? 'checked' : '' }} name="section[]" value="live_chat">
                        </div>
                    </div>

                    {{-- SOCIAL SETTINGS --}}
                    <div class="col-lg-6">
                        <div class="form-check form-switch form-switch-right form-switch-lg d-flex justify-content-between">
                            <label class="form-check-label" for="">Social Settings</label>
                            <input type="checkbox" class="form-check-input" {{ (isset($data) && $data->sectionCheck('social_settings')) ? 'checked' : '' }} name="section[]" value="social_settings">
                        </div>
                    </div>

                    {{-- MANAGE STAFFS --}}
                    <div class="col-lg-6">
                        <div class="form-check form-switch form-switch-right form-switch-lg d-flex justify-content-between">
                            <label class="form-check-label" for="">Manage Staffs</label>
                            <input type="checkbox" class="form-check-input" {{ (isset($data) && $data->sectionCheck('manage_staffs')) ? 'checked' : '' }} name="section[]" value="manage_staffs">
                        </div>
                    </div>

                    {{-- GENERAL SETTINGS --}}
                    <div class="col-lg-6">
                        <div class="form-check form-switch form-switch-right form-switch-lg d-flex justify-content-between">
                            <label class="form-check-label" for="">General Settings</label>
                            <input type="checkbox" class="form-check-input" {{ (isset($data) && $data->sectionCheck('general_settings')) ? 'checked' : '' }} name="section[]" value="general_settings">
                        </div>
                    </div>

                    {{-- CLEAR CACHE --}}
                    <div class="col-lg-6">
                        <div class="form-check form-switch form-switch-right form-switch-lg d-flex justify-content-between">
                            <label class="form-check-label" for="">Clear Cache</label>
                            <input type="checkbox" class="form-check-input" {{ (isset($data) && $data->sectionCheck('clear_cache')) ? 'checked' : '' }} name="section[]" value="clear_cache">
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
