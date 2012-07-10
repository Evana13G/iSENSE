<?php
     require_once '../includes/config.php';
     
// Initalize authentication state to false, ie not logged in
$authenticated = false;

// Check for method parameter
$method = (isset($_REQUEST['method']) ? safeString($_REQUEST['method']) : null);

// Check for session key
$session_key = (isset($_REQUEST['session_key']) ? safeString($_REQUEST['session_key']) : null);

// Initalize Output Variables
$status = 600;
$data = null;

// Check to see if session key is null, if not then log in
if($session_key != null) {
        $session->start_rest_session($session_key);
} else {
    
    // Check to see if the request is to login, if so login
    if(strcasecmp($method, "login") == 0) {
        
    }
    
}
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