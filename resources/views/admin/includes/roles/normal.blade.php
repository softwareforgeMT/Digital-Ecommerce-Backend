        @if(Auth::guard('admin')->user()->role_id != 0)
       
                @if(Auth::guard('admin')->user()->sectionCheck('users')) 
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.users.index') }}" >
                        <i class="ri-group-fill"></i> <span>Users </span>
                    </a>
                </li>  
                @endif
                
                @if(Auth::guard('admin')->user()->sectionCheck('orders')) 
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.orders.index') }}" >
                        <i class="bx bx-shopping-bag"></i> <span>Orders </span>
                    </a>
                </li>  
                @endif
                @if(Auth::guard('admin')->user()->sectionCheck('coupons')) 
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.coupon.index') }}" >
                        <i class="bx bxs-discount"></i> <span>Coupons </span>
                    </a>
                </li>  
                @endif
                
                @if(Auth::guard('admin')->user()->sectionCheck('subscriptions'))            
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPages" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                        <i class="ri-pages-line"></i> <span>Subscriptions</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarPages">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.subplan.index') }}" class="nav-link">Subscriptions</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.subplan.create') }}" class="nav-link"> Add Subscription 
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                @endif
                @if(Auth::guard('products')->user()->sectionCheck('products'))  
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#productmanagement" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="productmanagement">
                        <i class="ri-stack-line"></i> <span>Product</span>
                    </a>
                    <div class="collapse menu-dropdown" id="productmanagement">
                        <ul class="nav nav-sm flex-column"> 
                            <li class="nav-item">
                                <a href="{{ route('admin.product.index') }}" class="nav-link">Product List</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.product.create') }}" class="nav-link">Add Product</a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif



                <li class="menu-title"><span>Settings</span></li>
                @if(Auth::guard('admin')->user()->sectionCheck('live_chat')) 
                <li class="nav-item">
                    <a class="nav-link menu-link" target="_blank" href="https://dashboard.tawk.to/">
                        <i class="ri-message-2-line"></i> <span >Live Chat</span>
                    </a>
                </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.profile') }}" >
                        <i class="ri-user-settings-fill"></i> <span>Profile </span>
                    </a>
                </li>
                @if(Auth::guard('admin')->user()->sectionCheck('social_settings')) 
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.social') }}" >
                        <i class="ri-team-fill"></i> <span>Social </span>
                    </a>
                </li>
                @endif
                @if(Auth::guard('admin')->user()->sectionCheck('manage_staffs'))
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.staff.index') }}" >
                        <i class="ri-group-2-fill"></i> <span>Manage staff </span>
                    </a>
                </li>
                @endif
                
                @if(Auth::guard('admin')->user()->sectionCheck('general_settings'))
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.generalsettings') }}" >
                        <i class=" ri-settings-2-fill"></i> <span>General</span>
                    </a>
                </li>
                @endif
            @endif
               