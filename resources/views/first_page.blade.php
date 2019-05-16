@extends('layouts.calculation')
@section('content')

<script type="text/javascript">
	$(document).ready(function(){

        function keyboardCheck() {
            var _originalSize = $(window).width() + $(window).height()
            $(window).resize(function(){
                if($(window).width() + $(window).height() != _originalSize){
                    console.log("keyboard show up");
                    $("body").css("position","relative");
                }else{
                    console.log("keyboard closed");
                    $("body").css("position","fixed");
                }
            });
        }

        function changeTabPointer() {
            if(localStorage.getItem('mechanismFailure_status') && localStorage.getItem('labelsize_status') && localStorage.getItem('valvetype_status')) {
                $('#second a').css( 'cursor', 'pointer' );
            } else {
                $('#second a').css( 'cursor', 'default' );
            }

            if(localStorage.getItem('bmi')) {
                $('#second a').css( 'cursor', 'pointer' );
            }

            if(localStorage.getItem('thvtype_status')) {
                $('#third a').css( 'cursor', 'pointer' );
            } else {
                $('#third a').css( 'cursor', 'default' );
            }
        }

        changeTabPointer()

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

        // $(window).scrollTop(0);
		$( ".focusClass" ).focusin(function() {
		  	// $('body').css('position','unset');
            // keyboardCheck()
		});
		$( ".focusClass" ).focusout(function() {
		  	// if($(this).val() ==''){
		  	//     $('body').css('position','fixed');
		  	// }
        });
		if(localStorage.getItem('wt')){
            showPatientResults();
			$('body').css('position','unset');
			$('.custom-re-button').addClass('custom-re-button-r');
			if(localStorage.getItem('type') =='in'){
				$('#home').closest('li').removeClass('active');
				$('#menu1').closest('li').addClass('active');
				$("label[for=height]").html('HEIGHT (in)') ;
				$("label[for=weight]").html('WEIGHT (lb)') ;
			}
			//check already localstorage to fill
			$('#input_height').val(localStorage.getItem('ht'));
			$('#input_weight').val(localStorage.getItem('wt'));
			$('#cal_bsa').val(localStorage.getItem('bsa'));
			$('#cal_bmi').val(localStorage.getItem('bmi'));
			$('#input_height').attr( "readonly" , true );
			$('#input_weight').attr( "readonly" , true );
			//$('#error').parents('.weighing2').hide();
			//$(".calculationSection").show();
			$('#calculatBtn').attr('disabled', false);
			$('#calculatBtn').removeClass('disable');
		} else {
			localStorage.setItem('type','cm');
			$('#calculatBtn').addClass('disable');
			$('#calculatBtn').attr('disabled', true);
			$("div .weighing2").css("display","none");
		}

		$('#calculationForm').on('submit', function(event){
            event.preventDefault();
            window.location.href= "{{ URL('/failed-valve')}}";
		})

		$('body').on('click','.calType ul li', function(){
            localStorage.removeItem('mechanismFailure_status')
            localStorage.removeItem('labelsize_status')
            localStorage.removeItem('valvetype_status')
            localStorage.removeItem('thvtype_status')
			$(this).siblings('li').removeClass('active');
			$(this).addClass('active');
			$('#calculatBtn').addClass('disable');

			$('#error').parents('.weighing2').hide();
			localStorage.clear();
			if($(this).text() == 'IMPERIAL'){
				localStorage.setItem('type','in');
				$("label[for=height]").html('HEIGHT (in)') ;
				$("label[for=weight]").html('WEIGHT (lb)') ;
				$('input#measurement_type').val('IMPERIAL');
				$('#calculatBtn').attr('disabled', true);
				$('.calculationSection').hide();
				$('#cal_bsa').val('');
				$('#cal_bmi').val('');
			}else if($(this).text() == 'METRIC'){
				localStorage.setItem('type','cm');
				$("label[for=height]").html('HEIGHT (cm)') ;
				$("label[for=weight]").html('WEIGHT (kg)') ;
				$('input#measurement_type').val('METRIC');
				$('#calculatBtn').attr('disabled', true);
				$('.calculationSection').hide();
				$('#cal_bsa').val('');
				$('#cal_bmi').val('');
			}
			$('#input_height').val('');
			$('#input_weight').val('');
            $('.focusClass').attr("readonly", false);
            changeTabPointer()
		})

		$('.focusClass').change(function() {
			if($(this).val() != ''){
                //$( this ).attr( "readonly" , "true" );
                console.log('input_height',$('#input_height').val())
                console.log('input_weight',$('#input_weight').val())
                if($('#input_height').val() != '') {
                    localStorage.setItem('ht', $('#input_height').val())
                }
                if($('#input_weight').val() != '' ) {
                    localStorage.setItem('wt', $('#input_weight').val())
                }

			    if($('#input_height').val() != '' && $('#input_weight').val() != '' ){
			    	$('#calculatBtn').removeClass('disable');
			    	$('#calculatBtn').attr('disabled', false);
			    	$('#input_height').attr( "readonly" , true );
			    	$('#input_weight').attr( "readonly" , true );
			    	showPatientResults();
			    	// $(window).scrollTop(0);
			    }
			}
		});

		$('.focusClass').on('keyup', function(event) {
			if (event.keyCode === 13) {
				if($(this).val() != ''){
				    //$( this ).attr( "readonly" , "true" );
				    if($('#input_height').val() != '' && $('#input_weight').val() != '' ){
				    	$('#calculatBtn').removeClass('disable');
				    	$('#calculatBtn').attr('disabled', false);
				    	$('#input_height').attr( "readonly" , true );
				    	$('#input_weight').attr( "readonly" , true );
				    	showPatientResults();
				    	// $(window).scrollTop(0);
				    }
				}
			}
        });

		function showPatientResults(){
			$('body').css('position','unset');
			$('.custom-re-button').addClass('custom-re-button-r');
			var type = $('.calType ul li.active').find('a').text();
            var height = localStorage.getItem('ht') ? localStorage.getItem('ht') : $('#input_height').val();
            console.log('222')
            console.log(height)
	    	localStorage.setItem('ht',height);
	    	var weight = localStorage.getItem('wt') ? localStorage.getItem('wt') : $('#input_weight').val();
	    	localStorage.setItem('wt',weight);
		    if(type == "METRIC")
			{
				if((height <= 250 && height >= 100 ) && (weight <= 300 && weight >= 30 ))
				{
					var bsa = Math.sqrt((height * weight)/3600).toFixed(2);
					localStorage.setItem('bsa', bsa);
					var divivde = height/100;
					var bmi = (weight/Math.pow((divivde),2)).toFixed(1);
					localStorage.setItem('bmi', bmi);
					$('#error').parents('.weighing2').hide();
					$(".calculationSection").show();
					$("#cal_bsa").val(bsa);
					$("#cal_bmi").val(bmi);
				} else {
					if( (height > 250 || height < 100) && (weight > 300 || weight < 30) ){
						//error for wrong height
						$(".calculationSection").hide();
						$('#calculatBtn').attr('disabled', true);
						$("#input_height").attr("readonly", false);
						$("#input_weight").attr("readonly",false);
						$('#error').parents('.weighing2').show();
						$('#err-msg').html('Please enter correct values <br> Please enter height in cm, between 100-250cm <br> Please enter weight in kg, between 30-300kg');
						$('#calculatBtn').addClass('disable');

					} else	if(height > 250 || height < 100){
					 	//error for wrong wieght

						$(".calculationSection").hide();
						$('#calculatBtn').attr('disabled', true);
						$("#input_height").attr("readonly", false);
						$('#error').parents('.weighing2').show();
						$('#err-msg').html('Please enter correct values <br> Please enter height in cm, between 100-250cm');
						$('#calculatBtn').addClass('disable');

					} else	if(weight > 300 || weight < 30 ){
					 	//error for wrong wieght
						$(".calculationSection").hide();
						$('#calculatBtn').attr('disabled', true);
						$("#input_weight").attr("readonly",false);
						$('#error').parents('.weighing2').show();
						$('#err-msg').html('Please enter correct values <br> Please enter weight in kg, between 30-300kg');
						$('#calculatBtn').addClass('disable');
					} else {
                        $('#error').parents('.weighing2').hide();
                    }
				}
			}else if(type == "IMPERIAL"){
				if((height <= 99 && height >= 39 ) && (weight <= 661 && weight >= 66 ))
				{
					var ht = height*2.54;
					var wt = weight*0.4535;
					var bsa = Math.sqrt((ht * wt)/3600).toFixed(2);
					localStorage.setItem('bsa', bsa);
					var divivde = ht/100;
					var bmi = (wt/Math.pow((divivde),2)).toFixed(1);
					localStorage.setItem('bmi', bmi);
					$('#error').parents('.weighing2').hide();
					$(".calculationSection").show();
					$("#cal_bsa").val(bsa);
					$("#cal_bmi").val(bmi);

					/*var bsa = Math.sqrt((height * weight)/3600).toFixed(2);
					localStorage.setItem('bsa', bsa);
					var bmi = (weight/Math.pow((height/100),2)).toFixed(2);
					localStorage.setItem('bmi', bmi);
					$('#error').parents('.weighing2').hide();
					$(".calculationSection").show();
					$("#cal_bsa").val(bsa);
					$("#cal_bmi").val(bmi);*/
				}else{

					if( (height > 99 || height < 39) && (weight > 661 || weight < 66) ){
						$(".calculationSection").hide();
						$('#calculatBtn').attr('disabled', true);
						$("#input_height").attr("readonly", false);
						$("#input_weight").attr("readonly",false);
						$('#error').parents('.weighing2').show();
						$('#err-msg').html('Please enter correct values <br> Please enter height in inches, between 39-99in <br> Please enter weight in pound, between 66-661lb');
						$('#calculatBtn').addClass('disable');

					}else	if(height > 99 || height < 39){
					 	//error for wrong wieght

						$(".calculationSection").hide();
						$('#calculatBtn').attr('disabled', true);
						$("#input_height").attr("readonly", false);
						$('#error').parents('.weighing2').show();
						$('#err-msg').html('Please enter correct values <br> Please enter height in inches, between 39-99in .');
						$('#calculatBtn').addClass('disable');

					}else	if(weight > 661 || weight < 66 ){
					 	//error for wrong wieght
						$(".calculationSection").hide();
						$('#calculatBtn').attr('disabled', true);
						$("#input_weight").attr("readonly",false);
						$('#error').parents('.weighing2').show();
						$('#err-msg').html('Please enter correct values <br> Please enter weight in pound, between 66-661lb .');
						$('#calculatBtn').addClass('disable');

					}
				}
			}

            changeTabPointer()
		}

		$("#input_height").keypress(function (e) {
	     //if the letter is not digit then display error and don't type anything
		     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
		        //display error message
		        $("#errmsg").html("Digits Only").show().fadeOut("slow");
		               return false;
		    }
   		});

        document.getElementById("input_height")
            .addEventListener("keyup", function(event) {
            event.preventDefault();
            if (event.keyCode === 13) {
                $("#input_weight").trigger("focus");
            }
        });

   		$("#input_weight").keypress(function (e) {
               console.log('evalue', e)
	     //if the letter is not digit then display error and don't type anything
		     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
		        //display error message
		        $("#errmsg").html("Digits Only").show().fadeOut("slow");
		               return false;
		    }
   		});

		$('.resetForm').on('click', function(){
			localStorage.clear();
			$('body').css('position','fixed');
			$('.custom-re-button').removeClass('custom-re-button-r');
			$('.focusClass').attr("readonly", false);
			$('.focusClass').val("");
			$('.calculationSection').hide();
			$('#error').parents('.weighing2').hide();
			$('#calculatBtn').addClass('disable');
			$('#calculatBtn').attr('disabled', true);
			$('#pagetype').attr('disabled', true);
			if(!$('.vividtab2').hasClass('calType')){
				$('.vividtab2').addClass('calType');
			}
            $(window).scrollTop(0);

            changeTabPointer()
			 //validate = 0;
		});
	});
</script>
<div class="center-wrapper">
	<div class="vivid-tabs">
		<ul class="nav nav-tabs">
			<li id="first" class="active"><a data-toggle="tab" href="#home" style="cursor:default;">PATIENT<br>BODY SIZE</a></li>
			<li id="second" ><a data-toggle="tab" href="#menu1" onclick="NavToValveOnFirstScreen()" style="cursor:default;">FAILED<br>VALVE</a></li>
			<li id="third" style="margin-right: 0;"><a data-toggle="tab" onclick="NavToThirdOnFirstScreen()" href="#menu2" style="cursor:default;">TRANSCATHETER<br>VALVE</a></li>
		</ul>

	</div>
	<div class="clearfix"></div>
	<div class="replace-form">
	 {!! Form::open(['url' => '/metric-calculation','method'=>'POST', 'id'=>'calculationForm']) !!}
	<div class="vivid-tabs vividtab2 calType <?php //if(@$data['ResCode'] != 100){ echo "calType"; } ?>">
		<ul class="nav">
			<li class="{{ @$data['Data']['measurement_type'] == 'METRIC' ? 'active' : (!isset($data['Data']) ? 'active' : '' ) }} "><a data-toggle="tab" id="home" href="#home">METRIC</a></li>
			<li class="{{ @$data['Data']['measurement_type'] == 'IMPERIAL' ? 'active' :  ''  }} "><a data-toggle="tab" id="menu1" href="#menu1">IMPERIAL</a></li>
		</ul>
	</div>
	<div class="weighing">
		<?php  //print_r(@$data);
		 	$heightunit =  @$data['Data']['measurement_type'] == 'METRIC' ? 'cm' : (!isset($data['Data']) ? 'cm' : 'in' );
		 	$weightunit =  @$data['Data']['measurement_type'] == 'METRIC' ? 'kg' : (!isset($data['Data']) ? 'kg' : 'lb' );
		?>
		<div class="row custom-res">
			<div class="col-6">
				<div class="form-group pull-left">
					<label for="height">HEIGHT ({{ $heightunit }})</label>
					<input type="text" id="input_height" style="color: #21308b;" name="input_height" class="form-control focusClass"   value="{{ @$data['Data']['input_height'] }}" <?php if(@$data['ResCode'] == 100){ echo "readonly"; } ?> >
				</div>
			</div>
			<div class="col-6">
				<div class="form-group  pull-right">
					<label for="weight">WEIGHT ({{ $weightunit }})</label>
					<input type="text" id="input_weight" style="color: #21308b;" name="input_weight" class="form-control focusClass"  value="{{ @$data['Data']['input_weight'] }}" <?php if(@$data['ResCode'] == 100 ){ echo "readonly"; } ?>>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<?php //if(isset($data['ResCode']) && @$data['ResCode'] ==101 ){ ?>
	<div class="vivid-tabs weighing weighing2">
		<div class="error-text text-center" id="error">
			<h3 class="black-text line-spacing-one" id="err-msg">

            </h3>
		</div>
	</div>
	<?php //} ?>
	<?php //if(isset($data['ResCode']) && @$data['ResCode'] ==100 ){ ?>
	<div class="vivid-tabs weighing weighing2 calculationSection" >
		<div class="row custom-res">
			<div class="col-6">
				<div class="form-group  pull-left">
					<label for="bsa">BSA (m<sup>2</sup>)</label>
					<input type="text" id="cal_bsa" class="form-control" placeholder="??" value="{{ @$data['bsa'] }}" readonly>
				</div>
			</div>
			<div class="col-6">
				<div class="form-group pull-right">
					<label for="bmi">BMI (kg/m<sup>2</sup>)</label>
					<input type="text" id="cal_bmi" class="form-control" placeholder="??" value="{{ @$data['bmi'] }}" readonly>

						{{ Form::hidden('pagetype','new', array('id'=>'pagetype', 'style'=>'display:none;')) }}

				</div>
			</div>
		</div>
	</div>
	<?php //} ?>
	{{ Form::text('measurement_type','METRIC', array( 'style'=>'display:none;', 'id' => 'measurement_type')) }}
	<?php //if(@$data['ResCode'] != 100){  ?>
	<!-- {{ Form::submit('NEXT', array('class'=>'btn btn-vivid btn-block next disable', 'style'=>'position:relative; margin-top:15px','id'=>'calculatBtn' ,'disabled'=>true) ) }} -->
	<?php //}else{ ?>
	<div class="custom-re-button" style="width:100%">
		{{ Form::submit('NEXT', array('class'=>'btn btn-vivid btn-block next', 'style'=>'position:relative;margin-top:15px','id'=>'calculatBtn' ) ) }}
	</div>
	<?php //} ?>
	<!-- <a class="btn btn-vivid btn-block next" style="position: relative;" href="{{ url('f-valve-info') }}">NEXT </a> -->
	 {!! Form::close() !!}
</div>
</div>
@endsection
