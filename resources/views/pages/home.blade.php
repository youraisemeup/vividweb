<!DOCTYPE html>
<html class="st-layout ls-top-navbar ls-bottom-footer show-sidebar sidebar-l1 sidebar-r1-xs" lang="en">
    <!-- Mirrored from themekit.frontendmatter.com/dist/themes/real-estate/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Jan 2019 05:47:16 GMT -->
    <head>
        @include('includes.head')
        <style>
            .center-wrapper{
                /* padding-bottom: 70px;*/
            }
            .wrapper.home {
                min-height: 100vh;
            }
            .wrapper {
                min-height: 100vh;
            }

            @media (max-width:768px) {
                .button-start {
                    margin-top: 20px;
                    margin-bottom: 20px;
                }
            }
            @media (max-width: 1024px){
                .wrapper.home {
                    min-height: 90vh !important;
                }
            }
            @media (max-width: 768px)
            {
            .center-wrapper {
                    min-height: 53vh !important;
                }
            }
        </style>
        <script>
            window.addEventListener("load",function() {
                setTimeout(function(){
                    // This hides the address bar:
                    window.scrollTo(0, 1);
                }, 0);
            });
        </script>
    </head>
    <body class="need_height" style="overflow-y: hidden;position:fixed;width:100%">
        <div class="wrapper home" id="pagewrap" >
            <div id="wrapper" class="wrapper">
                <div class="container-fluid">
                    @include('includes.navbar')
                    <div class="center-wrapper text-center">
                        <div class="logo">
                            <img class="img-responsive" src="{{ asset('images/logo.png') }}">
                        </div>
                        <div class="button-start">
                            <a id="clear" class="btn btn-vivid btn-block pageload-link" href="{{ url('/metric-calculation') }}" style="background-image: radial-gradient(circle at 50% 50%, #96b4e7, #223183);opacity: 1 !Important; position: relative; text-transform: uppercase;text-align: -webkit-center;">Start </a>
                        </div>
                        <div class="privacyhome">
                            <p class="privacy">By clicking start, I confirm that I have read and agree to IVR <br><a href="{{ asset('data/VIVID Website - Privacy Policy - Final.pdf')}}">Privacy Policy</a> and  <a href="{{ asset('data/VIVID Website - Terms of Use - Final.pdf')}}"> Terms of Use</a></p>
                        </div>
                    </div>
                </div>
                <footer class="home-footer">
                    <div class="col-md-12 mb-2 custom-responsive"> <a class="btn btn-vivid reset margin-right-15" href="https://valveinvalve.org/about-valve-in-valve-international-data/"> About Us </a>  <a class="btn btn-vivid reset" href="https://valveinvalve.org/contact-us/"> Contact Us </a>
                    </div>
                    <div class="col-md-12 mb-2 custom-responsive2">
                        <div class="col-6 pull-left">   <a class="btn btn-vivid reset margin-right-15" href="https://valveinvalve.org/about-valve-in-valve-international-data/"> About Us </a> </div> <div class="col-6 pull-left text-right"> <a class="btn btn-vivid reset" href="https://valveinvalve.org/contact-us/"> Contact Us </a>  </div>
                    </div>
                </footer>
         </div>
         <script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
         <script src="{{ url('js/bootstrap.min.js') }}"  type="text/javascript"></script>
         <script src="{{ url('js/custom.js') }}"  type="text/javascript"></script>
         <script src="{{ url('load-effect/js/classie.js')}}"></script>
         <script src="{{ url('load-effect/js/svgLoader.js')}}"></script>
         <script>
            (function() {
              localStorage.clear();

            //   var wrapper = document.getElementById( 'wrapper' ),
            //     pages = [].slice.call( wrapper.querySelectorAll( 'div.container-fluid' ) ),
            //     currentPage = 0,
            //     triggerLoading = [].slice.call( wrapper.querySelectorAll( 'a.pageload-link' ) ),
            //     loader = new SVGLoader( document.getElementById( 'loader' ), { speedIn : 300, easingIn : mina.easeinout } );

            //   function init() {
            //     triggerLoading.forEach( function( trigger ) {
            //       trigger.addEventListener( 'click', function( ev ) {
            //         ev.preventDefault();
            //         loader.show();
            //         // after some time hide loader
            //         setTimeout( function() {
            //           loader.hide();

            //           classie.removeClass( pages[ currentPage ], 'show' );
            //           // update..
            //           currentPage = currentPage ? 0 : 1;
            //           classie.addClass( pages[ currentPage ], 'show' );

            //         }, 2000 );
            //       } );
            //     } );
            //   }

            //   init();
            })();
         </script>
      </div>
   </body>
</html>
