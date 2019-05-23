<?php $__env->startSection('content'); ?>
<style type="text/css">
	.select-vivid{
        background: url(<?php echo e(asset ('images/br_down.png')); ?>) no-repeat right;
        }
        .center-wrapper {
 /*   min-height: 420px;*/
}
a:not([href]):not([tabindex]):focus, a:not([href]):not([tabindex]):hover {
    color: #7a8899;
    text-decoration: none;
}
.submitBtn{
    margin-bottom:20 px;
}
</style>
<script type="text/javascript">
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

		$('.weighing2').hide();
		$('#thvForm').on('submit', function(event){
				event.preventDefault();
				$("#thvType").attr("disabled", false);
				window.location.href= "<?php echo e(URL('/home')); ?>";
			});


		$('.resetForm').on('click', function(){
			$('.weighing2').hide();
			$('#thvType').prop('selectedIndex',0);
			$('.submitBtn').addClass('gray-type');
			$(".submitBtn").attr("disabled", true);
            // $('.submitBtn').css("position","absolute");
            localStorage.removeItem('thvtype_status')
			$(window).scrollTop(0);
		});
		$(".submitBtn").attr("disabled", true);
		$("#thvType").change(function(){

            localStorage.setItem('thvtype_status', $(this).val());
			//THV DISCLAIMER
			if((localStorage.getItem('isRed')) == 'true' || (localStorage.getItem('mechanism') == 'Regurgitation' && (parseFloat(localStorage.getItem('trueid')) <= 20))  ||  (localStorage.getItem('mechanism') == 'Stenosis/Mixed' && (parseFloat(localStorage.getItem('trueid')) <= 22)) ){
				//'isRed true  show disclaimer;
				if($(this).val() == 'Evolut'){
					$('#descript1').html('High THV position, up to 4mm of depth, is warranted in order to reduce the risk of elevated post procedural gradients.');
				}else if($(this).val() == 'Sepian 3'){
					$('#descript1').html('SAPIEN implantation in this condition was associated with high risk of elevated post procedural gradients.');
				}
			}

			var BVFValve  =['Epic', 'Epic Supra-annular','Carpentier-Edwards Perimount Magna', 'Carpentier-Edwards Perimount Magna Ease', 'Mitroflow', 'Mosaic', 'Perimount', 'Perimount 2700'];

			//BVF DISCLAIMER
			//if(BVFValve.indexOf(localStorage.getItem('FailedValveType')) != -1 ){
				var dics2 = 0;

				if(localStorage.getItem('isRed') == 'true'){
					dics2++;
				}else if(localStorage.getItem('mechanism') == 'Regurgitation' && (parseFloat(localStorage.getItem('trueid')) <= 19) ){
					dics2++;
				}else if(  localStorage.getItem('mechanism') == 'Stenosis/Mixed' && (parseFloat(localStorage.getItem('trueid')) <= 21) ) {
					dics2++;
				}
				if(dics2 > 0){
					$('#descript2').html('BVF may effectively reduce the risk of elevated post procedural gradients, which may be important in this condition. The safety of this approach is being studied.')
				} else {
					$('#descript2').html('');
				}

			//}



			if($(this).val() != '')
			{

				//ajax function to store web data in db
				var height = localStorage.getItem('ht');
				var weight = localStorage.getItem('wt');
				var fvalveType = localStorage.getItem('FailedValveType');
				var fvalveSize = localStorage.getItem('lableSize');
				var failureMechanism = localStorage.getItem('mechanism');
				var thvType = $(this).val();
				$.ajax({
					url:"postFormdata",
	                type:"post",
    	            data:{_token: '<?php echo e(csrf_token()); ?>',ht:height,wt:weight,fvalveType:fvalveType,fvalveSize:fvalveSize,failureMechanism:failureMechanism,thvType:thvType},
        	        success:function(response)
            	    {
            	    	console.log(response);
            	    }

				});
				$('.submitBtn').css("position","relative");
				$('.weighing2').show();
					var AtmPressure  = <?php echo json_encode($atmPressureData); ?>;
	 				document.getElementById('bvfballoonSize').value= localStorage.getItem('bvfballoonsize');
	 				if(localStorage.getItem('bvfballoonsize') != 0){
	 						$('.bvfsize').show();
	 				}else{
	 						$('.bvfsize').hide();
	 				}
	 				if($("#thvType").val() == 'Evolut')
	 				{
	 					document.getElementById('evolut').value = localStorage.getItem('evol');
	 				} else if($("#thvType").val() == 'Sepian 3'){
	 					document.getElementById('evolut').value = localStorage.getItem('sepian3');
	 				}

	 				if(localStorage.getItem('FailedValveType') != 0){
	 					document.getElementById('pressure').value= localStorage.getItem('atmpressure');
	 					if(localStorage.getItem('atmpressure') == 0){
	 						$('.p_hide').hide();
	 					}

	 				}else{
	 					$('.p_hide').show();
	 					document.getElementById('pressure').value=localStorage.getItem('atmpressure');
	 				}
	 				if(localStorage.getItem('atmpressure') == 0 && localStorage.getItem('bvfballoonsize') == 0 && $("#descript2").text() == "")
	 				{
	 					$('.mytext').hide();
	 				}

				$('.submitBtn').removeClass('gray-type');
				$(".submitBtn").attr("disabled", false);
			}else{
					// $('.submitBtn').css("position","absolute");
					$('.weighing2').hide();
					$('.submitBtn').addClass('gray-type');
					$(".submitBtn").attr("disabled", true);
					$(this).removeClass('gray-type');
			}
			$(window).scrollTop(0);
        });

        if(localStorage.getItem('thvtype_status')) {
            $('#thvType').val(localStorage.getItem('thvtype_status'));
            $('#thvType').trigger("change");
        }
	})

</script>

<div class="center-wrapper" style="">
	<div class="vivid-tabs">
		<ul class="nav nav-tabs">
			<li id="first" style="cursor: pointer;" onclick="NavToCal()"><a data-toggle="tab" >PATIENT<br>BODY SIZE</a></li>
			<li id="second" style="cursor: pointer;"  onclick="NavToValve()"><a data-toggle="tab">FAILED<br>VALVE</a></li>
			<li id="third" class="active" style="margin-right: 0;"><a data-toggle="tab" href="#menu2" style="cursor:default;">TRANSCATHETER<br>VALVE</a></li>
		</ul>
	</div>

<div class="replace-form">

	<?php echo Form::open(['method'=>'post', 'id'=>'thvForm']); ?>


	<div class="thv">
		<select id="thvType" name="thvType" class="select-vivid form-control" >
			<option value="">THV TYPE</option>
			<option value="Evolut">Evolut</option>
			<option value="Sepian 3">SAPIEN 3</option>
		</select>
	</div>
	<?php //if(isset($data)){ ?>
	<div class="vivid-tabs weighing weighing2">
		<div class="form-group">
			<label for="thvsize">SUGGESTED THV SIZE (mm)</label>
			<input type="text" id="evolut" class="form-control" placeholder="??" readonly>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="vivid-tabs weighing weighing2">
		<div class="error-text text-center">
			<h3 id="descript1"><?php echo e(@$disc); ?></h3>
		</div>
	</div>
	<div class="weighing weighing2 mytext">
		<div class="form-group">
			<label for="bvf" style="margin-bottom: 0;">BIOPROSTHETIC VALVE RING FRACTURE <br>(BVF)</label>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="vivid-tabs weighing weighing2">
		<div class="error-text text-center">
			<h3 id="descript2"><?php echo e(@$disc2); ?></h3>
		</div>
	</div>
	<div class="vivid-tabs weighing weighing2">
		<div class="row" style="justify-content: center;">
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 bvfsize">
				<div class="form-group">
					<label for="size">SIZE (mm)</label>
					<input type="text" id ="bvfballoonSize" class="form-control" placeholder="??" value="" readonly>
				</div>
			</div>
			<?php //if($atm[0]['atm_pressure']==0) {?>
			<?php //} else { ?>
			<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 p_hide">
				<div class="form-group">
					<label for="pressure">PRESSURE (atm)</label>
					<input type="text" id="pressure" class="form-control" placeholder="??" readonly>
				</div>
			</div>
			<?php //} ?>
		</div>
	</div>
 	<!--<a class="btn btn-vivid btn-block next " style="position: relative; margin-top:45px;" href="#">Done </a>-->
	<?php //}else{?>

	 <input type="submit" class="btn btn-vivid btn-block next gray-type submitBtn" style="margin-bottom: 15px;"  name="submit" Value="DONE" >
	<?php	//} ?>
</div>
</div>
<?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.calculation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>