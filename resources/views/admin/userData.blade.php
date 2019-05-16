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
       <link href="{{asset('css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
       <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
      <link rel="icon" href="{{asset('images/diamond.png')}}" sizes="10">
       
       
   </head>
   <body>
      <div class="wrapper">
          
          
          <nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding: .5rem 1rem;">
              
  <a class="navbar-brand" href="javascript:;"><img src="{{url('images/main-logo.png')}}"> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="#">User Data <span class="sr-only">(current)</span></a>
        </li>      
        <li class="nav-item active">
            <a class="nav-link" href="{{('/graph-data')}}">Graph <span class="sr-only">(current)</span></a>
        </li> 
    </ul>
    <a class="text-dark" href="{{('/admin-logout')}}">Logout </a>
  </div>
</nav>
                   
       <div class="container-fluid">
            <div class="row mt-4">
             <div class="col-md-5">
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
                <button type="button" id="view" class="btn btn-light  btn-block" style="width: 90%; margin: auto; margin-right: 20px;">View</button>
                 </div>
                 </div>
             </div>
         </div>
          <div class="container table-responsive">
          <div class="datatable mt-5">
              <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="checkall" name="checkme"></th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Email</th>
                        <th>Height</th>
                        <th>Weight</th>
                        <th>Failed valve type</th>
                        <th>Label Size</th>
                        <th>Machanism of failure</th>
                        <th>Thv type</th>
                        <th>User Ip</th>
                    </tr>
                </thead>
                <tbody id="data">
                    @foreach($user as $data)    
                    <tr>
                        <td><input type="checkbox" id="checkall" name="checkme" value="{{ $data->id }}"></td>
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
                </tbody>
            </table>

            </div>
          </div>
            <div class="row mt-4">
             <div class="col-md-5">
                <label class="mb-4">Export Data</label>
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
                <button type="button" class="btn btn-light  btn-block" style="width: 90%; margin: auto; margin-right: 20px;">Export</button>
                 </div>
                 </div>
      </div>
        <script src="{{url('js/jquery-3.3.1.js')}}"></script>
       <script src="{{url('js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
       <script src="{{url('js/dataTables.bootstrap4.min.js')}}"></script>               
      <script src="{{url('js/bootstrap.min.js')}}"  type="text/javascript"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.4/js/bootstrap-datetimepicker.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
      <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
      <script src="{{url('js/userdata.js')}}"></script>
       <script type="text/javascript">
        $(document).ready(function() {
        // Setup - add a text input to each footer cell
            $('#example tfoot th').each( function () {
                var title = $(this).text();
                $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
            } );
         
            // DataTable
            var table = $('#example').DataTable();
         
            // Apply the search
            table.columns().every( function () {
                var that = this;
         
                $( 'input', this.footer() ).on( 'keyup change', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                });
            });
        });
       </script>
   </body>
</html>