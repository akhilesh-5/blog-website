<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
  <!--[if lt IE 10]>
<link rel="stylesheet" href="assets/css/no-ie.css">
<div class="no-iemsg">
    <span><img src="assets/images/no-ie.jpg" width="80" height="80"></span>
    <h1>Your browser is no longer supported !</h1>
    <h3>For better security and optimized experience, please upgrade your browser or install the latest version of any other browser.</h3>
    Try Other latest browsers - <a target="_blank" href="https://www.google.com/chrome/">Google Chrome</a> - <a target="_blank" href="https://www.mozilla.org/en-US/firefox/new/">Mozilla
        Firefox</a>
</div>                                     
<![endif]-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <meta name="description" content="">
  <link rel="shortcut icon" href="assets/">
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css" />
  <link href="assets/plugins/linearicons/inearicons-style.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/admin-style.css" rel="stylesheet" type="text/css" />
</head>
@include('flash-message')
<body class="log-pge">
  <div class="log-min">
    <div class="log-box">
      <!-- <div class="log-img">
        <span><img src="assets/images/logo.png" class="img-fluid" alt="IMG"></span>
      </div> -->
      <div class="log-cnt">
        <div class="log-frm">
          <h6>Login</h6>
          <form class="frm-prt-log" action="{{ route('login.post') }}" method="POST">
          @csrf
            <div class="form-row">
              <div class="form-group">
              <input type="email" class="form-control" id="email" name="email" required>
                <label for="email">email</label>
                @error('email')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <i><ion-icon name="person-outline"></ion-icon></i>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" id="" required="" 
                  maxlength="12" minlength="5">
                  @error('password')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <div class="btn-shw">
                  <ion-icon name="eye-off-outline"></ion-icon>
                </div>
                <label for="password">Password</label>
                <i><ion-icon name="lock-closed-outline"></ion-icon></i>
              </div>
            </div>
            <div class="log-frm-lnk">
            <div class="form-check">
            <div class="text-center">
                <p class="text-danger pt-2">
                    <a href="{{ route('register') }}" class="text-danger">Don't have an account?  Sign up here</a>.
                </p>
                <p class="text-danger pt-2">
                    <a href="{{ route('forget.password.get') }}" class="text-danger">Forgot password</a>.
                </p>
            </div>            
          </div>             
            </div>
            <div class="log-frm-btn">
              <button type="submit" class="btn btn-primary btn-block">Login <ion-icon name="log-in-outline">
                </ion-icon></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordInput = document.querySelector('input[name="password"]');
        const toggleButton = document.querySelector('.btn-shw');

        toggleButton.addEventListener('click', function() {
            const icon = this.querySelector('ion-icon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.name = 'eye-off-outline';
            } else {
                passwordInput.type = 'password';
                icon.name = 'eye-outline';
            }
        });
    });
</script>
  <!-- END main -->

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.nicescroll.js"></script>
  <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
  <!-- App js -->
  <!-- END Java Script for this page -->
</body>
</html>