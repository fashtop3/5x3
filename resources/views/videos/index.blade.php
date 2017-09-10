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



<!-- PAGE CONTENT -->
<center>
    <div class="" style="min-height:600px;">

        <div class="OtherPagesTop"></div>




        <!-- **************************** VIDEOS SECTION **************************** -->
        <div class="row container">
            <div class="col-md-12 Text-to-left">
                <br>
                <h3><strong>Training Videos</strong></h3>
                <hr />


                <div class="row">


                        @if($videos->isNotEmpty())

                            @foreach($videos as $video)
                            <div class="col-md-4">
                                <h4>{{$video->title}}</h4>
                                <iframe
                                        src="{{$video->url}}">
                                </iframe>
                            </div>
                            @endforeach

                        @else
                            <h4>No Video Uploads</h4>
                        @endif


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
<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<!-- BINDING ALL JS AND INITIALIZING WEBSITE -->
<script type="text/javascript" src="js/siteInit.js"></script>
<!-- BINDING ALL JS AND INITIALIZING WEBSITE -->

</html>