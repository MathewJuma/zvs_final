<?php

//THIS CODE IS WRITTEN BY:
//1. ATHIAS AVIANS (MATHEW JUMA), THE CHIEF AND CORE DEVELOPER OF ZILAS FRAMEWORK PROJECT.

/*
 * ---------------------------------------------------------------------
 * |                                                                   |
 * |  This the model is responsible for fetching data about location   |
 * |  of a newly registered student.                                   |
 * |                                                                   |
 * ---------------------------------------------------------------------
 */

class timeTableInformation_Model extends Zf_Model {
    

    private $_errorResult = array();
    private $_validResult = array();
    
   /*
    * --------------------------------------------------------------------------------------
    * |                                                                                    |
    * |  The is the main class constructor. It runs automatically within any class object  |
    * |                                                                                    |
    * --------------------------------------------------------------------------------------
    */
    public function __construct() {
        
         parent::__construct();
            
    }
    
    
    
    /**
     * This method is used to select Admin localities
     */
    public function getStreamDetails(){
        
        $classCode = $_POST['timeTableClassCode'];
        
        
        //Here we have all related stream data
        $streamDetails = $this->zvs_fetchStreamDetails($classCode);
        
        $select_options = '';
        
        
        if($streamDetails == 0){
            
            $select_options .= '<option value="">No Valid Data!!</option>';
            
        }else{
            
            foreach ($streamDetails as $streamValue) {
                
                $streamName = $streamValue['schoolStreamName']; $streamCode = $streamValue['schoolStreamCode'];
                $streamCapacity = $streamValue['schoolStreamCapacity']; $streamOccupancy = $streamValue['schoolStreamOccupancy'];
                
                if($streamCapacity != $streamOccupancy){
                    
                    $select_options .= '<option value="'.$streamCode.'">'.$streamName.'</option>';;
                    
                }
                
            }
            
        }
        
               
        echo $select_options;
        
        
    }
    
    
    //This private method fetches streams detials for a given selected class.
    private function zvs_fetchStreamDetails($schoolClassCode){
        
        $zvs_sqlValue["schoolClassCode"] = Zf_QueryGenerator::SQLValue($schoolClassCode);
        
        $fetchSchoolStreams = Zf_QueryGenerator::BuildSQLSelect('zvs_school_streams', $zvs_sqlValue);
        
        $zf_executeFetchSchoolStreams = $this->Zf_AdoDB->Execute($fetchSchoolStreams);

        if(!$zf_executeFetchSchoolStreams){

            echo "<strong>Query Execution Failed:</strong> <code>" . $this->Zf_AdoDB->ErrorMsg() . "</code>";

        }else{

            if($zf_executeFetchSchoolStreams->RecordCount() > 0){

                while(!$zf_executeFetchSchoolStreams->EOF){
                    
                    $results = $zf_executeFetchSchoolStreams->GetRows();
                    
                }
                
                return $results;

                
            }else{
                
                return 0;
                
            }
        }
        
    }
    
}

?>
