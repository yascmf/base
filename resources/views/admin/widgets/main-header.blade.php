      {{-- widget.main-header --}}

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>YAS</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>YAS</b>CMF</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <li>
                <a href="{{ site_url('/', 'desktop') }}">
                  <i class="fa fa-home" title="前台首页"></i>
                  <span class="label label-info">H</span>
                </a>
              </li>
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="{{ _asset('back/dist/img/20150417113714.jpg') }}" class="user-image" alt="User Image"/>
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">{{ auth()->user()->realname }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="{{ _asset('back/dist/img/20150417113714.jpg') }}" class="img-circle" alt="User Image" />
                    <p>
                      {{ auth()->user()->realname }} - {{ auth()->user()->nickname }}
                      <small>{{ auth()->user()->created_at->format('Y-m') }}----加入</small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="{{ site_url('me', 'admin') }}" class="btn btn-default btn-flat">个人资料</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{ site_url('auth/logout', 'admin') }}" class="btn btn-default btn-flat">退出</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-outdent"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
