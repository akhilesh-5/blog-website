<html lang="en" class="no-js">
<head>
    @include('includes.head')

</head>
<?php error_reporting(0);?>
<body class="adminbody" >
    <!-- <div id="overlay">
        <div id="progstat"></div>
        <div id="progress"></div>
      </div>     -->
    <div id="main">
        <!-- header content -->
        @include('includes.header')

        <!-- sidebar content -->
        @include('includes.sidebar')
    
        <!-- main content -->
        @include('flash-message')
        
        @yield('content')
        </div> 
        <!-- footer content -->
        @include('includes.footer')
       
<!-- JS script include -->

</body>
</html>