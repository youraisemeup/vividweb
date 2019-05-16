<!DOCTYPE html>
<html class="st-layout ls-top-navbar ls-bottom-footer show-sidebar sidebar-l1 sidebar-r1-xs" lang="en">
   <head>
      @include('includes.head')
   </head>
   <body>
   
      <div class="wrapper" id="pagewrap">
         <div class="container-fluid">
            @include('includes.navbar')
            <div class="center-wrapper">
               <div class="vivid-tabs">
                  <ul class="nav nav-tabs">
                     <li id="first" class="active"><a data-toggle="tab" href="#home">PATIENT <br>BODY SIZE</a></li>
                     <li id="second"><a data-toggle="tab" href="#menu1">FAILD <br>VALVE</a></li>
                     <li id="third" style="margin-right: 0;"><a data-toggle="tab" href="#menu2">TRANSCATHETER <br>VALVE</a></li>
                  </ul>
                 
              </div>
                <div class="clearfix"></div>
               <div class="vivid-tabs vividtab2">
                  <ul class="nav">
                     <li><a data-toggle="tab" id="home" href="#home">METRIC</a></li>
                     <li class="active"><a data-toggle="tab" id="menu1" href="#menu1">IMPERIAL</a></li>
                  </ul>
               </div>
               <div class="vivid-tabs weighing">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="height">HEIGHT (in)</label>
                           <input type="text" id="input_height" class="form-control" placeholder="??"  value="{{ $data['height'] }}" >
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="weight">WEIGHT (lb)</label>
                           <input type="text" id="input_weight" class="form-control" placeholder="??" value="{{ $data['weight'] }}" >
                        </div>
                     </div>
                  </div>
               </div>
                <div class="clearfix"></div>
                <div class="vivid-tabs weighing weighing2">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="bsa">BSA (m^2)</label>
                           <input type="text" id="cal_bsa" class="form-control" placeholder="??" value="{{ $data['bsa'] }}" readonly>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="bmi">BMI (kg/m^2)</label>
                           <input type="text" id="cal_bmi" class="form-control" placeholder="??" value="{{ $data['bmi'] }}" readonly>
                        </div>
                     </div>
                  </div>
               </div>
               <a class="btn btn-vivid btn-block next" style="position: relative;" href="{{ url('f-valve-info') }}">NEXT </a>
            </div>
            @include('includes.footer')
          </div>
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