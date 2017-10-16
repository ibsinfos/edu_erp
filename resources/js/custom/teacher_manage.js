// here i am handle product data selected by the user by submit event and handle show product list in Prackage details page
myJsMain.teacher_add=function(){
    var teacherAddValidationRules = {
        userName:{required: true,email:true},
        communicationEmail: {required: true,email:true},
        fName: {required: true},
        mName: {required: true},
        lName: {required: true},
        phoneNumber: {required: true},
    };
    $('#erp_teacher_add_form').validate({rules: teacherAddValidationRules,onsubmit: true});
    $('#erp_teacher_add_form').submit(function(e) {
        e.preventDefault(); 
        if ($(this).valid()) { 
            myJsMain.commonFunction.showPleaseWait();
            $('#teacherAddSubmit').prop('disabled',true);
            //$('#fade_background').fadeIn();
            myJsMain.commonFunction.ajaxSubmit($(this),myJsMain.baseURL+'ajax_controller_principal/add_teacher', teacherAddFormCallback);
        }
    });
        
        // this is just to show product list page
    function teacherAddFormCallback(resultData){
        myJsMain.commonFunction.hidePleaseWait();
        $('#teacherAddSubmit').prop('disabled',false); //alert(resultData.result);
        //console.log('resultData.result : '+resultData.result);
        //$('#fade_background').fadeOut();
        //$('#LoadingDiv').fadeOut();
        if(resultData.result=='bad'){
            myJsMain.commonFunction.erpAlert(myJsMain.messageBoxTitle+' System Message',resultData.msg,200);
        }else if(resultData.result=='good'){
            //alert(resultData.url);
            window.location.href = resultData.url;
            //myJsMain.commonFunction.tidiitAlert('Tidiit System Message',resultData.url,200);
        }
    }       
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