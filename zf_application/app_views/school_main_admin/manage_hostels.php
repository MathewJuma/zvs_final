<?php

    //Access to pull all administrator information.
    $zf_controller->Zf_loadModel("school_main_admin", "manageSchoolHostels");
    
    //This is user identification code
    $identificationCode = Zf_SecureData::zf_decode_data($zf_actionData);
    
?>


<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">

        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">Manage Hostels</h3>
                <div class="page-breadcrumb breadcrumb">
                    <i class="fa fa-home"></i> <?php Zf_BreadCrumbs::zf_load_breadcrumbs(); ?>
                </div>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->

        <div class="clearfix"></div>
        <?php
            //This is the pop up indicator that shows a success or a failure in creating a new class.
            $zf_widgetFolder = "indicators"; $zf_widgetFile = "hostel_setup_indicator.php";
            Zf_ApplicationWidgets::zf_load_widget($zf_widgetFolder, $zf_widgetFile);
        ?>    
        <!-- BEGIN INNER CONTENT -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zozo_tab_wrapper">
                <div id="tabbed-nav">
                    <ul class="z-tabs-titles">
                        <li><a>Hostels / Dormitories overview</a></li>
                        <li><a><i class="fa fa-plus-square"></i> Add a hostel / dormitory</a></li>
                    </ul>

                    <div class="z-content-inner">
                        <div>
                            <div class="row margin-top-10">
                                <?php
                                    //Here we fetch all hostel details
                                    $zf_controller->zf_targetModel->fetchHostelDetails($identificationCode);
                                ?>
                            </div>
                        </div>
                        <div>
                            <div class="row margin-top-10">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: -15px !important;">
                                    <div class="portlet box zvs-content-blocks" style="min-height: 340px !important;">
                                        <div class="portlet-body form" >
                                            <?php
                                                //This is the form for registering platform super administrators
                                                Zf_ApplicationWidgets::zf_load_widget("school_main_admin", "new_hostel_form.php");
                                            ?>
                                        </div>
                                    </div>          
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END INNER CONTENT -->
            
        </div>
</div>
<!-- END CONTENT -->

<?php
    Zf_SessionHandler::zf_unsetSessionVariable("zf_valueArray");
    Zf_SessionHandler::zf_unsetSessionVariable("zf_errorArray");
?>

