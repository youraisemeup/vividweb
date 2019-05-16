<!DOCTYPE html>
<html class="st-layout ls-top-navbar ls-bottom-footer show-sidebar sidebar-l1 sidebar-r1-xs" lang="en">
   <!-- Mirrored from themekit.frontendmatter.com/dist/themes/real-estate/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Jan 2019 05:47:16 GMT -->
   <head>
      @include('includes.head')
      <style>
	  
	  .black-text {
    font-size: 15px;
    font-weight: 600;
}
</style>
   </head>
   <body>
   <div class="wrapper" id="pagewrap" >
      <div class="wrapper">
         <div class="container-fluid">
          @include('includes.navbar')
            <div class="center-wrapper">
               <div class="vivid-tabs">
                  <ul class="nav nav-tabs">
                     <li class="active"><a data-toggle="tab" href="#home">PATIENT <br>BODY SIZE</a></li>
                     <li><a data-toggle="tab" href="#menu1">FAILD <br>VALVE</a></li>
                     <li style="margin-right: 0;"><a data-toggle="tab" href="#menu2">TRANSCATHETER <br>VALVE</a></li>
                  </ul>
                  <!--<div class="tab-content">
                     <div id="home" class="tab-pane fade in active">
                       <h3>HOME</h3>
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                     </div>
                     <div id="menu1" class="tab-pane fade">
                       <h3>Menu 1</h3>
                       <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                     </div>
                     <div id="menu2" class="tab-pane fade">
                       <h3>Menu 2</h3>
                       <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                     </div>
                     <div id="menu3" class="tab-pane fade">
                       <h3>Menu 3</h3>
                       <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                     </div>
                     </div>-->
               </div>
                <div class="clearfix"></div>
               <div class="vivid-tabs vividtab2">
                  <ul class="nav">
                     <li><a data-toggle="tab" href="#home">METRIC</a></li>
                     <li class="active"><a data-toggle="tab" href="#menu1">IMPERIAL</a></li>
                  </ul>
               </div>
               <div class="vivid-tabs weighing">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="height">HEIGHT (cm)</label>
                           <input type="text" id="input_height" class="form-control" placeholder="??" value="{{ $data['height'] }}" readonly>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="weight">WEIGHT (kg)</label>
                           <input type="text" id="input_weight" class="form-control" placeholder="??" value="{{ $data['weight'] }}" readonly>
                        </div>
                     </div>
                  </div>
               </div>
                <div class="clearfix"></div>
                <div class="vivid-tabs weighing weighing2">
                 <div class="error-text text-center">
                    <h3 class="black-text">
                     Please enter correct values <br>
                        Please enter height in inches, between 39-99in<br>
                        Please enter weight in pounds, between 66-661lb
                     </h3>
                    </div>
               </div>
               <a class="btn btn-vivid btn-block next" style="position: relative;" href="{{url('/metric-calculation')}}">NEXT </a>
            </div>
            @include('includes.footer')
			<script src="{{ url('load-effect/js/classie.js')}}"></script>
  <script src="{{ url('load-effect/js/svgLoader.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>


  <div id="loader" class="pageload-overlay" data-opening="M20,15 50,30 50,30 30,30 Z;M0,0 80,0 50,30 20,45 Z;M0,0 80,0 60,45 0,60 Z;M0,0 80,0 80,60 0,60 Z" data-closing="M0,0 80,0 60,45 0,60 Z;M0,0 80,0 50,30 20,45 Z;M20,15 50,30 50,30 30,30 Z;M30,30 50,30 50,30 30,30 Z">
				<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 80 60" preserveAspectRatio="none">
					<path d="M30,30 50,30 50,30 30,30 Z"/>
				</svg>
			</div><!-- /pageload-overlay -->
<script src="load-effect/js/classie.js"></script>
		<script src="load-effect/js/svgLoader.js"></script>
		<script>
			(function() {
				var pageWrap = document.getElementById( 'pagewrap' ),
					pages = [].slice.call( pageWrap.querySelectorAll( 'div.container-fluid' ) ),
					currentPage = 0,
					triggerLoading = [].slice.call( pageWrap.querySelectorAll( 'a.pageload-link' ) ),
					loader = new SVGLoader( document.getElementById( 'loader' ), { speedIn : 100 } );
                

				

                    loader.show();
							// after some time hide loader
							setTimeout( function() {
                                $('.container-fluid').removeClass("hiddenBody");
								loader.hide();

								classie.removeClass( pages[ currentPage ], 'show' );
								// update..
								currentPage = currentPage ? 0 : 1;
								classie.addClass( pages[ currentPage ], 'show' );

							}, 2000 );                   
						
				
			})();
		</script>
		</div>
   </body>
</html>