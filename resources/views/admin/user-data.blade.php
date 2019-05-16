<html>
<head>
    <style type="text/css">
        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }
    </style>
    
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet">
</head>
<body>
    <h3 align="right">Welcome {{ session()->get('admin.username') }}</h3>
    <span style="margin-left:1250px"><a href="{{ url('/admin-logout')}}">Logout</a></span>
    <p id="date_filter">
        <h2 style="margin-left:100px;">View Data</h2>
        <span id="date-label-from" class="date-label">From: </span><input class="date_range_filter date" type="text" id="datepicker_from" />
        <span id="date-label-to" class="date-label">To:<input class="date_range_filter date" type="text" id="datepicker_to" /><br/><br/>
            <input type="button" style="margin-left:100px;" id="view" name="view" value="View">
    </p>
    <table id="example" class="display" style="width:100%">
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
    <p id="date_filter">
        <h2 style="margin-left:100px;">Export Report</h2>
        <span id="date-label-from" class="date-label">From: </span><input class="date_range_filter date" type="text" id="datepicker_from1" />
        <span id="date-label-to" class="date-label">To:<input class="date_range_filter date" type="text" id="datepicker_to1" /><br/><br/>
            <input type="button" id="export" style="margin-left:100px;" name="export" value="Export">
    </p>
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script src="{{url('js/userdata.js')}}"></script>
    <script type="text/javascript">  
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'csvHtml5'
        ]
    } );  
    </script>
</html>