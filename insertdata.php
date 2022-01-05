<?php

// include database 

$servername = "localhost";
$username = "developertes";
$password = "HL@2021test";
$dbname = "hla";

//

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//table users - id (int), name (varchar 255), email (varchar 255), token (MD5 varchar 255), created (datetime)
$user = "Insert into users(id,name,email,token,created) VALUES ('123','izzati','izzati@gmail.com','c0facf79e5dbb239f12280ed9ec1650d','5/1/2022')"; 
//table locations - id, user_id (int), district (varchar 255), state (varchar 255),country (varchar 255)
$location = "Insert into location(id,user_id,district,state,country) VALUES ('123','izzati@gmail.com','Jementah','Johor','Malaysia')";



if ($conn->query($user) === TRUE && $conn->query($location) === TRUE ) {
  $last_id = $conn->insert_id;
  //get location_id and token value
  echo $location_id;
  echo $token;
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>