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
if (!isApproval()&&!isAdmin()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: index.php');
    }

//Lấy dữ liệu từ view.php bằng phương thức GET.
if(isset($_GET['id'])){ 
    $id = $_GET['id'];
    $sql     = "SELECT * FROM khv_thainguyen WHERE id='$id'";
    $ket_qua = mysqli_query($connect,$sql);

    while ($row = mysqli_fetch_array($ket_qua)) {
        $Username       = $row['Username'];
        $Sex        = $row['Sex'];
        $Company     = $row['Company'];
        $Appointment_purpose     = $row['Appointment_purpose'];
        $Name_Staff     = $row['Name_Staff'];
        $Part     = $row['Part'];
        $DateTime     = $row['DateTime'];
        $approval     = $row['approval']; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phê Duyệt</title>
    <link rel="stylesheet" href="css/update.css" type="text/css">
    <link rel="SHORTCUT ICON" href="css/image/favicon.ico">
</head>
<body> 
    <div class="logo1">
        <div id="logo">
        <img src="image/KHVATEC.png" alt="">       
        </div>
    </div>
    <div id="title">
         <h1>Phê Duyệt</h1>
    </div>
<div class="conten">
<!-- Truyền dữ liệu vào form. -->
<form action="process.php" method="post">
    <div id="update">
        <h3></h3>
    <table>
        <tr>
            <th>ID:</th>
            <td>
                <input type="hidden" name="id" value="<?php echo $id; ?> ">
                <?php echo $id; ?>
            </td>
        </tr>        

        </tr>
        <tr>
            <th>UserName:</th>
            <td><input type="hidden" name="user" value="<?php echo $Username; ?>">
            <?php echo $Username; ?></td>
        </tr>

        <tr>
            <th>Sex:</th>
            <td><input type="hidden" name="sex" value="<?php echo $Sex; ?>">
            <?php echo $Sex; ?></td>
        </tr>

        <tr>
            <th>Company:</th>
            <td><input type="hidden" name="company" value="<?php echo $Company; ?>">
            <?php echo $Company; ?></td>
        </tr>

        <tr>
            <th>Reason:</th>
            <td><input type="hidden" name="purpose" value="<?php echo $Appointment_purpose; ?>">
            <?php echo $Appointment_purpose; ?></td>
        </tr>        
        <tr>
            <th>Name Staff:</th>
            <td><input type="hidden" name="staff" value="<?php echo $Name_Staff; ?>">
                <?php echo $Name_Staff; ?></td>
        </tr>
        <tr>
            <th>Part:</th>
            <td><input type="hidden" name="part" value="<?php echo $Part; ?>">
                <?php echo $Part; ?></td>
        </tr>
        <tr>
            <th>Date and Time:</th>
            <td><input type="hidden" name="time" value="<?php echo $DateTime; ?>">
                <?php echo $DateTime; ?></td>
        </tr>
        <tr>
            <th>Phê Duyệt:</th>
            <td>
                <input type="radio" name="approval" value="Pending" checked> Pending<br>
                <input type="radio" name="approval" value="No"> No<br>
                <input type="radio" name="approval" value="Yes"> Yes<br>
            </td>
        </tr>
    </table>
    <button type="submit">Đồng Ý</button>
</div>
</form>
</div>
<?php 
    } //Đóng vòng lặp while.
} //Đóng câu lệnh if.

//Đóng kết nối database tintuc
$connect->close();
?>
</body>
</html>