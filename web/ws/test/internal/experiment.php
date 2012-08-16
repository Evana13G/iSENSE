
 <html>
<head>
<title>iSenseDev Automated Testing</title>
<link rel="stylesheet" type="text/css" href="../apitest.css" />
</head>



<?php

require_once '../../../includes/config.php';


test_getExperiment();
test_hideUnhideExperiment();
test_addRemoveFeaturedExperiment();



function printResult( $functionVar, $passVar ) {

     //return a string
     if ($passVar) {     
          echo "<div class ='success'>" .$functionVar ." passed.</div>";
     } else {
          echo "<div class ='failure'>" .$functionVar ." failed.</div>";
     }
     echo "<br><br>";
     
}

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

     printResult( __FUNCTION__, $pass);
}

function test_hideExperiment() {
    
    $pass = true;
    
    //test experiment with valid param
    $eid = 1;
    hideExperiment($eid);
    $experiment = getExperiment($eid);
    if($experiment) {
          if ($experiment['hidden'] != 1) {
                    $pass = false;
          }          
    } else {
          return "check getExperiment function"; 
    }
          
     //test experiment with invalid param    
     $eid = -1; 
     $experiment = hideExperiment($eid);    
     if ($experiment) {
          $pass = false;
     }     

     printResult( __FUNCTION__, $pass);
}

function test_unhideExperiment() {
    
    $pass = true;
    
    //test experiment with valid param
    $eid = 1;
    unhideExperiment($eid);
    $experiment = getExperiment($eid);
    if($experiment) {
          if ($experiment['hidden'] != 0) {
                    $pass = false;
          }          
    } else {
          return "check getExperiment function"; 
    }
          
     //test experiment with invalid param    
     $eid = -1; 
     $experiment = unhideExperiment($eid);    
     if ($experiment) {
          $pass = false;
     }     

     printResult( __FUNCTION__, $pass);
}

function test_addFeaturedExperiment() {   
       
    $pass = true;
    
    //test experiment with valid param
    $eid = 1;
    addFeaturedExperiment($eid);
    $experiment = getExperiment($eid);
    if($experiment) {
          if ($experiment['featured'] != 1) {
                    $pass = false;
          }          
    } else {
          return "check getExperiment function"; 
    }
          
     //test experiment with invalid param    
     $eid = -1; 
     $experiment = addFeaturedExperiment($eid);    
     if ($experiment) {
          $pass = false;
     }     

     printResult( __FUNCTION__, $pass);
}

function test_removeFeaturedExperiment() {   
       
    $pass = true;
    
    //test experiment with valid param
    $eid = 1;
    removeFeaturedExperiment($eid);
    $experiment = getExperiment($eid);
    if($experiment) {
          if ($experiment['featured'] != 0) {
                    $pass = false;
          }          
    } else {
          return "check getExperiment function"; 
    }
          
     //test experiment with invalid param    
     $eid = -1; 
     $experiment = removeFeaturedExperiment($eid);    
     if ($experiment) {
          $pass = false;
     }     

     printResult( __FUNCTION__, $pass);
}

function test_rateExperiment() {

    $pass = true;
    
    //test experiment with valid param
    $eid = 1;
    removeFeaturedExperiment($eid);
    $experiment = getExperiment($eid);
    if($experiment) {
          if ($experiment['featured'] != 0) {
                    $pass = false;
          }          
    } else {
          return "check getExperiment function"; 
    }
          
     //test experiment with invalid param    
     $eid = -1; 
     $experiment = removeFeaturedExperiment($eid);    
     if ($experiment) {
          $pass = false;
     }     

     printResult( __FUNCTION__, $pass);
}

?>