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
    if (!isSecurity()&&!isAdmin()) {
        $_SESSION['msg'] = "You must log in first";
        header('location:index.php');
    }

//Lấy dữ liệu từ view.php bằng phương thức GET.
if(isset($_GET['id'])){ 
    $id = $_GET['id'];
    $sql     = "SELECT * FROM khv_thainguyen WHERE id='$id'";
    $ket_qua = mysqli_query($connect,$sql);

    while ($row = mysqli_fetch_array($ket_qua)) {
        $Username       = $row['Username'];
        $Sex            = $row['Sex'];
        $ID_Number      = $row['ID_Number'];
        $Phone          = $row['Phone'];
        $Company        = $row['Company'];
        $Address_Company= $row['Address_Company'];
        $Appointment_purpose= $row['Appointment_purpose'];
        $card           = $row['card'];
        $Name_Staff     = $row['Name_Staff'];
        $Part           = $row['Part'];
        $Phone_Staff    = $row['Phone_Staff'];
        $DateTime       = $row['DateTime'];
        $time_in        = $row['time_in'];
        $time_out       = $row['time_out'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Visitor KHVatec</title>
    <link rel="stylesheet" href="css/printer.css" type="text/css">
    <link rel="SHORTCUT ICON" href="css/image/favicon.ico">
</head>
<body> 
    <div id="logo">
        <img src="image/KHVATEC.png" alt="">       
    </div>
<div class="conten">
    <div id="table_1">
        <table style="width:80%;height:100px;border-top: 1px solid #000;">           
              <caption>Visitor</caption>
            <tr style="height: 40px;">
                 <th style="width:25%;">ID</th>
                 <th style="width:25%;">UserName</th>
                 <th style="width:25%;">Sex</th>
                 <th style="width:25%;">Phone</th>
            </tr>
            <tr>
                <td ">
                    <input type="hidden" name="id" value="<?php echo $id; ?> ">
                    <?php echo $id; ?>
                </td>
                <td>
                    <input type="hidden" name="user" value="<?php echo $Username; ?>">
                    <?php echo $Username; ?>
                </td>
                <td>
                    <input type="hidden" name="sex" value="<?php echo $Sex; ?>">
                    <?php echo $Sex; ?>
                </td>
                <td>
                    <input type="hidden" name="phone" value="<?php echo $Phone; ?>">
                     <?php echo $Phone; ?>
                </td>
            </tr>
        </table>
    </div>
    <div id="table_2">
        <table style="width:80%;height:100px">
            <tr style="height: 40px;">
                <th style="width:25%;">Company</th>
                <th style="width:75%;">Address Company</th>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="company" value="<?php echo $Company; ?>">
                    <?php echo $Company; ?>
                </td>
                <td>
                    <input type="hidden" name="address" value="<?php echo $Address_Company; ?>">
                    <?php echo $Address_Company; ?>
                </td>
            </tr>
        </table>
    </div>
    <div id="table_3">
        <table style="width:80%;height:100px;">
            <tr style="height: 40px;">
                <th style="width:50%;">ID Number</th>
                <th style="width:50%;">Appointment</th>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="user" value="<?php echo $ID_Number; ?>">
                    <?php echo $ID_Number; ?>
                </td>

                <td>
                    <input type="hidden" name="appoint" value="<?php echo $Appointment_purpose; ?>">
                    <?php echo $Appointment_purpose; ?>
                </td>
            </tr>
        </table>
    </div>
    <div id="table_3">
        <table style="width:80%;height:150px;">
            <tr>
                <th style="height:40px;text-align:center;">List Devices</th>
            </tr>
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
                                <td><?=$record['stt']?></td>
                                <td><?=$record['devices']?></td>
                                <td><?=$record['amout']?></td>
                            </tr>
                    <?php   }
                    ?>
            </tr>
        </table>
    </div><br>
    <div id="table_5">
        
        <table style="width:80%;height:100px">
             <caption>KHV</caption>   
            
            <tr style="height: 40px;">
                <th style="width:25%;">Name Staf</th>
                <th style="width:25%;">Part</th> 
                <th style="width:30%;">Phone Staff</th> 
            </tr>
                <td>
                    <input type="hidden" name="staff" value="<?php echo $Name_Staff; ?>">
                    <?php echo $Name_Staff; ?>
                </td>                           
                <td>
                    <input type="hidden" name="part" value="<?php echo $Part; ?>">
                    <?php echo $Part; ?>
                </td>                
                <td>
                    <input type="hidden" name="part" value="<?php echo $Phone_Staff; ?>">
                    <?php echo $Phone_Staff; ?>
                </td>
        </table>
    </div>
    <div id="table_6">
        <table style="width:80%;height:100px">
           <!--  <caption>Information Visitor</caption>  -->           
            <tr style="height: 40px;">
                <th style="width:25%;">Guest Card</th>
                <th style="width:25%;">Time In</th>
                <th style="width:30%;">Time Out</th>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="part" value="<?php echo $card; ?>">
                    <?php echo $card; ?>
                </td>
                <td>
                    <input type="hidden" name="time_in" value="<?php echo $time_in; ?>">
                    <?php echo $time_in; ?>
                </td>
                <td>
                    <input type="hidden" name="time_out" value="<?php echo $time_out; ?>">
                </td>
            </tr>
        </table>
    </div><br>
    <div id="update">
    <?php echo "<p2><a href='export.php?id=" . $row['id'] . "'>export</a><p2>";?>
    </div>
</div>

<?php 
    } //Đóng vòng lặp while.
} //Đóng câu lệnh if.

//Đóng kết nối database tintuc
$connect->close();
?>
</body>
</html>