    <?php
        
        $activeURL = Zf_Core_Functions::Zf_URLSanitize();

        //This is the controller
        $zvs_controller = $activeURL[0];
        
        //This is user identificationCode
        $identificationCode = $zf_actionData;
        
        //This model holds all user information details
        $zf_controller->Zf_loadModel("school_main_admin", "userInformation");
        
    ?>
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
           
            <!-- BEGIN PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                    <h3 class="page-title">My Profile</h3>
                    <div class="page-breadcrumb breadcrumb">
                        <i class="fa fa-home"></i> <?php Zf_BreadCrumbs::zf_load_breadcrumbs(); ?>
                    </div>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <!-- END PAGE HEADER-->
            
            <div class="clearfix"></div>
            
            <!-- BEGIN INNER CONTENT -->
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="portlet box zvs-content-blocks">
                        <div class="zvs-content-titles">
                            <h3>Personal Profile</h3>
                        </div>
                        <div class="portlet-body">
                            <?php 
                                $userInformation = $zf_controller->zf_targetModel->getUserInformation($identificationCode);
                                
                                foreach ($userInformation as $value) {

                                    $designation = $value['designation']; $userName = $value['firstName']." ".$value['lastName']; $mobileNumber = $value['mobileNumber']; $gender = $value['gender']; $dateCreated = date("M j, Y", strtotime($value['dateCreated'])); $address = $value['address']; $imagePath = $value['imagePath'];

                                }   
                            ?>
                            
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 margin-top-10 margin-bottom-20">
                                    <div class="zvs-circular">
                                        <i class="fa fa-user" style="font-size: 80px; padding-top: 30px !important; color: #e5e5e5 !important;"></i>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-condensed table-responsive table-hover">
                                            <tbody>
                                                <tr><td><i class="fa fa-user zvs-user-profile"></i></td><td><?= $designation." ".$userName; ?></td></tr>
                                                <tr><td><i class="fa fa-phone zvs-user-profile"></i></td><td><?= $mobileNumber; ?></td></tr>
                                                <tr><td><i class="fa fa-envelope zvs-user-profile"></i></td><td><?= $address; ?></td></tr>
                                                <tr><td><i class="fa fa-transgender zvs-user-profile"></i></td><td><?= $gender; ?></td></tr>
                                                <tr><td><i class="fa fa-calendar-o zvs-user-profile"></i></td><td><?= $dateCreated." (Date Created)"; ?></td></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                                
                        </div>
                    </div>          
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <div class="portlet box zvs-content-blocks">
                        <div class="zvs-content-titles">
                            <h3>My Story</h3>
                        </div>
                        <div class="portlet-body" style="text-align: justify;">
                            <?php 
                                $schoolInformation = $zf_controller->zf_targetModel->getSchoolInformation($identificationCode);
                                
                                //print_r($schoolInformation);
                                foreach ($schoolInformation as $value) {

                                    $schoolName = $value['schoolName']; $dateOfEstablishment = date("F, Y", strtotime($value['dateOfEstablishment'])); $dateOfRegistration = date("F, Y", strtotime($value['dateOfRegistration'])); 
                                    $schoolLevel = $value['schoolLevel']; $schoolGender = $value['schoolGender']; $schoolCategory = $value['schoolCategory']; $schoolType = $value['schoolType']; $mainSchoolSponsor = $value['mainSchoolSponsor']; $countryCode = $value['schoolCountry']; $localityCode = $value['schoolLocality'];
                                    
                                    $schoolLocation = $zf_controller->zf_targetModel->getSchoolLocation($countryCode, $localityCode);
                                                    
                                }   
                            ?>
                            
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <p>
                                        <?=$designation." ".$userName; ?> is the school main administrator for <?=$schoolName; ?>, hosted on Zilas Virtual Schools<sup style='font-size: 8px !important; font-style: normal;'>TM</sup> platform.
                                        My role on the platform is to ensure that the virtual version of <?=$schoolName; ?> is configured and properly functioning.
                                    </p>
                                    <p><?=$schoolName; ?> has been registered on Zilas Virtual Schools<sup style='font-size: 8px !important; font-style: normal;'>TM</sup> platform since <?=$dateOfRegistration; ?>. Established in <?=$dateOfEstablishment; ?> in <?=$schoolLocation; ?>, this is a <?=$schoolGender.", ".$schoolCategory." ".$schoolLevel." and ".$schoolType; ?> school, which is mainly sponsored by the <?=$mainSchoolSponsor;?>.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <p>My best,<br><em><?=$designation." ".$userName; ?></em></p>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 margin-bottom-5">
                                    <a href="<?php Zf_GenerateLinks::basic_internal_link($zvs_controller, "main_dashboard", "$identificationCode"); ?>">
                                        <button type="button" class="btn pull-right zvs-buttons" style="color: #ffffff !important;">
                                            <i  style="color: #ffffff !important;" class="fa fa-home"></i> &nbsp;Main Dashboard
                                        </button>
                                    </a>
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

