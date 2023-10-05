
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Login </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">

    
</head>

<body>

    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
                  @error('email')
                  <div class="alert alert-danger" role="alert">
                      {{ $message }}
                  </div>
                  @enderror
                  <h3 class="mb-0">Sign in</h3>
                  <p class="mb-5">Track your requests</p>
                <form action="/login-fill" method="POST">
                  @csrf
                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="typeEmailX-2" class="form-control form-control-lg" placeholder="Your Email"/>
                  </div>
         <!--
                  <div class="form-outline mb-4">
                    <input type="password" id="typePasswordX-2" class="form-control form-control-lg" />
                    <label class="form-label" for="typePasswordX-2">Password</label>
                  </div> -->
                  <button id="submitBtn" style="width: 100%" class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                  <button id="loadSpinner" class="btn btn-primary btn-lg btn-block" type="button" disabled style="display: none; width: 100%">
                    <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
                    <span role="status">Loading...</span>
                  </button>
                </form>
                  <hr class="my-4">
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    
  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>