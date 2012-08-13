<?php

require_once '../../../includes/config.php';


function test_getExperiment() {

     $pass = true;
     
     //test experiment with valid param
     $eid = 1;
     $experiment= getExperiment($eid);

     if (isset($experiment['experiment_id'])) {
          if( !($experiment['experiment_id']) == $eid) {
               $pass = false;
          }
     } else {
          $pass = false;
     }
     
     
     //test experiment with invalid param
     $eid = -1;
     $experiment = getExperiment($eid);
     
     if ($experiment != null) {
          $pass = false;
     }

     //return a string
     if ($pass) {     
          echo "getExperiment passed.";
     } else {
     echo "getExperiment failed.";
     }
}

function test_hideExperiment() {
    
    $experiment = getExperiment(1);
    $isHidden = $experiment['hidden'];
    
    
    
    if ( isHidden == 1 ) {
    
    }
    
    
    /*
     hideExperiment(1);
     //test
     print_r(getExperiment(1));
     unhideExperiment(1);
     //test_getExperiment
     */
     

}


test_hideExperiment();


?>