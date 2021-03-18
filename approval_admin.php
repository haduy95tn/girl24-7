
<?php
$username = "root"; // Khai báo username
$password = "";      // Khai báo password
$server   = "localhost";   // Khai báo server
$dbname   = "khvatec";      // Khai báo database

// Kết nối database tintuc
$connect = mysqli_connect($server, $username, $password, $dbname);

//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
if (!$connect) {
    die("Không kết nối :" . mysqli_connect_error());
    exit();
}
include('functions.php');
    if (!isApproval()&&!isAdmin()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: index.php');
    }
 $part = $_SESSION['user']['part']; 
//Code xử lý, insert dữ liệu vào table
$sql    = "SELECT * FROM khv_thainguyen WHERE Approval = 'Pending'";
$ket_qua = mysqli_query($connect,$sql);

//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
if (!$ket_qua) {
    die("Không thể thực hiện câu lệnh SQL: " . mysqli_error($connect));
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Approval</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/view.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="SHORTCUT ICON" href="css/image/favicon.ico">
</head>
<body>
<div class="header">
         <div id="logo">
                <a href="#"> <img src="image/KHVATEC.png" alt=""></a>
        </div> 
        
        <div id="search">
            <form action="date_approval.php" method="GET">
                <h3>Select Date</h3>
                <input type="date" name="dbdate" value="dbdate">

                    <p1>Part/Bộ Phận:</p1><br>
                    <input list="browsers" name="browser" placeholder="Select">
                    <datalist id="browsers">
                        <option value="HR-Hành Chính Nhân Sự">
                        <option value="IT-Thông Tin">
                        <option value="FI-Kế Toán">
                        <option value="EHS-Môi Trường">
                        <option value="Sale-Kinh Doanh">
                        <option value="PUR-Mua Hàng">
                        <option value="MP-Kế Hoanh">
                        <option value="R&D-Phát Triển">
                        <option value="QM-Quản Lý Chất Lượng">
                        <option value="ANO">
                        <option value="CASTING">
                        <option value="EQM-Công Vụ">
                        <option value="Chromate">
                        <option value="CNC">
                        <option value="Mold Team">
                    </datalist> 
                <input type="submit">
            </form> 
        </div> 
</div>

    <!-- //Dùng vòng lặp while truy xuất các phần tử trong table -->
<div class="container">
                <?php while ($row = mysqli_fetch_array($ket_qua)):?>
        <div id="infor">
            <div id="visitor">
                <table>
                    <caption>Information Visitor</caption>
                    <tr>
                        <th>ID</th><td><?=$row['id']?></td>
                    </tr>
                    <tr>
                        <th>Username</th><td><?=$row['Username']?></td>
                    </tr>
                    <tr>
                        <th>Sex</th><td><?=$row['Sex']?></td>
                    </tr>
                    <tr>
                        <th>ID Number</th><td><?=$row['ID_Number']?></td>
                    </tr>
                    <tr>
                        <th>Phone</th><td><?=$row['Phone']?></td>
                    </tr>
                    <tr>
                        <th>Company</th><td><?=$row['Company']?></td>
                    </tr>
                </table>
            </div>
            <div id="staff">
                <table>
                    <caption>Infomation Part</caption>
                    <tr>
                        <th>Name Staff</th><td><?=$row['Name_Staff']?></td>
                    </tr>
                    <tr>
                        <th>Part</th><td><?=$row['Part']?></td>
                    </tr>
                    <tr>
                        <th>Phone Staff</th><td><?=$row['Phone_Staff']?></td>
                    </tr>
                    <tr>
                        <th>Date and Time</th><td><?=$row['DateTime']?></td>
                    </tr>
                    <tr>
                        <th>Reason</th><td><?=$row['Appointment_purpose']?></td>
                    </tr>

                    <tr>
                        <th>Approval</th><td><?=$row['approval']?></td>
                    </tr>
                </table>
            </div>
                <div id="update">
                    <?php echo "<p2><a href='update.php?id=" . $row['id'] . "'>Approval</a><p2>";?>
                    <hr>
                </div>
        </div>
                <?php 
                endwhile; ?> 
                <?php 
                    //Đóng kết nối database tintuc
                    $connect->close();
                ?>
</div>
</body>
</html>
