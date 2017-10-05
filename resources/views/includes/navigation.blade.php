<!-- ATTEMPPTING TO RENDER  NAVBAR -->
<nav class="navbar navbar-toggleable navbar-primary navbar-fixed-top navbar-transparent">
    <div class="container" style="padding:8px; padding-top:12px;">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#this-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{{url('/')}}" class="PushForceImg"><img src="img/logo.png" height="62" alt="" title="" /></a>
        </div>

        <div class="collapse navbar-collapse" id="this-navbar-collapse">
            <ul class="nav navbar-nav navbar-right">

                <li><a class="" href="{{url('/')}}"><i class="fa fa-bank"></i> Home</a></li>
                <li><a class="" href="{{url('/how')}}"><i class="fa fa-briefcase"></i> How it works</a></li>
                <li><a class="" href="{{url('/faq')}}"><i class="fa fa-lightbulb-o"></i> FAQs</a></li>


                @if (Auth::check())
                    <li class=" dropdown">
                    <a href="#" class="dropdown-toggle btn btn-info" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>{{Auth::user()->name}}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('/home')}}">Dashboard</a></li>
                        <li><a href="{{url('/user')}}">Profile</a></li>
                        <li><a href="{{url('/logout')}}">Logout</a></li>
                        </ul>
                    </li>
                @else

                    <li><a class="TrickNav2" href="{{url('/login')}}"><i class="fa fa-lock"></i> Login</a></li>
                    <li><a class="TrickNav3" href="{{url('/register')}}"><i class="fa fa-user-circle"></i> Register</a></li>
                @endif

                   <li><a class="TrickNav1" href="{{url('/videos')}}"><i class="fa fa-ravelry"></i> Media Content</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->

    </div><!-- /.container-fluid -->
</nav>

<!-- FINISHING NAVBAR RENDERING -->

