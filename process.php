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
$approval     = $_POST['approval'];

//Code xử lý, update dữ liệu vào table dựa theo điều kiện WHERE tại id = 1
$sql = "UPDATE khv_thainguyen SET approval='$approval' WHERE Id=$Id";


if (mysqli_query($connect, $sql)) {
    //Nếu kết quả kết nối thành công, trở về trang view.
    header('Location: approval.php');
} else {
    //Nếu kết quả kết nối không được thì trở về update.php đồng thời gán giá trị error=1, dựa theo giá trị này trang update.php có thể thông báo lỗi cần thiết.
    header('Location: approval.php?error=1');
}

//Đóng kết nối database tintuc
mysqli_close($connect);