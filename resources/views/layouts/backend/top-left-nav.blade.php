  @extends('layouts.backend.link')
  @section('content')

  <div class="wrapper">
     <!-- Main Header Start -->
     <header class="main-header">
        <!-- Logo Start -->
        <div class="seipkon-logo">
           <a href="{{ route('home') }}">
              <img src="{{ asset('public/Backend/assets/images/web.png') }}" style="height: 50px;width: 100px;" alt="logo">
           </a>
        </div>
        <!-- Logo End -->

        <!-- Header Top Start -->
        <nav class="navbar navbar-default">
           <div class="container-fluid">
              <div class="header-top-section">
                 <div class="pull-left">

                    <!-- Collapse Menu Btn Start -->
                    <button type="button" id="sidebarCollapse" class=" navbar-btn">
                       <i class="fa fa-bars"></i>
                    </button>
                    <!-- Collapse Menu Btn End -->

                    <!-- Header Top Search Start -->
                    <div class="header-top-search">
                       <form>
                          <input type="search" placeholder="Search...">
                          <button type="submit"><i class="fa fa-search"></i></button>
                       </form>
                    </div>
                    <!-- Header Top Search End -->

                 </div>
                 <div class="header-top-right-section pull-right">
                    <ul class="nav nav-pills nav-top navbar-right">

                       <!-- Full Screen Btn Start -->
                       <li>
                          <a href="#" id="fullscreen-button">
                             <i class="fa fa-arrows-alt"></i>
                          </a>
                       </li>
                       <!-- Full Screen Btn End -->
                       <!-- Profile Toggle Start -->
                       <li class="dropdown">
                          <a class="dropdown-toggle profile-toggle" href="#" data-toggle="dropdown">
                             <img src="{{ asset('public/Backend/assets/images/man.png') }}" style="height: 50px;width: 50px;" class="profile-avator" alt="admin profile" />

                             <div class="profile-avatar-txt">
                                <p>{{ auth::user()->name }}</p>
                                <i class="fa fa-angle-down"></i>
                             </div>
                          </a>
                          <div class="profile-box dropdown-menu animated bounceIn">
                             <ul>
                                {{-- <li><a href="#"><i class="fa fa-user"></i> view profile</a></li>
                                    <li><a href="#"><i class="fa fa-pencil-square-o"></i> Edit profile</a></li>
                                    <li><a href="#"><i class="fa fa-flash"></i> Activity Log</a></li>
                                    <li><a href="#"><i class="fa fa-wrench"></i> Setting</a></li> --}}
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> sign out</a>
                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                      @csrf
                                   </form>
                                </li>
                             </ul>
                          </div>
                       </li>
                       <!-- Profile Toggle End -->

                    </ul>
                 </div>
              </div>
           </div>
        </nav>
        <!-- Header Top End -->

     </header>
     <!-- Main Header End -->

     <!-- Sidebar Start -->
     <aside class="seipkon-main-sidebar">
        <nav id="sidebar">
           <!-- Sidebar Profile Start -->
           <div class="sidebar-profile clearfix">
              <div class="profile-avatar">
                 <img src="{{ asset('public/Backend/assets/images/man.png') }}" style="height: 50px;width: 50px;" alt="profile" />

              </div>
              <div class="profile-info">
                 <h3>{{ auth::user()->name }}</h3>
                 <p>Welcome Admin !</p>
              </div>
           </div>
           <!-- Sidebar Profile End -->

           <!-- Menu Section Start -->
           <div class="menu-section">

              <ul class="list-unstyled components">
                 <li class="active">
                    <a href="{{ route('home') }}">
                       <i class="fa fa-dashboard"></i>
                       Dashboard
                    </a>
                 </li>
                 <!--
                     <li>
                        <a href="#ecommerce" data-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-folder"></i>
                        Categorys
                        </a>
                        <ul class="collapse list-unstyled" id="ecommerce">
                           <li><a href="{{ route('Category') }}">Category (All page)</a></li>
                           <li><a href="{{ route('SubCategory') }}">Sub Category (All page)</a></li>
                          
                        </ul>
                     </li>
                     -->
                 <li>
                    <a href="#projects" data-toggle="collapse" aria-expanded="false">
                       <i class="fa fa-folder"></i>
                       Filter Category
                    </a>
                    <ul class="collapse list-unstyled" id="projects">
                       <li><a href="{{ route('pro_cat') }}">Filter Category</a></li>
                       <li><a href="{{ route('projects') }}">Filter Subcategory</a></li>

                    </ul>
                 </li>
                 <li>
                    <a href="#about" data-toggle="collapse" aria-expanded="false">
                       <i class="fa fa-folder"></i>
                       Welcome Massage
                    </a>
                    <ul class="collapse list-unstyled" id="about">
                       <li><a href="{{ route('abouts') }}">add Welcome </a></li>
                       <li><a href="{{ route('all.about') }}">all Welcome (Show)</a></li>

                    </ul>
                 </li>
                

                 <li>
                    <a href="#ecommerce0" data-toggle="collapse" aria-expanded="false">
                       <i class="fa fa-folder"></i>
                       Filter image
                    </a>
                    <ul class="collapse list-unstyled" id="ecommerce0">
                       <li><a href="{{ route('image') }}"> Filter image (Home page)</a></li>
                       <li><a href="{{ route('show.image') }}">All Filter image (Show)</a></li>
                    </ul>
                 </li>


                 <li>
                    <a href="#ecommerce2" data-toggle="collapse" aria-expanded="false">
                       <i class="fa fa-folder"></i>
                       Slider
                    </a>
                    <ul class="collapse list-unstyled" id="ecommerce2">
                       <li><a href="{{ route('slidder') }}">Slider (Home Page)</a></li>
                       <li><a href="{{ route('show.slidder') }}">All slider (Show)</a></li>

                    </ul>
                 </li>
                 <li>
                    <a href="#ecommerce3" data-toggle="collapse" aria-expanded="false">
                       <i class="fa fa-folder"></i>
                       Company business
                    </a>
                    <ul class="collapse list-unstyled" id="ecommerce3">
                       <li><a href="{{ route('middleCategory') }}">Company business (Home page)</a></li>
                    </ul>
                 </li>
                 <li>
                    <a href="#blogs" data-toggle="collapse" aria-expanded="false">
                       <i class="fa fa-folder"></i>
                       Business Product
                    </a>
                    <ul class="collapse list-unstyled" id="blogs">
                       <li><a href="{{ route('business_product') }}">Business Product</a></li>
                    </ul>
                 </li>
                 <li>
                    <a href="#businessslider" data-toggle="collapse" aria-expanded="false">
                       <i class="fa fa-folder"></i>
                       Business Slider
                    </a>
                    <ul class="collapse list-unstyled" id="businessslider">
                       <li><a href="{{ route('companyslidder') }}">Business Slider</a></li>
                    </ul>
                 </li>
                 <li>
                    <a href="#Faq" data-toggle="collapse" aria-expanded="false">
                       <i class="fa fa-folder"></i>
                       Business type image
                    </a>
                    <ul class="collapse list-unstyled" id="Faq">
                       <li><a href="{{ route('category.image') }}">Business image (Home page,Industries all page)</a></li>
                    </ul>
                 </li>
                 <li>
                    <a href="#team" data-toggle="collapse" aria-expanded="false">
                       <i class="fa fa-folder"></i>
                       Team Manage
                    </a>
                    <ul class="collapse list-unstyled" id="team">
                       <li><a href="{{ route('Team_Faq') }}">Team (About page)</a></li>
                       <li><a href="{{ route('all.Team') }}">All Team (Show)</a></li>
                    </ul>
                 </li>
                 <li>
                    <a href="#News" data-toggle="collapse" aria-expanded="false">
                       <i class="fa fa-folder"></i>
                       Job Manage
                    </a>
                    <ul class="collapse list-unstyled" id="News">
                       <li><a href="{{ route('news') }}">Add New Job</a></li>
                       <li><a href="{{ route('all.news') }}">All Jobs</a></li>
                    </ul>
                 </li>
                 {{-- <li>
                        <a href="#services" data-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-folder"></i>
                        Services Manage 
                        </a>
                        <ul class="collapse list-unstyled" id="services">
                           <li><a href="{{ route('services') }}">Services (Home page)</a></li>
                 <li><a href="{{ route('all.services') }}">All Services (Show)</a></li>
              </ul>
              </li> --}}
              <li>
                 <a href="#Faqs" data-toggle="collapse" aria-expanded="false">
                    <i class="fa fa-folder"></i>
                    Faq Manage
                 </a>
                 <ul class="collapse list-unstyled" id="Faqs">
                    <li><a href="{{ route('Faq') }}">Faq (Home page)</a></li>
                    <li><a href="{{ route('all.Faq') }}">All Faq (Show)</a></li>
                 </ul>
              </li>
              <li>
                 <a href="#partner" data-toggle="collapse" aria-expanded="false">
                    <i class="fa fa-folder"></i>
                    Banker & Partner
                 </a>
                 <ul class="collapse list-unstyled" id="partner">
                    <li><a href="{{ route('banker') }}">Banker </a></li>
                    <li><a href="{{ route('partner') }}">Partner </a></li>
                    <li><a href="{{ route('insurers') }}">Insurers </a></li>
                    <li><a href="{{ route('auditors') }}">Auditors </a></li>
                    <li><a href="{{ route('advisors') }}">Legal Advisors</a></li>
                    <li><a href="{{ route('settlement') }}">Settelment Banks </a></li>
                    <li><a href="{{ route('investment') }}">Investment Bankers </a></li>
                 </ul>
              </li>
              <li>
                 <a href="#Leadership" data-toggle="collapse" aria-expanded="false">
                    <i class="fa fa-folder"></i>
                    Leadership profile
                 </a>
                 <ul class="collapse list-unstyled" id="Leadership">
                    <li><a href="{{ route('addprofile') }}">Add Profile </a></li>

                 </ul>
              </li>
              <li>
                 <a href="#jobinfo" data-toggle="collapse" aria-expanded="false">
                    <i class="fa fa-folder"></i>
                    Apply Job Information
                 </a>
                 <ul class="collapse list-unstyled" id="jobinfo">
                    <li><a href="{{ route('showjobinfo') }}">all jobinfo </a></li>

                 </ul>
              </li>
              <li>
                 <a href="#Overview" data-toggle="collapse" aria-expanded="false">
                    <i class="fa fa-folder"></i>
                    Company overview
                 </a>
                 <ul class="collapse list-unstyled" id="Overview">
                    <li><a href="{{ route('companyoverview') }}">Company overview </a></li>
                 </ul>
              </li>
              <li>
                 <a href="#Chairman" data-toggle="collapse" aria-expanded="false">
                    <i class="fa fa-folder"></i>
                    Chairman Message
                 </a>
                 <ul class="collapse list-unstyled" id="Chairman">

                    <li><a href="{{ route('chairmanmessage ') }}">Chairman Message </a></li>
                    <li><a href="{{ route('chairmanmessageshow') }}">All Show </a></li>
                 </ul>
              </li>
              <li>
                 <a href="#achievement" data-toggle="collapse" aria-expanded="false">
                    <i class="fa fa-folder"></i>
                    Award Achievement

                 </a>
                 <ul class="collapse list-unstyled" id="achievement">

                    <li><a href="{{ route('achievement') }}">Award Achievement </a></li>

                 </ul>
              </li>
              <li>
                 <a href="#TVC" data-toggle="collapse" aria-expanded="false">
                    <i class="fa fa-folder"></i>
                    TVC & AV
                 </a>
                 <ul class="collapse list-unstyled" id="TVC">
                    <li><a href="{{ route('tvc_av') }}">TVC & AV</a></li>
                 </ul>
              </li>
              <li>
                 <a href="#prassad" data-toggle="collapse" aria-expanded="false">
                    <i class="fa fa-folder"></i>
                    Press Ad
                 </a>
                 <ul class="collapse list-unstyled" id="prassad">
                    <li><a href="{{ route('prassad') }}">Press Ad</a></li>
                 </ul>
              </li>
              <li>
                 <a href="#News_Event" data-toggle="collapse" aria-expanded="false">
                    <i class="fa fa-folder"></i>
                    News & Event
                 </a>
                 <ul class="collapse list-unstyled" id="News_Event">
                    <li><a href="{{ route('news_event') }}">News & Event</a></li>
                 </ul>
              </li>
              <li>
                 <a href="#blog" data-toggle="collapse" aria-expanded="false">
                    <i class="fa fa-folder"></i>
                    Blog
                 </a>
                 <ul class="collapse list-unstyled" id="blog">
                    <li><a href="{{ route('blog') }}">Blog</a></li>
                 </ul>
              </li>

              <li>
                 <a href="#latest_news" data-toggle="collapse" aria-expanded="false">
                    <i class="fa fa-folder"></i>
                    latest news
                 </a>
                 <ul class="collapse list-unstyled" id="latest_news">
                    <li><a href="{{ route('latest_news') }}">latest news</a></li>
                 </ul>
              </li>

              <li>
                 <a href="#crs" data-toggle="collapse" aria-expanded="false">
                    <i class="fa fa-folder"></i>
                    CSR
                 </a>
                 <ul class="collapse list-unstyled" id="crs">
                    <li><a href="{{ route('crs') }}">CSR</a></li>
                 </ul>
              </li>
               <li>
                    <a href="#ecommerce1" data-toggle="collapse" aria-expanded="false">
                       <i class="fa fa-folder"></i>
                       contact
                    </a>
                    <ul class="collapse list-unstyled" id="ecommerce1">
                       <li><a href="{{ route('setting') }}">Setting (Website Information)</a></li>
                       <li><a href="{{ route('show.setting') }}">All Setting (Show)</a></li>


                    </ul>
                 </li>


              </ul>
           </div>
        </nav>
     </aside>
     <!-- End Sidebar -->
     <!-- Menu Section End -->
     <!-- Right Side Content Start -->
     <section id="content" class="seipkon-content-wrapper">
        <div class="page-content">
           <div class="container-fluid">

              <!-- Breadcromb Row Start -->
              <div class="row">
                 <div class="col-md-12">
                    <div class="breadcromb-area">
                       <div class="row">
                          <div class="col-md-6  col-sm-6">
                             <div class="seipkon-breadcromb-left">
                                <h3>Dashboard</h3>
                             </div>
                          </div>
                          <div class="col-md-6 col-sm-6">
                             <div class="seipkon-breadcromb-right">
                                <ul>
                                   <li><a href="index.html">home</a></li>
                                   <li>dashboard</li>
                                </ul>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              <!-- End Breadcromb Row -->

              <!-- Widget Row Start -->
              <!-- Widget Row Start -->
                  <div class="row">
                     <div class="col-md-5">
                        <div class="widget_card_two alert">
                           <div class="widget_card_header">
                              <h3>Country Visitors</h3>
                              <ul>
                                 <li>
                                    <a class="widget_card_accordion" data-toggle="collapse" href="#vector_map" role="button" aria-expanded="false" aria-controls="vector_map"></a>
                                 </li>
                                 <li>
                                    <a  href="#" class="widget_close_two" data-toggle="tooltip" title="Remove" data-dismiss="alert" aria-label="close">
                                    <i class="fa fa-times"></i>
                                    </a>
                                 </li>
                              </ul>
                           </div>
                           <div class="widget_card_body collapse in" id="vector_map">
                              <div class="row">
                                 <div class="col-md-6 col-sm-6 no_pad_right">
                                    <div class="sparkline-charts">
                                       <div class="sparkline-charts-left">
                                          <h3>78%</h3>
                                          <p>Referrals</p>
                                       </div>
                                       <div class="sparkline-charts-right">
                                          <p class="sparkbar">
                                             85,65,70,55,30,35,40,45,50,55,80,70,60,80,90,100
                                          </p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6 col-sm-6 no_pad_left">
                                    <div class="sparkline-charts">
                                       <div class="sparkline-charts-left">
                                          <h3>44%</h3>
                                          <p>Organic</p>
                                       </div>
                                       <div class="sparkline-charts-right">
                                          <p class="sparkbar">
                                             30,35,40,45,85,65,70,55,50,55,80,70,60,80,90,100
                                          </p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div id="world-map" style="height: 300px;"></div>
                           </div>
                        </div>
                     </div>
                     <!-- End Col -->
                     <div class="col-md-7">
                        <div class="widget_card_two alert">
                           <div class="widget_card_header">
                              <h3>Sales Statistics</h3>
                              <ul>
                                 <li>
                                    <a class="widget_card_accordion" data-toggle="collapse" href="#chart_1" role="button" aria-expanded="false" aria-controls="chart_1"></a>
                                 </li>
                                 <li>
                                    <a href="#" class="widget_close_two" data-toggle="tooltip" title="Remove" data-dismiss="alert" aria-label="close">
                                    <i class="fa fa-times"></i>
                                    </a>
                                 </li>
                              </ul>
                           </div>
                           <div class="widget_card_body collapse in" id="chart_1">
                              <div class="chart">
                                 <div id="sales_chart"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- End Col -->
                  </div>
                  <!-- End Widget Row -->
              <!-- End Widget Row -->


           </div>
           <!-- End Widget Row -->
        </div>

        <!-- Footer Area Start -->
        {{-- <footer class="seipkon-footer-area">
               <p>Seipkon - Bootstrap Admin Template by <a href="#">Themescare</a></p>
            </footer>  --}}
        <footer class="seipkon-footer-area">
           <div class="col-md-12 text-center animate" data-animation="scaleAppear">
              <h6 class="fs-12 text-uppercase">&copy; Copyright <span class="copyright_year">@php
                    echo date('Y');
                    @endphp</span> All right reserved by somikoron ITS</h6>
           </div>
        </footer>
        <!-- End Footer Area -->

     </section>
     <!-- End Right Side Content -->

  </div>
  <!-- End Wrapper class -->

  @endsection