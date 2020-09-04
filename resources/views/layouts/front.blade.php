<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
    <title>立刻貸-LKB線上借貸媒合平台</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">
  
    <!-- Favicons -->
    <link href="images/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
  
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
    <!-- Vendor CSS Files -->
    <link href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ URL::asset('/css/style.css') }}" rel="stylesheet">
  
    <!-- =======================================================
  * Template Name: Dewi - v2.0.0
  * Template URL: https://bootstrapmade.com/dewi-free-multi-purpose-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    
</head>
<body>

@include('front.navigation')

@yield('FrontContent')

<!-- ======= Footer ======= -->
<footer id="footer">
<div class="footer-top">
    <div class="container">
    <div class="row">

        <div class="col-lg-3 col-md-6">
        <div class="footer-info">
            <h3><a href="/"><img src="{{ URL::asset('images/lkblogo.png')}}" class="img-fluid" alt="立刻貸" style="max-width:150px"></a></h3>
            <p>
            嘉義市西區 <br>
            民生南路313號<br><br>
            <strong>電話:</strong> 0970820256<br>
            <strong>Email:</strong> info@example.com<br>
            </p>
            <div class="social-links mt-3">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
        </div>

        <div class="col-lg-2 col-md-6 footer-links">
        <h4>網站地圖</h4>
        <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="#">首頁</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">關於我們</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">我們的服務</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">嚴選商家</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">隱私政策</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="/admin">廠商登入</a></li>
        </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
        <h4>我們的服務</h4>
        <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="#">代書貸款</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">小額貸款</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">支票貼現</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">汽機車貸款</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">二胎房貸</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">銀行代辦</a></li>
        </ul>
        </div>

        <div class="col-lg-4 col-md-6 footer-newsletter">
        <h4>追蹤社群</h4>
        <p>想從社群瞭解我們嗎？快來看看吧！</p>
        <div class="social">
            <a href=""><i class="icofont-facebook"></i></a>
            <a href=""><i class="icofont-instagram"></i></a>
            <a href=""><i class="icofont-linkedin"></i></a>
        </div>

        </div>

    </div>
    </div>
</div>

<div class="container">
    <div class="copyright">
    &copy; Copyright <strong><span>立刻貸</span></strong>. All Rights Reserved
    </div>
</div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="{{ URL::asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ URL::asset('vendor/jquery.easing/jquery.easing.min.js')}}"></script>
<script src="{{ URL::asset('vendor/php-email-form/validate.js')}}"></script>
<script src="{{ URL::asset('vendor/waypoints/jquery.waypoints.min.js')}}"></script>
<script src="{{ URL::asset('vendor/counterup/counterup.min.js')}}"></script>
<script src="{{ URL::asset('vendor/venobox/venobox.min.js')}}"></script>
<script src="{{ URL::asset('vendor/owl.carousel/owl.carousel.min.js')}}"></script>
<script src="{{ URL::asset('vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{ URL::asset('vendor/aos/aos.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{ URL::asset('js/main.js')}}"></script>

</body>

</html>