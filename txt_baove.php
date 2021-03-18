
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
/*check login >> OK*/
include('functions.php');
if (!isSecurity()&&!isAdmin()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: index.php');
    }
//Code xử lý, truy vấn và xem data
$sql    = "SELECT * FROM khv_thainguyen WHERE (approval = 'Yes' AND time_out ='0' AND Username = '".$_GET['txtcheck']."') OR (approval = 'Yes' AND time_out ='0' AND Company = '".$_GET['txtcheck']."') OR (approval = 'Yes' AND time_out = '0' AND Part = '".$_GET['browser']."') ";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Khách Thăm</title>
    <link rel="stylesheet" href="css/view.css" type="text/css">
    <link rel="SHORTCUT ICON" href="css/image/favicon.ico">
</head>

<body>
    <div id="logo">
        <a href="./baove.php"> <img src="image/KHVATEC.png" alt=""></a>
    </div> 
    <div id="search">
    	<form action="date_baove.php" method="GET">
    		<p1>Select Date</p1><br>
    		<input type="date" name="dbdate" value="dbdate">
    		<input type="submit">
    	</form>
     	 <form action="txt_baove.php" method="GET">
    	 	<p1> Tên Và Công Ty:
    		<input type="text" name="txtcheck"><br>
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
				<tr>
					<th>Appoint Purpose</th><td><?=$row['Appointment_purpose']?></td>
				</tr>
				<tr>
					<th style="text-align: center; width: 100px;">List of Devices</th>
                    <tr>
                    <th>STT</th>
                    <th>Devices</th>
                    <th>Amout</th>
                    </tr>
                    <?php
                        $devicesSql = "SELECT * FROM devices WHERE visitor_id = ".$row['id'];
                        $results = mysqli_query($connect,$devicesSql);
                        if (!$results) {
                            die("Không thể thực hiện câu lệnh SQL: " . mysqli_error($connect));
                            exit();
                        }
                        while ($record = mysqli_fetch_array($results)) {?>
                            <tr>
                                <td style="text-align: left; width: 30px;"><?=$record['stt']?></td>
                                <td style="text-align: left; width: 40px;"><?=$record['devices']?></td>
                                <td style="text-align: left; width: 30px;"><?=$record['amout']?></td>
                            </tr>
                    <?php   }
                    ?>
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
					<th>Approval</th><td><?=$row['approval']?></td>
				</tr>
				<tr>
					<th>Guest card ID</th><td><?=$row['card']?></td>
				</tr>
				<tr>
					<th>Time In</th><td><?=$row['time_in']?></td>
				</tr>
				<tr>
					<th>Time Out</th><td><?=$row['time_out']?></td>
				</tr>
			</table>
		</div>
			<div id="update">
				<?php echo "<p2><a href='updatebv.php?id=" . $row['id'] . "'>Update</a><p2>";?>
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
<!-- <footer> 
    <div class="bar">
        <div class="bar-wrap">
                <ul class="links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">License</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Advertise</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            <div class="social">
                <a href="#" class="fb">
                    <span data-icon="f" class="icon"></span>
                    <span class="info">
                        <span class="follow">Become a fan Facebook</span>
                    </span>
                </a>

                <a href="#" class="tw">
                    <span data-icon="T" class="icon"></span>
                    <span class="info">
                        <span class="follow">Follow us Twitter</span>
                    </span>
                </a>

                <a href="#" class="rss">
                    <span data-icon="R" class="icon"></span>
                    <span class="info">
                        <span class="follow">Subscribe RSS</span>
                    </span>
                </a>
            </div>
                <div class="clear"></div>
                <div class="copyright">&copy;  2020 All Rights Reserved___Designed by Duy IT. Need support please contact 0399203074 or hotline 113 </div>
        </div>
    </div>
    </footer> -->
</body>
</html>
