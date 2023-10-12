<!DOCTYPE html><!--  This site was created in Webflow. https://www.webflow.com  -->
<!--  Last Published: Wed Oct 04 2023 02:48:25 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="65168b78f6982fbca96a0e4f" data-wf-site="65168b78f6982fbca96a0e4a">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="{{asset('assets/css/normalize.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/webflow.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/sponsorship-jantzen.webflow.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Poppins:regular"]  }});</script>
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="{{asset('assets/images/favicon.ico')}}" rel="shortcut icon" type="image/x-icon">
  <link href="{{asset('assets/images/webclip.png')}}" rel="apple-touch-icon">
</head>
<body class="body">
  <section class="section">
    <a href="/" class="link-block-2 w-inline-block"><img src="{{asset('assets/images/u_home-alt.png')}}" loading="lazy" alt="">
      <div class="text-block-2">Jantzen Home</div>
    </a>
        @auth
        <a href="/logout" class="link-block w-inline-block"><img src="{{asset('assets/images/Ellipse-1.png')}}" loading="lazy" alt="">
          <div class="text-block">
            {{Auth::user()->email}}
          </div>
        </a>
        @else
        <a href="/login" class="link-block w-inline-block"><img src="{{asset('assets/images/Ellipse-1.png')}}" loading="lazy" alt="">
          <div class="text-block">
            login
          </div>
        </a>
        @endauth
  </section>
  <section class="section-2">
    <div class="text-block-3">Sponsorship</div>
    <a href="/" class="link-block-3 w-inline-block"><img src="{{asset('assets/images/u_plus.png')}}" loading="lazy" alt="" class="image-2">
      <div class="text-block-5">Request Sponsorship</div>
    </a>
  </section>
  @yield('content')
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=65168b78f6982fbca96a0e4a" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="{{asset('assets/js/webflow.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/js/fileUpload.js')}}" type="text/javascript"></script>
</body>
</html>