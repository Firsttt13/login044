<?php 
    include "condb.php";

    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['uploadBy'])){
            $name = $_POST['name'];
            $price = $_POST['price'];
            $uploadBy = $_POST['uploadBy'];

            $sql = "INSERT INTO $table (football_club, price, uploadBy) VALUES (:football_club,:price,:uploadBy)";
            $smt = $conn->prepare($sql);
            $smt->bindParam(":football_club", $name);
            $smt->bindParam(":price", $price);
            $smt->bindParam(":uploadBy", $uploadBy);

            $result = $smt->execute();
            if ($result) {
              echo "เพิ่มข้อมูลเรียบร้อยแล้ว";
            } else {
              echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูล";
            }

            
    }

    }
?>