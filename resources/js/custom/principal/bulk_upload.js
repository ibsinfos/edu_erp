jQuery(function () {
    jQuery(document).on('click','.upload-btn',function(){
        var uploadURI=myJsMain.baseURL+'bulk_upload_controller/'+jQuery(this).data('formactionid')+'/';
        
        var inputFile = jQuery(this).parent().prev().prev().children();
        //alert(inputFile.attr("name"));
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
                            showUploadedFileStatus(data);
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
                    //process erro for to upload excel file onlye
                    myJsMain.commonFunction.erpAlert(myJsMain.messageBoxTitle+' System Message',"Please select only excel file for bulk upload.");
                }
            }
        }else{
            /// empty file error process
            myJsMain.commonFunction.erpAlert(myJsMain.messageBoxTitle+' System Message',"Please select the excel file for bulk upload.");
        }
    });
    
    function showUploadedFileStatus(data){
        console.log(data);
    }
});