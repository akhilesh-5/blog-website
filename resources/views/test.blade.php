<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Laravel Project</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />

    <!-- Font Awesome icons (free version) -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />

    <!-- Core theme CSS -->
    <link href="{{ asset('assets/blogs/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/blogs/css/styles.css') }}" rel="stylesheet">
</head>
<body>

<form action="" method="POST">
<div class="form-group">
<textarea name="comment" class="form-control" rows="4" placeholder="Tap to enter comment here"></textarea>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#commentModal">Submit Comment</button>
 
 
                            <div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="commentModalLabel">Enter Your Name and Email</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            </div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Submit Comment</button>
</div>
</div>
</div>
</div>
</form>

 
    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>

    <!-- jQuery -->
<script src="{{ url('assets/blogs/vendor/jquery/jquery.min.js') }}"></script>
 
 <!-- Bootstrap Core JavaScript -->
<script src="{{ url('assets/blogs/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

 <!-- Contact Form JavaScript -->
<script src="{{ url('assets/blogs/vendor/js/jqBootstrapValidation.js') }}"></script>
<script src="{{ url('assets/blogs/vendor/js/contact_me.js') }}"></script>

 <!-- Theme JavaScript -->
<script src="{{ url('assets/blogs/vendor/js/moment.min.js') }}"></script>
</body>
</html>
