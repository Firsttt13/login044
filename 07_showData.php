<?php
require_once 'condb.php';
include 'header.php';
include 'footer.php';
$sql = "SELECT * FROM $table";
$stmt = $conn->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
    <title>View Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <!-- DataTable CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
</head>

<body>
    <div class="container">
        <h1>Football Tickets Record</h1>
        <table class="table" id="userTable">
            <thead>
                <tr>
                    <th>Ticket ID</th>
                    <th>ชื่อสโมสร</th>
                    <th>ราคา</th>
                    <th>เพิ่มข้อมูลโดย</th>
                    <th>วันที่ลงข้อมูล</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
            foreach ($products as $product) {
                echo "<tbody><tr>
                    <td style='text-align:center;'>" . $product['ticket_id'] . "</td>
                    <td>" . $product['football_club'] . "</td>
                    <td style='text-align:center;'>" . $product['price'] . "</td>
                    <td>" . $product['uploadBy'] . "</td>
                    <td style='text-align:center;'>" . $product['reg_date'] . "</td>
                    ";
                    
                ?>

                <td>
                    <div class="d-flex gap-2">
                    <input type='submit'  name='delete' value='Delete' class='btn btn-danger'>
                    <input type="submit" name="edit" value="Edit" class="btn btn-primary">
                    </div>
                </td>

                </tr>
                </tbody>
                <?php
            }
            ?>
        </table>
        <div>
            <a class="btn btn-secondary" href="index.php">ย้อนกลับไปหน้าหลัก</a>
        </div>
    </div>
    <script src='https://code.jquery.com/jquery-3.7.1.min.js'></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script>
        let table = new DataTable('#userTable');
        

    </script>
</body>

</html>