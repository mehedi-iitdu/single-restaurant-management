<!-- Navigation
    ================================================== -->
<!-- Responsive Navigation Trigger -->
<a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>

<div class="dashboard-nav">
    <div class="dashboard-nav-inner">

        {{-- <ul data-submenu-title="Main">
            <li><a class="nav-link" href="{{ route('dashboard') }}"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
            <li><a class="nav-link" href=""><i class="fa fa-calendar-check-o"></i>Bookmars</a></li>
            <li><a class="nav-link" href=""><i class="fa fa-calendar-check-o"></i>Bookings</a></li>
            <li><a class="nav-link" href=""><i class="fa fa-calendar-check-o"></i>Reviews</a></li>
        </ul> --}}
        
        <!-- <ul data-submenu-title="Listings">
             <li><a><i class="sl sl-icon-layers"></i> My Listings</a>
                 <ul>
                     <li><a href="dashboard-my-listings.html">Active <span class="nav-tag green">6</span></a></li>
                     <li><a href="dashboard-my-listings.html">Pending <span class="nav-tag yellow">1</span></a></li>
                     <li><a href="dashboard-my-listings.html">Expired <span class="nav-tag red">2</span></a></li>
                 </ul>   
             </li>
             <li><a href="dashboard-reviews.html"><i class="sl sl-icon-star"></i> Reviews</a></li>
             <li><a href="dashboard-bookmarks.html"><i class="sl sl-icon-heart"></i> Bookmarks</a></li>
             <li><a href="dashboard-add-listing.html"><i class="sl sl-icon-plus"></i> Add Listing</a></li>
         </ul>   --> 

        <ul data-submenu-title="Account">
            <li><a href=""><i class="sl sl-icon-user"></i> My Profile</a></li>
            <li><a href="{{route('logout')}}"><i class="sl sl-icon-power"></i> Logout</a></li>
        </ul>
        
    </div>
</div>
<!-- Navigation / End -->