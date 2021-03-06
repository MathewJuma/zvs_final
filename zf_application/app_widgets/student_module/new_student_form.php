<?php
    //Get the identfication code held in a session variable.
    $identificationCode = Zf_SessionHandler::zf_getSessionVariable("zvs_identificationCode");
    
    $new_student = "new_student";
    
    $currentDate = Zf_Core_Functions::Zf_CurrentDate();
    
    $currentYear = explode("-", $currentDate)[2];
    
    //echo $currentYear;
    
    //echo $identificationCode."<br/>_ggzjo422a8OskMuV3J0Q00DJVEN7YG7VXu25mK_FKx-sndjTSmU-dlm7lcVktUrhGii79_zec1hFqCeNGTH1t-asd086NLDROS8Yw5zXB-D0xmozRC8lndDcG1CPW8k";
    
    $registeredBy = $identificationCode;
?>

<form action="<?php Zf_GenerateLinks::basic_internal_link("student_module", "newStudentRegistration", $new_student); ?>" method="post" enctype="multipart/form-data" class="form-horizontal" id="new_student_form">
    <div class="form-wizard" id="newStudent">
        <div class="form-body">
            <ul class="nav nav-pills nav-justified steps">
                <li>
                    <a href="#newStudentInfo" data-toggle="tab" class="step active">
                        <span class="number">
                            1
                        </span>
                        <span class="desc progress-form-title">
                            <i class="fa fa-check"></i> New Student Details
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#confirmNewStudentInfo" data-toggle="tab" class="step">
                        <span class="number">
                            2
                        </span>
                        <span class="desc progress-form-title">
                            <i class="fa fa-check"></i> Confirm Student Details
                        </span>
                    </a>
                </li>
            </ul>
            <div id="bar" class="progress progress-striped active progress-bar-radius" role="progressbar">
                <div class="progress-bar progress-bar-info progress-bar-radius" style="width: 50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar"></div>
            </div>
            <div class="tab-content">
                <div class="alert alert-danger display-none">
                    <button class="close" data-dismiss="alert"></button>
                    You have some form errors. Please check below.
                </div>
                <div class="alert alert-success display-none">
                    <button class="close" data-dismiss="alert"></button>
                    Your form validation is successful!
                </div>
                
                
                <!-- START OF ADMIN SETUP FORM-->
                    <div class="tab-pane" id="newStudentInfo">
                     <!-- START STUDENT DETAILS-->
                        <h3 class="form-section block form-title">Student Details</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">First Name:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="studentFirstName" class="form-control" placeholder="First Name" value="<?php echo $zf_formHandler->zf_getFormValue("studentFirstName"); ?>">
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("studentFirstName"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Middle Name:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="studentMiddleName" class="form-control" placeholder="Middle Name" value="<?php echo $zf_formHandler->zf_getFormValue("studentMiddleName"); ?>">
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("studentMiddleName"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Last Name:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="studentLastName" class="form-control" placeholder="Last Name" value="<?php echo $zf_formHandler->zf_getFormValue("studentLastName"); ?>">
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("studentLastName"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Student Gender:</label>
                                    <div class="col-md-8">
                                        <div class="radio-list">
                                            <label class="radio-inline radio-labels">
                                            <input type="radio" name="studentGender" value="Male" data-title="Male"> Male </label>
                                            <label class="radio-inline radio-labels">
                                            <input type="radio" name="studentGender" value="Female"  data-title="Female"> Female </label>
                                            <span class="help-block server-side-error">
                                                <?php echo $zf_formHandler->zf_getFormError("studentGender") ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Date of Birth:</label>
                                    <div class="col-md-8">
                                        <div class="input-group input-medium date date-picker" data-date="<?php echo $currentDate;?>" style="width: 277px !important;" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                            <input type="text" class="form-control" name="studentDateOfBirth" readonly value="<?php echo $currentDate; ?>" >
                                            <span class="input-group-btn">
                                                <button class="btn default calendarBtn" type="button"><i class="fa fa-calendar"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Religion:</label>
                                    <div class="col-md-8">
                                        <select class="form-control select2me studentReligion" id="studentReligion" name="studentReligion" data-placeholder="Christian, Hindu, Muslim, ..."  value="<?php echo $zf_formHandler->zf_getFormValue("studentReligion"); ?>">
                                            <?php
                                                //This widget creates select options for religions
                                                $zf_widgetFolder = "zvs_options"; $zf_widgetFile = "religion_select.php";
                                                Zf_ApplicationWidgets::zf_load_widget($zf_widgetFolder, $zf_widgetFile);
                                            ?>
                                        </select>
                                        <span class="help-block server-side-error">
                                            <?php echo $zf_formHandler->zf_getFormError("studentReligion") ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Country:</label>
                                    <div class="col-md-8">
                                        <select class="form-control select2me studentCountry" id="studentCountry" name="studentCountry" data-placeholder="Kenya, Algeria, South Africa, Venezuela"  value="<?php echo $zf_formHandler->zf_getFormValue("studentCountry"); ?>">
                                            <?php
                                                //This widget creates select options for countires
                                                $zf_widgetFolder = "zvs_options"; $zf_widgetFile = "countries_select.php";
                                                Zf_ApplicationWidgets::zf_load_widget($zf_widgetFolder, $zf_widgetFile);
                                            ?>
                                        </select>
                                        <span class="help-block server-side-error">
                                            <?php echo $zf_formHandler->zf_getFormError("studentCountry") ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Locality:</label>
                                    <div class="col-md-8">
                                        <select class="form-control select2me studentLocality" id="studentLocality" name="studentLocality" data-placeholder="Approx. specific location" value="<?php echo $zf_formHandler->zf_getFormValue("studentLocality"); ?>">
                                            <option value=""></option>
                                        </select>
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("studentLocality") ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Box Address:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="studentBoxAddress" class="form-control" placeholder="P.O Box 1111-0111, Nairobi - Kenya" value="<?php echo $zf_formHandler->zf_getFormValue("studentBoxAddress"); ?>">
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("studentBoxAddress"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Phone Number:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="studentPhoneNumber" class="form-control" placeholder="0711111111" value="<?php echo $zf_formHandler->zf_getFormValue("studentPhoneNumber"); ?>">
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("studentPhoneNumber"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Official Language:</label>
                                    <div class="col-md-8">
                                        <select class="form-control select2me studentLanguage" id="studentLanguage" name="studentLanguage" data-placeholder="English, French, Spanish ..."  value="<?php echo $zf_formHandler->zf_getFormValue("studentLanguage"); ?>">
                                            <?php
                                                //This widget creates select options for languages
                                                $zf_widgetFolder = "zvs_options"; $zf_widgetFile = "languages_select.php";
                                                Zf_ApplicationWidgets::zf_load_widget($zf_widgetFolder, $zf_widgetFile);
                                            ?>
                                        </select>
                                        <span class="help-block server-side-error">
                                            <?php echo $zf_formHandler->zf_getFormError("studentLanguage") ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                        <!-- END OF STUDENT DETAILS-->
                       
                        
                        <!-- START PARENT DETAILS-->
                        <h3 class="form-section form-title">Guardian Details</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Designation:</label>
                                    <div class="col-md-8">
                                        <select class="form-control select2me guardianDesignation" id="guardianDesignation" name="guardianDesignation" data-placeholder="Dr., Mr., Mrs., Miss.,..."  value="<?php echo $zf_formHandler->zf_getFormValue("guardianDesignation"); ?>">
                                            <?php
                                                //This widget creates select options for religions
                                                $zf_widgetFolder = "zvs_options"; $zf_widgetFile = "designations_select.php";
                                                Zf_ApplicationWidgets::zf_load_widget($zf_widgetFolder, $zf_widgetFile);
                                            ?>
                                        </select>
                                        <span class="help-block server-side-error">
                                            <?php echo $zf_formHandler->zf_getFormError("guardianDesignation") ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">First Name:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="guardianFirstName" class="form-control" placeholder="First Name" value="<?php echo $zf_formHandler->zf_getFormValue("guardianFirstName"); ?>">
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("guardianFirstName"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Middle Name:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="guardianMiddleName" class="form-control" placeholder="Middle Name" value="<?php echo $zf_formHandler->zf_getFormValue("guardianMiddleName"); ?>">
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("guardianMiddleName"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Last Name:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="guardianLastName" class="form-control" placeholder="Last Name" value="<?php echo $zf_formHandler->zf_getFormValue("guardianLastName"); ?>">
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("guardianLastName"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Gender Name:</label>
                                    <div class="col-md-8">
                                        <div class="radio-list">
                                            <label class="radio-inline">
                                            <input type="radio" name="guardianGender" value="Male" data-title="Male"> Male </label>
                                            <label class="radio-inline">
                                            <input type="radio" name="guardianGender" value="Female"  data-title="Female"> Female </label>
                                        </div>
                                        <span class="help-block server-side-error">
                                            <?php echo $zf_formHandler->zf_getFormError("guardianGender") ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Date of Birth:</label>
                                    <div class="col-md-8">
                                        <div class="input-group input-medium date date-picker" data-date="<?php echo $currentDate;?>" style="width: 277px !important;" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                            <input type="text" class="form-control" name="guardianDateOfBirth" readonly value="<?php echo $currentDate; ?>" >
                                            <span class="input-group-btn">
                                                <button class="btn default calendarBtn" type="button"><i class="fa fa-calendar"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Religion:</label>
                                    <div class="col-md-8">
                                        <select class="form-control select2me guardianReligion" id="guardianReligion" name="guardianReligion" data-placeholder="Christian, Hindu, Muslim, ..."  value="<?php echo $zf_formHandler->zf_getFormValue("guardianReligion"); ?>">
                                            <?php
                                                //This widget creates select options for religions
                                                $zf_widgetFolder = "zvs_options"; $zf_widgetFile = "religion_select.php";
                                                Zf_ApplicationWidgets::zf_load_widget($zf_widgetFolder, $zf_widgetFile);
                                            ?>
                                        </select>
                                        <span class="help-block server-side-error">
                                            <?php echo $zf_formHandler->zf_getFormError("guardianReligion") ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Country:</label>
                                    <div class="col-md-8">
                                        <select class="form-control select2me guardianCountry" id="guardianCountry" name="guardianCountry" data-placeholder="Kenya, Algeria, South Africa, Venezuela"  value="<?php echo $zf_formHandler->zf_getFormValue("guardianCountry"); ?>">
                                            <?php
                                                //This widget creates select options for countires
                                                $zf_widgetFolder = "zvs_options"; $zf_widgetFile = "countries_select.php";
                                                Zf_ApplicationWidgets::zf_load_widget($zf_widgetFolder, $zf_widgetFile);
                                            ?>
                                        </select>
                                        <span class="help-block server-side-error">
                                            <?php echo $zf_formHandler->zf_getFormError("guardianCountry") ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Locality:</label>
                                    <div class="col-md-8">
                                        <select class="form-control select2me guardianLocality" id="guardianLocality" name="guardianLocality" data-placeholder="Approx. specific location" value="<?php echo $zf_formHandler->zf_getFormValue("guardianLocality"); ?>">
                                            <option value=""></option>
                                        </select>
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("guardianLocality") ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Box Address:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="guardianBoxAddress" class="form-control" placeholder="P.O Box 1111-0111, Nairobi - Kenya" value="<?php echo $zf_formHandler->zf_getFormValue("guardianBoxAddress"); ?>">
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("guardianBoxAddress"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Phone Number:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="guardianPhoneNumber" class="form-control" placeholder="0711111111" value="<?php echo $zf_formHandler->zf_getFormValue("guardianPhoneNumber"); ?>">
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("guardianPhoneNumber"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Relation:</label>
                                    <div class="col-md-8">
                                        <select class="form-control select2me guardianRelation" id="guardianRelation" name="guardianRelation" data-placeholder="Parent, Grandparent, Cousin ..."  value="<?php echo $zf_formHandler->zf_getFormValue("guardianRelation"); ?>">
                                            <?php
                                                //This widget creates select options for relation
                                                $zf_widgetFolder = "zvs_options"; $zf_widgetFile = "guardians_select.php";
                                                Zf_ApplicationWidgets::zf_load_widget($zf_widgetFolder, $zf_widgetFile);
                                            ?>
                                        </select>
                                        <span class="help-block server-side-error">
                                            <?php echo $zf_formHandler->zf_getFormError("guardianRelation") ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Occupation:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="guardianOccupation" class="form-control" placeholder="Farmer, Teacher, Accountant, ...." value="<?php echo $zf_formHandler->zf_getFormValue("guardianOccupation"); ?>">
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("guardianOccupation"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Official Language:</label>
                                    <div class="col-md-8">
                                        <select class="form-control select2me guardianLanguage" id="guardianLanguage" name="guardianLanguage" data-placeholder="English, French, Spanish ..."  value="<?php echo $zf_formHandler->zf_getFormValue("guardianLanguage"); ?>">
                                            <?php
                                                //This widget creates select options for languages
                                                $zf_widgetFolder = "zvs_options"; $zf_widgetFile = "languages_select.php";
                                                Zf_ApplicationWidgets::zf_load_widget($zf_widgetFolder, $zf_widgetFile);
                                            ?>
                                        </select>
                                        <span class="help-block server-side-error">
                                            <?php echo $zf_formHandler->zf_getFormError("guardianLanguage") ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                        <!-- END PARENT DETAILS-->
                        
                        
                        <!-- START MEDICAL DETAILS-->
                        <h3 class="form-section form-title">Medical Details</h3>
                        <!--Student blood group-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-12" style="text-align: left !important;">Do you know your blood group?:</label>
                                    <div class="col-md-10 col-md-offset-2">
                                        <div class="radio-list">
                                            <label class="radio-inline">
                                            <input id="studentBloodGroupYes" type="radio" name="isStudentBloodGroup" value="Yes" data-title="Yes"> Yes </label>
                                            <label class="radio-inline">
                                            <input id="studentBloodGroupNo" type="radio" name="isStudentBloodGroup" checked value="No" data-title="No"> No </label>
                                        </div>
                                        <div>
                                            <span class="help-block server-side-error">
                                                <?php echo $zf_formHandler->zf_getFormError("isStudentBloodGroup") ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 studentBloodGroup">
                                <div class="form-group">
                                    <label class="control-label col-md-12" style="text-align: left !important;">What is your blood group?:</label>
                                    <div class="col-md-12">
                                       <select class="form-control select2me studentBloodGroup" id="studentBloodGroup" name="studentBloodGroup" data-placeholder="AB +, AB -, A +, A -, B +, B -, O + , O -"  value="<?php echo $zf_formHandler->zf_getFormValue("studentBloodGroup"); ?>">
                                            <?php
                                                //This widget creates select options for blood groups
                                                $zf_widgetFolder = "zvs_options"; $zf_widgetFile = "blood_group_select.php";
                                                Zf_ApplicationWidgets::zf_load_widget($zf_widgetFolder, $zf_widgetFile);
                                            ?>
                                        </select>
                                        <span class="help-block server-side-error">
                                            <?php echo $zf_formHandler->zf_getFormError("studentBloodGroup") ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!--Student disability-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-12" style="text-align: left !important;">Do you have any conditions or disabilities that limit your physical activities?:</label>
                                    <div class="col-md-11 col-md-offset-1">
                                        <div class="radio-list">
                                            <label class="radio-inline">
                                            <input id="studentDisableYes" type="radio" name="isStudentDisable" value="Yes" data-title="Yes"> Yes </label>
                                            <label class="radio-inline">
                                            <input id="studentDisableNo" type="radio" name="isStudentDisable" checked value="No" data-title="No"> No </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 studentDisability">
                                <div class="form-group">
                                    <label class="control-label col-md-12" style="text-align: left !important;">Explain Conditions or Disabilities:</label>
                                    <div class="col-md-12">
                                        <textarea type="text" rows="10" id="studentDisability" name="studentDisability" class="form-control" placeholder="Explaing your conditions or disabilities in this section" value="<?php echo $zf_formHandler->zf_getFormValue("studentDisability"); ?>"></textarea>
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("studentDisability"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!--Student medication-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-12" style="text-align: left !important;">Do you have any medications that currently you are taking regularly?:</label>
                                    <div class="col-md-11 col-md-offset-1">
                                        <div class="radio-list">
                                            <label class="radio-inline">
                                            <input id="studentMedicatedYes" type="radio" name="isStudentMedicated" value="Yes" data-title="Yes"> Yes </label>
                                            <label class="radio-inline">
                                            <input id="studentMedicatedNo" type="radio" name="isStudentMedicated" checked value="No" data-title="No"> No </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 studentMedication">
                                <div class="form-group">
                                    <label class="control-label col-md-12" style="text-align: left !important;">Explain Current Medications:</label>
                                    <div class="col-md-12">
                                        <textarea type="text" rows="10" id="studentMedication" name="studentMedication" class="form-control" placeholder="Explaing medications that you are currently undertaking regularly" value="<?php echo $zf_formHandler->zf_getFormValue("studentMedication"); ?>"></textarea>
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("studentMedication"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        
                        <!--Student medication-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-12" style="text-align: left !important;">Do you experience allergies or allergic reactions to; Medicines, foods, seasons or any other?:</label>
                                    <div class="col-md-11 col-md-offset-1">
                                        <div class="radio-list">
                                            <label class="radio-inline">
                                            <input id="studentAllergicYes" type="radio" name="isStudentAllergic" value="Yes" data-title="Yes"> Yes </label>
                                            <label class="radio-inline">
                                            <input id="studentAllergicNo" type="radio" name="isStudentAllergic" checked value="No" data-title="No"> No </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 studentAllergic">
                                <div class="form-group">
                                    <label class="control-label col-md-12" style="text-align: left !important;">Explain your allergy condition:</label>
                                    <div class="col-md-12">
                                        <textarea type="text" rows="10" id="studentAllergic" name="studentAllergic" class="form-control" placeholder="Explain your allergy conditions in this section" value="<?php echo $zf_formHandler->zf_getFormValue("studentAllergic"); ?>"></textarea>
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("studentAllergic"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        
                        <!--Student special treatment-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-12" style="text-align: left !important;">Do you have any conditions that require a special consideration or treatment?:</label>
                                    <div class="col-md-11 col-md-offset-1">
                                        <div class="radio-list">
                                            <label class="radio-inline">
                                            <input id="studentTreatmentYes" type="radio" name="isStudentTreatment" value="Yes" data-title="Yes"> Yes </label>
                                            <label class="radio-inline">
                                            <input id="studentTreatmentNo" type="radio" name="isStudentTreatment" checked value="No" data-title="No"> No </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 studentTreatment">
                                <div class="form-group">
                                    <label class="control-label col-md-12" style="text-align: left !important;">Explain your special treatment or consideration condition:</label>
                                    <div class="col-md-12">
                                        <textarea type="text" rows="10" id="studentTreatment" name="studentTreatment" class="form-control" placeholder="Explain your special treatment or consideration conditions in this section" value="<?php echo $zf_formHandler->zf_getFormValue("studentTreatment"); ?>"></textarea>
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("studentTreatment"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        
                        <!--Student special doctor-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-12" style="text-align: left !important;">Incase of an emergency, do you have a specialized physician/doctor who handles your case?:</label>
                                    <div class="col-md-11 col-md-offset-1">
                                        <div class="radio-list">
                                            <label class="radio-inline">
                                            <input id="studentPhysicianYes" type="radio" name="isStudentPhysician" value="Yes" data-title="Yes"> Yes </label>
                                            <label class="radio-inline">
                                            <input id="studentPhysicianNo" type="radio" name="isStudentPhysician" checked value="No" data-title="No"> No </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 studentPhysician">
                                <div class="form-group">
                                    <label class="control-label col-md-12" style="text-align: left !important;">Fill in all physician/doctor's Information:</label>
                                </div>
                            </div>
                            <div class="col-md-6 studentPhysician">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Designation:</label>
                                    <div class="col-md-8">
                                        <select class="form-control select2me physicianDesignation studentPhysician" id="physicianDesignation" name="physicianDesignation" data-placeholder="Dr., Mr., Mrs., Miss, ....."  value="<?php echo $zf_formHandler->zf_getFormValue("physicianDesignation"); ?>">
                                            <?php
                                                //This widget creates select options for designations
                                                $zf_widgetFolder = "zvs_options"; $zf_widgetFile = "designations_select.php";
                                                Zf_ApplicationWidgets::zf_load_widget($zf_widgetFolder, $zf_widgetFile);
                                            ?>
                                        </select>
                                        <span class="help-block server-side-error">
                                            <?php echo $zf_formHandler->zf_getFormError("physicianDesignation") ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row studentPhysician">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">First Name:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="physicianFirstName" class="form-control studentPhysician" placeholder="First Name" value="<?php echo $zf_formHandler->zf_getFormValue("physicianFirstName"); ?>">
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("physicianFirstName"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Last Name:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="physicianLastName" class="form-control studentPhysician" placeholder="Last Name" value="<?php echo $zf_formHandler->zf_getFormValue("physicianLastName"); ?>">
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("physicianLastName"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">1<sup>st</sup> Mobile No:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="firstPhysicianMobileNumber" class="form-control studentPhysician" placeholder="0711111111" value="<?php echo $zf_formHandler->zf_getFormValue("firstPhysicianMobileNumber"); ?>">
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("firstPhysicianMobileNumber"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">2<sup>nd</sup> Mobile No:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="secondPhysicianMobileNumber" class="form-control studentPhysician" placeholder="0711111111" value="<?php echo $zf_formHandler->zf_getFormValue("secondPhysicianMobileNumber"); ?>">
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("secondPhysicianMobileNumber"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Email Address:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="physicianEmailAddress" class="form-control studentPhysician" placeholder="Email Address" value="<?php echo $zf_formHandler->zf_getFormValue("physicianEmailAddress"); ?>">
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("physicianEmailAddress"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Box Address:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="physicianBoxAddress" class="form-control studentPhysician" placeholder="Box Address" value="<?php echo $zf_formHandler->zf_getFormValue("physicianBoxAddress"); ?>">
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("physicianBoxAddress"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Country:</label>
                                    <div class="col-md-8">
                                        <select class="form-control select2me physicianCountry studentPhysician" id="physicianCountry" name="physicianCountry" data-placeholder="Kenya, Algeria, South Africa, Venezuela"  value="<?php echo $zf_formHandler->zf_getFormValue("physicianCountry"); ?>">
                                            <?php
                                                //This widget creates select options for countires
                                                $zf_widgetFolder = "zvs_options"; $zf_widgetFile = "countries_select.php";
                                                Zf_ApplicationWidgets::zf_load_widget($zf_widgetFolder, $zf_widgetFile);
                                            ?>
                                        </select>
                                        <span class="help-block server-side-error">
                                            <?php echo $zf_formHandler->zf_getFormError("physicianCountry") ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Locality:</label>
                                    <div class="col-md-8">
                                        <select class="form-control select2me physicianLocality studentPhysician" id="physicianLocality" name="physicianLocality" data-placeholder="Approx. specific location" value="<?php echo $zf_formHandler->zf_getFormValue("physicianLocality"); ?>">
                                            <option value=""></option>
                                        </select>
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("physicianLocality") ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        
                        <!--Student special hospital-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-12" style="text-align: left !important;">Incase of sickness do you have a specific hospital that is restricted to handling your case?:</label>
                                    <div class="col-md-11 col-md-offset-1">
                                        <div class="radio-list">
                                            <label class="radio-inline">
                                            <input id="studentHospitalYes" type="radio" name="isStudentHospital" value="Yes" data-title="Yes"> Yes </label>
                                            <label class="radio-inline">
                                            <input id="studentHospitalNo" type="radio" name="isStudentHospital" checked value="No" data-title="No"> No </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 studentHospital">
                                <div class="form-group">
                                    <label class="control-label col-md-12" style="text-align: left !important;">Fill in all hospital information:</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row studentHospital">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Hospital Name:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="hospitalName" class="form-control studentHospital" placeholder="Hospital Name" value="<?php echo $zf_formHandler->zf_getFormValue("hospitalName"); ?>">
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("hospitalName"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">1<sup>st</sup> Phone No:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="firstHospitalNumber" class="form-control studentHospital" placeholder="0711111111" value="<?php echo $zf_formHandler->zf_getFormValue("firstHospitalNumber"); ?>">
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("firstHospitalNumber"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">2<sup>nd</sup> Phone No:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="secondHospitalNumber" class="form-control studentHospital" placeholder="0711111111" value="<?php echo $zf_formHandler->zf_getFormValue("secondHospitalNumber"); ?>">
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("secondHospitalNumber"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Email Address:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="hospitalEmailAddress" class="form-control studentHospital" placeholder="Email Address" value="<?php echo $zf_formHandler->zf_getFormValue("hospitalEmailAddress"); ?>">
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("hospitalEmailAddress"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Box Address:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="hospitalBoxAddress" class="form-control studentHospital" placeholder="Box Address" value="<?php echo $zf_formHandler->zf_getFormValue("hospitalBoxAddress"); ?>">
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("hospitalBoxAddress"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Country:</label>
                                    <div class="col-md-8">
                                        <select class="form-control select2me hospitalCountry studentHospital" id="hospitalCountry" name="hospitalCountry" data-placeholder="Kenya, Algeria, South Africa, Venezuela"  value="<?php echo $zf_formHandler->zf_getFormValue("hospitalCountry"); ?>">
                                            <?php
                                                //This widget creates select options for countires
                                                $zf_widgetFolder = "zvs_options"; $zf_widgetFile = "countries_select.php";
                                                Zf_ApplicationWidgets::zf_load_widget($zf_widgetFolder, $zf_widgetFile);
                                            ?>
                                        </select>
                                        <span class="help-block server-side-error">
                                            <?php echo $zf_formHandler->zf_getFormError("physicianCountry") ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Locality:</label>
                                    <div class="col-md-8">
                                        <select class="form-control select2me hospitalLocality studentHospital" id="hospitalLocality" name="hospitalLocality" data-placeholder="Approx. specific location" value="<?php echo $zf_formHandler->zf_getFormValue("hospitalLocality"); ?>">
                                            <option value=""></option>
                                        </select>
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("hospitalLocality") ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <!-- END MEDICAL DETAILS-->
                        
                        
                        <!-- START CLASS DETAILS-->
                        <h3 class="form-section form-title">Class Details</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Select Class:</label>
                                    <div class="col-md-8">
                                        <select class="form-control select2me studentClassCode" id="studentClassCode" name="studentClassCode" data-placeholder="Form 1 or Class 1, Form 2 or Class 2, ..." value="<?php echo $zf_formHandler->zf_getFormValue("studentClassCode"); ?>">
                                            <?php
                                                $zf_widgetFolder = "zvs_options"; $zf_widgetFile = "class_select.php";
                                                Zf_ApplicationWidgets::zf_load_widget($zf_widgetFolder, $zf_widgetFile, $identificationCode);
                                            ?>
                                        </select>
                                        <span class="help-block server-side-error">
                                            <?php echo $zf_formHandler->zf_getFormError("studentClassCode") ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Stream Name:</label>
                                    <div class="col-md-8">
                                        <select class="form-control select2me studentStreamCode" id="studentStreamCode" name="studentStreamCode" data-placeholder="East, West, North, South, ..." value="<?php echo $zf_formHandler->zf_getFormValue("studentStreamCode"); ?>">
                                            <option value=""></option>
                                        </select>
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("studentStreamCode") ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Admission No:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="studentAdmissionNumber" class="form-control" placeholder="2371, 0021, 6791, ...." value="<?php echo $zf_formHandler->zf_getFormValue("studentAdmissionNumber"); ?>">
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("studentAdmissionNumber"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END CLASS DETAILS-->
                        
                        
                        <!-- START HOSTEL DETAILS-->
                        <!--<h3 class="form-section form-title">Hostel Details</h3>-->
                        <!-- END HOSTEL DETAILS-->
                        
                        
                        <!-- STUDENT LOGIN DETAILS-->
                        <h3 class="form-section form-title">Student Login Details <small class="form-indicators" style="color:#ff0000 !important;">* This information is vital for student platform login</small></h3>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Email Address:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="studentEmailAddress" class="form-control" placeholder="student@zilasvirtualschool.com" value="<?php echo $zf_formHandler->zf_getFormValue("studentEmailAddress"); ?>">
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("studentEmailAddress"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">School Role:</label>
                                    <div class="col-md-8">
                                        <select class="form-control select2me studentSchoolRole" id="studentSchoolRole" name="studentSchoolRole" data-placeholder="Student, Headboy, Class Prefect..." value="<?php echo $zf_formHandler->zf_getFormValue("studentSchoolRole"); ?>">
                                            <?php
                                                $zf_widgetFolder = "zvs_options"; $zf_widgetFile = "role_select.php";
                                                Zf_ApplicationWidgets::zf_load_widget($zf_widgetFolder, $zf_widgetFile, $identificationCode);
                                            ?>
                                        </select>
                                        <span class="help-block server-side-error">
                                            <?php echo $zf_formHandler->zf_getFormError("studentSchoolRole") ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Password:</label>
                                    <div class="col-md-8">
                                        <input type="password" name="studentPassword" id="studentPassword" class="form-control" placeholder="Password" value="<?php echo $zf_formHandler->zf_getFormValue("studentPassword"); ?>">
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("studentPassword"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Confirm:</label>
                                    <div class="col-md-8">
                                        <input type="password" name="studentPassword2" class="form-control" placeholder="Confirm Password" value="<?php echo $zf_formHandler->zf_getFormValue("studentPassword2"); ?>">
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("studentPassword2"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                        <!-- END LOGIN DETAILS-->
                        
                        
                        <!-- GUARDIAN LOGIN DETAILS-->
                        <h3 class="form-section form-title">Guardian Login Details <small class="form-indicators" style="color:#ff0000 !important;">* This information is vital for guardian platform login</small></h3>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Email Address:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="guardianEmailAddress" class="form-control" placeholder="guardian@zilasvirtualschool.com" value="<?php echo $zf_formHandler->zf_getFormValue("guardianEmailAddress"); ?>">
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("guardianEmailAddress"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">School Role:</label>
                                    <div class="col-md-8">
                                        <select class="form-control select2me guardianSchoolRole" id="guardianSchoolRole" name="guardianSchoolRole" data-placeholder="Parent, Teacher, Bursar, ..." value="<?php echo $zf_formHandler->zf_getFormValue("guardianSchoolRole"); ?>">
                                            <?php
                                                $zf_widgetFolder = "zvs_options"; $zf_widgetFile = "role_select.php";
                                                Zf_ApplicationWidgets::zf_load_widget($zf_widgetFolder, $zf_widgetFile, $identificationCode);
                                            ?>
                                        </select>
                                        <span class="help-block server-side-error">
                                            <?php echo $zf_formHandler->zf_getFormError("guardianSchoolRole") ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Password:</label>
                                    <div class="col-md-8">
                                        <input type="password" name="guardianPassword" id="guardianPassword" class="form-control" placeholder="Password" value="<?php echo $zf_formHandler->zf_getFormValue("guardianPassword"); ?>">
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("guardianPassword"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Confirm:</label>
                                    <div class="col-md-8">
                                        <input type="password" name="guardianPassword2" class="form-control" placeholder="Confirm Password" value="<?php echo $zf_formHandler->zf_getFormValue("guardianPassword2"); ?>">
                                        <span class="help-block server-side-error" >
                                            <?php echo $zf_formHandler->zf_getFormError("guardianPassword2"); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                    <!-- END LOGIN DETAILS-->
                    
                    <!-- END LOGIN DETAILS-->
                    
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="registeredBy" class="form-control" value="<?php echo $registeredBy; ?>">
                        </div>
                    </div>
                    
                </div>
                <!-- END OF ADMINL SETUP FORM-->
                
                <!-- START OF CONFIRM SETUP SECTION-->
                <div class="tab-pane" id="confirmNewStudentInfo">
                    
                    <h3 class="form-section block  form-title"><i class='fa fa-user' style='font-size: 25px !important; padding-right: 5px !important;'></i>Confirm Student Information</h3>
                    <div class="container">
                        <div id="confirmationTab">
                            <ul class="resp-tabs-list hor_2">
                                <li>Personal Information</li>
                                <li>Guardian Information</li>
                                <li>Medical Information</li>
                                <li>Class Information</li>
                                <li>Login Information</li>
                            </ul>
                            <div class="resp-tabs-container hor_2">
                                <div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-5">First Name:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static confirm-form-result" data-display="studentFirstName"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-5">Middle Name:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static confirm-form-result"  data-display="studentMiddleName"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-5">Last Name:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static confirm-form-result" data-display="studentLastName"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-5">Student Gender:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static confirm-form-result" data-display="studentGender"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-5">Date of Birth:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static confirm-form-result" data-display="studentDateOfBirth"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-5">Student Religion:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static confirm-form-result" data-display="studentReligion"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-5">Student Country:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static confirm-form-result" data-display="studentCountry"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-5">Student Locality:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static confirm-form-result" data-display="studentLocality"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-5">Student Address:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static confirm-form-result" data-display="studentBoxAddress"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-5">Student Phone No.:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static confirm-form-result" data-display="studentPhoneNumber"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-5">Student Language:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static confirm-form-result" data-display="studentLanguage"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Designation:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static confirm-form-result" data-display="guardianDesignation"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">First Name:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static confirm-form-result" data-display="guardianFirstName"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Middle Name:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static confirm-form-result" data-display="guardianMiddleName"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Last Name:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static confirm-form-result" data-display="guardianLastName"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Gender:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static confirm-form-result" data-display="guardianGender"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Date of Birth:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static confirm-form-result" data-display="guardianDateOfBirth"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Religion:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static confirm-form-result" data-display="guardianReligion"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Country:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static confirm-form-result" data-display="guardianCountry"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Locality:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static confirm-form-result" data-display="guardianLocality"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">P.O Box Address:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static confirm-form-result" data-display="guardianBoxAddress"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Phone Number:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static confirm-form-result" data-display="guardianPhoneNumber"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Relation:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static confirm-form-result" data-display="guardianRelation"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Occupation:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static confirm-form-result" data-display="guardianOccupation"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Language:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static confirm-form-result" data-display="guardianLanguage"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label col-md-8">Knows blood group?:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static confirm-form-result" data-display="isStudentBloodGroup"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Blood group details:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static confirm-form-result" data-display="studentBloodGroup"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label col-md-8">Student disabled?:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static confirm-form-result" data-display="isStudentDisable"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Disability details:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static confirm-form-result" data-display="studentDisability"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label col-md-8">Student medicated?:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static confirm-form-result" data-display="isStudentMedicated"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Medication details:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static confirm-form-result" data-display="studentMedication"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label col-md-8">Student allergic?:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static confirm-form-result" data-display="isStudentAllergic"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Allergy details:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static confirm-form-result" data-display="studentAllergic"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label col-md-8">Student treated?:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static confirm-form-result" data-display="isStudentTreatment"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Treatment details:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static confirm-form-result" data-display="studentTreatment"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->
                                    
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1"><h4 class="form-section confirm-inner-title"></h4></div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-6">Student has physician?:</label>
                                                <div class="col-md-6">
                                                    <p class="form-control-static confirm-form-result" data-display="isStudentPhysician"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-6">Physician Designation:</label>
                                                <div class="col-md-6">
                                                    <p class="form-control-static confirm-form-result" data-display="physicianDesignation"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-6">First Name:</label>
                                                <div class="col-md-6">
                                                    <p class="form-control-static confirm-form-result" data-display="physicianFirstName"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-6">Last Name:</label>
                                                <div class="col-md-6">
                                                    <p class="form-control-static confirm-form-result" data-display="physicianLastName"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-6">1<sup>st</sup> Mobile Number:</label>
                                                <div class="col-md-6">
                                                    <p class="form-control-static confirm-form-result" data-display="firstPhysicianMobileNumber"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-6">2<sup>nd</sup> Mobile Number:</label>
                                                <div class="col-md-6">
                                                    <p class="form-control-static confirm-form-result" data-display="secondPhysicianMobileNumber"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-6">Email Address:</label>
                                                <div class="col-md-6">
                                                    <p class="form-control-static confirm-form-result" data-display="physicianEmailAddress"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-6">Box Address:</label>
                                                <div class="col-md-6">
                                                    <p class="form-control-static confirm-form-result" data-display="physicianBoxAddress"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-6">Country:</label>
                                                <div class="col-md-6">
                                                    <p class="form-control-static confirm-form-result" data-display="physicianCountry"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-6">Locality:</label>
                                                <div class="col-md-6">
                                                    <p class="form-control-static confirm-form-result" data-display="physicianLocality"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->
                                    
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1"><h4 class="form-section confirm-inner-title"></h4></div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-6">Student has a hospital?:</label>
                                                <div class="col-md-6">
                                                    <p class="form-control-static confirm-form-result" data-display="isStudentHospital"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-6">Hospital Name:</label>
                                                <div class="col-md-6">
                                                    <p class="form-control-static confirm-form-result" data-display="hospitalName"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-6">1<sup>st</sup> Hospital Number:</label>
                                                <div class="col-md-6">
                                                    <p class="form-control-static confirm-form-result" data-display="firstHospitalNumber"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-6">2<sup>nd</sup> Hospital Number:</label>
                                                <div class="col-md-6">
                                                    <p class="form-control-static confirm-form-result" data-display="secondHospitalNumber"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-6">Email Address:</label>
                                                <div class="col-md-6">
                                                    <p class="form-control-static confirm-form-result" data-display="hospitalEmailAddress"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-6">Box Address:</label>
                                                <div class="col-md-6">
                                                    <p class="form-control-static confirm-form-result" data-display="hospitalBoxAddress"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-6">Country:</label>
                                                <div class="col-md-6">
                                                    <p class="form-control-static confirm-form-result" data-display="hospitalCountry"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-6">Locality:</label>
                                                <div class="col-md-6">
                                                    <p class="form-control-static confirm-form-result" data-display="hospitalLocality"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->
                                    
                                </div>
                                <div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-5">Class Name:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static confirm-form-result" data-display="studentClassCode"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-5">Stream Name:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static confirm-form-result" data-display="studentStreamCode"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-5">Admission Number:</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static confirm-form-result" data-display="studentAdmissionNumber"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->
                                </div>
                                <div>
                                    <h4 class="form-section confirm-inner-title">Student Login Information</h4>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Student Email:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static confirm-form-result" data-display="studentEmailAddress"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Student Role:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static confirm-form-result" data-display="studentSchoolRole"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->
                                    
                                    <h4 class="form-section confirm-inner-title">Guardian Login Information</h4>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Guardian Email:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static confirm-form-result" data-display="guardianEmailAddress"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Guardian Role:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static confirm-form-result" data-display="guardianSchoolRole"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--row-->
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                <!-- END OF CONFIRM SETUP SECTION-->
                
            </div>
        </div>
        <div class="form-actions fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-offset-5 col-md-7">
                        <a href="javascript:;" class="btn default button-previous">
                            <i class="m-icon-swapleft"></i> Back
                        </a>
                        <a href="javascript:;" class="btn blue button-next">
                            Continue <i class="m-icon-swapright m-icon-white"></i>
                        </a>
<!--                        <a href="javascript:;" class="btn green button-submit">
                            Submit <i class="m-icon-swapright m-icon-white"></i>
                        </a>-->
                        <button type="submit" class="btn green button-submit">
                            Submit <i class="m-icon-swapright m-icon-white"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php
    Zf_SessionHandler::zf_unsetSessionVariable("zf_valueArray");
    Zf_SessionHandler::zf_unsetSessionVariable("zf_errorArray");
?>
