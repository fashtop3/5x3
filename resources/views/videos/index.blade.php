<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Videos | Glochis Club | A Glochis African Development Initiative | Empowering our youth</title>

    <!-- SEO CONFIG -->
@include ('includes/seo')
<!-- SEO CONFIG -->

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="js/font-awesome-4.7.0/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/now-ui-kit.css" rel="stylesheet" />
    <link href="css/glochis.css" rel="stylesheet" />
    <link href="css/bose.css" rel="stylesheet" />


</head>


<body>


<!-- NAVIGATION -->
@include ('includes/navigation')
<!-- NAVIGATION -->



<!-- PAGE CONTENT -->
<center>
    <div class="" style="min-height:600px;">

        <div class="OtherPagesTop"></div>




        <!-- **************************** VIDEOS SECTION **************************** -->
        <div class="row container">
            <div class="col-md-12 Text-to-left">
                <br>
                <h3><strong>Videos</strong></h3>
                <hr />


                <div class="row">
                    <div class="col-md-6">

                        @if($videos->isNotEmpty())

                            @foreach($videos as $video)
                                <h4>{{$video->title}}</h4>
                                <iframe width="420" height="315"
                                        src="{{$video->url}}">
                                </iframe>
                            @endforeach

                        @endif

                    </div>
                </div>


            </div>
        </div>

        <br><br>
        <div class="row container">
        </div>

        <!-- **************************** FAQ SECTION **************************** -->


    </div>
</center>
<!-- PAGE CONTENT -->


<!-- FOOTER -->
@include ('includes/footer')
<!-- FOOTER -->


</body>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/core/tether.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/plugins/bootstrap-switch.js"></script>
<script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<script src="assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="assets/js/now-ui-kit.js" type="text/javascript"></script>

</html>