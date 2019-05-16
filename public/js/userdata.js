$(document).ready(function() {



    /*Code to serach data in graph*/
    $("#graphdata").click(function(){

        $("#myChart").hide();
        $("#myChart_f_valveType").hide();
        $("#myChart_lableSize").hide();
        $("#myChart_mFailure").hide();
        $("#myChart_thvType").hide();
        $("#myChart_datepicker").remove();
        $("#date-chart").append('<canvas id="myChart_datepicker" style="display:none; height: 300px; width: 100%;"></canvas>');
         $("#myChart_datepicker").show();
        var dt1 = $("#datepicker_from").val();
        var dt2 = $("#datepicker_to").val();
        var getUrl = "search-graph";
        $.ajax({
            url:getUrl,
            type:"get",
            data:{dt1:dt1,dt2:dt2},
            success:function(data)
            {
                var obj=JSON.parse(data);
                var ftype=obj.ftype;
                var lsize=obj.lsize;
                var fmach=obj.fmach;
                var ttype=obj.ttype;
                var data = {
                  labels: [
                  'Failed valve type',
                  'Label size',
                  'Mechanism of failure',
                  'THV Type'
                  ],
                  datasets: [{
                    data: [ftype,lsize,fmach,ttype],
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
                        return data.labels[tooltipItems.index] +' '+data.datasets[0].data[tooltipItems.index] ;
                      }
                    }
                  }
                }
                var ctx = $("#myChart_datepicker");
                var myChart = new Chart(ctx, {
                  type: 'pie',
                  data: data,
                  options: options
                });
                myChart.update();
               /* $("#chartjs-legend").html(myChart.generateLegend());
                $("#chartjs-legend").on('click', "a", function() {
                     var ss=[ftype,lsize,fmach,ttype];
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
                });*/
                /*$('#myChart').on('click', function(evt) {
                  var activePoints = myChart.getElementsAtEvent(evt);
                  var firstPoint = activePoints[0];
                  if (firstPoint !== undefined) {
                    console.log('canvas: ' + data.datasets[firstPoint._datasetIndex].data[firstPoint._index]);
                  } else {
                    myChart.data.labels.push("New");
                    myChart.data.datasets[0].data.push(100);
                    myChart.data.datasets[0].backgroundColor.push("red");
                    myChart.options.animation.animateRotate = false;
                    myChart.options.animation.animateScale = false;
                    myChart.update();
                    $("#chartjs-legend").html(myChart.generateLegend());
                  }
                });*/
            }
        });
    });
    /*close Code to diaply serach data in graph*/



    /*Code to cheked checkboxes to delete data from table*/

    $("#checkall").click(function(){
        if(this.checked)
        {
            $(".checkbox").each(function(){
                this.checked=true;
            });
        }else{
            $(".checkbox").each(function(){
                this.checked=false;
            });
        }
    });

    /* close Code to cheked checkboxes data from table*/

    /*Code to get cheked checkboxes from table*/
    $("#delete").on('click', function(){
        var dataArr = new Array();
        if($("input:checkbox:checked").length>0)
        {
            $("input:checkbox:checked").each(function(){
                dataArr.push($(this).attr("id"));
                $(this).closest('tr').remove();
            });
            console.log(dataArr);
            sendResponse(dataArr)

        }else{
            alert("No Record Selected");
        }
    });
    /*close Code to cheked checkboxes from table*/

    /*Code to cheked checkboxes delete data from table*/
    function sendResponse(dataArr)
    {
        console.log('dataarr')
        console.log(dataArr)
        var getUrl = "delete-data";
        $.ajax({
            url:getUrl,
            type:"get",
            data:{id:dataArr},
            success:function(data)
            {
                //debugger;
                console.log('111111')
                console.log(data);
                //dataTable.ajax.reload();
                //$('#student_table').DataTable().ajax.reload();
                //$('#example').DataTable().clear();
                //$('#example').DataTable().draw('full-reset');
            },
            error:function(error){
                alert(error);
            }
        });
    }
    /* close Code to cheked checkboxes to delete data from table*/



    // DataTable
    var table =  $('#example').DataTable( {
          "destroy": true,
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],

        aoColumnDefs: [
                    {
                       bSortable: false,
                       aTargets: [ 0 ],
                      'targets': 0
                    }
                  ]
    } );


        /*Code to export data from table*/

        $("#export").on('click',function(e){
        $.fn.dataTableExt.afnFiltering.length = 0;
         $('#example').dataTable().fnDraw();
            var dt1 = $("#datepicker_from1").val();
            var dt2 = $("#datepicker_to1").val();
            if(dt1 != "" && dt2 != ""){
                filterByDate(1, dt1, dt2);
                $('#example').DataTable().draw();
                $('#example').DataTable().button( '.buttons-csv' ).trigger();

            } else {

                $('#example').DataTable().button( '.buttons-csv' ).trigger();
            }

        });

    /*close Code to export data from table*/

   /*Code to serach data in table*/

    $("#view").on('click',function(e){
        e.preventDefault();
         $.fn.dataTableExt.afnFiltering.length = 0;
         $('#example').dataTable().fnDraw();
         var dt1 = $("#datepicker_from").val();
        var dt2 = $("#datepicker_to").val();
        filterByDate(1, dt1, dt2); // We call our filter function
       $('#example').DataTable().draw(); // Manually redraw the table after filtering
       //$('#example').DataTable().button( '.buttons-csv' ).trigger();

    });
    var filterByDate = function(column, dt1, dt2) {
  // Custom filter syntax requires pushing the new filter to the global filter array
        $.fn.dataTableExt.afnFiltering.push(
            function( oSettings, aData, iDataIndex ) {
            var rowDate = aData[column],
            start = dt1,
            end = dt2;

          // If our date from the row is between the start and end
          if (start <= rowDate && rowDate <= end) {
            return true;
          } else if (rowDate >= start && end === '' && start !== ''){
            return true;
          } else if (rowDate <= end && start === '' && end !== ''){
            return true;
          } else {
            return false;
          }
        }
        );
    };
// converts date strings to a Date object, then normalized into a YYYYMMMDD format (ex: 20131220). Makes comparing dates easier. ex: 20131220 > 20121220
/*var normalizeDate = function(dateString) {
  var date = new Date(dateString);
  var normalized = date.getFullYear() + '' + (("0" + (date.getMonth() + 1)).slice(-2)) + '' + ("0" + date.getDate()).slice(-2);
  return normalized;
}*/

    /*close serch code in table */






// Setup - add a text input to each footer cell
$('#example tfoot th').each( function (i) {
  if(i==0){}
    else{
    var title = $(this).text();
    $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
  }
} );

// Apply the Search
table.columns().every( function () {
    var that = this;

    $( 'input', this.footer() ).on( 'keyup change', function () {
        if ( that.search() !== this.value ) {
            that
                .search( this.value )
                .draw();
        }
    } );
} );

$("#datepicker_from").datepicker({
    buttonImageOnly: false,
    dateFormat: 'dd-mm-yy',
    "onSelect": function(date) {
        minDateFilter = new Date(date).getTime();
    }
});

$("#datepicker_to").datepicker({
    buttonImageOnly: false,
    dateFormat: 'dd-mm-yy',
    "onSelect": function(date) {
    maxDateFilter = new Date(date).getTime();
    }
});


$("#datepicker_from1").datepicker({
    buttonImageOnly: false,
    dateFormat: 'dd-mm-yy',
    "onSelect": function(date) {
        minDateFilter = new Date(date).getTime();
    }
});


$("#datepicker_to1").datepicker({
    buttonImageOnly: false,
    dateFormat: 'dd-mm-yy',
    "onSelect": function(date) {
    maxDateFilter = new Date(date).getTime();
    }
});

});
