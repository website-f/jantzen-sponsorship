
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

    
</head>

<body>

    <section class="vh-100" style="background-color: rgb(40, 39, 39);">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-6">
              <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5">
                  <div class="mb-4 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="75" height="75"
                        fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>
                  </div>
                  <div class="text-center mb-3">
                    <h3>Your submission is complete !</h3>
                  </div>
                  Thanks so much for sending in your form! Our team will be in touch with you shortly. 
                  In the meantime, feel free to check on your application's progress by logging in with your email address. 
                  Looking forward to chatting with you soon!
                  <hr class="my-4">
                  <a style="width: 100%" class="btn btn-secondary" href="/login"><i class="bi bi-arrow-left"></i> Go to login page</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

  <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>