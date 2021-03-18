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
        header('location: ../index.php');
    }

//Lấy dữ liệu từ view.php bằng phương thức GET.
if(isset($_GET['id'])){ 
    $id = $_GET['id'];
    $sql     = "SELECT * FROM khv_thainguyen WHERE id='$id'";
    $ket_qua = mysqli_query($connect,$sql);

    while ($row = mysqli_fetch_array($ket_qua)) {
        $Username       = $row['Username'];
        $Company     = $row['Company'];
        $Name_Staff     = $row['Name_Staff'];
        $Part     = $row['Part'];
        $card     = $row['card'];
        $time_in     = $row['time_in'];
        $time_out     = $row['time_out'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="css/updatebv.css" type="text/css">
    <link rel="SHORTCUT ICON" href="css/image/favicon.ico">
</head>
<body> 
    <div class="logo1">
        <div id="logo">
        <img src="image/KHVATEC.png" alt="">       
        </div>
    </div>
    <div id="title">
         <h1>Update</h1>
    </div>
<div class="conten">
<!-- Truyền dữ liệu vào form. -->
<form action="processbv.php" method="post">
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
            <th>Company:</th>
            <td><input type="hidden" name="company" value="<?php echo $Company; ?>">
            <?php echo $Company; ?></td>
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
            <th>Guest Card:</th>
            <td><input type="text" name="card" value="<?php echo $card; ?>">
        </tr>
        <tr>
            <th>Time In:</th>
            <td><input type="time" name="time_in" value="<?php echo $time_in; ?>">
        </tr>
        <tr>
            <th>Time Out:</th>
            <td><input type="time" name="time_out" value="<?php echo $time_out; ?>">
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