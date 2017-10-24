// here i am handle product data selected by the user by submit event and handle show product list in Prackage details page
$(function(){
    jQuery.validator.messages.required = function (param, input) {
        var el =document.getElementById(input.name); 
        //console.log(el.getAttribute("labelName"));
        //console.log('=='+input+'==');
        return 'The ' + el.getAttribute("labelName") + ' field is required';
    }
});
myJsMain.teacher_add=function(){
    var teacherAddValidationRules = {
        userName:{required: true,email:true},
        communicationEmail: {required: true,email:true},
        fName: {required: true},
        lName: {required: true},
        phoneNumber: {required: true},
    };
    $('#erp_teacher_add_form').validate({rules: teacherAddValidationRules,errorElement : 'div',
    errorLabelContainer: '.errorTxt',onsubmit: true});
    $('#erp_teacher_add_form').submit(function(e) {
        e.preventDefault(); 
        if ($(this).valid()) { 
            //  $.LoadingOverlay("show");
            $("body").Lock({background: "rgba(249,249,249,.5)"});
            $('#teacherAddSubmit').prop('disabled',true);
            myJsMain.commonFunction.ajaxSubmit($(this),myJsMain.baseURL+'ajax_controller_principal/add_teacher', teacherAddFormCallback);
        }
    });
        
        // this is just to show product list page
    function teacherAddFormCallback(resultData){
        //$.LoadingOverlay("hide");
        $("body").Unlock();
        //myJsMain.commonFunction.hidePleaseWait();
        $('#teacherAddSubmit').prop('disabled',false); //alert(resultData.result);
        if(resultData.result=='bad'){
            myJsMain.commonFunction.erpAlert(myJsMain.messageBoxTitle+' System Message',resultData.msg);
        }else if(resultData.result=='good'){
            myJsMain.teacher_add_form_reset();
            myJsMain.commonFunction.erpAlert(myJsMain.messageBoxTitle+' System Message',resultData.msg);
            myJsMain.teacher_ajax_list();
            $('ul.tabs').tabs('select_tab', 'TeacherList');
        }
    }
    
    
    jQuery('#countryId').on('change',function(){ 
        myJsMain.commonFunction.showStateCity(jQuery(this).val(),'state');
    });
    
    jQuery('#stateId').on('change',function(){
        myJsMain.commonFunction.showStateCity(jQuery(this).val(),'city');
    });
}

myJsMain.teacher_add_form_reset=function(){
    $('#erp_teacher_add_form')[0].reset();
    $('.input-fileupload').children(".form-section").show();
    $('.input-fileupload').children(".actions").show();
    $('.input-fileupload').children(".dropzone").show();
    $('ul.collection').empty();
    $('#profilePictureFileName').val("");
    $("#jobTitleId").val("");
    $("#genderId").val("");
    $("#bloodGroupId").val("");
    $("#countryId").val("");
    $("#stateId").val("");
    $("#cityId").val("");
}

myJsMain.teacher_ajax_list=function(){
    $("body").Lock({background: "rgba(249,249,249,.5)"});
    $('.datatable').find("tbody").empty();
    $.ajax({
        url:myJsMain.baseURL+'ajax_controller_principal/show_teacher_list_in_update_data_table/',
        success:function(html){
            $("body").Unlock();
            $('.datatable').find("tbody").append(html).draw();
        }
    });
}

myJsMain.teacher_delete=function(id){
    $.ajax({
        url:myJsMain.baseURL+'ajax_controller_principal/teacher_delete/',
        data:'teacherId='+id,
        type:'POST',
        dataType:'json',
        success:function(resultData){
            $("body").Unlock();
            //myJsMain.commonFunction.hidePleaseWait();
            if(resultData.result=='bad'){
                myJsMain.commonFunction.erpAlert(myJsMain.messageBoxTitle+' System Message',resultData.msg);
            }else if(resultData.result=='good'){
                myJsMain.commonFunction.erpAlert(myJsMain.messageBoxTitle+' System Message',resultData.msg);
                //alert(resultData.url);
                /*setTimeout(function(){
                    window.location.reload();
                  }, 3000);*/
            }
        }
    });
}

myJsMain.forgot_password=function(){
    var forgotPasswrodValidationRules = {
        userForgotPasswordEmail: {
            required: true,
            email:true
        }
    };
    $('#retailershangout_user_forgot_form').validate({rules: forgotPasswrodValidationRules,onsubmit: true});
    $('#retailershangout_user_forgot_form').submit(function(e) {
        e.preventDefault();
        if ($(this).valid()) {
            myJsMain.commonFunction.showPleaseWait();
            $('#forgotPasswrod').prop('disabled',true);
            //$('#fade_background').fadeIn();
            //$('#LoadingDiv').fadeIn();
            myJsMain.commonFunction.ajaxSubmit($(this),myJsMain.baseURL+'ajax/retribe_forgot_password/', forgotPasswordFormCallback);
        }
    });
            
}