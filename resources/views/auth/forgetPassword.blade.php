<!DOCTYPE html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
  <title>Forgot Password</title>
  <meta name="description" content="">
  <link rel="shortcut icon" href="assets/">
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css" />
  <link href="assets/plugins/linearicons/inearicons-style.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/admin-style.css" rel="stylesheet" type="text/css" />
</head>

<body class="log-pge">
    @include('flash-message') <!-- Flash message included once -->
  <div class="log-min">
    <div class="log-box">
      <div class="log-cnt">
        <div class="log-frm">
          <h6>Forgot Password</h6>
          <form class="frm-prt-log" method="POST" action="{{ route('forget.password.post') }}">
            @csrf
            <div class="form-row">
              <div class="form-group">
                <input type="text" class="form-control" name="email" id="email" required="">
                <label for="email">Email</label>
                <i><ion-icon name="mail-open-outline"></ion-icon></i>
              </div>
            </div>
            @error('email')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            <div class="log-frm-lnk">
              <a href="{{ route('login') }}">Back to Login</a>
            </div>
            <div class="log-frm-btn">
              <button type="submit" class="btn btn-primary btn-block">Submit <ion-icon name="log-in-outline"></ion-icon></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.nicescroll.js"></script>
  <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</body>
</html>
