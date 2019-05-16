<!DOCTYPE html>
  <html class="st-layout ls-top-navbar ls-bottom-footer show-sidebar sidebar-l1 sidebar-r1-xs" lang="en">
   <!-- Mirrored from themekit.frontendmatter.com/dist/themes/real-estate/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Jan 2019 05:47:16 GMT -->
    <head>
      @include('includes.head')
        <style>
            .wrapper{
                min-height: 100vh;
                
            }
            
            .hiddenBody
            {
                display: none;
            }
            
        </style>
        <link rel="stylesheet" type="text/css" href="load-effect/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="load-effect/css/component.css" />
		<script src="load-effect/js/snap.svg-min.js"></script>
    </head>
    <body>
      <div class="wrapper" id="pagewrap" >
        <div class="container-fluid hiddenBody" >
          @include('includes.navbar')
          {!! Form::open(['url' => '/metric-calculation','method'=>'POST']) !!}
          <div class="center-wrapper">
            <div class="vivid-tabs">
              <ul class="nav nav-tabs">
                <li id="first" class="active"><a data-toggle="tab" href="#home">PATIENT <br>BODY SIZE</a></li>
                <li id="second"><a data-toggle="tab" href="#menu1">FAILED <br>VALVE</a></li>
                <li id="third" style="margin-right: 0;"><a data-toggle="tab" href="#menu2">TRANSCATHETER <br>VALVE</a></li>
              </ul>
            </div>
            <div class="clearfix"></div>
              <div class="vivid-tabs vividtab2">
                <ul class="nav" id="type">
                  <li id="one" class="{{ @$data['type'] == 'METRIC' ? 'active' :'' }}"><a data-toggle="tab" href="#home">METRIC</a></li>
                     <li id="two" class="{{ @$data['type'] == 'IMPERIAL' ? 'active' :'' }}"><a data-toggle="tab" id="type2" href="#menu">IMPERIAL</a></li>
                  </ul>
               </div>
               <div class="vivid-tabs weighing margin-bottom-70">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="height" id="ht">HEIGHT (cm)</label>
                           <input type="text" id="height" name="height" class="form-control" placeholder="??" value="{{@$data['height']}}" >
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="weight" id="wt">WEIGHT (kg)</label>
                           <input type="text" id="weight" name="weight" class="form-control" placeholder="??" value="{{@$data['weight']}}">
                        </div>
                     </div>
                     {{ Form::hidden('stype', @$data['type'], array('id' => 'stype')) }}
                  </div>
               </div>
                <div class="clearfix"></div>
                  <div class="vivid-tabs weighing weighing2">
                    <div class="error-text text-center" id="error">
                      <?php echo @$data['errormsg'] ?>
                    </div>
                  </div>
                <div class="mybtn row">
               <input type="submit" id="disableanchor" class="next btn-vivid gray-type" style="position: relative;" href="javascript:;" value="NEXT" name="submit">
               </div>
            </div>
            {!! Form::close() !!}
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