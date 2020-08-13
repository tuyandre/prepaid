<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light " style="background-color: #DDEAF5;">
    <!-- Left navbar links -->
    <?php
    $user =  Auth::user();
    $name=Auth::user()->name;
    $photo=Auth::user()->profile;

    ?>
    <ul class="navbar-nav admin-header">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/customer/Dashboard#/" class="nav-link">Subscription</a>
        </li>
    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                @if(!empty($photo))
                    <img src="{{ asset('/profiles/'.Auth::user()->profile)}}" alt="User Avatar" class="img-size-50 mr-3 img-circle admin-profile">
                @else
                    <img src="{{ asset('/profiles/admin.png')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle admin-profile">
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        @if(!empty($photo))
                            <img src="{{ asset('profiles/'.Auth::user()->profile)}}" alt="User Avatar" class="img-size-50 mr-3 img-circle admin-profile2">
                        @else
                            <img src="{{ asset('profiles/admin.png')}}" alt="User Avatar" class="img-size-30 mr-3 img-circle admin-profile2">
                        @endif
                        <div class="media-body">
                            <h4 class="dropdown-item-title">
                                {{$name}}
                            </h4>
                            <p class="text-sm">{{$user->email}}</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>

                <div class="dropdown-divider"></div>

                <a href="#" class="dropdown-item">
                    <div class="media admin-header-footer">
                        <a  href="/creator/Dashboard#/fullProfile" class="btn btn-info header-profile">Profile</a>
                        <div class="media-body">

                            <a class="btn btn-warning header-logout" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                <i class="fas fa-power-off "></i>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </a>




                <div class="dropdown-divider"></div>

            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
