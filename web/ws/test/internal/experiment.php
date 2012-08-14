
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

function test_hideUnhideExperiment() {
    
    $pass = true;
    
    $eid = 1;
    $experiment = getExperiment($eid);
    $isHidden = $experiment['hidden'];
    
    // if the experiment is already hidden,
    // unhide and and test to see that its 
    // 'hidden' value is indeed 0 
    
    if ( $isHidden == 1 ) {
          unhideExperiment($eid);
          $experiment = getExperiment($eid);
          if( $experiment['hidden'] == 0) {
               $pass = true;
          } else {
               $pass = false;
          }
     }
     
    // if the experiment is not hidden,
    // hide and and test to see that its 
    // 'hidden' value is indeed 1     
      if ( $isHidden == 0 ) {
          hideExperiment($eid);
          $experiment = getExperiment($eid);
          if( $experiment['hidden'] == 1) {
               $pass = true;
          } else {
               $pass = false;
          }
     }
     
     //test experiment with invalid param
     $eid = -1;
     $experiment = getExperiment($eid);
     
     if ($experiment != null) {
          $pass = false;
     }
     
     
     printResult( __FUNCTION__, $pass);
}


function test_addRemoveFeaturedExperiment() {
    
    $pass = true;
    
    $eid = 1;
    $experiment = getExperiment($eid);
    $isFeatured = $experiment['featured'];
    
    // if the experiment is already featured,
    // unfeature it and and test to see that its 
    // 'featured' value is indeed 0 
    if ( $isFeatured == 1 ) {
          removeFeaturedExperiment($eid);
          $experiment = getExperiment($eid);
          if( $experiment['featured'] == 0) {
               $pass = true;
          } else {
               $pass = false;
          }
     }
     
    // if the experiment is not featured,
    // feature it and and test to see that its 
    // 'featured' value is indeed 1     
      if ( $isFeatured == 0 ) {
          addFeaturedExperiment($eid);
          $experiment = getExperiment($eid);
          if( $experiment['featured'] == 1) {
               $pass = true;
          } else {
               $pass = false;
          }
     }
     
     //test experiment with invalid param
     $eid = -1;
     $experiment = getExperiment($eid);
     
     if ($experiment != null) {
          $pass = false;
     }
     
     printResult( __FUNCTION__, $pass);
}

function test_rateExperiment() {
    
    $pass = true;
    
    $eid = 1;
    $experiment = getExperiment($eid);
    $origRating = $experiment['rating'];
    
    
    
    if ( $isFeatured == 1 ) {
          $experiment = getExperiment($eid);
          if( $experiment['featured'] == 0) {
               $pass = true;
          } else {
               $pass = false;
          }
     }
     
     //test experiment with invalid param
     $eid = -1;
     $experiment = getExperiment($eid);
     
     if ($experiment != null) {
          $pass = false;
     }
     
     printResult( __FUNCTION__, $pass);
}



?>