<!DOCTYPE html>
<html class="st-layout ls-top-navbar ls-bottom-footer show-sidebar sidebar-l1 sidebar-r1-xs" lang="en">
   <!-- Mirrored from themekit.frontendmatter.com/dist/themes/real-estate/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Jan 2019 05:47:16 GMT -->
   <head>
      @include('includes.head')

      <style type="text/css">
        .select-vivid{
           background: url({{asset ('images/br_down.png')}}) no-repeat right;
           }
          .weighing .custom .form-group label{
              font-size: 13px;
          }
      </style>
   </head>
   <body>
   <div class="wrapper" id="pagewrap">
      <div class="wrapper ev4">
         <div class="container-fluid">
            @include('includes.navbar')
            <div class="center-wrapper">
               <div class="vivid-tabs">
                  <ul class="nav nav-tabs">
                     <li id="first"><a data-toggle="tab" href="#home">PATIENT <br>BODY SIZE</a></li>
                     <li id="second" class="active"><a data-toggle="tab" href="#menu1">FAILED <br>VALVE</a></li>
                     <li id="third" style="margin-right: 0;"><a data-toggle="tab" href="#menu2">TRANSCATHETER <br>VALVE</a></li>
                  </ul>
               </div>
              <div class="clearfix"></div>
                 <div class="thv">
                  <select name="" id="" class="select-vivid form-control"  href="javascript:;">
<option value="{{ $valvedata[0]['failed_type'] }}">{{ $valvedata[0]['failed_type'] }}</option>
</select>
                </div>
				      <div class="thv">
                  <select name="" id="" class="select-vivid form-control"  href="javascript:;">
<option value="{{ $valvedata[0]['lable_size']}}">{{ $valvedata[0]['lable_size']}}</option>
</select>
                </div>
				      <div class="thv">
                  <select name="" id="" class="select-vivid form-control"  href="javascript:;">
<option value="{{ $data['mechanism']}}">{{ $data['mechanism']}}</option>
</select>
                </div>
              <div class="vivid-tabs weighing weighing2">
                <div class="row custom">
                  <div class="col-md-4">
                    <div class="form-group">
                           <label for="height">STENT ID (mm)</label>
                      <input type="text" class="form-control" placeholder="??" value="{{ $valvedata[0]['height']}}" readonly>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                           <label for="height">VALVE HEIGHT (mm)</label>
                      <input type="text" class="form-control" placeholder="??" value="{{ $valvedata[0]['stentid']}}" readonly>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                           <label for="height">TRUE ID (mm)</label>
                      <input type="text" id="trueid" class="form-control" placeholder="??" value="{{ $valvedata[0]['trueid']}}" readonly>
                    </div>
                  </div>
                </div>
              </div>
              <div class="vivid-tabs weighing weighing2">
                <div class="form-group">
                  <label for="email">PRE FAILURE ECHO CHARACTERISTICS </label>
                </div>
              </div>
              <?php if( $valvedata[0]['ProjectedEOA']==0) {?>
              <?php } else { ?>
              <div class="vivid-tabs weighing weighing2">
                <div class="form-group">
                  <label for="eoa">EFFECTIVE ORIFICE AREA (cm^2)</label>
                  <input type="text" class="form-control" placeholder="??" value="{{ $valvedata[0]['ProjectedEOA'] }}" readonly>
                </div>
              </div>
            <?php } if($data['ieoa']==0) { ?>
            <?php } else { ?>
              <div class="vivid-tabs weighing weighing2 weighing3">
                <div class="form-group">
                  <label for="indexeoa">INDEXED EOA AREA (cm^2/m^2)</label>
                  <input type="text" class="form-control" placeholder="??" value="{{ $data['ieoa']}}" readonly>
                </div>
              </div>
            <?php }  ?>
                <div class="vivid-tabs weighing weighing2">
                  <div class="form-group">
                    <label class="color-black" for="email">Moderate Prosthetic-Patient Mismatch.</label>
                  </div>
                </div>
                <a class="btn btn-vivid btn-block next" style="position: relative;" href="{{ url('t-valve-info') }}">NEXT </a>
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
	   </div>
   </body>
</html>
