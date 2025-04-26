<li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.users.index') }}" >
                        <i class="ri-group-fill"></i> <span>Users </span>
                    </a>
                </li>  
                
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.orders.index') }}" >
                        <i class="bx bx-shopping-bag"></i> <span>Orders </span>
                    </a>
                </li>  

                {{-- <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.coupon.index') }}" >
                        <i class="bx bxs-discount"></i> <span>Coupons </span>
                    </a>
                </li>   --}}
                    
                {{-- <li class="nav-item">
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
                </li> --}}


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

                            <li class="nav-item">
                                <a href="{{ route('admin.product-categories.index') }}" class="nav-link">Product Category</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.option-types.index') }}" class="nav-link">Option Types</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.reviews.index') }}">
                        <i class="ri-star-line"></i> <span>Reviews</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#nostalgiabase" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="nostalgiabase">
                        <i class="ri-archive-line"></i> <span>Nostalgia Base</span>
                    </a>
                    <div class="collapse menu-dropdown" id="nostalgiabase">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('admin.nostalgia.item.index')}}" class="nav-link">Entry List</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.nostalgia.item.create')}}" class="nav-link">Add Entry</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.nostalgia.category.index') }}" class="nav-link">Category Manager</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#servicesmanagement" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="servicesmanagement">
                        <i class="ri-briefcase-line"></i> <span>Services</span>
                    </a>
                    <div class="collapse menu-dropdown" id="servicesmanagement">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.service.item.index') }}" class="nav-link">Service List</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.service.item.create') }}" class="nav-link">Add Service</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.service.category.index') }}" class="nav-link">Service Categories</a>
                            </li>
                        </ul>
                    </div>
                </li>



                <!-- New Support Tickets Menu Item -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.tickets.index') }}">
                        <i class="ri-ticket-2-line"></i> <span>Support Tickets</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#blogManagement" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="blogManagement">
                        <i class="ri-article-line"></i> <span>Blog Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="blogManagement">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.blog.category.index') }}" class="nav-link">Categories</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.blog.index') }}" class="nav-link">Blog Posts</a>
                            </li>
                        </ul>
                    </div>
                </li>

               <!-- Bit Log System -->
<li class="nav-item">
    <a class="nav-link menu-link" href="#bitLogManagement" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="bitLogManagement">
        <i class="ri-coins-line"></i> <span>Bit Log System</span>
    </a>
    <div class="collapse menu-dropdown" id="bitLogManagement">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="{{ route('admin.bit-tasks.index') }}" class="nav-link">Tasks</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.bit-tasks.create') }}" class="nav-link">Create Task</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.bit-submissions.index') }}" class="nav-link">All Submissions</a>
            </li>
            {{-- <li class="nav-item">
                <a href="{{ route('admin.bit-submissions.pending') }}" class="nav-link">Pending Submissions</a>
            </li> --}}
        </ul>
    </div>
</li>


                <li class="menu-title"><span>Settings</span></li>

                {{-- <li class="nav-item">
                    <a class="nav-link menu-link  " href="{{ route('admin.live.chat') }}">
                        <i class="ri-message-2-line"></i> <span >Old Live Chat</span>
                    </a>
                </li>  --}}

                <li class="nav-item">
                    <a class="nav-link menu-link" target="_blank" href="https://dashboard.tawk.to/">
                        <i class="ri-message-2-line"></i> <span >Live Chat</span>
                    </a>
                </li>



                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.profile') }}" >
                        <i class="ri-user-settings-fill"></i> <span>Profile </span>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.social') }}" >
                        <i class="ri-team-fill"></i> <span>Social </span>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.staff.index') }}" >
                        <i class="ri-group-2-fill"></i> <span>Manage staff </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.role.index') }}" >
                        <i class="ri-user-star-fill"></i> <span>Manage Roles </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.generalsettings') }}" >
                        <i class=" ri-settings-2-fill"></i> <span>General</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.cache.clear') }}" >
                        <i class="ri-refresh-fill"></i> <span>Clear Cache</span>
                    </a>
                </li>