<!-- header area start -->
<div class="header-area" style="padding:0px 30px;">
    <div class="row align-items-center">
        <div class="col-lg-6 clearfix">
          <div class="breadcrumbs-area clearfix">
                <h4 class="page-title ml-auto d-none d-lg-block">@yield('heading')</h4>
          </div>
        </div>
        <div class="col-lg-6 clearfix">
          <div class="user-profile pull-right">
              <img class="avatar user-thumb" src="{{ asset('backend/images/author/avatar.png')}}" alt="avatar">
              <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Admin<i class="fa fa-angle-down"></i></h4>
              <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Message</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <a class="dropdown-item" href="{{ route('logout') }}">Log Out</a>
              </div>
          </div>
        </div>
    </div>
</div>
<!-- header area end -->
