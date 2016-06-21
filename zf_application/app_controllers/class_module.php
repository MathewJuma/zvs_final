<?php

/**
 * -----------------------------------------------------------------------------
 * THIS IS THE CLASS MODULE CONTROLLER, ESSENTIAL FOR ROUTING AND EXECUTING 
 * ALL ACTIONS THAT RELATE TO CLASS MODULE MODELS AND VIEWS.
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

class class_moduleController extends Zf_Controller {
   
    
    public $zf_defaultAction = "view_classes";



    public function __construct() {
        
        /**
         * CALL THE CONSTRUCTOR OF THE PARENT CLASS.
         */
        parent::__construct();
        
    }

    
    //Executes the index view. Also is the defaukt action for this controller
    public function actionIndex(){
        
        Zf_View::zf_displayView('index');
        
    }

    
    //Executes the view classes view. Also is the defaukt action for this controller
    public function actionView_classes(){
        
        Zf_View::zf_displayView('view_classes');
        
    }

    
    //Executes the class profile view. Also is the defaukt action for this controller
    public function actionClass_profile(){
        
        Zf_View::zf_displayView('class_profile');
        
    }
    
    

}
?>
