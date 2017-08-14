<nav class="navbar navbar-toggleable-md bg-gray fixed-top navbar-transparent " color-on-scroll="50">
        <div class="container">
            <div class="navbar-translate">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}" rel="tooltip" title="GLOCHIS CLUB | A Glochis African Development Initiative" data-placement="bottom" target="_blank">
                   <img src="img/logo.png" height="62" alt="" title="" />
                </a>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="assets/img/blurred-image-1.jpg">
                <ul class="navbar-nav" style="font-size:18px; text-transform:none;">
                    <li class="nav-item"><a class="nav-link" href="{{url('/')}}"><i class="now-ui-icons business_chart-bar-32"></i> Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('/how')}}"><i class="now-ui-icons business_briefcase-24"></i> How it works</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('/faq')}}"><i class="now-ui-icons business_bulb-63"></i> FAQs</a></li>



                    @if (Auth::check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle btn btn-primary" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="now-ui-icons users_circle-08"></i> {{Auth::user()->name}}</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{url('/home')}}">Dashboard</a>
                                <a class="dropdown-item" href="{{url('/profile')}}">Profile</a>
                                <a class="dropdown-item" href="{{url('/logout')}}">Logout</a>
                            </div>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link btn btn-success" href="{{url('/login')}}"><i class="now-ui-icons ui-1_lock-circle-open"></i> Login</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-primary" href="{{url('/register')}}"><i class="now-ui-icons users_circle-08"></i> Register</a></li>
                    @endif





                    
                    <li class="nav-item"><a class="nav-link btn btn-simple btn-rounded" href="http://home.glochisclub.com/" rel="tooltip" title="Glochis African Development Initiative" data-placement="bottom"><i class="now-ui-icons design_app"></i> GADI</a></li>
                    

                </ul>
            </div>
        </div>
    </nav>