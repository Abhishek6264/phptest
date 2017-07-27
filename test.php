<?php
header("Access-Control-Allow-Origin: *");
$mysql_host = "localhost:3306";
$mysql_database = "retail";
$mysql_user = "root";
$mysql_password = "";
// Create connection
$conn = new mysqli($mysql_host, $mysql_user, $mysql_password,$mysql_database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT business_id,business_name,business_contact, business_detail  FROM user";
$result = $conn->query($sql);
$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"Id":"'  . $rs["business_id"] . '",';
     $outp .=  '"Name":"'  . $rs["business_name"] . '",';
     $outp .= '"Contact":"'  . $rs["business_contact"] . '",';
    $outp .= '"Details":"'   . $rs["business_detail"] . '"}'; 
       
}
$outp ='{ "records":[ '.$outp.' ]}';
$conn->close();
echo($outp);
?>
