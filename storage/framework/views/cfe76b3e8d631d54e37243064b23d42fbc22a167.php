<!DOCTYPE html>

<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>VIVID</title>
    <style>
    .my-div{
      margin-top: 20px;
      margin-bottom: 20px;
      text-align: center;
      position: relative;
    }
    </style>
    <link href="<?php echo e(asset('admin/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/css/pace.min.css')); ?>" rel="stylesheet">
    <link rel="icon" href="<?php echo e(asset('images/newfav.png')); ?>" sizes="10">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
    <link href="<?php echo e(asset('admin/css/coreui-icons.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/css/flag-icon.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/css/simple-line-icons.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/css/pace.min.css')); ?>" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script type="text/javascript">

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
    <!-- <script src="<?php echo e(asset('admin/js/canvasjs.min.js')); ?>"></script> -->

    <!-- <script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script> -->

  </head>
  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <header class="app-header navbar">
      <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">
         <img class="navbar-brand-full"  src="<?php echo e(asset('images/main-logo.png')); ?>" class="img-reponsive" style="height: 22px;">
        <!-- <img class="navbar-brand-minimized" src="<?php echo e(asset('admin/img/brand/sygnet.png')); ?>" width="30" height="30" alt="CoreUI Logo"> -->
      </a>
      <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <ul class="nav navbar-nav d-md-down-none">
        <li class="nav-item px-3">
          <a class="nav-link" href="<?php echo e(url('/get-data')); ?>">Dashboard</a>
        </li>
        <li class="nav-item px-3">
          <a class="nav-link" href="<?php echo e(url('/get-data')); ?>">User Data</a>
        </li>
        <li class="nav-item px-3">
          <a class="nav-link" href="<?php echo e(url('/graph-data')); ?>">Graph Data</a>
        </li>
      </ul>
      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item d-md-down-none">
          <a class="nav-link" href="<?php echo e(url('/admin-logout')); ?>">
            <i class=""></i>Logout
          </a>
        </li>
      </ul>
      <button class="navbar-toggler aside-menu-toggler d-md-down-none" type="button" data-toggle="aside-menu-lg-show">
      </button>
      <a href="<?php echo e(url('/admin-logout')); ?>" class="navbar-toggler aside-menu-toggler d-lg-none" data-toggle="aside-menu-show" style="color: #000; right: 10px; font-size: 13px; position: relative; top: -3px;">Logout
                      <!-- <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">Logout</a>
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
                <li class="nav-item nav-dropdown">
             <a class="nav-link" href="<?php echo e(url('/get-data')); ?>">
                <i class="nav-icon icon-home"></i> Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('/get-data')); ?>">
                <i class="nav-icon icon-user"></i> User Data</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('/graph-data')); ?>">
                <i class="nav-icon icon-pie-chart"></i> Graph Data</a>
            </li>
          </ul>
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
      </div>
      <main class="main">
        <!-- Breadcrumb-->

        <div class="container-fluid">
            <div class="col-md-12 mt-4">
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
                <button type="button" id="graphdata" class="btn btn-light  btn-block">View</button>
                        </div>
                 </div>
                 </div>



            </div>

            <div class="graph text-center mt-4">
              <div class="graph text-center mt-4">
                <div class="row" style="justify-content: center; margin-bottom: 20px;">
                   <div id="myDIV">
				   <a herf="#" id="f_valveType" class="btn1" style="background-color: #FF6384;cursor:pointer;">Failed valve type</a>

                    <a herf="#" id="lableSize" class="btn1" style="background-color: #36A2EB;cursor:pointer;">Lable Size</a>

                    <a herf="#" id="mFailure" class="btn1"style="background-color: #FFCE56;cursor:pointer;">Mechanism of Failure</a>

                      <a herf="#" id="thvType" class="btn1" style="background-color: #008000;cursor:pointer;"> THV TYPE</a> </div>
            	<script>
            // Add active class to the current button (highlight it)
            var header = document.getElementById("myDIV");
            var btns = header.getElementsByClassName("btn1");
            for (var i = 0; i < btns.length; i++) {
              btns[i].addEventListener("click", function() {
              var current = document.getElementsByClassName("active");
              current[0].className = current[0].className.replace(" active", "");
              this.className += " active";
              });
            }
            </script>
                    </div>
                </div>
                <div id ="date-chart">
                <canvas id="myChart" style="height: 300px; width: 100%;"></canvas>
                <canvas id="myChart_f_valveType" style="display:none; height: 300px; width: 100%;"></canvas>
                <canvas id="myChart_lableSize" style="display:none; height: 300px; width: 100%;"></canvas>
                <canvas id="myChart_mFailure" style="display:none; height: 300px; width: 100%;"></canvas>
                <canvas id="myChart_thvType" style="display:none; height: 300px; width: 100%;"></canvas>

                  <canvas id="myChart_datepicker" style="display:none; height: 300px; width: 100%;"></canvas>
                </div>

                  <!-- <div id="chartContainer" style="height: 300px; width: 100%;"></div> -->
              </div>
              <!-- <div id="chartjs-legend" class="noselect"></div> -->
              <div class="row custom-output text-center" id="output">

              </div>
            </div>

      </main>
    </div>

    <footer class="app-footer">

    </footer>
    <!-- CoreUI and necessary plugins-->


      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
      <script src="<?php echo e(url('admin/js/jquery.min.js')); ?>"></script>
      <script src="<?php echo e(url('admin/js/popper.min.js')); ?>"></script>
      <script src="<?php echo e(url('admin/js/bootstrap.min.js')); ?>"></script>
      <script src="<?php echo e(url('admin/js/pace.min.js')); ?>"></script>
      <script src="<?php echo e(url('admin/js/perfect-scrollbar.min.js')); ?>"></script>

    <script src="<?php echo e(url('admin/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(url('admin/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(url('admin/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(url('admin/js/pace.min.js')); ?>"></script>
    <script src="<?php echo e(url('admin/js/coreui.min.js')); ?>"></script>
    <!-- Plugins and scripts required by this view-->
    <!-- <script src="<?php echo e(url('admin/js/charts.js')); ?>"></script> -->

    <!-- <script src="<?php echo e(url('admin/js/main.js')); ?>"></script> -->
    <script src="<?php echo e(url('admin/js/tooltips.js')); ?>"></script>
    <script src="<?php echo e(url('js/jquery.dataTables.min.js')); ?>" type="text/javascript"></script>
       <script src="<?php echo e(url('js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
      <script src="<?php echo e(url('js/userdata.js')); ?>"></script>

      <script type="text/javascript">


    /*    window.onload = function() {
         var data = {
                  labels: [
                  'Failed valve type',
                  'Label size',
                  'Mechanism of failure',
                  'THV Type'
                  ],
                  datasets: [{
                    data: [<?php echo @$data['ftype'];?>, <?php echo @$data['lsize'];?>, <?php echo @$data['fmach'];?>, <?php echo @$data['ttype'];?>],
                    backgroundColor: [
                      "#FF6384",
                      "#36A2EB",
                      "#FFCE56",
                      "#008000"
                    ],
                    hoverBackgroundColor: [
                      "#FF6384",
                      "#36A2EB",
                      "#FFCE56",
                      "#008000"
                    ],
                  }]
                };

                var options = {
                  animation: {
                    animateRotate: true,
                    animateScale: true
                  },
                  cutoutPercentage: 0,
                  legend: false,
                  legendCallback: function(chart) {
                    var text = [];
                    text.push('<div class="' + chart.id + '-legend">');
                    for (var i = 0; i < chart.data.datasets[0].data.length; i++) {
                      text.push('<a><span style="background-color:' + chart.data.datasets[0].backgroundColor[i] + '">');
                      if (chart.data.labels[i]) {
                        text.push(chart.data.labels[i]);
                      }
                      text.push('</span></a>');
                    }
                    text.push('</div>');
                    return text.join("");
                  },
                  tooltips: {
                    custom: function(tooltip) {
                      //tooltip.x = 0;
                      //tooltip.y = 0;
                    },
                    mode: 'single',
                    callbacks: {
                      label: function(tooltipItems, data) {
                        var sum = data.datasets[0].data.reduce(add, 0);
                        function add(a, b) {
                          return a + b;
                        }

                        return parseInt((data.datasets[0].data[tooltipItems.index] / sum * 100), 10) + ' %';
                      },
                      beforeLabel: function(tooltipItems, data) {
                        return data.labels[tooltipItems.datasetIndex] +' '+data.datasets[0].data[tooltipItems.index];
                      }
                    }
                  }
                }
                var ctx = $("#myChart");
                var myChart = new Chart(ctx, {
                  type: 'pie',
                  data: data,
                  options: options
                });
        $("#chartjs-legend").html(myChart.generateLegend());
                $("#chartjs-legend").on('click', "a", function() {
                  var ss=[<?php echo @$data['ftype'];?>, <?php echo @$data['lsize'];?>, <?php echo @$data['fmach'];?>, <?php echo @$data['ttype'];?>];
                  data.datasets[0].data[0]=ss[0];
                  data.datasets[0].data[1]=ss[1];
                  data.datasets[0].data[2]=ss[2];
                data.datasets[0].data[3]=ss[3];
                  if($(this).index()==0)
                  {


                      myChart.data.datasets[0].backgroundColor= "#FF6384";
                      myChart.data.datasets[0].hoverBackgroundColor= "#FF6384";
                      myChart.data.datasets[0].data[1]= 0;
                      myChart.data.datasets[0].data[2]= 0;
                      myChart.data.datasets[0].data[3]= 0;



                  }
                  else if($(this).index()==1){


                     myChart.data.datasets[0].backgroundColor= "#36A2EB";
                     myChart.data.datasets[0].hoverBackgroundColor= "#36A2EB";
                     myChart.data.datasets[0].data[0]= 0;
                     myChart.data.datasets[0].data[2]= 0;
                     myChart.data.datasets[0].data[3]= 0;


                  }
                   else if($(this).index()==2){


                     myChart.data.datasets[0].backgroundColor= "#FFCE56";
                     myChart.data.datasets[0].hoverBackgroundColor= "#FFCE56";
                      myChart.data.datasets[0].data[0]= 0;
                      myChart.data.datasets[0].data[1]= 0;
                      myChart.data.datasets[0].data[3]= 0;


                  }
                  else if($(this).index()==3){

                      myChart.data.datasets[0].backgroundColor= "#008000";
                      myChart.data.datasets[0].hoverBackgroundColor= "#008000";
                      myChart.data.datasets[0].data[0]= 0;
                      myChart.data.datasets[0].data[1]= 0;
                      myChart.data.datasets[0].data[2]= 0;

                  }
                  else{
                         myChart.update();
                  }
                   myChart.update();
                myChart.data.datasets[0].data[$(this).index()] += myChart.data.datasets[0].data[$(this).index()]*100;
               myChart.data.datasets[0].data[$(this).index()].hidden=true;

                  myChart.update();
                  console.log('legend: ' + data.datasets[0].data[$(this).index()]);
                });

 }*/

      $(document).ready(function(){


        //function to load default chart on ready page
        var data = {
            labels: [
            'Failed valve type',
            'Label size',
            'Mechanism of failure',
            'THV Type'
            ],
            datasets: [{
            data: [<?php echo @$data['ftype'];?>, <?php echo @$data['lsize'];?>, <?php echo @$data['fmach'];?>, <?php echo @$data['ttype'];?>],
            backgroundColor: [
                "#FF6384",
                "#36A2EB",
                "#FFCE56",
                "#008000"
            ],
            hoverBackgroundColor: [
                "#FF6384",
                "#36A2EB",
                "#FFCE56",
                "#008000"
            ],
            }]
        };

        var options = {
            animation: {
            animateRotate: true,
            animateScale: true
            },
            cutoutPercentage: 0,
            legend: false,
            legendCallback: function(chart) {
            var text = [];
            text.push('<div class="' + chart.id + '-legend">');
            for (var i = 0; i < chart.data.datasets[0].data.length; i++) {
                text.push('<a><span style="background-color:' + chart.data.datasets[0].backgroundColor[i] + '">');
                if (chart.data.labels[i]) {
                text.push(chart.data.labels[i]);
                }
                text.push('</span></a>');
            }
            text.push('</div>');
            return text.join("");
            },
            tooltips: {
            custom: function(tooltip) {
                //tooltip.x = 0;
                //tooltip.y = 0;
            },
            mode: 'single',
            callbacks: {
                label: function(tooltipItems, data) {
                var sum = data.datasets[0].data.reduce(add);
                function add(a, b) {
                    return a + b;
                }

                return parseInt((data.datasets[0].data[tooltipItems.index] / sum * 100), 10) + ' %';
                },
                beforeLabel: function(tooltipItems, data) {
                return data.labels[tooltipItems.index] +' '+data.datasets[0].data[tooltipItems.index];
                }
            }
            }
        }
        var ctx = $("#myChart");
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: options
        });

        $("#f_valveType").click(function(){
           $("#myChart").hide();
           $("#myChart_datepicker").hide();
           $("#myChart_f_valveType").remove();
            $("#date-chart").append('<canvas id="myChart_f_valveType" style="display:none; height: 300px; width: 100%;"></canvas>');
            $("#myChart_f_valveType").show();
            $("#myChart_lableSize").hide();
             $("#myChart_mFailure").hide();
               $("#myChart_thvType").hide();
               var dt1 = $("#datepicker_from").val();
               var dt2 = $("#datepicker_to").val();
            $.ajax({
                  url:"get-valve-data",
                  type:"get",
                  data:{dt1:dt1,dt2:dt2},
                  success:function(response)
                  {
                    /*alert(response);*/
                    var obj = JSON.parse(response);
                    const colors = ["#C2272D", "#F8931F", "#FFFF01", "#009245", "#0193D9", "#0C04ED", "#612F90","#0000ff","#3cb371","#ee82ee","#ffa500","#6a5acd","#FFFF00","FFFF00","#8E388E","#DDA8DD"];
                    var cakegraph="";
                    var dlabel=[];
                    var mycolor=[];
                    var ddata=[];
                    $.each(obj,function(key, value){
                      dlabel[key]= value.failedValueType;
                      mycolor[key]= colors[key];
                      ddata[key]=  value.total;
                      cakegraph+= '<div class="col-sm-2"><p><label class="value_bold">'+value.failedValueType+'</label></p><button class="btn btn-primary" style="padding: 10px 32px; background-color:'+colors[key]+'"></button><p><label class="value_underline">'+value.total+'</label></p></div>';
                    });
                    $("#output").html(cakegraph);
                    // graph data to plot new graph
                    var data = {
                              labels: dlabel,
                              datasets: [{
                                data: ddata,
                                backgroundColor: mycolor,
                                hoverBackgroundColor: mycolor,
                              }]
                            };

                            var options = {
                                animation: {
                                  animateRotate: true,
                                  animateScale: true
                                },
                                cutoutPercentage: 0,
                                legend: false,
                                tooltips: {
                                  custom: function(tooltip) {
                                    //tooltip.x = 0;
                                    //tooltip.y = 0;
                                  },
                                  mode: 'single',
                                  callbacks: {
                                    label: function(tooltipItems, data) {
                                      var sum = data.datasets[0].data.reduce(add, 0);
                                      function add(a, b) {
                                        return a + b;
                                      }

                                      return parseInt((data.datasets[0].data[tooltipItems.index] / sum * 100), 10) + ' %';
                                    },
                                    beforeLabel: function(tooltipItems, data) {
                                      return data.labels[tooltipItems.index] +' '+data.datasets[0].data[tooltipItems.index] ;
                                    }
                                  }
                                }
                            }
                            var ctx = $("#myChart_f_valveType");
                            var myChart = new Chart(ctx, {
                              type: 'pie',
                              data: data,
                              options: options
                            });
                myChart.update();
                  }
                });
        });

        $( "#f_valveType" ).trigger( "click" );

        $("#lableSize").click(function(){
           $("#myChart").hide();
            $("#myChart_f_valveType").hide();
            //$("#myChart_lableSize").show();
             $("#myChart_lableSize").remove();
            $("#date-chart").append('<canvas id="myChart_lableSize" style="display:none; height: 300px; width: 100%;"></canvas>');
            $("#myChart_lableSize").show();

             $("#myChart_mFailure").hide();
               $("#myChart_thvType").hide();
               $("#myChart_datepicker").hide();
               var dt1 = $("#datepicker_from").val();
               var dt2 = $("#datepicker_to").val();
            $.ajax({
                  url:"get-lablesize-data",
                  type:"get",
                  data:{dt1:dt1,dt2:dt2},
                  success:function(response)
                  {
                    var obj = JSON.parse(response);
                    const colors = ["#C2272D", "#F8931F", "#FFFF01", "#009245", "#0193D9", "#0C04ED", "#612F90","#7FFFD4", "#639DBA", "#1B5673", "#1B735C", "#414A48", "#56794E", "#0B2D05","#7385DF", "#A24237", "#EADCDA", "#F3E4A9", "#73726C"];
                    var cakegraph="";
                    var dlabel=[];
                    var mycolor=[];
                    var ddata=[];
                    $.each(obj,function(key, value){
                      dlabel[key]= value.lableSize;
                      mycolor[key]= colors[key];
                      ddata[key]=  value.total;
                      cakegraph+= '<div class="col-sm-2"><p><label class="value_bold">'+value.lableSize+'</label></p><button class="btn btn-primary" style="padding: 10px 32px; background-color:'+colors[key]+'"></button><p><label class="value_underline">'+value.total+'</label></p></div>';
                    });
                    $("#output").html(cakegraph);
                    // graph data to plot new graph
                    var data = {
                              labels: dlabel,
                              datasets: [{
                                data: ddata,
                                backgroundColor: mycolor,
                                hoverBackgroundColor: mycolor,
                              }]
                            };

                            var options = {
                              animation: {
                                animateRotate: true,
                                animateScale: true
                              },
                              cutoutPercentage: 0,
                              legend: false,
                              tooltips: {
                                custom: function(tooltip) {
                                  //tooltip.x = 0;
                                  //tooltip.y = 0;
                                },
                                mode: 'single',
                                callbacks: {
                                  label: function(tooltipItems, data) {
                                    var sum = data.datasets[0].data.reduce(add, 0);
                                    function add(a, b) {
                                      return a + b;
                                    }

                                    return parseInt((data.datasets[0].data[tooltipItems.index] / sum * 100), 10) + ' %';
                                  },
                                  beforeLabel: function(tooltipItems, data) {
                                    return data.labels[tooltipItems.index] +' '+data.datasets[0].data[tooltipItems.index] ;
                                  }
                                }
                              }
                            }
                            var ctx = $("#myChart_lableSize");
                            var myChart = new Chart(ctx, {
                              type: 'pie',
                              data: data,
                              options: options
                            });
                              myChart.update();

                  }
                });
        });

        $("#mFailure").click(function(){
             $("#myChart").hide();
            $("#myChart_f_valveType").hide();
            $("#myChart_lableSize").hide();
            $("#myChart_mFailure").remove();
            $("#date-chart").append('<canvas id="myChart_mFailure" style="display:none; height: 300px; width: 100%;"></canvas>');
             $("#myChart_mFailure").show();
               $("#myChart_thvType").hide();
               $("#myChart_datepicker").hide();
               var dt1 = $("#datepicker_from").val();
               var dt2 = $("#datepicker_to").val();
            $.ajax({
                  url:"get-mechanism-data",
                  type:"get",
                  data:{dt1:dt1,dt2:dt2},
                  success:function(response)
                  {
                    var obj = JSON.parse(response);
                    const colors = ["#C2272D", "#F8931F"];
                    var cakegraph="";
                    var dlabel=[];
                    var mycolor=[];
                    var ddata=[];
                    $.each(obj,function(key, value){
                      dlabel[key]= value.failureMechanism;
                      mycolor[key]= colors[key];
                      ddata[key]=  value.total;
                      cakegraph+= '<div class="col-sm-2"><p><label class="value_bold">'+value.failureMechanism+'</label></p><button class="btn" style="padding: 10px 32px; background-color:'+colors[key]+'"></button><p><label class="value_underline">'+value.total+'</label></p></div>';
                    });
                    $("#output").html(cakegraph);
                    // graph data to plot new graph
                    var data = {
                              labels: dlabel,
                              datasets: [{
                                data: ddata,
                                backgroundColor: mycolor,
                                hoverBackgroundColor: mycolor,
                              }]
                            };

                            var options = {
                              animation: {
                                animateRotate: true,
                                animateScale: true
                              },
                              cutoutPercentage: 0,
                              legend: false,
                              tooltips: {
                                custom: function(tooltip) {
                                  //tooltip.x = 0;
                                  //tooltip.y = 0;
                                },
                                mode: 'single',
                                callbacks: {
                                  label: function(tooltipItems, data) {
                                    var sum = data.datasets[0].data.reduce(add, 0);
                                    function add(a, b) {
                                      return a + b;
                                    }

                                    return parseInt((data.datasets[0].data[tooltipItems.index] / sum * 100), 10) + ' %';
                                  },
                                  beforeLabel: function(tooltipItems, data) {
                                    return data.labels[tooltipItems.index] +' '+data.datasets[0].data[tooltipItems.index] ;
                                  }
                                }
                              }
                            }
                            var ctx = $("#myChart_mFailure");
                            var myChart = new Chart(ctx, {
                              type: 'pie',
                              data: data,
                              options: options
                            });
                           myChart.update();

                  }
                });
        });
        $("#thvType").click(function(){
            $("#myChart").hide();
            $("#myChart_f_valveType").hide();
            $("#myChart_lableSize").hide();
            $("#myChart_mFailure").hide();
            $("#myChart_thvType").remove();
            $("#date-chart").append('<canvas id="myChart_thvType" style="display:none; height: 300px; width: 100%;"></canvas>');
            $("#myChart_thvType").show();
            $("#myChart_datepicker").hide();
            var dt1 = $("#datepicker_from").val();
            var dt2 = $("#datepicker_to").val();
            $.ajax({
                  url:"get-thv-data",
                  type:"get",
                  data:{dt1:dt1,dt2:dt2},
                  success:function(response)
                  {
                    var obj = JSON.parse(response);
                    const colors = ["#C2272D", "#F8931F"];
                    var cakegraph="";
                    var dlabel=[];
                    var mycolor=[];
                    var ddata=[];
                    $.each(obj,function(key, value){
                      dlabel[key]= value.thvType;
                      mycolor[key]= colors[key];
                      ddata[key]=  value.total;

                      cakegraph+= '<div class="col-sm-2"><p><label class="value_bold">'+value.thvType+'</label></p><button class="btn btn-primary" style="padding: 10px 32px; background-color:'+colors[key]+'"></button><p><label class="value_underline">'+value.total+'</label></p></div>';
                    /*cakegraph+= "<label>"+value.thvType+"</label><br /><button class='btn-primary' style='padding: 10px 32px; background-color:"+colors[key]+ "'></button><br /><label>"+value.total+"</label>";*/


                    });
                    // plot graph for thv type

                    $("#output").html(cakegraph);

                    var data = {
                              labels: dlabel,
                              datasets: [{
                                data: ddata,
                                backgroundColor: mycolor,
                                hoverBackgroundColor: mycolor,
                              }]
                            };

                            var options = {
                              animation: {
                                animateRotate: true,
                                animateScale: true
                              },
                              cutoutPercentage: 0,
                              legend: false,
                              tooltips: {
                                custom: function(tooltip) {
                                  //tooltip.x = 0;
                                  //tooltip.y = 0;
                                },
                                mode: 'single',
                                callbacks: {
                                  label: function(tooltipItems, data) {
                                    var sum = data.datasets[0].data.reduce(add, 0);
                                    function add(a, b) {
                                      return a + b;
                                    }

                                    return parseInt((data.datasets[0].data[tooltipItems.index] / sum * 100), 10) + ' %';
                                  },
                                  beforeLabel: function(tooltipItems, data) {
                                    return data.labels[tooltipItems.index] +' '+data.datasets[0].data[tooltipItems.index] ;
                                  }
                                }
                              }
                            }
                            var ctx = $("#myChart_thvType");
                            var myChart = new Chart(ctx, {
                              type: 'pie',
                              data: data,
                              options: options
                            });
                              myChart.update();

                  }
                });
        });
      });

    </script>
  </body>
</html>
