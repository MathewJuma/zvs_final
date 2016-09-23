<?php

/**
 * -----------------------------------------------------------------------------
 * THIS IS THE STUDENT MODULE CONTROLLER, ESSENTIAL FOR ROUTING AND EXECUTING 
 * ALL ACTIONS THAT RELATE TO STUDENT MODULE MODELS AND VIEWS.
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

class student_moduleController extends Zf_Controller {
   
    
    public $zf_defaultAction = "index";



    public function __construct() {
        
        /**
         * CALL THE CONSTRUCTOR OF THE PARENT CLASS.
         */
        parent::__construct();
        
    }

    
    //Executes the index view. Also is the defaukt action for this controller
    public function actionRegister_student($identificationCode){
        
        $zf_actionData = Zf_SecureData::zf_decode_data($identificationCode);
        
        
        $tableData = array();
        $tableData['tableTitle'] = "List of all students";
        $tableData['tableQuery'] = "SELECT * FROM zvs_students_personal_details";
        
        $zf_phpGridSettings = $this->actionGenerateStudentsTable($tableData);
        
        //This is the view for registration of a new student/pupil
        Zf_View::zf_displayView('register_student', $zf_actionData, $zf_phpGridSettings);
        
    }
    
    
    
    
    /**
     * This action sends the user information to the model for processing
     */
    public function actionStudentInformation($zvs_parameter){
        
        $filterDataVariable =  Zf_SecureData::zf_decode_data($zvs_parameter);
        $filterDataUrl = Zf_SecureData::zf_decode_url($zvs_parameter);
        
        if($filterDataVariable == 'process_locality'){
            
            //Get the locality related to any student registration data
            $this->zf_targetModel->getStudentLocality();
            
        }else if($filterDataVariable == 'process_streams'){
            
            //Get the streams related a selected class
            $this->zf_targetModel->getStreamDetails();
            
        }
        
    }
    
    
    
    
    /**
     * This action sends student registration data to the model for processing
     */
    public function actionNewStudentRegistration($zvs_parameter) {
        
       $filterDataVariable =  Zf_SecureData::zf_decode_data($zvs_parameter);
       $filterDataUrl = Zf_SecureData::zf_decode_url($zvs_parameter);
       
       if($filterDataUrl == 'new_student'){
           
           //This model method registers new student.
           $this->zf_targetModel->registerNewStudent();
           
       }
        
    }
    
    
    
    
    
    
    /**
     * IN THIS SECTION, WE GENERATE ALL STUDENT RELATED TABLES FOR VISUAL PURPOSES
     *  
     */
    
    /**
     * This is the action that generates the transaction table
     */
    public function actionGenerateStudentsTable($tableData, $zf_subGrid = NULL, $exclude = NULL){
        
        //This holds the name of the database table that is being accessed.
        $zf_phpGridSettings['zf_tableName'] = 'zvss_new_transaction'; 
        
        //This is the title of the table as it will appear on the user view
        $tableTitle = $tableData['tableTitle'];
        
        //This holds all the grid setting e.g. title, width, height e.t.c
        $zf_phpGridSettings['zf_gridSettings'] = zf_phpGridConfigurations::Zf_PhpGridSettings($tableTitle, $zf_subGrid);

        //This holds all the grid actions e.g exporting data, editing data e.t.c
        $zf_phpGridSettings['zf_gridActions'] = zf_phpGridConfigurations::Zf_PhpGridActions();

        //This array holds all the data related to required grid columns
        $zf_gridColumns = array();

        $transactionOutlet = array("title"=>"First Name", "name"=>"studentFirstName", "width"=>20, "editable"=>false); 
        $zf_gridColumns[] = $transactionOutlet;
        
        $transactionFirstName = array("title"=>"Middle Name", "name"=>"studentMiddleName", "width"=>20, "editable"=>true);
        $zf_gridColumns[] = $transactionFirstName;
        
        $transactionLastName = array("title"=>"Last Name", "name"=>"studentLastName", "width"=>20, "editable"=>true);
        $zf_gridColumns[] = $transactionLastName;
        
//        $transactionIdNo = array("title"=>"ID/PP Number", "name"=>"transactionIdNumber", "width"=>20, "editable"=>true);
//        $zf_gridColumns[] = $transactionIdNo;
        
//        $transactionMobile = array("title"=>"Mobile Number", "name"=>"transactionMobileNumber", "width"=>20, "editable"=>false);
//        $zf_gridColumns[] = $transactionMobile;
//        
//        $transactionAmount = array("title"=>"Amount", "name"=>"transactionAmount", "width"=>15, "editable"=>true);
//        $zf_gridColumns[] = $transactionAmount;
//        
//        $transactionCommission = array("title"=>"Commission", "name"=>"transactionCommission", "width"=>15, "editable"=>true);
//        $zf_gridColumns[] = $transactionCommission;
//        
//        $transactionCode = array("title"=>"Transaction Code", "name"=>"transactionReference", "width"=>25, "editable"=>false); 
//        $zf_gridColumns[] = $transactionCode;
//        
//        $transactionEntity = array("title"=>"Transacting Vendor", "name"=>"transactingEntity", "width"=>25, "editable"=>true);
//        $zf_gridColumns[] = $transactionEntity;
//        
//        $transactionType = array("title"=>"Transaction Type", "name"=>"transactionType", "width"=>25, "editable"=>true);
//        $zf_gridColumns[] = $transactionType;
//        
//        if($exclude != 1){
//            $transactionDate = array("title"=>"Trans. Date", "name"=>"transactionDate", "width"=>15, "editable"=>true);
//            $zf_gridColumns[] = $transactionDate;
//        }
        
        //This action column of the table 
        $action = array("title"=>"Actions", "name"=>"act", "align"=>"center", "width"=>20, "export"=>false, "hidden"=>true);
        $zf_gridColumns[] = $action;

        $zf_phpGridSettings['zf_gridColumns'] = $zf_gridColumns;
        
        //echo $tableQuery; exit();

        $zf_phpGridSettings['zf_gridQuery'] = $tableData['tableQuery'];
        
        return $zf_phpGridSettings;
        
    }
    

}
?>
