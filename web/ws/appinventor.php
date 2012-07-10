<?php
     require_once '../includes/config.php';


// Check for method parameter
$method = (isset($_REQUEST['method']) ? safeString($_REQUEST['method']) : null);

function getResults($method){      
          //The target for this test
          $target = "localhost/ws/api.php?method=". $method;
          echo $target;
          //Curl crap that will mostly stay the same
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $target);
          curl_setopt($ch, CURLOPT_HEADER, false);
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, array(
               'experiment' => $exp
               )); 
               
               //Run curl to get the response
               $result = curl_exec($ch);

              
               //Do processing and return
               return $result;
}
        
        




if(isset($_REQUEST['method'])) {
        $method = safeString($_REQUEST['method']);
        
        echo getResults($method);
}
?>