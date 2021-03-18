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
/*include('functions.php');
if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}*/

//Khai báo giá trị ban đầu, nếu không có thì khi chưa submit câu lệnh insert sẽ báo lỗi
$name = "";
$gender = "";
$id = "";
$usrtel = "";
$company = "";
$address = "";
$conten = "";
$tennv = "";
$browser = "";
$nvtel = "";
$bdaytime = "";
$visitor_id="";
$devices = array();

//Lấy giá trị POST từ form vừa submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["name"]))       { $name = $_POST['name']; }
    if(isset($_POST["gender"]))     { $gender = $_POST['gender']; }
    if(isset($_POST["id"]))         { $id = $_POST['id']; }
    if(isset($_POST["usrtel"]))     { $usrtel = $_POST['usrtel']; }
    if(isset($_POST["company"]))    { $company = $_POST['company']; }
    if(isset($_POST["address"]))    { $address = $_POST['address']; }
    if(isset($_POST["conten"]))     { $conten = $_POST['conten']; }
    if(isset($_POST["tennv"]))      { $tennv = $_POST['tennv']; }
    if(isset($_POST["browser"]))    { $browser = $_POST['browser']; }
    if(isset($_POST["nvtel"]))      { $nvtel = $_POST['nvtel']; }
    if(isset($_POST["bdaytime"]))   { $bdaytime = $_POST['bdaytime']; }

    for ($i=0; $i < count($_POST['serials']); $i++) { 
        array_push($devices, [
            'stt' => $_POST['serials'][$i],
            'device' => $_POST['devices'][$i],
            'amount' => $_POST['amounts'][$i],
        ]);
    }

    //Code xử lý, insert dữ liệu vào table

    $sql = "INSERT INTO khv_thainguyen (Username, Sex, ID_Number, Phone, Company, Address_Company, Appointment_purpose,  Name_Staff, Part, Phone_Staff, DateTime)
        VALUES ('$name','$gender','$id','$usrtel','$company', '$address', '$conten', '$tennv','$browser','$nvtel','$bdaytime')";

    if (mysqli_query($connect, $sql)) {
        $visitor_id = $connect->insert_id;
        foreach ($devices as $key => $device) {
            if (!($device['stt'] == "")) {
                $sql = "INSERT INTO devices (visitor_id, stt, devices, amout)
                        VALUES (".$visitor_id.",".$device['stt'].",'".$device['device']."',".$device['amount'].")";
                if( !mysqli_query($connect, $sql)) {
                    echo "Lỗi query: ". $sql;
                }
            }
        }
        //echo "Thêm dữ liệu thành công";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }
}

//Đóng database
mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng Kí Khách</title>
    <link rel="stylesheet" href="css/config.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="SHORTCUT ICON" href="images/favicon.ico">
</head>
<body>
<div class="header">
    <div id="logo">
        <a href="#"> <img src="image/KHVATEC.png" alt=""></a>    
    </div>
</div>
    <div class="conten">
        <form action="" method="post">
        <fieldset>
            <div class="khach">
                <h2><p>Information Visitor/Thông Tin Khách</p></h2><br>
                <div id="name-vistor">
                    <h3>Name Vistor/Tên Khách</h3>        
                    <p1>Usename:</p1><br>   
                    <input type="text" name="name" placeholder="Họ tên" required=""><hr>
                </div>
                
                <div id="sex">
                    <h3><p>Sex/Giới Tính</p></h3>
                    <input type="radio" name="gender" value="male" checked> Male <br>
                    <input type="radio" name="gender" value="female"> Female <br><hr>
                </div>
                <div id="infomation">
                    <h3><p>Information/Thông Tin Cá Nhân</p></h3>
                    <div id="cmnd">
                    <p1>ID Number:</p1>
                        <input type="text" name="id" placeholder="Số CMND" required title="nhập số chứng minh nhân dân/ id passport">
                    </div>
                    <div id="phone">
                    <p1>Phone number:<br></p1>
                        <input type="number" name="usrtel" placeholder="Số điện thoại" required title="chỉ nhập số điện thoại">
                     </div>
                </div>
                <div id="company">
                    <h3><p>Company/Công Ty</p></h3>
                    <p1>Name Company:<br></p1>
                    <input type="text" name="company" placeholder="Tên Công Ty"><br>
                    <p1>Addres:<br></p1>
                    <input type="text" name="address" placeholder="Địa Chỉ Công Ty">
                </div>
                <div id="job">
                    <h3><p>Reasons Appointment/Lý Do</p></h3>
                    <p1>Reasons:</p1><br>
                    <!--  <textarea cols="33" rows="9" name="conten" placeholder="Lý do hẹn...&#10;" required=""></textarea> -->
                    <input list="browsers1" name="conten" placeholder="Select" required="">
                    <datalist id="browsers1">                       
                        <option value="Construction/Thi công"></option>
                        <option value="Equipment/Trang thiết bị"></option>
                        <option value="Supply/Cung cấp"></option>
                        <option value="Meeting/Gặp gỡ"></option>
                        <option value="Verification/Xác minh"></option>
                        <option value="etc"></option>
                    </datalist>

                </div>
                <div id="list">                   
                     <table >
                        <caption>List of Devices/Thiết Bị Mang Theo</caption>
                        <tr>
                            <th>STT</th>
                            <th>Tên Thiết Bị</th>
                            <th>Số Lượng</th>
                        </tr>

                        <tr>
                            <td><input type="number" name="serials[]"></td>
                            <td><input type="text" name="devices[]" ></td>
                            <td><input type="text" name="amounts[]"></td>
                        </tr>
                        <tr>
                            <td><input type="number"name="serials[]"></td>
                            <td><input type="text"name="devices[]"></td>
                            <td><input type="text"name="amounts[]"></td>
                        </tr>
                        <tr>
                            <td><input type="number"name="serials[]"></td>
                            <td><input type="text"name="devices[]"></td>
                            <td><input type="text"name="amounts[]"></td>
                        </tr>
                        <tr>
                            <td><input type="number"name="serials[]"></td>
                            <td><input type="text"name="devices[]"></td>
                            <td><input type="text"name="amounts[]"></td>
                        </tr>
                        <tr>
                            <td><input type="number"name="serials[]"></td>
                            <td><input type="text"name="devices[]"></td>
                            <td><input type="text"name="amounts[]"></td>
                        </tr>
                    </table>
                </div>                 

            </div>
            <div class="khv">
                <h2><p>Department To Meet/Bộ Phận Cần Gặp</p></h2>
                <div id="name-staf">
                    <h3><p>Staff Name/Tên Nhân Viên</p></h3>
                    <p1>Username/Họ Tên:</p1>
                    <input type="text" name="tennv" placeholder="Họ tên nhân viên" required=""><hr>
                </div>
                <div id="part">
                    <h3><p>Part/Bộ Phận</p></h3>
                    <p1>Part/Bộ Phận:</p1><br>
                    <input list="browsers" name="browser" placeholder="Select" required="">
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
                    </datalist> <hr>
                </div>
                <div id="name-staf">
                    <h3><p>Phone Number/Số Điện Thoại</p></h3>
                    <p1>Phone number:</p1>
                     <input type="number" name="nvtel" placeholder="0399203074" required="*" pattern="[0-9]{9-11}" title="chỉ nhập số điện thoại"><hr>
                </div>
                <div id="part">
                    <h3><p>Date And Time/Thời Gian Hẹn</p></h3>
                    <p1>Time Sign: <br></p1>
                    <input type="datetime-local" name="bdaytime" required="">                   
                </div>
                                
            </div>
            <div id="sign">
                <input type="submit" value="Đăng Kí">
            </div>
        </fieldset>
        </form>
    </div>
</body>
</html>