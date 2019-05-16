@extends('layouts.calculation')
@section('content')
<?php if($valvedata['ResCode'] == 101){?>
	      <style>
            .black-text {
        	font-size: 15px;
        	font-weight: 600;
        	}
        .select-vivid{
        	background: url({{asset ('images/br_down.png')}}) no-repeat right;
        }
        .weighing .custom .form-group label{
        	font-size: 13px;
        }
        </style>
<?php } ?>
<?php if($valvedata['ResCode'] == 102){?>
<style type="text/css">
        .select-vivid{
           	background: url({{asset ('images/br_down.png')}}) no-repeat right;
           }
          .weighing .custom .form-group label{
            font-size: 13px;
          }
      </style>
<?php } ?>
<?php if($valvedata['ResCode'] == 103){?>
	<style type="text/css">
        
        .select-vivid{
           	background: url({{asset ('images/br_down.png')}}) no-repeat right;
           }
          .weighing .custom .form-group label{
            font-size: 13px;
          }
      </style>
<?php } ?>
<script type="text/javascript">
	$(document).ready(function(){
		
		$('.resetForm').on('click', function(){
			window.location.href = '{{ URL("/failed-valve")}}';
		});	
		

	})
</script>
<div class="center-wrapper">
	<div class="vivid-tabs">
		<ul class="nav nav-tabs">
			<li id="first"><a data-toggle="tab" onclick="NavToCal()">PATIENT <br>BODY SIZE</a></li>
			<li id="second" class="active"><a data-toggle="tab" href="#menu1">FAILED <br>VALVE</a></li>
			<li id="third" style="margin-right: 0;"><a data-toggle="tab" href="#menu2">TRANSCATHETER <br>VALVE</a></li>
		</ul>
	</div>
	<div class="clearfix"></div>
	<div class="thv">
		<select name="" id="" class="select-vivid form-control"  href="javascript:;">
			<option value="{{ $valvedata['valvedata']['failed_type'] }}">{{ $valvedata['valvedata']['failed_type'] }}</option>
		</select>
	</div>
	<div class="thv">
		<select name="" id="" class="select-vivid form-control"  href="javascript:;">
			<option value="{{ $valvedata['valvedata']['lable_size']}}">{{ $valvedata['valvedata']['lable_size']}}</option>
		</select>
	</div>
	<div class="thv">
		<select name="" id="" class="select-vivid form-control"  href="javascript:;">
			<option value="{{ $valvedata['mechanism']}}">{{ $valvedata['mechanism']}}</option>
		</select>
	</div>
	
	
	<div class="vivid-tabs weighing weighing2">
		<div class="row custom">
			<div class="col-md-4">
				<div class="form-group">
					<label for="height">STENT ID (mm)</label>
					<input type="text" class="form-control" placeholder="??" value="{{ $valvedata['valvedata']['height']}}"  readonly>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="height">VALVE HEIGHT (mm)</label>
					<input type="text" class="form-control" placeholder="??" value="{{ $valvedata['valvedata']['stentid']}}" readonly>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="height">TRUE ID (mm)</label>
					<input type="text" id="trueid" class="form-control" placeholder="??" value="{{ $valvedata['valvedata']['trueid']}}" readonly>
				</div>
			</div>
		</div>
	</div>
	<div class="vivid-tabs weighing weighing2">
		<div class="form-group">
			<label for="email">PRE FAILURE ECHO CHARACTERISTICS</label>
		</div>
		
	</div>
	<?php if( $valvedata['valvedata']['ProjectedEOA']==0) {?>
	<?php } else { ?>
	<div class="vivid-tabs weighing weighing2" style="margin-bottom:20px;">
		<div class="form-group">
			<label for="email">EFFECTIVE ORIFICE AREA (cm <sup>2</sup>)</label>
			<input type="text" class="form-control" placeholder="??" value="{{ $valvedata['valvedata']['ProjectedEOA'] }}" readonly>
		</div>
	</div>
	<?php } if($valvedata['ieoa']==0) { ?>
	<?php } else { ?>
	<div class="vivid-tabs weighing weighing2 weighing3 {{ @$valvedata['ResCode'] == 101 || @$valvedata['ResCode'] == 103 ?'weighing4':'' }} {{ @$valvedata['ResCode'] == 101?'weighing5':'' }}">
		<div class="form-group">
			<label for="email">INDEXED EOA AREA (cm<sup>2</sup>/m<sup>2</sup>)</label>
			<?php //print_r($valvedata['ResCode']);?>
			<input type="text" class="form-control" placeholder="??" value="{{ $valvedata['ieoa'] }}">
		</div>
	</div>
	<?php } ?>
	<div class="vivid-tabs weighing weighing2">
		<div class="form-group">
			<label class="color-error" for="email" style="color:#000">{{@$valvedata['Msg1']}}</label>
		</div>
			<?php echo $valvedata['Msg2']; ?>
	</div>
	<a class="btn btn-vivid btn-block next" style="position: relative;" href="{{ url('transcatheter-valve') }}">NEXT </a>
</div>
@endsection