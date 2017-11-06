<?php echo $html_heading; ?> 
<?php echo $header;
?>
<main>
    <div class="main-content">
        <div class="row">
            <div class="col s12">
                <div class="page-header">
                    <h1>
                        <i class="material-icons">show_upload</i> Bulk Upload
                    </h1>
                    <!--<p>Some charts with Google Charts and AmCharts.</p>-->
                </div>
            </div>
        </div>
        <div class="row">
            <ul class="collapsible popout" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header active"><i class="mdi mdi-file-excel"></i>Teacher Bulk Upload</div>
                    <div class="collapsible-body">
                        <div class="col s12 m12 l12">
                            <div class="panel panel-bordered">
                                <!--<div class="panel-header">
                                </div>-->
                                <div class="panel-header border-top-0">
                                    <div class="subtitle">
                                        <div class="card-panel alternative lighten-1">
                                            tips for techer bulk upload.
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    
                                    <div class="row">
                                        <?php echo form_open_multipart('principal/bulk_upload_controller/',array('class' => 'validate bluk_upload_form'))?>
                                        <div class="col m6 s12 l4 text-center">
                                            <input type="file" name="userFile">
                                        </div>
                                        <div class="col m6 s12 l4 text-center">
                                            <!--<i class="mdi mdi-download"></i>-->
                                            <button type="button" class="btn btn-default">
                                                <i class="mdi mdi-download"></i>
                                            </button>
                                        </div>
                                        <div class="col m6 s12 l4 text-center">
                                            <button type="button" class="btn btn-default upload-btn" data-formactionid="teacher_process">
                                                <i class="mdi mdi-upload"></i>
                                                Submit
                                            </button>
                                        </div>
                                        <?php echo form_close();?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="mdi mdi-file-excel"></i>Class & Section</div>
                    <div class="collapsible-body">
                        <div class="col s12 m12 l12">
                            <div class="panel panel-bordered">
                                <!--<div class="panel-header">
                                </div>-->
                                <div class="panel-header border-top-0">
                                    <div class="subtitle">
                                        <div class="card-panel alternative lighten-1">
                                            tips for class bulk upload.
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <?php echo form_open_multipart('#',array('id' => 'form-upload-classes', 'class' => 'validate bluk_upload_form'))?>
                                        <div class="col m6 s12 l4 text-center">
                                            <input type="file" name="userFile">
                                        </div>
                                        <div class="col m6 s12 l4 text-center">
                                            <!--<i class="mdi mdi-download"></i>-->
                                            <button type="button" class="btn btn-default">
                                                <i class="mdi mdi-download"></i>
                                            </button>
                                        </div>
                                        <div class="col m6 s12 l4 text-center">
                                            <button type="button" class="btn btn-default">
                                                <i class="mdi mdi-upload"></i>
                                                Submit
                                            </button>
                                        </div>
                                        <?php echo form_close();?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="mdi mdi-file-excel"></i>Student Bulk Upload</div>
                    <div class="collapsible-body">
                        <div class="col s12 m12 l12">
                            <div class="panel panel-bordered">
                                <!--<div class="panel-header">
                                </div>-->
                                <div class="panel-header border-top-0">
                                    <div class="subtitle">
                                        <div class="card-panel alternative lighten-1">
                                            tips for Student bulk upload.
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <?php echo form_open_multipart('#',array('id' => 'form-upload-student', 'class' => 'validate bluk_upload_form'))?>
                                        <div class="col m6 s12 l4 text-center">
                                            <input type="file" name="userFile">
                                        </div>
                                        <div class="col m6 s12 l4 text-center">
                                            <!--<i class="mdi mdi-download"></i>-->
                                            <button type="button" class="btn btn-default">
                                                <i class="mdi mdi-download"></i>
                                            </button>
                                        </div>
                                        <div class="col m6 s12 l4 text-center">
                                            <button type="button" class="btn btn-default">
                                                <i class="mdi mdi-upload"></i>
                                                Submit
                                            </button>
                                        </div>
                                        <?php echo form_close();?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="mdi mdi-file-excel"></i>Parent Bulk Upload</div>
                    <div class="collapsible-body">
                        <div class="col s12 m12 l12">
                            <div class="panel panel-bordered">
                                <!--<div class="panel-header">
                                </div>-->
                                <div class="panel-header border-top-0">
                                    <div class="subtitle">
                                        <div class="card-panel alternative lighten-1">
                                            tips for Parent bulk upload.
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <?php echo form_open_multipart('#',array('id' => 'form-upload-parent', 'class' => 'validate bluk_upload_form'))?>
                                        <div class="col m6 s12 l4 text-center">
                                            <input type="file" name="userFile">
                                        </div>
                                        <div class="col m6 s12 l4 text-center">
                                            <!--<i class="mdi mdi-download"></i>-->
                                            <button type="button" class="btn btn-default">
                                                <i class="mdi mdi-download"></i>
                                            </button>
                                        </div>
                                        <div class="col m6 s12 l4 text-center">
                                            <button type="button" class="btn btn-default">
                                                <i class="mdi mdi-upload"></i>
                                                Submit
                                            </button>
                                        </div>
                                        <?php echo form_close();?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="mdi mdi-file-excel"></i> Subject Bulk Upload</div>
                    <div class="collapsible-body">
                        <div class="col s12 m12 l12">
                            <div class="panel panel-bordered">
                                <!--<div class="panel-header">
                                </div>-->
                                <div class="panel-header border-top-0">
                                    <div class="subtitle">
                                        <div class="card-panel alternative lighten-1">
                                            tips for Subject bulk upload.
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <?php echo form_open_multipart('#',array('id' => 'form-upload-subject', 'class' => 'validate bluk_upload_form'))?>
                                        <div class="col m6 s12 l4 text-center">
                                            <input type="file" name="userFile">
                                        </div>
                                        <div class="col m6 s12 l4 text-center">
                                            <!--<i class="mdi mdi-download"></i>-->
                                            <button type="button" class="btn btn-default">
                                                <i class="mdi mdi-download"></i>
                                            </button>
                                        </div>
                                        <div class="col m6 s12 l4 text-center">
                                            <button type="button" class="btn btn-default">
                                                <i class="mdi mdi-upload"></i>
                                                Submit
                                            </button>
                                        </div>
                                        <?php echo form_close();?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        
    </div>
</main>
<?php echo $footer; ?>
<script src="<?php echo SchoolSiteJSURL; ?>custom/<?php echo $this->erpUserTypeArr[$this->userType];?>/bulk_upload.js"></script>