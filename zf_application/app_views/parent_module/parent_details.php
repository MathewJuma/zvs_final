<?php

    //This is user identification code
    $identificationCode = Zf_SecureData::zf_decode_data($zf_actionData);
    
    Zf_SessionHandler::zf_setSessionVariable("sessionIdentificationCode", $identificationCode);
    
?>
    
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">

        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">Student Details</h3>
                <div class="page-breadcrumb breadcrumb">
                    <i class="fa fa-users"></i> <?php Zf_BreadCrumbs::zf_load_breadcrumbs(); ?>
                </div>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <div class="clearfix"></div>
        
        <!-- BEGIN INNER CONTENT -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zozo_tab_wrapper">
                <div id="tabbed-nav">
                    <ul class="z-tabs-titles">
                        <li><a>General students details</a></li>
                    </ul>

                    <div class="z-content-inner" style="background-color: #EFEFEF !important;">
                        <div style="margin-bottom: -15px !important;">
                            <!--START OF SECTION-->
                            <div class="row margin-top-10">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="portlet zvs-content-blocks" style="min-height: 400px !important;">
                                        <!-- BEGIN DASHBOARD CONTENT -->
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <?php 
                                                
                                                    //Access to pull all administrator information.
                                                    $zf_controller->Zf_loadModel("student_module", "studentInformation");
                                                    
                                                    //This method fetches student information from student module
                                                    $zf_controller->zf_targetModel->zvs_fetchStudentInformation();
                                                    
                                                ?>
                                            </div>
                                        </div>
                                        <!-- END DASHBOARD CONTENT -->
                                        
                                        <div class="clearfix"></div>
                                        
                                        <!-- BEGIN TABLE CONTENT-->
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: -10px !important;">
                                                <div class="portlet box zvs-content-blocks" style="min-height: 10px !important;">
                                                    <div class="portlet-empty table-responsive" style="margin-right: 4% !important;">
                                                        <div style="margin-right: 8px !important;">
                                                            <?php echo $zf_generateTable; ?>
                                                        </div>
                                                    </div>
                                                </div>          
                                            </div>
                                        </div>
                                        <!-- END TABLE CONTENT-->
                                        
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <!--END OF SECTION-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END INNER CONTENT -->
        
    </div>
</div>
<!-- END CONTENT -->
<script type="text/javascript">
    $(document).ready(function() {

        //Here we are generating the applications absolute path.
        var $absolute_path = "<?= ZF_ROOT_PATH; ?>";
        var $separator = "<?= DS; ?>";
        var $current_view = "student_details";

        //StudentModule.init($current_view, $absolute_path, $separator );


    });
</script>  
