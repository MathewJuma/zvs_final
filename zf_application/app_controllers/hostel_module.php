<?php

/**
 * -----------------------------------------------------------------------------
 * THIS IS THE HOSTEL MODULE CONTROLLER, ESSENTIAL FOR ROUTING AND EXECUTING 
 * ALL ACTIONS THAT RELATE TO HOSTEL MODULE MODELS AND VIEWS.
 * -----------------------------------------------------------------------------
 *
 * @author Mathew Juma O. (ATHIAS AVIANS) <mathew@headsafrica.com>
 * @time  14th/August/2013  Time: 11:00 EMT
 * @link http://www.zilasframework.com/
 * @copyright Copyright &copy; 2013 Zilas Software LLC
 * @license http://www.zilasframework.com/license/
 * @version 1.01 Final
 * @since version 1.01 Final - 11th/August/2013 (sunday)
 * 
 */

class hostel_moduleController extends Zf_Controller {
   
    
    public $zf_defaultAction = "hostel_module";



    public function __construct() {
        
        /**
         * CALL THE CONSTRUCTOR OF THE PARENT CLASS.
         */
        parent::__construct();
        
    }

    
    
    //This action executes the landing page for this module
    public function actionHostel_module($identificationCode){
        
        $zf_actionData = Zf_SecureData::zf_decode_data($identificationCode);
        
        Zf_View::zf_displayView("hostel_module_introduction", $zf_actionData);
        
    }

    
    
    //This action executes the view for registering students into hostels
    public function actionHostel_register_student($identificationCode){
        
        $zf_actionData = Zf_SecureData::zf_decode_data($identificationCode);
        
        Zf_View::zf_displayView("hostel_register_student", $zf_actionData);
        
    }
    
    
    //Executes the action for registering new student into hostel
    public function actionProcess_hostel_student($zvs_parameter){
        
        $filteredData = Zf_SecureData::zf_decode_url($zvs_parameter);
        $filterDataVariable =  Zf_SecureData::zf_decode_data($zvs_parameter);


        if($filteredData == "new_hostel_student"){

           //This model method create a new student into school hostel
           $this->zf_targetModel->newHostelStudentRegistration();

        }
        
    }
    
    

}
?>
