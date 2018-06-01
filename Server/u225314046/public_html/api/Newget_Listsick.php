<?php



 include "config.php";
 // สร้าง Object PDO พร้อมกับส่งค่าการเชื่อมต่อฐานข้อมูล
 $db = new PDO("mysql:host=$servername;dbname=$database",$username,$password);

  
 // คำสั่ง SQL ดึงข้อมูลที่ต้องการออกมา เรียงลำดับให้ด้วย
 $sql = "SELECT * FROM patient ORDER BY HN ASC ";


 $row = $db->prepare($sql);

 $row->execute();

 $json_data = array();

 // ดึงข้อมูลมาเก็บใน JSON แบบ Array
 foreach($row as $rec) {
     $json_array['img']=$rec['img'];  
     $json_array['Name']=$rec['Name'];

     array_push($json_data,$json_array);
 }

  // เข้ารหัสในรูปแบบ JSON
  echo json_encode(array('result'=>$json_data),JSON_UNESCAPED_UNICODE);

?>
