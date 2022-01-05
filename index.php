<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
// include database and object files

$servername = "localhost";
$username = "developertest";
$password = "HL@2021test";
$dbname = "hla";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$headers = apache_request_headers(); 
$token = NULL;
foreach ($headers as $header => $value) {

    if($header == 'Authorization'){
        $token = $value;
    }
}

//table users - id (int), name (varchar 255), email (varchar 255), token (MD5 varchar 255), created (datetime)
$sql = "SELECT id,name,email,token,created FROM users WHERE token = '.$token'";

$result = $conn->query($sql);


if ($result->num_rows > 0) {

$location_id = $row["id"];
//table locations - id, user_id (int), district (varchar 255), state (varchar 255),country (varchar 255)
$sql = "SELECT id,user_id,district,state,country FROM locations WHERE id = '.$location_id'"; 

$data = $conn->query($sql);

  while($row = $data->fetch_assoc()) {
     = $row["district"];
     = $row["state"];
     = $row["country"];
  }


if($data->num_rows > 0){ 
    
  header("HTTP/1.1 200 OK");  // set response code - 200 OK
         echo $location;  // show products data ($location);
      }
  
else {
    
  header("HTTP/1.1 404 Not Found"); // set response code - 404 Not found
	echo 'This page was not found';  // tell the user no location found
  
}

} else {
   
  header("HTTP/1.0 401 Unauthorized"); // set response code - 401 401 Unauthorized
        echo 'no user found';  // no user found
   

}

$conn->close();
?>