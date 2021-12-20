<nav class="navbar navbar-default">
          <div class="container">
              <div class="navbar-header">

                  <!-- Collapsed Hamburger -->
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                      <span class="sr-only">Toggle Navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>

                  <!-- Branding Image -->
                  <a class="navbar-brand" href="{{ url('/') }}">
                      {{ config('app.name', 'CAPP') }}
                  </a>
              </div>

              <div class="collapse navbar-collapse" id="app-navbar-collapse">
                  <!-- Left Side Of Navbar -->
                  <ul class="nav navbar-nav">
                     
                  </ul>

                  <!-- Right Side Of Navbar -->
                  <ul class="nav navbar-nav navbar-right">
                      <!-- Authentication Links -->
                      @if (Auth::guest())
                          <li><a href="{{ route('login') }}">Login</a></li>
                          <li><a href="{{ route('register') }}">Register</a></li>
                      @else
                      <ul class="nav navbar-nav">
                       <li><a href="/dashboard">Dashboard</a></li>
                        
                        
                      </ul>
                      <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                             Utilities <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu" role="menu">
                              <li class=""><a href="/categories/create">Manage Categories</a></li>
                          <li><a href="/entries/create">Manage Entries</a></li>
                          <li><a href="/members/create">Enroll Members</a></li>
                           <li><a href="/members">Members Register</a></li>
                          <li><a href="/attendance">Attendance</a></li>
                          <li><a href="/attendance/show">Attendance Records</a></li>
                          </ul>
                      </li>
                          <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                  {{ Auth::user()->name }} <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" role="menu">
                                  <li>
                                      <a href="{{ route('logout') }}"
                                          onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                          Logout
                                      </a>

                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          {{ csrf_field() }}
                                      </form>
                                  </li>
                              </ul>
                          </li>
                      @endif
                  </ul>
              </div>
          </div>
      </nav>