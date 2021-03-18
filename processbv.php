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

$Id          = $_POST['id'];
$card     = $_POST['card'];
$time_in     = $_POST['time_in'];
$time_out     = $_POST['time_out'];

//Code xử lý, update dữ liệu vào table dựa theo điều kiện WHERE tại id = 1
$sql = "UPDATE khv_thainguyen SET card='$card', time_in='$time_in', time_out='$time_out' WHERE Id=$Id";


if (mysqli_query($connect, $sql)) {
    //Nếu kết quả kết nối thành công, trở về trang view.
    header('Location: baove.php');
} else {
    //Nếu kết quả kết nối không được thì trở về update.php đồng thời gán giá trị error=1, dựa theo giá trị này trang update.php có thể thông báo lỗi cần thiết.
    header('Location: updatebv.php?error=1');
}

//Đóng kết nối database tintuc
mysqli_close($connect);