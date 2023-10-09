<!DOCTYPE html><!--  This site was created in Webflow. https://www.webflow.com  -->
<!--  Last Published: Wed Oct 04 2023 09:00:20 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="651bc3682699bcc1af0b537c" data-wf-site="65168b78f6982fbca96a0e4a">
<head>
  <meta charset="utf-8">
  <title>@yield("title")t</title>
  <meta content="Dashboard-request" property="og:title">
  <meta content="Dashboard-request" property="twitter:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="{{asset('assets/css/normalize.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/webflow.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/dropdown.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/sponsorship-jantzen.webflow.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Poppins:regular"]  }});</script>
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="{{asset('assets/images/favicon.ico')}}" rel="shortcut icon" type="image/x-icon">
  <link href="{{asset('assets/images/webclip.png')}}" rel="apple-touch-icon">
</head>
<body class="body-7">
  <div data-animation="over-left" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navbar w-nav">
    <div class="container-3 w-container">
      <a href="#" class="brand w-nav-brand">
        <div class="div-block-16"><img src="{{asset('assets/images/Ellipse-1-1.png')}}" loading="lazy" alt="" class="image-12">
          <div class="text-block-25"><strong class="bold-text">Jantzen</strong></div>
        </div>
      </a>
      <nav role="navigation" class="nav-menu-2 nav-link w-nav-menu">
        <div data-hover="false" data-delay="0" class="dropdown w-dropdown">
          <div class="dropdown-toggle w-dropdown-toggle"><img src="{{asset('assets/images/darhboard.png')}}" loading="lazy" alt="" height="17" width="17" class="image-11">
            <div class="w-icon-dropdown-toggle"></div>
            <div class="text-block-24">Social Media</div>
          </div>
          <nav class="dropdown-list w-dropdown-list">
            <a href="#" class="dropdown-link w-dropdown-link">FB &amp; IG</a>
            <a href="#" class="dropdown-link-2 w-dropdown-link">XHS Content</a>
            <a href="#" class="dropdown-link-3 w-dropdown-link">Google Reviews</a>
            <a href="#" class="dropdown-link w-dropdown-link">LinkedIn</a>
            <a href="#" class="dropdown-link w-dropdown-link">Youtube</a>
            <a href="#" class="dropdown-link w-dropdown-link">KOL Reviews</a>
          </nav>
        </div>
        <div data-hover="false" data-delay="0" class="dropdown w-dropdown">
          <div class="dropdown-toggle w-dropdown-toggle"><img src="{{asset('assets/images/darhboard.png')}}" loading="lazy" alt="" height="17" width="17" class="image-11">
            <div class="icon w-icon-dropdown-toggle"></div>
            <div class="text-block-20">Content Creator</div>
          </div>
          <nav class="dropdown-list w-dropdown-list">
            <a href="#" class="dropdown-link w-dropdown-link">Design</a>
            <a href="#" class="dropdown-link-2 w-dropdown-link">Videography</a>
            <a href="#" class="dropdown-link-3 w-dropdown-link">Photography</a>
            <a href="#" class="dropdown-link w-dropdown-link">SEO Articles</a>
          </nav>
        </div>
        <div data-hover="false" data-delay="0" class="dropdown w-dropdown">
          <div class="dropdown-toggle w-dropdown-toggle"><img src="{{asset('assets/images/darhboard.png')}}" loading="lazy" alt="" height="17" width="17" class="image-11">
            <div class="w-icon-dropdown-toggle"></div>
            <div class="text-block-23">Sponsorship</div>
          </div>
          <nav class="dropdown-list w-dropdown-list">
            <a href="/dashboard" class="dropdown-link w-dropdown-link">Sponsorship</a>
            <a href="#" class="dropdown-link-2 w-dropdown-link">CSR</a>
            <a href="#" class="dropdown-link-3 w-dropdown-link">Report</a>
            <a href="/calendar" class="dropdown-link-3 w-dropdown-link">Events Calendar</a>
          </nav>
        </div>
      </nav>
      <div class="w-nav-button">
        <div class="w-icon-nav-menu"></div>
      </div>
    </div>
  </div>
  <div data-animation="default" data-collapse="small" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navbar-3 w-nav">
    <div class="div-block-21">
      <div class="menu-button-2 w-nav-button">
        <div class="icon-3 w-icon-nav-menu"></div>
      </div>
      <nav role="navigation" class="nav-menu-4 w-nav-menu">
        <div class="div-block-17"><img src="{{asset('assets/images/u_home-alt.png')}}" loading="lazy" alt="" class="image-14">
          <a href="/dashboard" class="nav-link-4 w-nav-link">Home</a>
        </div>
        <div class="div-block-18"><img src="{{asset('assets/images/u_list-ul.png')}}" loading="lazy" alt="" class="image-15">
          <a href="#" class="nav-link-5 w-nav-link">Contents</a>
        </div>
        <div class="div-block-19"><img src="{{asset('assets/images/u_list-ui-alt.png')}}" loading="lazy" alt="" class="image-16">
          <a href="#" class="nav-link-7 w-nav-link">Categories</a>
        </div>
        <div class="div-block-20"><img src="{{asset('assets/images/u_cog.png')}}" loading="lazy" alt="" class="image-17">
          <a href="#" class="nav-link-8 w-nav-link">Settings</a>
        </div>
      </nav>
      <div class="div-block-13"><img src="{{asset('assets/images/Ellipse-1.png')}}" loading="lazy" alt="">
        <div data-hover="false" data-delay="0" class="dropdown-2 w-dropdown">
          <div class="dropdown-toggle-2 w-dropdown-toggle">
            <div class="text-block-50">{{Auth::user()->name}}</div>
          </div>
          <nav class="dropdown-list-2 w-dropdown-list">
            <a href="#" class="dropdown-link-4 w-dropdown-link">Profile</a>
            <a href="/logout" class="dropdown-link-5 w-dropdown-link">Logout</a>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <section class="section-4">
    <div class="div-block-23">
      <h3 class="heading-15">Sponsorship</h3>
      <div class="div-block-24"><img src="{{asset('assets/images/u_plus.png')}}" loading="lazy" alt="" class="image-19">
        <div class="text-block-27">Add Content </div>
      </div>
    </div>
    <div class="div-block-22">
      <div class="text-block-27">Search Content</div><img src="{{asset('assets/images/u_search.png')}}" loading="lazy" width="20" alt="" class="image-18">
    </div>
  </section>

  @yield('content')


  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=65168b78f6982fbca96a0e4a" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="{{asset('assets/js/webflow.js')}}" type="text/javascript"></script>
  <script>
    const profileDropdown = document.getElementById('profileDropdown');
    const dropdownContent = document.getElementById('dropdownContent');
    const profileLink = document.getElementById('profileLink');
    const logoutLink = document.getElementById('logoutLink');
    
    // Function to toggle the dropdown
    function toggleDropdown() {
      dropdownContent.style.display = (dropdownContent.style.display === 'block') ? 'none' : 'block';
    }
    
    // Attach event listener to the profile dropdown
    profileDropdown.addEventListener('click', function(event) {
      event.preventDefault(); // Prevent the default behavior of the anchor tag
      toggleDropdown();
    });
  </script>
</body>
</html>