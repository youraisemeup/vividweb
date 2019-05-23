<!DOCTYPE html>
<html lang="en">
   <head>
      <base href="./">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
      <meta name="description" content="VIVID">
      <meta name="author" content="Łukasz Holeczek">
      <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
      <title>VIVID - CMS</title>
      <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
      <link href="{{asset('admin/css/pace.min.css')}}" rel="stylesheet">
      <link rel="icon" href="{{asset('images/newfav.png')}}" sizes="10">
      <link href="{{asset('admin/css/font-awesome.min.css')}}" rel="stylesheet">
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <link href="{{asset('admin/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
      <link href="{{asset('admin/css/coreui-icons.min.css')}}" rel="stylesheet">
      <link href="{{asset('admin/css/flag-icon.min.css')}}" rel="stylesheet">
      <link href="{{asset('admin/css/font-awesome.min.css')}}" rel="stylesheet">
      <link href="{{asset('admin/css/simple-line-icons.css')}}" rel="stylesheet">
      <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
      <link href="{{asset('admin/css/pace.min.css')}}" rel="stylesheet">



      <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
      <link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet">
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
      <style type="text/css">
      .btn-dash-delete{
    position: absolute;
    top: 44px;
    right: 220px;
    left: auto;
    margin: auto;
    min-width: 130px;
          }
        @media only screen and (max-width: 664px){
         .btn-dash-delete{
          right: 12px;
               }
            }
            @media only screen and (max-width: 468px){
.btn-dash-delete {
    top: 75px;
}
}
      @media only screen and (max-width: 329px){
         .btn-dash-delete{
          top: 115px;
               }
            }
      </style>
   </head>
   <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
      <div class="wrapper" id="pagewrap">
            <header class="app-header navbar">
               <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
               <span class="navbar-toggler-icon"></span>
               </button>
               <a class="navbar-brand" href="#">
               <img class="navbar-brand-full" src="{{asset('images/main-logo.png')}}" class="img-reponsive" style="height: 22px;">
               </a>
               <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
               <span class="navbar-toggler-icon"></span>
               </button>
               <ul class="nav navbar-nav d-md-down-none">
                  <li class="nav-item px-3">
                     <a class="nav-link" href="{{url('/get-data')}}">Dashboard</a>
                  </li>
                  <li class="nav-item px-3">
                     <a class="nav-link" href="{{url('/get-data')}}">User Data</a>
                  </li>
                  <li class="nav-item px-3">
                     <a class="nav-link" href="{{url('/graph-data')}}">Graph Data</a>
                  </li>
               </ul>
               <ul class="nav navbar-nav ml-auto">
                  <li class="nav-item d-md-down-none">
                     <a class="nav-link" href="{{url('/admin-logout')}}">
                     <i class=""></i>Logout
                     </a>
                  </li>
               </ul>
               <button class="navbar-toggler aside-menu-toggler d-md-down-none" type="button" data-toggle="aside-menu-lg-show">
               </button>
               <a href="{{url('/admin-logout')}}" class="navbar-toggler aside-menu-toggler d-lg-none" data-toggle="aside-menu-show" style="color: #000; right: 10px; font-size: 13px; position: relative; top: -3px;">Logout
<!--                                      <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="{{url('/admin-logout')}}">Logout</a>
</div>
					  <span class="navbar-toggler-icon dropbtn" onclick="openNav()"></span>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "180px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script> -->
               </a>
            </header>
            <div class="app-body">
               <div class="sidebar">
                  <nav class="sidebar-nav">
                     <ul class="nav">
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('/get-data')}}">
                           <i class="nav-icon icon-home"></i> Dashboard</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('/get-data')}}">
                           <i class="nav-icon icon-user"></i> User Data</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('/graph-data')}}">
                           <i class="nav-icon icon-pie-chart"></i> Graph Data</a>
                        </li>
                     </ul>
                  </nav>
                  <button class="sidebar-minimizer brand-minimizer" type="button"></button>
               </div>
               <main class="main">
                  <!-- Breadcrumb-->
                  <div class="container-fluid">
                     <div class="col-md-12 mt-4 pull-left" style="position: relative;">
                        <div class="col-md-6 pull-left">
                           <label class="mb-4">View Data</label>
                           <form class="form mb-2" action="/action_page.php">
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group row">
                                       <label class="col-md-4" for="from">From: </label>
                                       <div class="col-md-8">
                                          <input type="text" class="form-control" id="datepicker_from">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group row">
                                       <label  class="col-md-4" for="to">To: </label>
                                       <div class="col-md-8">
                                          <input type="text" class="form-control" id="datepicker_to">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </form>
                           <div class="row">
                              <div class="offset-2 col-10">
                                 <button type="button" id="view" class="btn btn-light  btn-block">View</button>
                              </div>
                           </div>
                           <div class="row">
                              <div class="offset-2 col-10">

                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 pull-left">

                        </div>
                     </div>
                     <div class="col-md-12 mt-4">
                     </div>
                  </div>
                  <div class="container table-responsive" style="max-width: 98%; position:relative;;">
                     <div class="datatable mt-5">
                          <button type="button" id="delete" class="btn btn-light  float-right btn-dash-delete" style="z-index: 1;">Delete</button>
                        <table id="example" class="display nowrap table table-bordered" style="width:100%">
                           <thead>
                              <tr>
                                 <th class="th-one" style="width: 1% !important;"><input type="checkbox" id="checkall"></th>
                                 <th class="th-two" style="width: 8% !important;">Date</th>
                                 <th class="th-two" style="width: 8% !important;">Time</th>
                                 <th class="th-five" style="width: 15% !important;">Email</th>
                                 <th class="th-two" style="width: 8% !important;">Height</th>
                                 <th class="th-two" style="width: 8% !important;">Weight</th>
                                 <th class="th-two"style="width: 8% !important;">Failed valve type</th>
                                 <th class="th-two" style="width: 8% !important;">Label Size</th>
                                 <th class="th-thr" style="width: 20% !important;">Machanism of failure</th>
                                 <th class="th-two" style="width: 8% !important;">Thv type</th>
                                 <th class="th-two" style="width: 8% !important;">User Ip</th>
                              </tr>
                           </thead>
                           <tbody id="data">
                              @foreach($user as $data)
                              <tr>
                                 <td><input type="checkbox" class="checkbox" id="{{ $data->id }}" name="id[]" ></td>
                                 <td>{{ $data->Date }}</td>
                                 <td>{{ $data->time }}</td>
                                 <td>{{ $data->email }}</td>
                                 <td>{{ $data->height }}</td>
                                 <td>{{ $data->weight }}</td>
                                 <td>{{ $data->failedValueType }}</td>
                                 <td>{{ $data->lableSize }}</td>
                                 <td>{{ $data->failureMechanism }}</td>
                                 <td>{{ $data->thvType }}</td>
                                 <td>{{ $data->userIP }}</td>
                              </tr>
                              @endforeach
                           </tbody>
                           <tfoot>
                              <tr>
                                 <th></th>
                                 <th>Date</th>
                                 <th>Time</th>
                                 <th>Email</th>
                                 <th>Height</th>
                                 <th>Weight</th>
                                 <th>Failed Valve Type</th>
                                 <th>Lable Size</th>
                                 <th>Failure Mechanism</th>
                                 <th>Thv type</th>
                                 <th>User IP</th>
                              </tr>
                           </tfoot>
                        </table>
                     </div>
                  </div>
                  <div class="col-md-12 mt-4">
                     <div class="col-md-6">
                        <label class="mb-4">Export Data</label>
                        <form class="form mb-2" action="/action_page.php">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group row">
                                    <label class="col-md-4" for="from">From: </label>
                                    <div class="col-md-8">
                                       <input type="text" class="form-control" id="datepicker_from1">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group row">
                                    <label  class="col-md-4" for="to">To: </label>
                                    <div class="col-md-8">
                                       <input type="text" class="form-control" id="datepicker_to1">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                        <div class="row mb-5">
                           <div class="offset-2 col-10">
                              <button type="button" id="export" class="btn btn-light  btn-block">Export</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </main>
            </div>
      </div>
      <footer class="app-footer">
      </footer>

      <!-- CoreUI and necessary plugins-->
      <script src="{{url('admin/js/jquery.min.js')}}"></script>
      <script src="{{url('admin/js/popper.min.js')}}"></script>
      <script src="{{url('admin/js/bootstrap.min.js')}}"></script>
      <script src="{{url('admin/js/pace.min.js')}}"></script>
      <script src="{{url('admin/js/perfect-scrollbar.min.js')}}"></script>
      <script src="{{url('admin/js/jquery.min.js')}}"></script>
      <script src="{{url('admin/js/popper.min.js')}}"></script>
      <script src="{{url('admin/js/bootstrap.min.js')}}"></script>
      <script src="{{url('admin/js/pace.min.js')}}"></script>
      <script src="{{url('admin/js/coreui.min.js')}}"></script>
      <!-- Plugins and scripts required by this view-->
      <script src="{{url('admin/js/tooltips.js')}}"></script>
      <!-- <script src="{{url('admin/js/charts.js')}}"></script>
      <script src="{{url('admin/js/main.js')}}"></script> -->
      <script src="https://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
      <script src="{{url('js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
      <script src="{{url('js/dataTables.bootstrap4.min.js')}}"></script>
      <script src="{{url('js/bootstrap.min.js')}}"  type="text/javascript"></script>


        <!--Datatables UI -->
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script src="{{url('js/userdata.js')}}"></script>
      <style type="text/css">.dt-buttons{
         visibility: hidden !important;
      }
      </style>
   </body>
</html>
