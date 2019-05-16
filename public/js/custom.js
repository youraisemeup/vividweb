//function for reset validation
function myFunction() {
	var pathArray = window.location.pathname;
  	if(pathArray.includes("matric2") || pathArray.includes("f-valve-result-one") || pathArray.includes("f-valve-result-two") || pathArray.includes("f-valve-result-three") || pathArray.includes("t-valve-result"))
  	{
  		return false;
  	}else{
  		$('select').prop('selectedIndex', 0);
      document.getElementById("error").innerHTML = "";
      $('.vivid-tabs').find('input:text').val('');

  	}
}


$(document).ready(function(){



	function needHeight() {
		// let vh = window.innerHeight * 0.01;
		// document.documentElement.style.setProperty('--vh', `${vh}px`);

		const height = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
		document.getElementsByClassName('need_height')[0].style['height'] = height + 'px';

		var footheight = $('.jsFooterBottom').innerHeight();
		$('#pagewrap').css('padding-bottom', footheight);
	}
	needHeight();

	$(window).on('load resize', function () {
		needHeight();
	});


	//function to change tab imperial to metric change the data of height and width
	$("#one").on('click',function() {
    	$("#two").removeClass("active");
      	$(this).addClass("active");
        $('.vivid-tabs').find('input:text').val('');
      		$("#ht").text("HEIGHT (cm)");
      		$("#wt").text("WEIGHT (kg)");
      		$("#stype").val("METRIC");
   	});
   	//function to change tab metric to imperial change the data of height and width
   	$("#two").on('click',function(){
    	$("#one").removeClass("active");
      	$(this).addClass("active");
        $('.vivid-tabs').find('input:text').val('');
      		$("#ht").text("HEIGHT (in)");
      		$("#wt").text("WEIGHT (lb)");
      		$("#stype").val("IMPERIAL");
    });

	$('.mybtn #disableanchor').attr('disabled', 'disabled');
	$('.form-group input').keyup(function() {
        var empty = false;
        $('input[type="text"]').each(function() {
            if ($(this).val().length == 0) {
                empty = true;
            }
        });
        if (empty) {
          $(".mybtn #disableanchor").addClass("gray-type");
            $('.mybtn #disableanchor').attr('disabled', 'disabled');
        } else {
            $(".mybtn #disableanchor").removeClass("gray-type");
            $('.mybtn #disableanchor').removeAttr('disabled');
        }
    });

// function to load 2nd dropdown list of failed valve size form db
  $("#valveType").change(function(){
    $("#submit2").addClass("gray-type");
    $('#submit2').attr('disabled', 'disabled');
    var valveType=$(this).val();
    var base_url = window.location.origin;
    var pathArray = window.location.pathname;
    var res = base_url.concat(pathArray);
    var getUrl = res.replace(/f-valve-info/, "lableSize");
    console.log('geturl')
    console.log(getUrl)
    $.ajax({
      type: "GET",
      url:getUrl,
      data:{vtype:valveType},
      success:function(data)
      {

        $("#lableSize").html('<option>LABEL SIZE (mm)</option>'+data);
        $("#fmechanism").html('<option value="">MECHANISM OF FAILURE </option>');
      }
    });
  });
// statict third dropdown on basis of failed valve size static values for every cases
  $("#lableSize").change(function(){
    $("#submit2").addClass("gray-type");
    $('#submit2').attr('disabled', 'disabled');
    var dplist="<option value='Mixed/Stenosis'>Mixed/Stenosis</option>";
    dplist+="<option value='Regurgitation'>Regurgitation</option>";
    $("#fmechanism").html('<option value="">MACHANISM OF FAILURE </option>'+dplist);
  });
    $('input,textarea').focus(function(){
   $(this).removeAttr('placeholder');
});


	$('#submit2').attr('disabled', 'disabled');
	 $("#fmechanism").on('change',function(){
      var input = $(this).val();
      if(input == '')
      {
        $("#submit2").addClass("gray-type");
        $('#submit2').attr('disabled', 'disabled');
      }else{
        $("#submit2").removeClass("gray-type");
        $('#submit2').removeAttr('disabled');
      }
   });

$("#thvresult").attr('disabled', 'disabled');
	$("#thvType").on('change',function(){
    alert('customeJS ')
		var val=$(this).val();
		if(val == '')
		{
      $("#thvresult").addClass("gray-type");
			$("#thvresult").attr('disabled', 'disabled');
		}
		else{
      $("#thvresult").removeClass("gray-type");
			$("#thvresult").removeAttr('disabled');
		}
	});
// function to clear localstorage data from our website
	$("#clear").click(function(){
		localStorage.clear();
	});


   	//function to handling tabs on click
   	$("#first").on('click',function() {
    	var currpage = $("ul li.active").attr('id');
        var burl1 = localStorage.getItem('url1');
        console.log('burl1')
        console.log(burl1)
   		if(burl1 == null)
   		{
   			return false;
   		}else{
            $("#second").removeClass("active");
            $("#third").removeClass("active");
            $(this).addClass("active");
            location.href=burl1;
        }

   	});

   	$("#second").on('click',function(){
		  var currpage = $("ul li.active").attr('id');
   		var burl2 = localStorage.getItem('url2');
   		if(burl2 == null)
   		{
   			return false;
   		}else{

			$("#first").removeClass("active");
			$("#third").removeClass("active");
			$(this).addClass("active");
			location.href=burl2;
		}
    });
    $("#third").on('click',function(){
   		var currpage = $("ul li.active").attr('id');
   		var burl3 = localStorage.getItem('url3');
   		if(burl3 == null)
   		{
   			return false;
   		}else{
			$("#first").removeClass("active");
			$("#second").removeClass("active");
			$(this).addClass("active");
			location.href=burl3;
   		}
    });

});

