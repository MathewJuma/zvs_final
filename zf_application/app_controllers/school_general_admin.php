<?php

/**
 * -----------------------------------------------------------------------------
 * THIS IS THE SCHOOL_GENERAL_ADMIN CONTROLLER, ESSENTIAL FOR ROUTING AND 
 * EXECUTING ALL ACTIONS THAT RELATE TO SCHOOL GENERAL ADMIN MODELS AND VIEWS.
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

class School_general_adminController extends Zf_Controller {
   
    
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
    
    

}
?>
