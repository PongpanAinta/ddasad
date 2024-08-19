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
$sql = "UPDATE `products`
        SET 
        `name` = ?,
        `picture` = ?,
        `category` = ?,
        `price` = ?,
        `cost` = ?
        WHERE  
        `code` = ?";


$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssds", $v1, $v2, $v3,$v4,$v5,$v6);

// set parameters and execute
$v1 = "นมถั่วเหลือง";
$v2 = "milk1.jpg";
$v3 = "เครื่องดื่ม";
$v4 = 10;
$v5 = 4.25;
$v6 = "A002";
$stmt->execute();

if($stmt->execute()==true){
  echo "อัปเดตแล้ว";
}
else {
  echo "อัปเดตไม่สำเร็จ";
}





//3. ประมวลผล คำสั่ง SQl


$conn->close();
?>