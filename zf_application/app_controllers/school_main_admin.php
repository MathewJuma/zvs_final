<?php

/**
 * -----------------------------------------------------------------------------
 * THIS IS THE SCHOOL_MAIN_ADMIN CONTROLLER, ESSENTIAL FOR ROUTING AND EXECUTING
 * ALL ACTIONS THAT RELATE TO SCHOOL MAIN ADMINISTRATOR MODELS AND VIEWS.
 * -----------------------------------------------------------------------------
 *
 * @author Mathew Juma O. (ATHIAS AVIANS) <mathew@headsafrica.com>
 * @time  11th/February/2015  Time: 11:00 EMT
 * @link http://www.zilasframework.com/
 * @copyright Copyright &copy; 2013 Zilas Software LLC
 * @license http://www.zilasframework.com/license/
 * @version 1.01 Final
 * @since version 1.01 Final - 11th/August/2013 (sunday)
 * 
 */

class School_main_adminController extends Zf_Controller {
   
    
    public $zf_defaultAction = "main_dashboard";


    /**
     * This is the class constructor
     */
    public function __construct() {
        
        /**
         * CALL THE CONSTRUCTOR OF THE PARENT CLASS.
         */
        parent::__construct();
        
    }
   
    

    
    /**
     * This action executes the main dashboard view
     */
    public function actionMain_dashboard(){
        
        Zf_View::zf_displayView('main_dashboard');
        
    }
   
    

    
    /**
     * This action executes the school profile view
     */
    public function actionSchool_profile(){
        
        Zf_View::zf_displayView('school_profile');
        
    }
   
    

    
    /**
     * This action executes the manage classes view
     */
    public function actionManage_classes(){
        
        Zf_View::zf_displayView('manage_classes');
        
    }
   
    

    
    /**
     * This action executes the manage departments view
     */
    public function actionManage_departments(){
        
        Zf_View::zf_displayView('manage_departments');
        
    }
   
    

    
    /**
     * This action executes the manage hostels view
     */
    public function actionManage_hostels(){
        
        Zf_View::zf_displayView('manage_hostels');
        
    }
   
    

    
    /**
     * This action executes the manage teachers view
     */
    public function actionManage_teachers(){
        
        Zf_View::zf_displayView('manage_teachers');
        
    }
   
    

    
    /**
     * This action executes the manage students view
     */
    public function actionManage_students(){
        
        Zf_View::zf_displayView('manage_students');
        
    }
   
    

    
    /**
     * This action executes the manage substaff view
     */
    public function actionManage_substaff(){
        
        Zf_View::zf_displayView('manage_substaff');
        
    }
   
    

    
    /**
     * This action executes the manage fees view
     */
    public function actionManage_fees(){
        
        Zf_View::zf_displayView('manage_fees');
        
    }
   
    

    
    /**
     * This action executes the manage subjects view
     */
    public function actionManage_subjects(){
        
        Zf_View::zf_displayView('manage_subjects');
        
    }
   
    

    
    /**
     * This action executes the manage exams view
     */
    public function actionManage_exams(){
        
        Zf_View::zf_displayView('manage_exams');
        
    }
   
    

    
    /**
     * This action executes the manage marksheet view
     */
    public function actionManage_marksheet(){
        
        Zf_View::zf_displayView('manage_marksheet');
        
    }
   
    

    
    /**
     * This action executes the manage timetable view
     */
    public function actionManage_timetable(){
        
        Zf_View::zf_displayView('manage_timetable');
        
    }
   
    

    
    /**
     * This action executes the manage notice board view
     */
    public function actionManage_notice_board(){
        
        Zf_View::zf_displayView('manage_notice_board');
        
    }
   
    

    
    /**
     * This action executes the manage calendar view
     */
    public function actionManage_calendar(){
        
        Zf_View::zf_displayView('manage_calendar');
        
    }
   
    

    
    /**
     * This action executes the manage roles view
     */
    public function actionManage_roles(){
        
        Zf_View::zf_displayView('manage_roles');
        
    }
   
    

    
    /**
     * This action executes the manage resources view
     */
    public function actionManage_resources(){
        
        Zf_View::zf_displayView('manage_resources');
        
    }
   
    

    
    /**
     * This action executes the manage affiliates view
     */
    public function actionManage_affiliates(){
        
        Zf_View::zf_displayView('manage_affiliates');
        
    }
   
    

    
    /**
     * This action executes the affiliates directory view
     */
    public function actionAffiliates_directory(){
        
        Zf_View::zf_displayView('affiliates_directory');
        
    }
    
    
   
    
    /**
     * This action executes the personal profile view
     */
    public function actionMy_profile($identificationCode){
        
        $zf_actionData = Zf_SecureData::zf_decode_url($identificationCode);
        
        Zf_View::zf_displayView('my_profile', $zf_actionData);
        
    }
    
    
    
    
    /**
     * This action executes the profile update view
     */
    public function actionUpdate_profile($identificationCode){
        
        $zf_actionData = Zf_SecureData::zf_decode_url($identificationCode);
        
        Zf_View::zf_displayView('update_profile', $zf_actionData);
        
    }
    
    
    
    
    /**
     * This action executes the calendar view
     */
    public function actionMy_calendar(){
        
        Zf_View::zf_displayView('my_calendar');
        
    }
    
    
    
    
    /**
     * This action executes the inbox view
     */
    public function actionMy_inbox(){
        
        Zf_View::zf_displayView('my_inbox');
        
    }
    
    
    
    
    /**
     * This action executes the tasks view
     */
    public function actionMy_tasks(){
        
        Zf_View::zf_displayView('my_tasks');
        
    }
    
    

}
?>
