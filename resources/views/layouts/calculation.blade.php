<!DOCTYPE html>
<html class="st-layout ls-top-navbar ls-bottom-footer show-sidebar sidebar-l1 sidebar-r1-xs" lang="en">
    <head>
        @include('includes.head')
  <script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
<style type="text/css">input[type="text"] {
    -webkit-appearance: initial;
    -moz-appearance: initial;
}
body{
    -webkit-overflow-scrolling: touch;
    width:100%;
}</style>
    </head>
    <body class="need_height">

        <div class="wrapper" id="pagewrap">
            <div class="container-fluid">
                @include('includes.navbar')
                <div class="centre-div">
                    @yield('content')
                </div>
                @include('includes.footer')
            </div>
            <!-- <script src="{{ url('load-effect/js/classie.js')}}"></script>
            <script src="{{ url('load-effect/js/svgLoader.js')}}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script><!--
            <div id="loader" class="pageload-overlay" data-opening="M20,15 50,30 50,30 30,30 Z;M0,0 80,0 50,30 20,45 Z;M0,0 80,0 60,45 0,60 Z;M0,0 80,0 80,60 0,60 Z" data-closing="M0,0 80,0 60,45 0,60 Z;M0,0 80,0 50,30 20,45 Z;M20,15 50,30 50,30 30,30 Z;M30,30 50,30 50,30 30,30 Z"> -->

                </div><!-- /pageload-overlay -->
                <script src="load-effect/js/classie.js"></script>
                <script src="load-effect/js/svgLoader.js"></script>
                <script>
                // (function() {
                // var pageWrap = document.getElementById( 'pagewrap' ),
                // pages = [].slice.call( pageWrap.querySelectorAll( 'div.container-fluid' ) ),
                // currentPage = 0,
                // triggerLoading = [].slice.call( pageWrap.querySelectorAll( 'a.pageload-link' ) ),
                // loader = new SVGLoader( document.getElementById( 'loader' ), { speedIn : 100 } );


                // loader.show();
                // // after some time hide loader
                // setTimeout( function() {
                // $('.container-fluid').removeClass("hiddenBody");
                // loader.hide();
                // classie.removeClass( pages[ currentPage ], 'show' );
                // // update..
                // currentPage = currentPage ? 0 : 1;
                // classie.addClass( pages[ currentPage ], 'show' );
                // }, 500 );


                // })();

                function NavToCal(){
                    //$(".replace-form").html('Form1');
                    /*$(".replace-form2").hide();
                    $(".replace-form3").hide();*/
                    //localStorage.removeItem('mechanism');
                    window.location.href = '{{ URL("/metric-calculation")}}';
                    /*$('#input_height').val(localStorage.getItem('ht'));
                    $('#input_weight').val(localStorage.getItem('wt'));                   *///
                }
                function NavToValve(){
                    //$(".replace-form").html('Form2');
                    window.location.href = '{{ URL("/failed-valve")}}';
                }
                function NavToValveOnFirstScreen() {
                    if((localStorage.getItem('mechanismFailure_status') && localStorage.getItem('labelsize_status') && localStorage.getItem('valvetype_status')) || localStorage.getItem('bmi')) {
                        window.location.href = '{{ URL("/failed-valve")}}';
                    }
                }

                function NavToThirdOnFirstScreen() {
                    if(localStorage.getItem('thvtype_status') || (localStorage.getItem('mechanismFailure_status') && localStorage.getItem('labelsize_status') && localStorage.getItem('valvetype_status'))) {
                        window.location.href = '{{ URL("/transcatheter-valve")}}';
                    }
                }


                </script>
            </div>
        </body>
    </html>
