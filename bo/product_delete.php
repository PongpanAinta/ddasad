<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8"); 


//1.Create connection
$conn = new mysqli("localhost", "root", "", "warehouse");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//2.สร้าง SQL ในการสร้าง record ใหม่
$sql = "DELETE FROM `products` WHERE `code`= ?;";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s",$v1);

$v1="111";

if($stmt->execute()==true){
  echo "ลบแล้ว";
}
else {
  echo "ลบไม่สำเร็จ";
}





//3. ประมวลผล คำสั่ง SQl


$conn->close();
?>