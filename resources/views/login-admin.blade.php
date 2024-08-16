
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
  <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <style>
    .showPassword {
      display: none;
    }
  </style>
    
</head>

<body>

    <section class="vh-100" style="background-color: rgb(40, 39, 39);">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-6">
              <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5">
                  @error('password')
                  <div class="alert alert-danger" role="alert">
                      {{ $message }}
                  </div>
                  @enderror
                  <h4 class="mb-0">WELCOME TO ADMIN PANEL</h4>
                  <p class="mb-0">Enter Password to continue</p>
                  <hr class="mb-3">
                <form method="POST" action="/login-admin-fill">
                  @csrf
                  <div class="form-outline mb-4">
                    <div class="input-group mb-3">
                      <input id="passwordInput" type="password" name="password" class="form-control" placeholder="Enter Your Password">
                      <button class="btn btn-outline-secondary" type="button" id="showPass" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tooltip on top">
                        <i class="bi bi-eye-fill showIcon"></i>
                        <i class="bi bi-eye-slash-fill hideIcon" style="display: none"></i>
                      </button>
                      
                    </div>
                    <input type="hidden" name="email" value="{{ request('email') }}">
                  </div>
         <!--
                  <div class="form-outline mb-4">
                    <input type="password" id="typePasswordX-2" class="form-control form-control-lg" />
                    <label class="form-label" for="typePasswordX-2">Password</label>
                  </div> -->
                  <button id="submitBtn" style="width: 100%" class="btn btn-primary btn-block" type="submit">Login</button>
                  <button id="loadSpinner" class="btn btn-primary btn-block" type="button" disabled style="display: none; width: 100%">
                    <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
                    <span role="status">Loading...</span>
                  </button>
                </form>
                  <hr class="my-4">
                <a style="width: 100%" class="btn btn-secondary" href="/login"><i class="bi bi-arrow-left"></i> Back</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    
  <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script>
  const inputPassword = document.getElementById("passwordInput");
  const showPassBtn = document.getElementById("showPass");
  const showIcon = document.querySelector(".showIcon");
  const hideIcon = document.querySelector(".hideIcon");
  const submitBtn = document.getElementById("submitBtn");
  const load = document.getElementById("loadSpinner");

  showPassBtn.addEventListener("click", function() {
    if(inputPassword.type === "password") {
      inputPassword.type = "text";
      showIcon.style.display = 'none';
      hideIcon.style.display = 'block';
    } else {
      inputPassword.type = "password";
      showIcon.style.display = "block";
      hideIcon.style.display = "none";
    }
  });

  submitBtn.addEventListener("click", function() {
    submitBtn.style.display = "none";
    load.style.display = "block";
  })
</script>
</body>

</html>