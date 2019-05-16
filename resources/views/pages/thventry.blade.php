<!DOCTYPE html>
<html class="st-layout ls-top-navbar ls-bottom-footer show-sidebar sidebar-l1 sidebar-r1-xs" lang="en">
    <!-- Mirrored from themekit.frontendmatter.com/dist/themes/real-estate/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Jan 2019 05:47:16 GMT -->
    <head>
        @include('includes.head')

        <style>
        .select-vivid{
        background: url({{asset ('images/br_down.png')}}) no-repeat right;
        }
        .center-wrapper{
        min-height: 72vh;
        }
        </style>
    </head>

    <body>
        <div class="wrapper" id="pagewrap">
            <div class="container-fluid">
                @include('includes.navbar')
                {!! Form::open(['url' => '/t-valve-result']) !!}
                <div class="center-wrapper">
                    <div class="vivid-tabs">
                        <ul class="nav nav-tabs">
                            <li id="first"><a data-toggle="tab" href="#home">PATIENT <br>BODY SIZE</a></li>
                            <li id="second"><a data-toggle="tab" href="#menu1">FAILED <br>VALVE</a></li>
                            <li id="third" class="active" style="margin-right: 0;"><a data-toggle="tab" href="#menu2">TRANSCATHETER <br>VALVE</a></li>
                        </ul>
                    </div>

                    <div class="thv">
                        <select id="thvType" name="thvType" class="select-vivid form-control"  href="javascript:;">
                            <option value="">THV TYPE</option>
                            <option value="Evolut">Evolut</option>
                            <option value="Sepian 3">SAPIEN 3</option>
                        </select>
                    </div>


                    <input type="submit" id="thvresult" class="btn btn-vivid btn-block next gray-type" style="" href="#" name="submit" Value="NEXT" onclick="checkThvsize()">
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
