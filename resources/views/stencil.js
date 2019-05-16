function showPatientResults(){
    var user_height = $('.height_field').val();
    var user_weight = $('.weight_field').val();

    (!user_weight||!user_weight||$('.error-message').is(":visible")) ?
        $('.patient-boday-size-result').hide() : $('.patient-boday-size-result').css('display','flex');
}

function setOptions(arr,selector,placeholder,selectedVal=false){
    $(selector).empty();
    $(selector).append($('<option>', {value:null, text:placeholder}));
    jQuery.each(arr, function(key,value){
        $('<option/>', {
            'value': value,
            'text': value
        }).appendTo(selector);
    });

    if(selectedVal && $(selector + " option[value='"+selectedVal+"']").length > 0){
        $(selector).val(selectedVal).trigger('change');
    }
}


function getSelectedStent(){
    return $('.select_stent').val();
}

function getSelectedSecondaryValve(){
    var sv = $('.select_secondary_valve').val();
    if(sv=="Select") return false;

    return sv;
}

function getSelectedStentInfo(){
    return getSelectedMechanism()[getSelectedStent()];
}

function getSelectedMechanism(){
    if(!$('.select_mechanism').val()) return regurgitation;
    return $('.select_mechanism').val()==='regurgitation' ? regurgitation : otherMechnisms;
}

function getSelectedSize(){
        return $('.select_size').val();
}

function updateValveParams(selectedStent,selectedSize){
    var params = selectedStent.StentSizes[selectedSize];

    (params.Ht === 'undefined') ? $('.Ht_field').val("") : $('.Ht_field').val(params.Ht);
    (params.TrueID === 'undefined') ? $('.trueID_field').val("") : $('.trueID_field').val(params.TrueID);
    (params.StentID === 'undefined') ? $('.StentID_field').val("") : $('.StentID_field').val(params.StentID);
    (params.Atmosphere === 'undefined') ? $('.pressure').val("") : $('.pressure').val(params.Atmosphere);
    (params.BVFBalloonSize === 'undefined') ? $('.bvf_size').val("") : $('.bvf_size').val(params.BVFBalloonSize);
    (params.MaxGradient === 'undefined') ? $('.MaxGradient').val("") : $('.MaxGradient').val(params.MaxGradient);
    (params.MeanGradient === 'undefined') ? $('.MeanGradient').val("") : $('.MeanGradient').val(params.MeanGradient);
    (params.ProjectedEOA === 'undefined') ? $('.ProjectedEOA').val("") : $('.ProjectedEOA').val(params.ProjectedEOA);
}

function getValveDisclaimers(showDisclaimer){
    var selectedSecondaryValue = getSelectedSecondaryValve();

    $('.valve-disclaimers').hide();

    if(!showDisclaimer) return false;
    if(selectedSecondaryValue=="Evolut") $('.Evolut_disclaimer').show();
    if(selectedSecondaryValue=="SAPIEN 3") $('.Sapien3_disclaimer').show();
}

function getBSADisclaimers(bsa,bsaUnderDisclaimer,bsaAboveDisclaimer){
    $('.bsa-disclaimers').hide();

    if(bsa <= 1.7 && bsaUnderDisclaimer===true){
        $('.bsaBelow17').show();
    } else if(bsa > 1.7 && bsaAboveDisclaimer===true){
        $('.bsaAbove17').show();
    }

    if((bsaUnderDisclaimer || bsaAboveDisclaimer) && getSelectedSecondaryValve())
        $('.bvf-section').show();
}

function getProjectedEOA(){
        var selectedStent = getSelectedStentInfo();
        var selectedSize = getSelectedSize();

        var user_height = $('.height_field').val();
        var user_weight = $('.weight_field').val();

        if(!user_weight||!user_weight||$('.error-message').is(":visible")) return false;

        var bsa = Math.sqrt((user_height * user_weight) / 3600).toFixed(2);
        var bmi = (user_weight / (Math.pow(user_height,2)) * 10000).toFixed(1);
        $('.bsa_field').val(bsa);
        $('.bmi_field').val(bmi);

        if(!selectedStent || !selectedSize) return false;

        var bsaUnderDisclaimer = selectedStent.StentSizes[selectedSize]['DisclaimerIfBSA1.7'];
        var bsaAboveDisclaimer = selectedStent.StentSizes[selectedSize]['DisclaimerIfBSAAbove1.7'];
        getBSADisclaimers(bsa,bsaUnderDisclaimer,bsaAboveDisclaimer);

        if(typeof selectedStent.StentSizes[selectedSize].ProjectedEOA !== 'undefined' &&
        !isNaN(selectedStent.StentSizes[selectedSize].ProjectedEOA)){

            $('.ratio-area').css('display','flex');

            var projectedEOA = selectedStent.StentSizes[selectedSize].ProjectedEOA;
            var ratio = projectedEOA / bsa;
            var color = '';
            var description = '';

            if ((ratio > 0.85 && bmi < 30) || (ratio > 0.7 && bmi >= 30)){
                color = '#00B050'; //green
                description = 'No/Mild Prosthetic-Patient Mismatch.';
            } else if ((ratio <= 0.85 && ratio >= 0.65 && bmi < 30) || (ratio <= 0.7 && ratio >= 0.6 && bmi >= 30)){
                color = '#F2A61E'; //orange
                description = 'Moderate Prosthetic-Patient Mismatch.';
            }else if ((ratio < 0.65 && bmi < 30) || (ratio < 0.6 && bmi >= 30)){
                color = '#DE0000'; //red
                description = 'Severe Prosthetic-Patient Mismatch.';
            }
            $('.ratio').val(ratio.toFixed(3));
            $('.ratio-description').text(description);

            if(color==='#DE0000'){
                $('.ratio-description').css('color',color);
                $('.severe-disclaimer').show();
            }else{
                $('.ratio-description').css('color','black');
                $('.severe-disclaimer').hide();
            }

            $('.ratio').css({'background-color':color,'color':'white'});
            return true;
        } else {
            $('.ratio-area').hide();
            return false;
        }
}

function resetForm(currentElement){
    // currentElement.nextAll();
}

function showGroup1(){

    if(getSelectedSize() && getSelectedStent() && $('.select_mechanism').val()){
        $('.group-1').show();
        setOptions(getSelectedStentInfo().Stents,'.select_secondary_valve','Select');
        updateValveParams(getSelectedStentInfo(),getSelectedSize());
        showGroup2();
        showGroup3AndRatio()
        return true;
    }

    return false;
}

function showGroup2(){
    if(getSelectedSize() && getSelectedStent() && $('.select_mechanism').val()){
        $('.group-2').show();

        var selectedSecondary = getSelectedSecondaryValve();
        var selectedStent = getSelectedStentInfo();
        var selectedSize = getSelectedSize();

        getValveDisclaimers(selectedStent.StentSizes[selectedSize]['Disclaimer']);

        if(selectedSecondary){
            $('.sec_valve_result').css('display','flex');
            $('.secondary_valve_value').val(selectedStent.StentSizes[selectedSize][selectedSecondary]);
            getProjectedEOA();
        } else {
            $('.sec_valve_result').hide();
        }
    }

}

function showGroup3AndRatio(){
    var group3Res = showGroup3();
    var projectedEOARes = getProjectedEOA();
    (group3Res || projectedEOARes) ? $('.group-3-and-ratio').show() : $('.group-3-and-ratio').hide();
}

function showGroup3(){
    var selectedStent = getSelectedStentInfo();

    if(selectedStent.ProjectedEOA===true){
        $('.group-3').css('display','flex');
        return true;
    } else {
        $('.group-3').hide();
        return false;
    }
}


$( document ).ready(function() {

    $('#reset').on('click', function() {
        location.reload();
    });

    $('select').on('change', function() {
        $(this).attr('disabled','disabled');
    });

    var stents_names = Object.keys(regurgitation); // VALVES ARE THE SAME FOR THE TWO ARRAYS
    setOptions(stents_names,'.select_stent','Select');

    // getting user choice of stent
    $('.select_stent').on('change', function() {
        var selectedStent = getSelectedMechanism()[this.value];
        var stents_sizes = Object.keys(selectedStent.StentSizes);
        showGroup1();

        setOptions(stents_sizes,'.select_size','Select',getSelectedSize());
    });

    // getting user choice of size and getting size place from his array
    $('.select_size').on('change', function() {
        var selectedSize = this.value;
        var selectedStent = getSelectedStentInfo();

        showGroup1();

        if($('.select_size')[0].selectedIndex!=0){
            $('.select_secondary_valve').show();
        }
    });

    $('.select_mechanism').on('change', function() {
        showGroup1();
    });

    $('.select_secondary_valve').on('change', function() {
        showGroup2();
    });

    $('.height_field').on('change', function() {
        var value = this.value;
        (isNaN(value)||value<100||value>250) ?
            $('.height-error-message').show() : $('.height-error-message').hide();

        if($('.height-error-message').is(":not(:visible)"))
            $(this).attr('disabled','disabled');

        getProjectedEOA();
        showPatientResults();
    });

    $('.weight_field').on('change', function() {
        var value = this.value;
        (isNaN(value)||value<30||value>300) ?
            $('.weight-error-message').show() : $('.weight-error-message').hide();

        if($('.weight-error-message').is(":not(:visible)"))
            $(this).attr('disabled','disabled');

        getProjectedEOA();
        showPatientResults();
    });

});
