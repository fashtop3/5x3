<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Glochis Club | A Glochis African Development Initiative | Empowering our youth</title>

<!-- SEO CONFIG -->
@include ('includes/seo')
<!-- SEO CONFIG -->

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="js/font-awesome-4.7.0/css/font-awesome.min.css" />



    <!-- CSS Files -->
    <link href="js/bootstrap/css/bootstrap.css" rel="stylesheet" />
    <!-- <link href="assets/css/now-ui-kit.css" rel="stylesheet" /> -->
    <link href="css/glochis.css" rel="stylesheet" />

</head>


<body>


<!-- NAVIGATION -->
@include ('includes/navigation')
<!-- NAVIGATION -->



<!-- THE MAIN SLIDER
<center>
<div class="bose" style="min-height:600px;">

    <div class="row container SliderContent">

        <div class="col-md-7 Text-to-left">
            <h2>Join the network of enterprising young Africans<br/><br/>
            <span>Our main aim is to provide a platform that actively promotes entrepreneural development among our young people. This club is an effort of Glochis African Development Initiative (GADI&trade;)</span>
            </h2>
            <br/>
            <a class="btn btn-danger btn-rounded" href="#">How it Works</a>
            <a class="btn btn-simple btn-rounded" href="http://home.glochisclub.com/" rel="tooltip" title="Visit the Glochis African Development Initiative website" data-placement="bottom"><i class="now-ui-icons design_app"></i> GADI</a>
        </div>

        <div class="col-md-5">

        </div>


    </div>
</div>
</center>
<!-- THE MAIN SLIDER -->







<!-- START SLIDER -->
<div id="main-carousel" class="carousel slide" data-ride="carousel">

    <!-- carousel-indicators-->
    <ol class="carousel-indicators">
        <li data-target="#main-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#main-carousel" data-slide-to="1"></li>
        <li data-target="#main-carousel" data-slide-to="2"></li>
        <li data-target="#main-carousel" data-slide-to="3"></li>
    </ol><!--/.carousel-indicators-->

    <!-- carousel-inner-->
    <div class="carousel-inner">


        <div class="item active" style="background-image: url(img/slider-04.jpg); min-height:600px; background-size:cover; background-position: 50% 50%; background-repeat:no-repeat;">
            <div class="container-fluid">
                <div class="carousel-caption" style="max-width:450px;">
                    <h2 class="">Join the network of enterprising young Africans</h2>
                    <p>Our main aim is to provide a platform that actively promotes entrepreneurial development among our young people. This club is an effort of Glochis African Development Initiative (GADI&trade;)
                        <br><br>
                        <a class="btn btn-info" href="{{url('/signup')}}">&nbsp;<i class="fa fa-power-off"></i>&nbsp;&nbsp;Become a member</a></p>
                </div>
            </div>
        </div>

        <div class="item" style="background-image: url(img/slider-01.jpg); min-height:600px; background-size:cover; background-position: 50% 50%; background-repeat:no-repeat;">
            <div class="container-fluid">
                <div class="carousel-caption" style="max-width:450px;">
                    <h2 class="">A gathering of young, vibrant and creative great minds to create the future of our dreams.</h2>
                    <p><a class="btn btn-info" href="{{url('/signup')}}">&nbsp;<i class="fa fa-power-off"></i>&nbsp;&nbsp;Become a member</a></p>
                </div>
            </div>
        </div>


        <div class="item" style="background-image: url(img/slider-02.jpg); min-height:600px; background-size:cover; background-position: 50% 50%; background-repeat:no-repeat;">
            <div class="container-fluid">
                <div class="carousel-caption" style="max-width:450px;">
                    <h2>The youths may be just 30% of the society today, they are the 100% of our tomorrow.</h2>
                    <p style="font-size:18px;">We must begin early to prepare them to bring them up to speed in the fast changing world.</p>
                    <p><a class="btn btn-md btn-warning" href="{{url('/signup')}}">&nbsp;<i class="fa fa-power-off"></i>&nbsp;&nbsp;Join Glochis Club Now</a></p>
                </div>
            </div>
        </div>


        <div class="item" style="background-image: url(img/slider-03.jpg); min-height:600px; background-size:cover; background-position: 50% 50%; background-repeat:no-repeat;">
            <div class="container-fluid">
                <div class="carousel-caption" style="max-width:450px;">
                    <h2>If I knew what I know now at your age, I would have done things differently.</h2>
                    <p style="font-size:20px;">I would have  achieved greater things. Get knowledge, the right knowledge.</p>
                    <p><a class="btn btn-danger" href="{{url('/signup')}}">&nbsp;<i class="fa fa-power-off"></i>&nbsp;&nbsp;Start planning your future</a></p>
                </div>
            </div>
        </div>



    </div>

    <!-- CONTROLS -->
    <!-- CONTROLS -->

</div>
<!-- carousel-inner-->

</div>
<!-- END SLIDER -->















<!-- FOOTER -->
@include ('includes/footer')
<!-- FOOTER -->

</body>










<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<!-- BINDING ALL JS AND INITIALIZING WEBSITE -->
<script type="text/javascript" src="js/siteInit.js"></script>
<!-- BINDING ALL JS AND INITIALIZING WEBSITE -->

</html>

