<!DOCTYPE html>
<html class="st-layout ls-top-navbar ls-bottom-footer show-sidebar sidebar-l1 sidebar-r1-xs" lang="en">
    <head>
        @include('includes.head')
        
        <style>
        .select-vivid{
        background: url({{asset ('images/br_down.png')}}) no-repeat right;
        }
        .center-wrapper {
        min-height: 72vh;
        }
        </style>
        <script type="text/javascript">
        function NavToCal(){
        window.location.href = '{{ URL("/metric-calculation")}}';
        }
        </script>
    </head>
    <body>
        <div class="wrapper" id="pagewrap" >
            <div class="wrapper ev4">
                <div class="container-fluid">
                    @include('includes.navbar')
                    {!! Form::open(['url' => '/f-valve-calc']) !!}
                    <div class="center-wrapper">
                        <div class="vivid-tabs">
                            <ul class="nav nav-tabs">
                                <li id="first"><a data-toggle="tab" href="#menu1" onclick="NavToCal()">PATIENT<br>BODY SIZE</a></li>
                                <li id="second" class="active"><a data-toggle="tab" href="#menu1">FAILED <br>VALVE</a></li>
                                <li id="third" style="margin-right: 0;"><a data-toggle="tab" href="#menu2">TRANSCATHETER <br>VALVE</a></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                        <div class="thv">
                            <select name="valveType" id="valveType" class="select-vivid form-control"  href="javascript:;">
                                <option value="">SELECT VALVE TYPE</option>
                                @foreach($data as $valve )
                                <option value="{{ $valve->failed_type }}">{{ $valve->failed_type }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        
                        <div class="thv">
                            <select name="lableSize" id="lableSize" class="select-vivid form-control"  href="javascript:;">
                                <option>LABLE SIZE (mm) </option>
                            </select>
                        </div>
                        
                        
                        <div class="thv">
                            <select name="fmechanism" id="fmechanism" class="select-vivid form-control"  href="javascript:;">
                                <option>MECHANISM OF FAILURE </option>
                            </select>
                        </div>
                     
                        <input type="submit" id="submit2" class="btn btn-vivid btn-block next gray-type" style="position: ;" name="submit" value="NEXT">
                    </div>
                    {!! Form::close() !!}
                    @include('includes.footer')
                </div>
                <script src="{{ url('load-effect/js/classie.js')}}"></script>
                <script src="{{ url('load-effect/js/svgLoader.js')}}"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
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