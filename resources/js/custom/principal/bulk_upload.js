jQuery(function () {
    jQuery(document).on('click','.upload-btn',function(){
        $("body").Lock({background: "rgba(249,249,249,.5)"});
        var uploadURI=myJsMain.baseURL+'bulk_upload_controller/'+jQuery(this).data('formactionid')+'/';
        
        var inputFile = jQuery(this).parent().prev().prev().children();
        var formEle=jQuery(this).parent().parent();
        formId=formEle.attr("id");
        //var uploadforId = $('.bluk_upload_form').attr('id');
        //var 
        //alert(uploadforId);
    
        if (inputFile.val() != "") {
            var fileToUpload = inputFile[0].files[0];
            // make sure there is file to upload
            if (fileToUpload != 'undefined') {
                extainstionArr = inputFile.val().split(".");
                console.log(extainstionArr.length);
                extainstion = extainstionArr[extainstionArr.length - 1];
                if (extainstion == 'xlsx' || extainstion == 'xls') {
                    // provide the form data
                    // that would be sent to sever through ajax
                    var formData = new FormData();
                    formData.append("userFile", fileToUpload);
                    /// now make upload action function dynamic.
                    
                    $.ajax({
                        url: uploadURI,
                        type: 'post',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            //listFilesOnServer();
                            $("body").Unlock();
                            showUploadedFileStatus(data,formId);
                        },
                        /*xhr: function() {
                         var xhr = new XMLHttpRequest();
                         xhr.upload.addEventListener("progress", function(event) {
                         if (event.lengthComputable) {
                         var percentComplete = Math.round( (event.loaded / event.total) * 100 );
                         // console.log(percentComplete);
                         
                         $('.progress').show();
                         progressBar.css({width: percentComplete + "%"});
                         progressBar.text(percentComplete + '%');
                         };
                         }, false);
                         
                         return xhr;
                         }*/
                    });
                }else{
                    $("body").Unlock();
                    //process erro for to upload excel file onlye
                    myJsMain.commonFunction.erpAlert(myJsMain.messageBoxTitle+' System Message',"Please select only excel file for bulk upload.");
                    jQuery('#'+formId)[0].reset();
                }
            }
        }else{
            $("body").Unlock();
            /// empty file error process
            myJsMain.commonFunction.erpAlert(myJsMain.messageBoxTitle+' System Message',"Please select the excel file for bulk upload.");
            jQuery('#'+formId)[0].reset();
        }
    });
    
    function showUploadedFileStatus(data,formId){
        jQuery('#'+formId)[0].reset();
        resultData=JSON.parse(data);
        if(resultData.result=='bad'){
            myJsMain.commonFunction.erpAlert(myJsMain.messageBoxTitle+' System Message',resultData.msg);
        }else if(resultData.result=='good'){
            myJsMain.commonFunction.erpAlert(myJsMain.messageBoxTitle+' System Message',resultData.msg);
        }else if(resultData.result=='need_good'){
            myJsMain.commonFunction.erpAlert(myJsMain.messageBoxTitle+' System Message',resultData.msg);
            setTimeout(function(){
                window.location.href=resultData.url;
              }, 3500);
        }
    }
    jQuery('.bulk-upload-template-dowload').on('click',function(){
        window.location.href=myJsMain.baseURL+'bulk_upload_controller/download_bulk_upload_template/'+jQuery(this).data("usertype");
    });
});