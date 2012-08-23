
 <html>
<head>
<title>iSenseDev Automated Testing</title>
<link rel="stylesheet" type="text/css" href="../apitest.css" />
</head>



<?php

require_once '../../../includes/config.php';


test_getExperiment();
test_hideExperiment();
test_unhideExperiment();
test_addFeaturedExperiment();
test_removeFeaturedExperiment();
test_countNumberOfSessions();
test_countNumberOfContributors();
test_createExperiment();
test_updateExperiment();
test_closeExperiment();
test_uncloseExperiment();
test_recommendExperiment();
test_unrecommendExperiment();
test_updateTimeModifiedForExperiment();
test_getFields();
test_getNumberOfExperiments();



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
     if (hideExperiment($eid)) {
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
     if (unhideExperiment($eid)) {
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
     if (addFeaturedExperiment($eid)) {
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
     if (removeFeaturedExperiment($eid)) {
          $pass = false;
     }     

     printResult( __FUNCTION__, $pass);
}

function test_countNumberOfSessions() {

    $pass = true;
    
    //test experiment with valid param
    $eid = 1;

     $numberOfSessions = countNumberOfSessions($eid);
     if (($numberOfSessions < 0) 
          || !(is_numeric($numberOfSessions))){
                    $pass = false;                      
     }

     //test experiment with invalid param    
     $eid = -1;   
     if (countNumberOfSessions($eid)) {
          $pass = false;
     }     

     printResult( __FUNCTION__, $pass);
}


function test_countNumberOfContributors() {

    $pass = true;
    
    //test experiment with valid param
    $eid = 1;

     $numberOfContributors = countNumberOfContributors($eid);
     if (($numberOfContributors < 0) 
          || !(is_numeric($numberOfContributors))){
                    $pass = false;                      
     }

     //test experiment with invalid param    
     $eid = -1;   
     if (countNumberOfContributors($eid)) {
          $pass = false;
     }     

     printResult( __FUNCTION__, $pass);
}


function test_createExperiment() {

     $pass = true;
     $email = sor;
     $password = sor;
     
     $token = login($email, $password);
     
     //test experiment with valid parameters
     $name = "TestExperiment";
     $description = "TestDescription";
     $fields = "";
     $experiment = createExperiment($token, $name, $description, $fields);
     
     // test for correct experiment name
     if (isset($experiment['name'])) {
          if( !($experiment['name']) == $name) {
               $pass = false;
          }
     } else {
          $pass = false;
     }      

     // test for correct experiment description
     if (isset($experiment['description'])) {
          if( !($experiment['description']) == $description) {
               $pass = false;
          }
     } else {
          $pass = false;
     }      
     
     if (isset($experiment['experiment_id'])) {
         $eid = ($experiment['experiment_id']);
     } else {
          $pass = false;
     }         

     //test experiment with invalid param
     $name = "";
     $experiment = createExperiment($token, $name, $description, $fields);

     if ($experiment != false) {
          $pass = false;
     }

     printResult( __FUNCTION__, $pass);     
     
}

function test_updateExperiment() {

     $pass = true;
    
     //test experiment with valid param
     $eid = 1;
     $values = array('description' => "current time:"  .(time()));
     if (updateExperiment($eid, $values)) {     
          $experiment = getExperiment($eid);
          if($experiment) {
               if (isset($experiment['description'])) {   
                    if( !($experiment['description']) == $values['description']) {
                    $pass = false;
                    }
               }               
          } else {
               $pass = false;
          }
     }
     
     //test experiment with invalid param    
     $eid = -1;   
     if (updateExperiment($eid, $values)) {     
          $pass = false;
     } else {
          return "check getExperiment function"; 
    }
     
//      $eid = 1;
//      $values = array('description' => "");
//      if (updateExperiment($eid, $values)) {     
//           $pass = false;
//      }      

     
     printResult( __FUNCTION__, $pass);
}

function test_closeExperiment() {

    $pass = true;
    
    //test experiment with valid param
    $eid = 1;
    closeExperiment($eid);
    $experiment = getExperiment($eid);
    if($experiment) {
          if ($experiment['closed'] != 1) {
                    $pass = false;
          }          
    } else {
          return "check getExperiment function"; 
    }
          
     //test experiment with invalid param    
     $eid = -1;   
     if (closeExperiment($eid)) {
          $pass = false;
     }     

     printResult( __FUNCTION__, $pass);
}

function test_uncloseExperiment() {

    $pass = true;
    
    //test experiment with valid param
    $eid = 1;
    uncloseExperiment($eid);
    $experiment = getExperiment($eid);
    if($experiment) {
          if ($experiment['closed'] != 0) {
                    $pass = false;
          }          
    } else {
          return "check getExperiment function"; 
    }
          
     //test experiment with invalid param    
     $eid = -1;   
     if (uncloseExperiment($eid)) {
          $pass = false;
     }     

     printResult( __FUNCTION__, $pass);
}

function test_recommendExperiment() {

    $pass = true;
    
    //test experiment with valid param
    $eid = 1;
    recommendExperiment($eid);
    $experiment = getExperiment($eid);
    if($experiment) {
          if ($experiment['recommended'] != 1) {
                    $pass = false;
          }          
    } else {
          return "check getExperiment function"; 
    }
          
     //test experiment with invalid param    
     $eid = -1;   
     if (recommendExperiment($eid)) {
          $pass = false;
     }     

     printResult( __FUNCTION__, $pass);
}

function test_unrecommendExperiment() {

    $pass = true;
    
    //test experiment with valid param
    $eid = 1;
    unrecommendExperiment($eid);
    $experiment = getExperiment($eid);
    if($experiment) {
          if ($experiment['recommended'] != 0) {
                    $pass = false;
          }          
    } else {
          return "check getExperiment function"; 
    }
          
     //test experiment with invalid param    
     $eid = -1;   
     if (unrecommendExperiment($eid)) {
          $pass = false;
     }     

     printResult( __FUNCTION__, $pass);
}

function test_updateTimeModifiedForExperiment() {

    $pass = true;
    
    //test experiment with valid param
    $eid = 1;
    updateTimeModifiedForExperiment($eid);
    $experiment = getExperiment($eid);
    
    if($experiment) {
          if (isset($experiment['timemodified'])) {
               if($experiment['timemodified'] != date('Y-m-d H:i:s')) {
                    $pass = false;
               }     
          } else {
               $pass = false;
          }
    } else {
          return "check getExperiment function"; 
    }
          
     //test experiment with invalid param    
      $eid = -1;   
      if (updateTimeModifiedForExperiment($eid)) {
           $pass = false;
      }     

     printResult( __FUNCTION__, $pass);
}

function test_getFields() {

     $pass = true;
     
    //test experiment with valid param     
     $eid = 1;
     $fields = getFields($eid);
     if ($fields) {
          $i = 1;
          foreach($fields as $tempField) {
               if ($tempField['experiment_id'] != $eid) {
                    $pass = false;
               }
               if ($tempField['field_id'] != $i) {
                    $pass = false;
               }
               $i++;
          }
     } else {
          $pass = false;
     }
     
      //test experiment with invalid param    
      $eid = -1;   
      if (getFields($eid)) {
           $pass = false;
      }   
      
     printResult( __FUNCTION__, $pass);     
}

function test_getNumberOfExperiments() {

     $pass = true;
     
     if( !(getNumberOfExperiments() >= 0) ) {
          $pass = false;
     }
     
     printResult( __FUNCTION__, $pass);     

}


?>