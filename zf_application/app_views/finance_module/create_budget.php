
<?php

    //Access to pull all administrator information.
    $zf_controller->Zf_loadModel("finance_module", "processBudgetInformation");
    
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
                <h3 class="page-title">Create School Budget</h3>
                <div class="page-breadcrumb breadcrumb">
                    <i class="fa fa-money"></i> <?php Zf_BreadCrumbs::zf_load_breadcrumbs(); ?>
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
                        <li><a>School budget overview</a></li>
                        <li><a><i class="fa fa-plus-square"></i> School budget setup</a></li>
                    </ul>
                     <div class="z-content-inner">
                        <div>
                            <div class="row margin-top-10">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: -10px !important;">
                                    <div class="portlet box zvs-content-blocks" style="min-height: 50px !important;">
                                        <div class="portlet-body form" style="min-height: 50px !important;">
                                            <h3 class="form-section form-title" style="padding-top: 10px !important;">General School Budget </h3> 
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 portlet-titles" style="min-height: 10px !important; font-weight: 900; padding-top: 10px;">
                                                    Select School Budget Year
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 portlet-titles"  style="min-height: 10px !important; text-align: right !important;">
                                                    Select a year: <?=$zf_controller->zf_targetModel->zvs_buildFinancialYearsSelectCode($identificationCode, "generalOverviewFinancialYearCode");?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-bottom: -10px !important;">
                                <div class="row margin-top-10" id="generalStaticBudgetOverview">
                                    <?php $zf_controller->zf_targetModel->fetchBudgetOverviewSplashScreen(); ?> 
                                </div>
                                <div class="row margin-top-10"s id="generateDynamicBudgetOverview"></div>
                            </div>
                        </div>
                        <div>
                            <div class="row margin-top-10">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: -15px !important;">
                                    <div class="portlet box zvs-content-blocks" style="min-height: 340px !important;">
                                        <div class="portlet-body form" >
                                            <?php
                                                //This is the form for registering platform super administrators
                                                Zf_ApplicationWidgets::zf_load_widget("finance_module", "create_budget_form.php");
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

<script type="text/javascript">
    $(document).ready(function() {

        //Here we are generating the applications absolute path.
        var $absolute_path = "<?= ZF_ROOT_PATH; ?>";
        var $separator = "<?= DS; ?>";
        var $current_view = "create_budget";

        FinanceModule.init($current_view, $absolute_path, $separator );
        

    });
</script> 