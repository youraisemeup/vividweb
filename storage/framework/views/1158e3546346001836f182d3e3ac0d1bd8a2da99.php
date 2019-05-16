<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>VIVID</title>
    <!-- Icons-->
    <!-- <link href="<?php echo e(asset('admin/css/coreui-icons.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/css/flag-icon.min.css')); ?>" rel="stylesheet"> -->
    <link href="<?php echo e(asset('admin/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/css/simple-line-icons.css')); ?>" rel="stylesheet">
    <link rel="icon" href="<?php echo e(asset('images/newfav.png')); ?>" sizes="10">
    <!-- Main styles for this application-->
    <link href="<?php echo e(asset('admin/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/css/pace.min.css')); ?>" rel="stylesheet">
    <!--load effact --->
    <link rel="stylesheet" type="text/css" href="load-effect/css/demo.css" />
    <!-- <link rel="stylesheet" type="text/css" href="load-effect/css/component.css" /> -->
    <script src="load-effect/js/snap.svg-min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
  </head>
  <body class="app flex-row align-items-center" >
    <div class="container-fluid hiddenBody">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">
                <?php echo Form::open(['url' => '/admin-login','method'=>'post']); ?>

                <h1>Login</h1>
                <p class="text-muted">Sign In to your account</p>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-user"></i>
                    </span>
                  </div>
                  <input class="form-control" type="text" name="username" placeholder="Username"><br/>
                  <?php if($errors->has('username')): ?>
                    <div class="error danger"><?php echo e($errors->first('username')); ?></div>
                  <?php endif; ?>
                </div>
                <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-lock"></i>
                    </span>
                  </div>
                  <input class="form-control" name="password" type="password" placeholder="Password"><br/>
                  <?php if($errors->has('password')): ?>
                    <div class="error danger"><?php echo e($errors->first('password')); ?></div>
                  <?php endif; ?>
                </div>
                <div class="row">
                  <div class="col-6">
                    <input type="submit" class="btn btn-vivid reset" value="Login" name="submit" >
                  </div>
                  <div class="col-6 text-right">
                    <button class="btn btn-link" type="button">Forgot password?</button>
                  </div>
                </div>
                <?php echo Form::close(); ?>

              </div>

            </div>
            
          </div>
        </div>
      </div>
    </div>
  
    <script src="<?php echo e(url('admin/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(url('admin/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(url('admin/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(url('admin/js/pace.min.js')); ?>"></script>
    <script src="<?php echo e(url('admin/js/perfect-scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(url('admin/js/coreui.min.js')); ?>"></script>
  </body>
</html>
