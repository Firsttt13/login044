<?php
 include 'condb.php';


//ลบข้อมูล- ลบจริงๆ
if (isset($_POST['ticket_id'])) {

    $id = $_POST['ticket_id'];

    try {

        $sql = "DELETE FROM $table WHERE ticket_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $id);
        $result = $stmt->execute();
        
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        if ($result) {
            echo '<script>
                        setTimeout(function() {
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: "ลบข้อมูลสําเร็จ",
                                showConfirmButton: true,
                                // timer: 1500
                            }).then(function() {
                            window.location = "07_showData.php"; // Redirect to.. ปรับแก ้ชอไฟล์ตามที่ต้องการให ้ไป ื่
                        });
                            }, 1000);
                            </script>';
        } else {
            echo '<script>
            setTimeout(function() {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "เกิดข้อผิดพลาด",
                        showConfirmButton: true,
                        // timer: 1500
                        }).then(function() {
                    window.location = "07_showData.php"; // Redirect to.. ปรับแก ้ชอไฟล์ตามที่ต้องการให ้ไป ื่
                        });
                    }, 1000);
                </script>';
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>