@extends('layouts.calculation')
@section('content')
<style>
    .select-vivid {
    	background: url({{asset ('images/br_down.png')}}) no-repeat right;
    }

    select.form-control:disabled, select.form-control[readonly] {
        background-color: #fff !important;
    }


    .row.custom label {
        font-size: 14px;
    }
    .customWR{
        padding-bottom:20px;
    }
</style>
<script type="text/javascript">
     var valveTypeCurrentValue ="";
     var ddllabelCurrentValue ="";
	$(document).ready(function(){

        needHeight();
		function needHeight() {
			const height = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
			document.getElementsByClassName('need_height')[0].style['height'] = height + 'px';
			var footheight = $('.jsFooterBottom').innerHeight();
			$('#pagewrap').css('padding-bottom', footheight);
		}
		$(window).on('load resize', function () {
			needHeight();
        });



        function changeTabPointerOnSecondScreen() {
            if(localStorage.getItem('thvtype_status') || (localStorage.getItem('mechanismFailure_status') && localStorage.getItem('labelsize_status') && localStorage.getItem('valvetype_status'))) {
                $('#third a').css( 'cursor', 'pointer' );
            } else {
                $('#third a').css( 'cursor', 'default' );
            }
        }

        changeTabPointerOnSecondScreen()
	    if(localStorage.getItem('mechanism') && localStorage.getItem('lableSize') && localStorage.getItem('FailedValveTypeIndex'))
        {
            $('#failedValveSubmit').css('position','relative');
            var ftype= localStorage.getItem('FailedValveType');
            var lsize = localStorage.getItem('lableSize');
            var mech = localStorage.getItem('mechanismFailure_status');

            $('#ddlValveType').val(localStorage.getItem('FailedValveTypeIndex'));
            $('#ddlLableSize').html('<option value="'+lsize+'">'+lsize+'</option>');
            $('#MechanismFailure').html('<option value="'+mech+'">'+mech+'</option>');
            $('.weighing2').show();
            $('#stentid').val(localStorage.getItem('stentid'));
            $('#trueid').val(localStorage.getItem('trueid'));
            $('#valve_height').val(localStorage.getItem('vheight'));
             if( localStorage.getItem('vheight') == 0){
                $('.valve_height').hide();
            }else{
                $('.valve_height').show();
            }
            $("#ddlValveType").attr("disabled", true);
            $("#MechanismFailure").attr("disabled", true);
            $("#ddlLableSize").attr("disabled", true);
            $("#failedValveSubmit").removeClass("disable");
            /*if(localStorage.getItem('isRed') ==  'true'){
                //Tocheck
                $('.weighing2').show();
                $('.ieoa').addClass('weighing4');
                $('.color-error').html('<div style="color:red">Severe Prosthetic-Patient Mismatch<div style="margin-top: 40px;">Severe PPM of the surgical valve is associated with sub-optimal clinical outcomes after valve-in-valve.</div></div>');
            }else*/ if( localStorage.getItem('indexeoa') > 0.85 && localStorage.getItem('bmi') < 30 || localStorage.getItem('indexeoa') > 0.7 && localStorage.getItem('bmi') >= 30){
                 $('.color-error').html('No/Mild Prosthetic-Patient Mismatch.');
                $('.ieoa').addClass('weighing5');
            } else if( (localStorage.getItem('indexeoa') < 0.65 && localStorage.getItem('bmi') < 30 || localStorage.getItem('indexeoa') < 0.6 && localStorage.getItem('bmi') >= 30 ) && localStorage.getItem('indexeoa') != 0){
                     $('.weighing2').show();
                    $('.ieoa').addClass('weighing4');
                    $('.color-error').html('<div style="color:red">Severe Prosthetic-Patient Mismatch <div  class="mesg_linetwo" style="margin-top: 20px;">Severe PPM of the surgical valve is associated with sub-optimal clinical outcomes after valve-in-valve.</div></div>');
            } else if( (localStorage.getItem('indexeoa')  >= 0.65 &&  localStorage.getItem('indexeoa') <= 0.85  &&  localStorage.getItem('bmi') < 30)  ||   (localStorage.getItem('indexeoa') >= 0.6 && localStorage.getItem('indexeoa') <= 0.7 && localStorage.getItem('bmi')>=30) ){
                $('.weighing2').show();
                $('.color-error').html('Moderate Prosthetic-Patient Mismatch.');
                $('.ieoa').addClass('weighing3');
            }
                $("#eoa").val(localStorage.getItem('eoa'));
                $("#ieoa").val(localStorage.getItem('indexeoa'));
                if($("#ieoa").val() != 0){
                    $('.ieoa').show();
                }else{
                    $('.ieoa').hide();
                }
                if($("#eoa").val() != 0)
                {
                    $('.ProjectedEOA').show();
                }else{
                   $('.ProjectedEOA').hide();
                }
            $('#failedValveSubmit').attr('disabled', false);
            changeTabPointerOnSecondScreen()
        }else{
            $('#ddlValveType').val('0');
            $("#ddlLableSize").html('<option value="0">LABEL SIZE (mm)</option>')
            var dplist="<option value='Stenosis/Mixed'>Mixed/Stenosis</option>";
			    dplist+="<option value='Regurgitation'>Regurgitation</option>";
            $("#MechanismFailure").html('<option value="0">MACHANISM OF FAILURE </option>'+dplist);
            $('#failedValveSubmit').attr('disabled', true);
            $("#ddlValveType").attr("disabled", false);
            $("#failedValveSubmit").addClass("disable");
            $("#MechanismFailure").attr("disabled", false);
            $("#ddlLableSize").attr("disabled", false);
            $('.weighing2').hide();
            changeTabPointerOnSecondScreen()
        }
        var MasterArray = <?php echo json_encode($TestData); ?>;
        console.log("MasterArrayValue", MasterArray)
        //$('.weighing2').hide();
		$('#failedValveForm').on('submit', function(event){
            event.preventDefault();
            window.location.href= "{{ URL('/transcatheter-valve')}}";
            /*$("#ddlValveType").attr("disabled", false);
		    $("#MechanismFailure").attr("disabled", false);
		    $("#ddlLableSize").attr("disabled", false); */
		})

		$('.resetForm').on('click', function(){
            localStorage.removeItem('mechanism');
            localStorage.removeItem('FailedValveType');
            localStorage.removeItem('lableSize');
            localStorage.removeItem('mechanismFailure_status')
            localStorage.removeItem('labelsize_status')
            localStorage.removeItem('valvetype_status')
            localStorage.removeItem('thvtype_status')
			$('#ddlValveType').val('0');
			$("#ddlLableSize").html('<option value="0">LABEL SIZE (mm)</option>')
			var dplist="<option value='Stenosis/Mixed'>Mixed/Stenosis</option>";
			    dplist+="<option value='Regurgitation'>Regurgitation</option>";
            $("#MechanismFailure").html('<option value="0">MACHANISM OF FAILURE </option>'+dplist);
		    $('#failedValveSubmit').attr('disabled', true);
		    $("#ddlValveType").attr("disabled", false);
		    $("#MechanismFailure").attr("disabled", false);
		    $("#ddlLableSize").attr("disabled", false);
            $("#failedValveSubmit").addClass("disable");
            $('.weighing2').hide();
            $(window).scrollTop(0);

            changeTabPointerOnSecondScreen()

		});
		$("#ddlValveType").change(function(){
            localStorage.setItem('valvetype_status', $(this).val())
            $('.weighing2').hide();
            $("#failedValveSubmit").addClass("disable");
            $('#failedValveSubmit').attr('disabled', 'disabled');
            valveTypeCurrentValue = $(this).val();
            console.log('valveTypeCurrentValue')
            console.log(valveTypeCurrentValue)
            console.log(MasterArray[valveTypeCurrentValue])
            localStorage.setItem('FailedValveTypeIndex', valveTypeCurrentValue);
            $("#ddlLableSize").html('<option value="0">LABEL SIZE (mm)</option>');
            $.each(MasterArray[valveTypeCurrentValue], function(key , value){
                $("#ddlLableSize").append('<option value="'+key+'">'+key+'</option>');
                localStorage.setItem('FailedValveType', value['failed_type']);
            })
            // $("#MechanismFailure").html('<option value="0">MECHANISM OF FAILURE </option>');

	  	});
	// statict third dropdown on basis of failed valve size static values for every cases
	  	$("#ddlLableSize").change(function(){
            ddllabelCurrentValue = $(this).val();
            localStorage.setItem('labelsize_status', ddllabelCurrentValue)
			var dplist="<option value='Stenosis/Mixed'>Mixed/Stenosis</option>";
			dplist+="<option value='Regurgitation'>Regurgitation</option>";
            $("#MechanismFailure").html('<option value="0">MACHANISM OF FAILURE </option>'+dplist);
            if(localStorage.getItem('valvetype_status') && localStorage.getItem('labelsize_status') && localStorage.getItem('mechanismFailure_status')) {
                checkFailvalve();
            }
	  	});

	  	$("#MechanismFailure").change(function(){
            localStorage.setItem('mechanismFailure_status', $(this).val())
            $("#failedValveSubmit").addClass("disable");
            $('#failedValveSubmit').attr('disabled', 'disabled');

	  		$(this).attr("disabled", true);

            if($(this).val() != ""){
                if(localStorage.getItem('valvetype_status') && localStorage.getItem('labelsize_status')) {
                    checkFailvalve();
                }
                $('#failedValveSubmit').css('position','relative');
            }else{
                $('.weighing2').hide();
            }
        });

        function testMe(){
        /*    alert('ProjectedEOA  ' + JSON.stringify(MasterArray[valveTypeCurrentValue][ddllabelCurrentValue]['ProjectedEOA']));
            alert('evolut  ' + JSON.stringify(MasterArray[valveTypeCurrentValue][ddllabelCurrentValue]['evolut']));
            alert('sepian  ' + JSON.stringify(MasterArray[valveTypeCurrentValue][ddllabelCurrentValue]['sepian']));
            alert('trueid  ' + JSON.stringify(MasterArray[valveTypeCurrentValue][ddllabelCurrentValue]['trueid']));
            alert('stentid  ' + JSON.stringify(MasterArray[valveTypeCurrentValue][ddllabelCurrentValue]['stentid']));
            alert(JSON.stringify(MasterArray[valveTypeCurrentValue][ddllabelCurrentValue]));*/
        }
        function checkFailvalve()
        {
            $("#failedValveSubmit").removeClass("disable");
			$('#failedValveSubmit').attr('disabled', false);
            $('#ddlLableSize').attr("disabled", true);
            $("#ddlValveType").attr("disabled", true);
            localStorage.setItem('isRed',false);
            var failedType=document.getElementById("ddlValveType").value;
            var lable=document.getElementById("ddlLableSize").value;
            var fmechanism=document.getElementById("MechanismFailure").value;
            localStorage.setItem('mechanism', fmechanism);

            var peoa = MasterArray[valveTypeCurrentValue][ddllabelCurrentValue]['ProjectedEOA'];
            var lableSize =  MasterArray[valveTypeCurrentValue][ddllabelCurrentValue]['lable_size'];
            var evolut =  MasterArray[valveTypeCurrentValue][ddllabelCurrentValue]['evolut_size'];
            var sepian3 =  MasterArray[valveTypeCurrentValue][ddllabelCurrentValue]['sepian3_size'];
            var bvfballoonSize =  MasterArray[valveTypeCurrentValue][ddllabelCurrentValue]['bvfballoonSize'];
            var pressure = MasterArray[valveTypeCurrentValue][ddllabelCurrentValue]['atm_pressure'];
            var lblSize = localStorage.setItem('lableSize',lableSize);
            localStorage.setItem('atmpressure',pressure);
            localStorage.setItem('bvfballoonsize',bvfballoonSize);
            localStorage.setItem('evol',evolut);
            localStorage.setItem('sepian3',sepian3);
            localStorage.setItem('trueid',MasterArray[valveTypeCurrentValue][ddllabelCurrentValue]['trueid']);
            localStorage.setItem('vheight',MasterArray[valveTypeCurrentValue][ddllabelCurrentValue]['height']);
            localStorage.setItem('stentid',MasterArray[valveTypeCurrentValue][ddllabelCurrentValue]['stentid']);
            var BSA = localStorage.getItem('bsa');
            var BMI = localStorage.getItem('bmi');
            var indexeoa = ((peoa)/BSA).toFixed(3);
            localStorage.setItem('eoa',peoa);
            localStorage.setItem('indexeoa',indexeoa);
           // debugger;
            document.getElementById('stentid').value=MasterArray[valveTypeCurrentValue][ddllabelCurrentValue]['stentid'];
            document.getElementById('trueid').value=MasterArray[valveTypeCurrentValue][ddllabelCurrentValue]['trueid'];
            document.getElementById('valve_height').value=MasterArray[valveTypeCurrentValue][ddllabelCurrentValue]['height'];
            if( MasterArray[valveTypeCurrentValue][ddllabelCurrentValue]['height'] == 0){
                $('.valve_height').hide();
            }else{
                $('.valve_height').show();
            }

            $('.mukesh').show();
            // indexeoa = 0.534
            // BMI = 20
            if(indexeoa>0.85 && BMI<30 || indexeoa>0.7 && BMI>=30 )
            {
                $('.weighing2').show();
                $('.color-error').html('No/Mild Prosthetic-Patient Mismatch.');
                $('.ieoa').addClass('weighing5');
            } else if( (indexeoa<0.65 && BMI<30 || indexeoa<0.6 && BMI>=30 ) && indexeoa !=0 ){
                //red
                localStorage.setItem('isRed',true);
                $('.weighing2').show();
                $('.ieoa').addClass('weighing4');
                $('.color-error').html('<div style="color:red">Severe Prosthetic-Patient Mismatch<div style="margin-top: 20px;">Severe PPM of the surgical valve is associated with sub-optimal clinical outcomes after valve-in-valve.</div></div>');
            } else if(( indexeoa >= 0.65 && indexeoa <= 0.85  && BMI<30) || (indexeoa >= 0.6 && indexeoa <= 0.7  && BMI>=30 ))
            {
                $('.weighing2').show();
                $('.color-error').html('Moderate Prosthetic-Patient Mismatch.');
                $('.ieoa').addClass('weighing3');
            }

            document.getElementById('eoa').value = MasterArray[valveTypeCurrentValue][ddllabelCurrentValue]['ProjectedEOA'];
            if(MasterArray[valveTypeCurrentValue][ddllabelCurrentValue]['ProjectedEOA'] != 0){
                console.log('ProjectedEOA  show');
                $('.ProjectedEOA').show();
            }else{
                console.log('ProjectedEOA  hide');
                $('.ProjectedEOA').hide();
            }
            document.getElementById('ieoa').value=indexeoa;
             if(indexeoa != 0){
                $('.ieoa').show();
            }else{
                $('.ieoa').hide();
            }
            $(window).scrollTop(0);
            changeTabPointerOnSecondScreen()
        }

	    $('input,textarea').focus(function(){
		   	$(this).removeAttr('placeholder');
		});

	});
</script>
<div class="center-wrapper customWR">
    <div class="vivid-tabs">
        <ul class="nav nav-tabs">
            <li id="first" style="cursor: pointer;" onclick="NavToCal()"><a data-toggle="tab" href="#menu1" >PATIENT<br>BODY SIZE</a></li>
            <li id="second" class="active"><a data-toggle="tab" href="#menu1" style="cursor:default;">FAILED<br>VALVE</a></li>
            <li id="third" style="margin-right: 0;"><a data-toggle="tab" href="#menu2" onclick="NavToThirdOnFirstScreen()" style="cursor:default;">TRANSCATHETER<br>VALVE</a></li>
        </ul>
    </div>
    <div class="clearfix"></div>
    <div class="replace-form">
    {!! Form::open(['method'=>'post','url'=>'failed-valve','id'=>'failedValveForm']) !!}
    <div class="thv">
    	<?php
    	$s = 0;
    	$sname = "LABEL SIZE (mm)";
    	$d = false;
    	$ddl = array( "id"=>"ddlValveType", "class"=>"select-vivid form-control");
    	if(isset($dataArray['lableSize'])){
    		$d = true;
    		$tmp = explode(',', $dataArray['lableSize']);
    		$s = $dataArray['lableSize'];
    		$sname =@$tmp[0];
    		$ddl['disabled'] = true;
    	}
    	?>
    	<?php
        $valveType = array
        (
            0 => 'SELECT VALVE TYPE',
            1 => '3F',
            2 => 'Aspire',
            3 => 'Biovalsalva',
            4 => 'Magna',
            5 => 'Magna Ease',
            6 => 'CE Standard',
            7 => 'CE Supra-annular',
            8 => 'Cryolife O’Brien',
            9 => 'Enable',
            10 => 'Epic',
            11 => 'Epic Supra-annular',
            12 => 'Freedom Solo',
            13 => 'Freestyle',
            14 => 'Freestyle Valve',
            15 => 'Hancock II',
            16 => 'Intact',
            17 => 'Intuity',
            18 => 'Labcor Dokimos',
            19 => 'Labcor Porcine',
            20 => 'Mitroflow',
            21 => 'Mosaic',
            22 => 'Perceval',
            23 => 'Pericarbon Freedom',
            24 => 'Perimount',
            25 => 'Perimount 2700',
            26 => 'Prima',
            27 => 'Sorin Soprano',
            28 => 'Toronto SPV',
            29 => 'Trifecta',
        );
    	 ?>
    	{{ Form::select('valveType', $valveType, '0', $ddl) }}

    </div>

    <div class="thv">

    	<select name="lableSize" id="ddlLableSize" class="select-vivid form-control" <?php if($d){ echo "disabled" ;}?> >
            <option value=" {{$s}}">{{ $sname}} </option>
        </select>
    </div>


    <div class="thv">
    	<?php
    	$m = 0;
    	$mname = "MECHANISM OF FAILURE";
    	if(isset($dataArray['fmechanism'])){
    		$mname = $dataArray['fmechanism'];
    	}
    	?>
        <select name="fmechanism" id="MechanismFailure" class="select-vivid form-control" <?php if($d){ echo "disabled" ;}?> >
            <option value="{{ $mname }}">{{ $mname }} </option>
        </select>
    </div>
    <div class="vivid-tabs weighing weighing2 mukesh custom-mkb">
        <div class="row custom" style="justify-content: center">
            <div class="col-4 one">
                <div class="form-group">
                    <label for="height">STENT ID (mm)</label>
                    <input type="text" id="stentid" class="form-control" placeholder="??" readonly>
                </div>
            </div>
            <div class="col-4 two valve_height">
                <div class="form-group">
                    <label for="height">VALVE HEIGHT (mm)</label>
                    <input type="text" id="valve_height" class="form-control" placeholder="??" readonly>
                </div>
            </div>
            <div class="col-4 two">
                <div class="form-group">
                    <label for="height">TRUE ID (mm)</label>
                    <input type="text" id="trueid" class="form-control" placeholder="??" readonly>
                </div>
            </div>
        </div>
    </div>


    <div class="weighing weighing2">
        <div class="form-group">
            <label for="email">PRE FAILURE ECHO CHARACTERISTICS</label>
        </div>

    </div>
    <div class="vivid-tabs weighing weighing2 ProjectedEOA" style="margin-bottom:20px;display: none">
        <div class="form-group">
            <label for="email">EFFECTIVE ORIFICE AREA (cm<sup>2</sup>)</label>
            <input type="text" class="form-control" id="eoa" placeholder="??" value="{{ @$valvedata['valvedata']['ProjectedEOA'] }}" readonly>
        </div>
    </div>
    <div class="vivid-tabs weighing weighing2 weighing3 ieoa {{ @$valvedata['ResCode'] == 101 || @$valvedata['ResCode'] == 103 ?'weighing4':'' }} {{ @$valvedata['ResCode'] == 101?'weighing5':'' }}" style="display: none">
        <div class="form-group">
            <label for="email">INDEXED EOA (cm<sup>2</sup>/m<sup>2</sup>)</label>
            <?php //print_r($valvedata['ResCode']);?>
            <input type="text" class="form-control" id="ieoa" placeholder="??" value="{{ @$valvedata['ieoa'] }}" readonly>
        </div>
    </div>
    <div class="vivid-tabs weighing weighing2">
        <div class="form-group">
            <label class="color-error" for="email" style="color:#000">{{@$valvedata['Msg1']}}</label>
        </div>
            <?php echo @$valvedata['Msg2']; ?>
    </div>
    {{ Form::submit('NEXT', array('id'=>'failedValveSubmit', "class"=>"btn btn-vivid btn-block next disable customWW", 'style'=>'width:100%;bottom:0;margin-bottom:15px;','disabled'=>true)) }}
 	{!! Form::close() !!}
</div>
</div>
@endsection
