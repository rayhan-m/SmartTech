<div class="side-nav">
    <div class="main-menu">
        <ul class="metismenu" id="menu">
        <li class="Ul_li--hover"><a href="{{route('admin.dashboard')}}"><ion-icon class="text-20 mr-2 text-muted" name="speedometer-outline"></ion-icon><span class="item-name text-15 text-muted"> Dashboard</span></a>
            </li>
            <li class="Ul_li--hover"><a class="has-arrow" href="#"><ion-icon class="text-20 mr-2 text-muted" name="server-outline"></ion-icon><span class="item-name text-15 text-muted">Product</span></a>
                <ul class="mm-collapse">
                    <li class="item-name"><a href="{{route('product.category')}}"><i class="nav-icon i-Width-Window"></i><span class="item-name">Category</span></a></li>
                    <li class="item-name"><a href="{{route('product')}}"><i class="nav-icon i-Duplicate-Window"></i><span class="item-name">Products</span></a></li>
                    <li class="item-name"><a href="{{route('stock')}}"><i class="nav-icon i-Duplicate-Window"></i><span class="item-name">Stock</span></a></li>
                    {{-- <li class="item-name"><a href="nouislider.html"><i class="nav-icon i-Width-Window"></i><span class="item-name">Sliders</span></a></li> --}}
                </ul>
            </li>
                <li class="Ul_li--hover"><a class="has-arrow" href="#"><ion-icon class="text-20 mr-2 text-muted" name="cart-outline"></ion-icon><span class="item-name text-15 text-muted">Orders</span></a>
                <ul class="mm-collapse">
                <li class="item-name"><a href="{{route('all_orders')}}"><i class="nav-icon i-Crop-2"></i><span class="item-name">All Orders</span></a></li>
                    <li class="item-name"><a href="{{route('pending_orders')}}"><i class="nav-icon i-Loading-2"></i><span class="item-name">Pending Orders</span></a></li>
                    <li class="item-name"><a href="{{route('delivered_orders')}}"><i class="nav-icon i-Loading-3"></i><span class="item-name">Delivered Orders</span></a></li>
                    
                </ul>
            </li>
            
            <!--  <p class="main-menu-title text-muted ml-3 font-weight-700 text-13 mt-4 mb-2">UI Elements</p> -->
            <li class="Ul_li--hover"><a class="has-arrow" href="#"><ion-icon class="text-20 mr-2 text-muted" name="git-branch-outline"></ion-icon><span class="item-name text-15 text-muted">Payment</span></a>
                <ul class="mm-collapse">
                <li class="item-name"><a href="{{route('payment')}}"><i class="nav-icon i-Receipt-4"></i><span class="item-name">Order Payment</span></a></li>
                    <li class="item-name"><a href="{{route('staff_payment')}}"><i class="nav-icon i-Receipt-4"></i><span class="item-name">Staff payment</span></a></li>
                </ul>
            </li>
            <li class="Ul_li--hover"><a class="has-arrow" href="#"><ion-icon class="text-20 mr-2 text-muted" name="person-add-outline"></ion-icon><span class="item-name text-15 text-muted">Human Resource</span></a>
                <ul class="mm-collapse">
                <li class="item-name"><a href="{{route('customer_list')}}"><i class="i-Computer-Secure text-20 mr-2 text-muted"></i><span class="item-name">Customer List</span></a></li>
                <li class="item-name"><a href="{{route('staff_list')}}"><i class="i-Computer-Secure text-20 mr-2 text-muted"></i><span class="item-name">Staff List</span></a></li>
                <li class="item-name"><a href="{{route('add_staff')}}"><i class="i-Computer-Secure text-20 mr-2 text-muted"></i><span class="item-name">Add Staff</span></a></li>
                </ul>
            </li>
            <li class="Ul_li--hover"><a class="has-arrow" href="#"><ion-icon class="text-20 mr-2 text-muted" name="git-branch-outline"></ion-icon><span class="item-name text-15 text-muted">Expenses</span></a>
                <ul class="mm-collapse">
                <li class="item-name"><a href="{{route('expense_type')}}"><i class="nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">Expense Type</span></a></li>
                    <li class="item-name"><a href="{{route('expenses')}}"><i class="nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">Expense List</span></a></li>
                </ul>
            </li>
            <li class="Ul_li--hover"><a class="has-arrow" href="#"><ion-icon class="text-20 mr-2 text-muted" name="reader-outline"></ion-icon><span class="item-name text-15 text-muted">Reports</span></a>
                <ul class="mm-collapse">
                <li class="item-name"><a href="{{route('sell_report_search')}}"><i class="nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">Sell Report</span></a></li>
                    <li class="item-name"><a href="{{route('expense_report_search')}}"><i class="nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">Expense Report</span></a></li>
                    <li class="item-name"><a href="{{route('income_summery_search')}}"><i class="nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">Income Summery</span></a></li>
                </ul>
            </li>
            <li class="Ul_li--hover"><a href="{{route('news_latter')}}"><ion-icon class="text-20 mr-2 text-muted" name="receipt-outline"></ion-icon><span class="item-name text-15 text-muted">News Latter</span></a>
            </li>
            <li class="Ul_li--hover"><a href="{{route('blog')}}"><ion-icon class="text-20 mr-2 text-muted" name="today-outline"></ion-icon><span class="item-name text-15 text-muted">Blog</span></a>
            </li>
            <li class="Ul_li--hover"><a class="has-arrow"><ion-icon class="text-20 mr-2 text-muted" name="build-outline"></ion-icon><span class="item-name text-15 text-muted">System Setting</span></a>
                <ul class="mm-collapse">
                    <li class="item-name"><a href="{{route('general_setting')}}"><i class="nav-icon i-Error-404-Window"></i><span class="item-name">General Setting</span></a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<div class="ps__rail-x" style="left: 0px; bottom: 0px;">
    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
</div>
<div class="ps__rail-y" style="top: 0px; height: 404px; right: 0px;">
    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 325px;"></div>
</div>
<div class="ps__rail-x" style="left: 0px; bottom: 0px;">
    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
</div>
<div class="ps__rail-y" style="top: 0px; height: 404px; right: 0px;">
    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 325px;"></div>
</div>
</div>
<!--  side-nav-close -->
</div>

<div class="switch-overlay"></div>
<div class="main-content-wrap mobile-menu-content bg-off-white m-0">
    <header class="main-header bg-white d-flex justify-content-between p-2">
        <div class="header-toggle">
            <div class="menu-toggle mobile-menu-icon">
                <div></div>
                <div></div>
                <div></div>
            </div><i class="i-Add-UserStar mr-3 text-20 cursor-pointer" data-toggle="tooltip" data-placement="top" title="" data-original-title="Todo"></i><i class="i-Speach-Bubble-3 mr-3 text-20 cursor-pointer" data-toggle="tooltip" data-placement="top" title="" data-original-title="Chat"></i><i class="i-Email mr-3 text-20 mobile-hide cursor-pointer" data-toggle="tooltip" data-placement="top" title="" data-original-title="Inbox"></i><i class="i-Calendar-4 mr-3 mobile-hide text-20 cursor-pointer" data-toggle="tooltip" data-placement="top" title="" data-original-title="Calendar"></i><i class="i-Checkout-Basket mobile-hide mr-3 text-20 cursor-pointer" data-toggle="tooltip" data-placement="top" title="" data-original-title="Calendar"></i>
        </div>
        <div class="header-part-right">
            <!-- Full screen toggle--><i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen=""></i>
            <!-- Grid menu Dropdown-->
            {{-- <div class="dropdown dropleft"><i class="i-Safe-Box text-muted header-icon" id="dropdownMenuButton" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <div class="menu-icon-grid"><a href="#"><i class="i-Shop-4"></i> Home</a><a href="#"><i class="i-Library"></i> UI Kits</a><a href="#"><i class="i-Drop"></i> Apps</a><a href="#"><i class="i-File-Clipboard-File--Text"></i> Forms</a><a href="#"><i class="i-Checked-User"></i> Sessions</a><a href="#"><i class="i-Ambulance"></i> Support</a></div>
                </div>
            </div> --}}
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            {{-- $profile=App  --}}
        <a href="{{url('admin/profile')}}"><img height="35px" width="35px" style="margin-left: 20px;" src="{{ file_exists(@$profile->image) ? asset(@$profile->image) : asset('backend/uploads/staff/admin.PNG') }}" alt=""></a>
        </div>
    </header><!-- ============ Body content start ============= -->
<div class="main-content pt-4">