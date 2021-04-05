@if(!Auth::user())
<!-- jika belum ada session login -->
<script type="text/javascript">
    window.location.replace("{{ route('login') }}");
</script>

@else
{{-- <div class="main_container"> --}}
    <div class="col-md-3 left_col">
      <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
          <a href="{{url("/")}}" class="site_title"><i class="fa fa-rss"></i> <span>RFID - RII</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
          <div class="profile_pic">
            <img src="{{asset('AdminLTE/production/images/user.png')}}" alt="..." class="img-circle profile_img">
          </div>
          <div class="profile_info">
                <h2>{{Auth::user()->username}}</h2>
                <span><i class="fa fa-circle text-success"></i> Online</span>

          </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            {{-- Menu Admin --}}
            @if(Auth::user()->role_id == 1)
              <ul class="nav side-menu">
                <li class="active"><a href="/"><i class="fa fa-home"></i> Dashboard </a>
                </li>
                <li><a><i class="fa fa-edit"></i> Master Data <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{url('workers_')}}">Workers</a></li>
                    <li><a href="{{url('divisi_jabatan_')}}">Divisi & Posisi</a></li>
                    <li><a href="{{url('gate_')}}">Gate</a></li>
                    <li><a href="{{url('rfid_')}}">RFID</a></li>
                  </ul>
                </li>

                <li><a href="{{url('report_')}}"><i class="fa fa-bar-chart-o"></i> Reports Man Hours </a>
                </li>
              </ul>

              {{-- Menu Superadmin --}}
            @else
              <ul class="nav side-menu">
                <li class="active"><a href="/"><i class="fa fa-home"></i> Dashboard </a>
                </li>
                <li><a><i class="fa fa-edit"></i> Master Data <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{url('users')}}">Users</a></li>
                    <li><a href="{{url('project')}}">Project</a></li>
                    <li><a href="{{url('workers')}}">Workers</a></li>
                    <li><a href="{{url('gate')}}">Gate</a></li>
                    <li><a href="{{url('jabatan_divisi')}}">Divisi & Posisi</a></li>
                    <li><a href="{{url('rfid')}}">RFID</a></li>
                  </ul>
                </li>
                <li><a href="{{url('report')}}"><i class="fa fa-bar-chart-o"></i> Reports Man Hours </a></li>
                <li><a href="{{url('run_app')}}"><i class="fa fa-play-circle" aria-hidden="true"></i> Run App </a></li>

              </ul>
            @endif

          </div>


        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
          <a data-toggle="tooltip" data-placement="top" title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
          </a>
          <a data-toggle="tooltip" data-placement="top" title="FullScreen">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
          </a>
          <a data-toggle="tooltip" data-placement="top" title="Lock">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
          </a>
          <a data-toggle="tooltip" data-placement="top" title="Logout">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
          </a>
        </div>
        <!-- /menu footer buttons -->
      </div>
    </div>

    <!-- top navigation -->
    <div class="top_nav">
      <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
          <ul class="navbar-right">
            <li class="nav-item dropdown open" style="padding-left: 15px;">
              <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                <img src="{{asset('AdminLTE/production/images/user.png')}}" alt="">{{Auth::user()->username}}
              </a>
              <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                @if(Auth::user()->role_id == 1)
                  <a class="dropdown-item"  href="{{url('profile_')}}/{{Auth::user()->uid}}"> Ubah Password</a>
                  <form method="post" action="{{ url('logout') }}" style="display: inline">
                    {{ csrf_field() }}
                    <button class="dropdown-item" type="submit"><i class="fa fa-sign-out pull-right"></i> Log Out</button>
                  </form>
                @else 
                  <form method="post" action="{{ url('logout') }}" style="display: inline">
                    {{ csrf_field() }}
                    <button class="dropdown-item" type="submit"><i class="fa fa-sign-out pull-right"></i> Log Out</button>
                  </form>
                @endif
                {{-- <a class="dropdown-item"  href="{{url('/')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a> --}}
              </div>
            </li>

            <li role="presentation" class="nav-item dropdown open">
              <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-envelope-o"></i>
                <span class="badge bg-green">6</span>
              </a>
              <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                <li class="nav-item">
                  <a class="dropdown-item">
                    <span class="image"><img src={{asset('AdminLTE/production/images/user.png')}} alt="Profile Image" /></span>
                    <span>
                      <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                    </span>
                    <span class="message">
                      Film festivals used to be do-or-die moments for movie makers. They were where...
                    </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="dropdown-item">
                    <span class="image"><img src={{asset('AdminLTE/production/images/user.png')}} alt="Profile Image" /></span>
                    <span>
                      <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                    </span>
                    <span class="message">
                      Film festivals used to be do-or-die moments for movie makers. They were where...
                    </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="dropdown-item">
                    <span class="image"><img src={{asset('AdminLTE/production/images/user.png')}} alt="Profile Image" /></span>
                    <span>
                      <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                    </span>
                    <span class="message">
                      Film festivals used to be do-or-die moments for movie makers. They were where...
                    </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="dropdown-item">
                    <span class="image"><img src={{asset('AdminLTE/production/images/user.png')}} alt="Profile Image" /></span>
                    <span>
                      <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                    </span>
                    <span class="message">
                      Film festivals used to be do-or-die moments for movie makers. They were where...
                    </span>
                  </a>
                </li>
                <li class="nav-item">
                  <div class="text-center">
                    <a class="dropdown-item">
                      <strong>See All Alerts</strong>
                      <i class="fa fa-angle-right"></i>
                    </a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- /top navigation -->

@endif
