<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title></title>
    
  <!-- theme meta -->
  <meta name="theme-name" content="mono" />

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
  <link href="{{ asset('assets/admin_assets/plugins/material/css/materialdesignicons.min.css')}}" rel="stylesheet" />
  <link href="{{ asset('assets/admin_assets/plugins/simplebar/simplebar.css')}}" rel="stylesheet" />

  <!-- PLUGINS CSS STYLE -->
  <link href="{{ asset('assets/admin_assets/plugins/nprogress/nprogress.css')}}" rel="stylesheet" />
  
  
  
  
  <link href="{{ asset('assets/admin_assets/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css')}}" rel="stylesheet" />
  
  
  
  <link href="{{ asset('assets/admin_assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet" />
  
  
  
  <link href="{{ asset('assets/admin_assets/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet" />
  
  
  
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  
  
  
  <link href="{{ asset('assets/admin_assets/plugins/toaster/toastr.min.css')}}" rel="stylesheet" />
  
  
  <!-- MONO CSS -->
  <link id="main-css-href" rel="stylesheet" href="{{ asset('assets/admin_assets/css/style.css')}}" />

  


  <!-- FAVICON -->
  <link href="{{ asset('assets/admin_assets/images/favicon.png')}}')}}"  rel="shortcut icon" />

  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  
  <script src="{{ asset('assets/admin_assets/plugins/nprogress/nprogress.js')}}"></script>
</head>


  <body class="navbar-fixed sidebar-fixed" id="body">
    <script>
      NProgress.configure({ showSpinner: false });
      NProgress.start();
    </script>

    
    <div id="toaster"></div>
    

    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">
      
      
        <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
        <aside class="left-sidebar sidebar-dark" id="left-sidebar">
          <div id="sidebar" class="sidebar sidebar-with-footer">
            <!-- Aplication Brand -->
            <div class="app-brand">
              <a href="/index.html">
                <img src="{{ asset('assets/admin_assets/images/logo.png')}}" alt="Mono">
                <span class="brand-name">MONTANA</span>
              </a>
            </div>
            <!-- begin sidebar scrollbar -->
            <div class="sidebar-left" data-simplebar style="height: 100%;">
              <!-- sidebar menu -->
              <ul class="nav sidebar-inner" id="sidebar-menu">
                

                
                  <li
                   class="{{ request()->is('admin') ? 'active' : '' }}"
                   >
                    <a class="sidenav-item-link" href="{{ route('admin.home')}}">
                      <i class="mdi mdi-briefcase-account-outline"></i>
                      <span class="nav-text">Business Dashboard</span>
                    </a>
                  </li>
                  
                  <li
                  class="{{ request()->is('admin/analytics') ? 'active' : '' }}"
                   >
                    <a class="sidenav-item-link" href="{{ route('admin.analytics')}}">
                      <i class="mdi mdi-chart-line"></i>
                      <span class="nav-text">Analytics Dashboard</span>
                    </a>
                  </li>

                  <li
                  class="{{ request()->is('admin/room_types*') ? 'active' : '' }}"
                   >
                    <a class="sidenav-item-link" href="{{route('room_types.index')}}">
                      <i class="mdi mdi-table-settings"></i>
                      <span class="nav-text">Room Types</span>
                    </a>
                  </li>

                  <li
                  class="{{ request()->is('admin/rooms*') ? 'active' : '' }}"
                   >
                    <a class="sidenav-item-link" href="{{route('rooms.index')}}">
                      <i class="mdi mdi-houzz"></i>
                      <span class="nav-text">Rooms</span>
                    </a>
                  </li>

                  <li
                  class="{{ request()->is('admin/amenities*') ? 'active' : '' }}"
                   >
                    <a class="sidenav-item-link" href="{{route('amenities.index')}}">
                      <i class="mdi mdi-houzz"></i>
                      <span class="nav-text">Amenities</span>
                    </a>
                  </li>

                  <li
                  class="{{ request()->is('admin/schedules*') ? 'active' : '' }}"
                   >
                    <a class="sidenav-item-link" href="{{route('schedules.index')}}">
                      <i class="mdi mdi-houzz"></i>
                      <span class="nav-text">Schedules</span>
                    </a>
                  </li>

                  <li
                  class="{{ request()->is('admin/bookings*') ? 'active' : '' }}"
                   >
                    <a class="sidenav-item-link" href="{{route('bookings.index')}}">
                      <i class="mdi mdi-houzz"></i>
                      <span class="nav-text">Bookings</span>
                    </a>
                  </li>

                  <li
                  class="{{ request()->is('admin/invoices*') ? 'active' : '' }}"
                   >
                    <a class="sidenav-item-link" href="{{route('invoices.index')}}">
                      <i class="mdi mdi-houzz"></i>
                      <span class="nav-text">Invoices</span>
                    </a>
                  </li>

                  <li
                  class="{{ request()->is('admin/banners*') ? 'active' : '' }}"
                   >
                    <a class="sidenav-item-link" href="{{route('banners.index')}}">
                      <i class="mdi mdi-houzz"></i>
                      <span class="nav-text">Banners</span>
                    </a>
                  </li>

                  <li
                  class="{{ request()->is('admin/promotions*') ? 'active' : '' }}"
                   >
                    <a class="sidenav-item-link" href="{{route('promotions.index')}}">
                      <i class="mdi mdi-houzz"></i>
                      <span class="nav-text">Promotions</span>
                    </a>
                  </li>
                

                

              </ul>
                  
            </div>
            <div class="sidebar-footer">
              <div class="sidebar-footer-content">
                <ul class="d-flex">
                  <li>
                    <a href="user-account-settings.html" data-toggle="tooltip" title="Profile settings"><i class="mdi mdi-settings"></i></a></li>
                  <li>
                    <a href="#" data-toggle="tooltip" title="No chat messages"><i class="mdi mdi-chat-processing"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </aside>

      

      <!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
      <div class="page-wrapper">
        
          <!-- Header -->
          <header class="main-header" id="header">
            <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
              <!-- Sidebar toggle button -->
              <button id="sidebar-toggler" class="sidebar-toggle">
                <span class="sr-only">Toggle navigation</span>
              </button>

              <span class="page-title">dashboard</span>

              <div class="navbar-right ">

                <!-- search form -->
                <div class="search-form">
                  <form action="index.html" method="get">
                    <div class="input-group input-group-sm" id="input-group-search">
                      <input type="text" autocomplete="off" name="query" id="search-input" class="form-control" placeholder="Search..." />
                      <div class="input-group-append">
                        <button class="btn" type="button">/</button>
                      </div>
                    </div>
                  </form>
                  <ul class="dropdown-menu dropdown-menu-search">

                    <li class="nav-item">
                      <a class="nav-link" href="index.html">Morbi leo risus</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="index.html">Dapibus ac facilisis in</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="index.html">Porta ac consectetur ac</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="index.html">Vestibulum at eros</a>
                    </li>

                  </ul>

                </div>

                <ul class="nav navbar-nav">
                  <!-- Offcanvas -->
                  <li class="custom-dropdown">
                    <a class="offcanvas-toggler active custom-dropdown-toggler" data-offcanvas="contact-off" href="javascript:" >
                      <i class="mdi mdi-contacts icon"></i>
                    </a>
                  </li>
                  <li class="custom-dropdown">
                    <button class="notify-toggler custom-dropdown-toggler">
                      <i class="mdi mdi-bell-outline icon"></i>
                      <span class="badge badge-xs rounded-circle">21</span>
                    </button>
                    <div class="dropdown-notify">

                      <header>
                        <div class="nav nav-underline" id="nav-tab" role="tablist">
                          <a class="nav-item nav-link active" id="all-tabs" data-toggle="tab" href="#all" role="tab" aria-controls="nav-home"
                            aria-selected="true">All (5)</a>
                          <a class="nav-item nav-link" id="message-tab" data-toggle="tab" href="#message" role="tab" aria-controls="nav-profile"
                            aria-selected="false">Msgs (4)</a>
                          <a class="nav-item nav-link" id="other-tab" data-toggle="tab" href="#other" role="tab" aria-controls="nav-contact"
                            aria-selected="false">Others (3)</a>
                        </div>
                      </header>

                      <div class="" data-simplebar style="height: 325px;">
                        <div class="tab-content" id="myTabContent">

                          <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tabs">

                            <div class="media media-sm bg-warning-10 p-4 mb-0">
                              <div class="media-sm-wrapper">
                                <a href="user-profile.html">
                                  <img src="{{ asset('assets/admin_assets/images/user/user-sm-02.jpg')}}" alt="User Image">
                                </a>
                              </div>
                              <div class="media-body">
                                <a href="user-profile.html">
                                  <span class="title mb-0">John Doe</span>
                                  <span class="discribe">Extremity sweetness difficult behaviour he of. On disposal of as landlord horrible. Afraid at highly months do things on at.</span>
                                  <span class="time">
                                    <time>Just now</time>...
                                  </span>
                                </a>
                              </div>
                            </div>

                            <div class="media media-sm p-4 bg-light mb-0">
                              <div class="media-sm-wrapper bg-primary">
                                <a href="user-profile.html">
                                  <i class="mdi mdi-calendar-check-outline"></i>
                                </a>
                              </div>
                              <div class="media-body">
                                <a href="user-profile.html">
                                  <span class="title mb-0">New event added</span>
                                  <span class="discribe">1/3/2014 (1pm - 2pm)</span>
                                  <span class="time">
                                    <time>10 min ago...</time>...
                                  </span>
                                </a>
                              </div>
                            </div>

                            <div class="media media-sm p-4 mb-0">
                              <div class="media-sm-wrapper">
                                <a href="user-profile.html">
                                  <img src="{{ asset('assets/admin_assets/images/user/user-sm-03.jpg')}}" alt="User Image">
                                </a>
                              </div>
                              <div class="media-body">
                                <a href="user-profile.html">
                                  <span class="title mb-0">Sagge Hudson</span>
                                  <span class="discribe">On disposal of as landlord Afraid at highly months do things on at.</span>
                                  <span class="time">
                                    <time>1 hrs ago</time>...
                                  </span>
                                </a>
                              </div>
                            </div>

                            <div class="media media-sm p-4 mb-0">
                              <div class="media-sm-wrapper bg-info-dark">
                                <a href="user-profile.html">
                                  <i class="mdi mdi-account-multiple-check"></i>
                                </a>
                              </div>
                              <div class="media-body">
                                <a href="user-profile.html">
                                  <span class="title mb-0">Add request</span>
                                  <span class="discribe">Add Dany Jones as your contact.</span>
                                  <div class="buttons">
                                    <a href="#" class="btn btn-sm btn-success shadow-none text-white">accept</a>
                                    <a href="#" class="btn btn-sm shadow-none">delete</a>
                                  </div>
                                  <span class="time">
                                    <time>6 hrs ago</time>...
                                  </span>
                                </a>
                              </div>
                            </div>

                            <div class="media media-sm p-4 mb-0">
                              <div class="media-sm-wrapper bg-info">
                                <a href="user-profile.html">
                                  <i class="mdi mdi-playlist-check"></i>
                                </a>
                              </div>
                              <div class="media-body">
                                <a href="user-profile.html">
                                  <span class="title mb-0">Task complete</span>
                                  <span class="discribe">Afraid at highly months do things on at.</span>
                                  <span class="time">
                                    <time>1 hrs ago</time>...
                                  </span>
                                </a>
                              </div>
                            </div>

                          </div>

                          <div class="tab-pane fade" id="message" role="tabpanel" aria-labelledby="message-tab">

                            <div class="media media-sm p-4 mb-0">
                              <div class="media-sm-wrapper">
                                <a href="user-profile.html">
                                  <img src="{{ asset('assets/admin_assets/images/user/user-sm-01.jpg')}}" alt="User Image">
                                </a>
                              </div>
                              <div class="media-body">
                                <a href="user-profile.html">
                                  <span class="title mb-0">Selena Wagner</span>
                                  <span class="discribe">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
                                  <span class="time">
                                    <time>15 min ago</time>...
                                  </span>
                                </a>
                              </div>
                            </div>

                            <div class="media media-sm p-4 mb-0">
                              <div class="media-sm-wrapper">
                                <a href="user-profile.html">
                                  <img src="{{ asset('assets/admin_assets/images/user/user-sm-03.jpg')}}" alt="User Image">
                                </a>
                              </div>
                              <div class="media-body">
                                <a href="user-profile.html">
                                  <span class="title mb-0">Sagge Hudson</span>
                                  <span class="discribe">On disposal of as landlord Afraid at highly months do things on at.</span>
                                  <span class="time">
                                    <time>1 hrs ago</time>...
                                  </span>
                                </a>
                              </div>
                            </div>

                            <div class="media media-sm bg-warning-10 p-4 mb-0">
                              <div class="media-sm-wrapper">
                                <a href="user-profile.html">
                                  <img src="{{ asset('assets/admin_assets/images/user/user-sm-02.jpg')}}" alt="User Image">
                                </a>
                              </div>
                              <div class="media-body">
                                <a href="user-profile.html">
                                  <span class="title mb-0">John Doe</span>
                                  <span class="discribe">Extremity sweetness difficult behaviour he of. On disposal of as landlord horrible. Afraid
                                    at highly months do things on at.</span>
                                  <span class="time">
                                    <time>Just now</time>...
                                  </span>
                                </a>
                              </div>
                            </div>

                            <div class="media media-sm p-4 mb-0">
                              <div class="media-sm-wrapper">
                                <a href="user-profile.html">
                                  <img src="{{ asset('assets/admin_assets/images/user/user-sm-04.jpg')}}" alt="User Image">
                                </a>
                              </div>
                              <div class="media-body">
                                <a href="user-profile.html">
                                  <span class="title mb-0">Albrecht Straub</span>
                                  <span class="discribe"> Beatae quia natus assumenda laboriosam, nisi perferendis aliquid consectetur expedita non tenetur.</span>
                                  <span class="time">
                                    <time>Just now</time>...
                                  </span>
                                </a>
                              </div>
                            </div>

                          </div>
                          <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="contact-tab">

                            <div class="media media-sm p-4 bg-light mb-0">
                              <div class="media-sm-wrapper bg-primary">
                                <a href="user-profile.html">
                                  <i class="mdi mdi-calendar-check-outline"></i>
                                </a>
                              </div>
                              <div class="media-body">
                                <a href="user-profile.html">
                                  <span class="title mb-0">New event added</span>
                                  <span class="discribe">1/3/2014 (1pm - 2pm)</span>
                                  <span class="time">
                                    <time>10 min ago...</time>...
                                  </span>
                                </a>
                              </div>
                            </div>

                            <div class="media media-sm p-4 mb-0">
                              <div class="media-sm-wrapper bg-info-dark">
                                <a href="user-profile.html">
                                  <i class="mdi mdi-account-multiple-check"></i>
                                </a>
                              </div>
                              <div class="media-body">
                                <a href="user-profile.html">
                                  <span class="title mb-0">Add request</span>
                                  <span class="discribe">Add Dany Jones as your contact.</span>
                                  <div class="buttons">
                                    <a href="#" class="btn btn-sm btn-success shadow-none text-white">accept</a>
                                    <a href="#" class="btn btn-sm shadow-none">delete</a>
                                  </div>
                                  <span class="time">
                                    <time>6 hrs ago</time>...
                                  </span>
                                </a>
                              </div>
                            </div>

                            <div class="media media-sm p-4 mb-0">
                              <div class="media-sm-wrapper bg-info">
                                <a href="user-profile.html">
                                  <i class="mdi mdi-playlist-check"></i>
                                </a>
                              </div>
                              <div class="media-body">
                                <a href="user-profile.html">
                                  <span class="title mb-0">Task complete</span>
                                  <span class="discribe">Afraid at highly months do things on at.</span>
                                  <span class="time">
                                    <time>1 hrs ago</time>...
                                  </span>
                                </a>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>

                      <footer class="border-top dropdown-notify-footer">
                        <div class="d-flex justify-content-between align-items-center py-2 px-4">
                          <span>Last updated 3 min ago</span>
                          <a id="refress-button" href="javascript:" class="btn mdi mdi-cached btn-refress"></a>
                        </div>
                      </footer>
                    </div>
                  </li>
                  <!-- User Account -->
                  <li class="dropdown user-menu">
                    <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                      <img src="{{ asset('assets/admin_assets/images/user/user-xs-01.jpg')}}" class="user-image rounded-circle" alt="User Image" />
                      <span class="d-none d-lg-inline-block">{{Auth::user()->name}}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li>
                        <a class="dropdown-link-item" href="user-profile.html">
                          <i class="mdi mdi-account-outline"></i>
                          <span class="nav-text">My Profile</span>
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-link-item" href="email-inbox.html">
                          <i class="mdi mdi-email-outline"></i>
                          <span class="nav-text">Message</span>
                          <span class="badge badge-pill badge-primary">24</span>
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-link-item" href="user-activities.html">
                          <i class="mdi mdi-diamond-stone"></i>
                          <span class="nav-text">Activitise</span></a>
                      </li>
                      <li>
                        <a class="dropdown-link-item" href="user-account-settings.html">
                          <i class="mdi mdi-settings"></i>
                          <span class="nav-text">Account Setting</span>
                        </a>
                      </li>

                      <li class="dropdown-footer">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </nav>


          </header>

        <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
        <div class="content-wrapper">
          @yield('content')
          
        </div>
        
          <!-- Footer -->
          <footer class="footer mt-auto">
            <div class="copyright bg-white">
              <p>
                &copy; <span id="copy-year"></span> Copyright Mono Dashboard Bootstrap Template by <a class="text-primary" href="http://www.iamabdus.com/" target="_blank" >Abdus</a>.
              </p>
            </div>
            <script>
                var d = new Date();
                var year = d.getFullYear();
                document.getElementById("copy-year").innerHTML = year;
            </script>
          </footer>

      </div>
    </div>
    
                    <!-- Card Offcanvas -->
                    <div class="card card-offcanvas" id="contact-off" >
                      <div class="card-header">
                        <h2>Contacts</h2>
                        <a href="#" class="btn btn-primary btn-pill px-4">Add New</a>
                      </div>
                      <div class="card-body">

                        <div class="mb-4">
                          <input type="text" class="form-control form-control-lg form-control-secondary rounded-0" placeholder="Search contacts...">
                        </div>

                        <div class="media media-sm">
                          <div class="media-sm-wrapper">
                            <a href="user-profile.html">
                              <img src="{{ asset('assets/admin_assets/images/user/user-sm-01.jpg')}}" alt="User Image">
                              <span class="active bg-primary"></span>
                            </a>
                          </div>
                          <div class="media-body">
                            <a href="user-profile.html">
                              <span class="title">Selena Wagner</span>
                              <span class="discribe">Designer</span>
                            </a>
                          </div>
                        </div>

                        <div class="media media-sm">
                          <div class="media-sm-wrapper">
                            <a href="user-profile.html">
                              <img src="{{ asset('assets/admin_assets/images/user/user-sm-02.jpg')}}" alt="User Image">
                              <span class="active bg-primary"></span>
                            </a>
                          </div>
                          <div class="media-body">
                            <a href="user-profile.html">
                              <span class="title">Walter Reuter</span>
                              <span>Developer</span>
                            </a>
                          </div>
                        </div>

                        <div class="media media-sm">
                          <div class="media-sm-wrapper">
                            <a href="user-profile.html">
                              <img src="{{ asset('assets/admin_assets/images/user/user-sm-03.jpg')}}" alt="User Image">
                            </a>
                          </div>
                          <div class="media-body">
                            <a href="user-profile.html">
                              <span class="title">Larissa Gebhardt</span>
                              <span>Cyber Punk</span>
                            </a>
                          </div>
                        </div>

                        <div class="media media-sm">
                          <div class="media-sm-wrapper">
                            <a href="user-profile.html">
                              <img src="{{ asset('assets/admin_assets/images/user/user-sm-04.jpg')}}" alt="User Image">
                            </a>

                          </div>
                          <div class="media-body">
                            <a href="user-profile.html">
                              <span class="title">Albrecht Straub</span>
                              <span>Photographer</span>
                            </a>
                          </div>
                        </div>

                        <div class="media media-sm">
                          <div class="media-sm-wrapper">
                            <a href="user-profile.html">
                              <img src="{{ asset('assets/admin_assets/images/user/user-sm-05.jpg')}}" alt="User Image">
                              <span class="active bg-danger"></span>
                            </a>
                          </div>
                          <div class="media-body">
                            <a href="user-profile.html">
                              <span class="title">Leopold Ebert</span>
                              <span>Fashion Designer</span>
                            </a>
                          </div>
                        </div>

                        <div class="media media-sm">
                          <div class="media-sm-wrapper">
                            <a href="user-profile.html">
                              <img src="{{ asset('assets/admin_assets/images/user/user-sm-06.jpg')}}" alt="User Image">
                              <span class="active bg-primary"></span>
                            </a>
                          </div>
                          <div class="media-body">
                            <a href="user-profile.html">
                              <span class="title">Selena Wagner</span>
                              <span>Photographer</span>
                            </a>
                          </div>
                        </div>

                      </div>
                    </div>



    
                    <script src="{{ asset('assets/admin_assets/plugins/jquery/jquery.min.js')}}"></script>
                    <script src="{{ asset('assets/admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
                    <script src="{{ asset('assets/admin_assets/plugins/simplebar/simplebar.min.js')}}"></script>
                    <script src="{{ asset('assets/admin_assets/https://unpkg.com/hotkeys-js/dist/hotkeys.min.js')}}"></script>

                    
                    
                    <script src="{{ asset('assets/admin_assets/plugins/apexcharts/apexcharts.js')}}"></script>
                    
                    
                    
                    <script src="{{ asset('assets/admin_assets/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js')}}"></script>
                    
                    
                    
                    <script src="{{ asset('assets/admin_assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
                    <script src="{{ asset('assets/admin_assets/plugins/jvectormap/jquery-jvectormap-world-mill.js')}}"></script>
                    <script src="{{ asset('assets/admin_assets/plugins/jvectormap/jquery-jvectormap-us-aea.js')}}"></script>
                    
                    
                    
                    <script src="{{ asset('assets/admin_assets/plugins/daterangepicker/moment.min.js')}}"></script>
                    <script src="{{ asset('assets/admin_assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
                    <script>
                      jQuery(document).ready(function() {
                        jQuery('input[name="dateRange"]').daterangepicker({
                        autoUpdateInput: false,
                        singleDatePicker: true,
                        locale: {
                          cancelLabel: 'Clear'
                        }
                      });
                        jQuery('input[name="dateRange"]').on('apply.daterangepicker', function (ev, picker) {
                          jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
                        });
                        jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function (ev, picker) {
                          jQuery(this).val('');
                        });
                      });
                    </script>
                    
                    
                    
                    <script src="{{ asset('assets/admin_assets/https://cdn.quilljs.com/1.3.6/quill.js')}}"></script>
                    
                    
                    
                    <script src="{{ asset('assets/admin_assets/plugins/toaster/toastr.min.js')}}"></script>

                    
                    
                    <script src="{{ asset('assets/admin_assets/js/mono.js')}}"></script>
                    <script src="{{ asset('assets/admin_assets/js/chart.js')}}"></script>
                    <script src="{{ asset('assets/admin_assets/js/map.js')}}"></script>
                    <script src="{{ asset('assets/admin_assets/js/custom.js')}}"></script>

                    


                    <!--  -->


  </body>
</html>
