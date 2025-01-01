@extends('layouts')

@section('content')

<body class="adminbody">
  <div id="main">
    <!-- Top bar navigation -->
    <div class="headerbar">
      <div class="stky">
        <nav class="navbar-custom">
          <div class="list-inline menu-left mb-0">
            <a class="xbutton button-menu-mobile open-left">
              <small class="mnln1"></small>
            </a>
            <li></li>
          </div>
        </nav>
      </div>
    </div>
    <!-- End Navigation -->

    <!-- Content Section for Stats -->
    <div class="content" style="margin-top: 70px;"> <!-- Added margin to give space below the sticky navbar -->
      <div class="container-fluid">
        <div class="row">
          <!-- Total Blogs Card -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Total Blogs</h5>
                <p class="card-text">
                    <strong>{{ $blogCount }}</strong>
                </p>
              </div>
            </div>
          </div>
          
          <!-- Total Users Card -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Total Users</h5>
                <p class="card-text">
                  <strong>{{ $userCount }}</strong>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Content Section -->

    <!-- Scroll to Top Button -->
    <div id="jsScroll" class="scrolltop hidescroll" onclick="scrollToTop();">
      <ion-icon name="chevron-up-outline"></ion-icon>
    </div>

  </div>

  <!-- Tooltip Script -->
  <script>    
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>

  <!-- Scroll Indicator -->
  <script>
    window.addEventListener('scroll', e => {
        var el = document.getElementById('jsScroll');
        if (window.scrollY > 200) {
            el.classList.add('scrvisible');
        } else {
            el.classList.remove('scrvisible');
        }
    });

    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }
  </script>

  <!-- Idle Timer Script -->
  <script>
    let idleTimer = null;
    let idleState = false;
    function showFoo(time) {
        clearTimeout(idleTimer);
        if (idleState == true) {
            $(".hidescroll").removeClass("inactive");
        }
        idleState = false;
        idleTimer = setTimeout(function () {
            $(".hidescroll").addClass("inactive");
            idleState = true;
        }, time);
    }
    showFoo(2000);
    $(window).scroll(function () {
        showFoo(2000);
    });
  </script>

  <!-- Sticky Navbar Script -->
  <script>
    $(document).ready(function () {
      var stickyNavTop = $('.stky').offset().top;
      var stickyNav = function () {
        var scrollTop = $(window).scrollTop();
        if (scrollTop > stickyNavTop) {
          $('.stky').addClass('sticky');
        } else {
          $('.stky').removeClass('sticky');
        }
      };
      stickyNav();
      $(window).scroll(function () {
        stickyNav();
      });
    });
  </script>
@endsection
