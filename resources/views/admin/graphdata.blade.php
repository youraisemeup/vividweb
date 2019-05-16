<!DOCTYPE html>
<html class="st-layout ls-top-navbar ls-bottom-footer show-sidebar sidebar-l1 sidebar-r1-xs" lang="en">
   <!-- Mirrored from themekit.frontendmatter.com/dist/themes/real-estate/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Jan 2019 05:47:16 GMT -->
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>VIVID</title>
      <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
      <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
      <link href="{{asset('css/style.css')}}" rel="stylesheet">
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <link rel="icon" href="{{asset('images/diamond.png')}}" sizes="10">
      <script src="{{url('js/jquery-3.3.1.min.js')}}"></script>
      <script src="{{url('js/bootstrap.min.js')}}"  type="text/javascript"></script>
      <script src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>
      <script type="text/javascript">
        window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer", {
          theme: "light1", //"light1", "light2", "dark1", "dark2"
          animationEnabled: true,
          title: {
          },
          data: [{
            type: "pie",
            startAngle: 25,
            toolTipContent: "<b>{label}</b>: {y}%",
            showInLegend: "true",
            legendText: "{label}",
            indexLabelFontSize: 16,
            indexLabel: "{label} - {y}%",
            dataPoints: [
              { y: 51.08, label: "Failed valve type" },
              { y: 27.34, label: "Label size" },
              { y: 10.62, label: "Mechanism of failure" },
              { y: 5.02, label: "Thv type" }
            ]
          }]
        });
        chart.render();

        }      
    </script>
   </head>
   <body>
      <div class="wrapper graph">
          
          
          <nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding: .5rem 1rem;">
              
  <a class="navbar-brand" href="javascript:;"><img src="images/main-logo.png"> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{('/get-data')}}">User Data <span class="sr-only">(current)</span></a>
      </li>      
              <li class="nav-item active">
        <a class="nav-link" href="#">Graph <span class="sr-only">(current)</span></a>
      </li> 
    </ul>
<a class="text-dark" href="{{('/admin-logout')}}">Logout </a>
  </div>
</nav>
          
          
         <div class="container-fluid">
             <div class="row mt-4">
                  <div class="col-md-6">
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
                  </div></div>
                    </div>
                 </div>
                  
                </form>
                <div class="row">
                    <div class="offset-2 col-10">
                <button type="button" id="submit" class="btn btn-light  btn-block">View</button>
                        </div>
                 </div>
                 </div>
                 
                 
           <!--  <div class="col-md-5">
                 <label class="mb-4">View Data</label>
                 <form class="form-inline mb-2" action="/action_page.php">
                  <div class="form-group">
                    <label for="from">From: </label>
                    <input type="text" class="form-control" id="datepicker_from">
                  </div>
                  <div class="form-group">
                    <label for="to">To: </label>
                    <input type="text" class="form-control" id="datepicker_to">
                  </div>
                </form>
                 <div class="form-group">
                <button type="button" id="submit" class="btn btn-light  btn-block" style="width: 90%; margin: auto; margin-right: 20px;">View</button>
                 </div>
                 </div>-->
             </div>
         </div>
          <div class="container">
            <div class="graph text-center mt-4">
              <div class="graph text-center mt-4">
                  <div id="chartContainer" style="height: 300px; width: 100%;"></div>
              </div>
            </div>
          </div>
      
      </div>
   </body>
    <script src="{{url('js/jquery-3.3.1.js')}}"></script>
       <script src="{{url('js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
       <script src="{{url('js/dataTables.bootstrap4.min.js')}}"></script>               
      <script src="{{url('js/bootstrap.min.js')}}"  type="text/javascript"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.4/js/bootstrap-datetimepicker.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
      <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
   <script src="{{url('js/userdata.js')}}"></script>
</html>