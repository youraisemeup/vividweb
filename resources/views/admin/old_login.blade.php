<!DOCTYPE html>
<html class="st-layout ls-top-navbar ls-bottom-footer show-sidebar sidebar-l1 sidebar-r1-xs" lang="en">
   <!-- Mirrored from themekit.frontendmatter.com/dist/themes/real-estate/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Jan 2019 05:47:16 GMT -->
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>VIVID</title>
       <link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet">
       <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
       <link href="{{ asset('css/style.css')}}" rel="stylesheet">
       <link rel="icon" href="{{ asset('images/diamond.png')}}" sizes="10">       
       <style>       
           .center-wrapper{
               padding-bottom: 70px;
           }
       </style>       
   </head>
   <body>
       <div class="wrapper">
           <div class="container-fluid">
       <nav class="vivid-nav navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="javascript:;"><img src="images/main-logo.png"> </a>

  <div class="navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
        <a href="javascript:;"><img src="images/googole-play.png"> </a>
      </li>
      <li class="nav-item">
      <a href="javascript:;"><img src="images/app-store.png"> </a>
      </li>
      <li class="nav-item">
       <a class="btn btn-vivid" href="javascript:;">VIVID WEBSITE </a>
      </li>
    </ul>
  </div>
</nav>
           <div class="center-wrapper text-center login-wrapper">
              <div class="logo">
               <img class="img-responsive" src="images/logo.png">
               </div>
                {!! Form::open(['url' => '/admin-login']) !!}
               <div class="login-thv">
               <label>
			    <p class="label-txt">Username</p>
			    <input type="text" class="input" name="username">
			    <div class="line-box">
			      <div class="line"></div>
			    </div>
			  </label>
			   <label>
			    <p class="label-txt">Password</p>
			    <input type="password" class="input" name="password">
			    <div class="line-box">
			      <div class="line"></div>
			    </div>
			  </label>
  <!--<div class="form-group">
    <input type="text" class="form-control " placeholder="Full Name" aria-label="Username" aria-describedby="basic-addon1">
  </div>
    <div class="">
    <input type="text" class="form-control " placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1">
  </div>-->
  
               </div>
               <div class="button-start">
               <input type="submit" class="btn btn-vivid btn-block" href="javascript:;" style=" background-image: linear-gradient(90deg, #4b55a3, #c8cdf1, #4b55a3);" value="Login" name="submit">
               </div>
               <div class="custom-control custom-checkbox">
                       
</div>
                    {!! Form::close() !!}
           </div>
       </div>
       </div>

       <script src="{{ url('js/jquery-3.3.1.min.js')}}"></script>
       <script src="{{ url('js/bootstrap.min.js')}}"  type="text/javascript"></script>
       
              <script>
       $(document).ready(function(){

  $('.input').focus(function(){
    $(this).parent().find(".label-txt").addClass('label-active');
  });

  $(".input").focusout(function(){
    if ($(this).val() == '') {
      $(this).parent().find(".label-txt").removeClass('label-active');
    };
  });

});
       </script>
   </body>
<!-- </html>
<!DOCTYPE html>
<html>
<head>
	<title>login page</title>
</head>
	<body>
		{!! Form::open(['url' => '/admin-login']) !!}
		<h2>Admin Login</h2>
		@if ($errors->any())
    		<div class="alert alert-danger">
        		<ul>
            		@foreach ($errors->all() as $error)
                		<li>{{ $error }}</li>
            		@endforeach
        		</ul>
    		</div>
		@endif
		<label for="user">User Id</label>
		<input type="text" name="username"><br/><br/>
		<label for="user">Password</label>
		<input type="password" name="password"><br/><br/>
		<input type="submit" name="submit" value="Submit">
		{!! Form::close() !!}
	</body>
</html> -->