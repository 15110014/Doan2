<?php
    include './header.php';
?>
    <div class="jumbotron text-center" style="height: 110px; padding: 25px 25px;">
        <h1>Thêm môn học</h1>
    </div>
    <div style="text-align: -webkit-center;">
    <form action="" method="post">
    <table>
        <tr>
            <th>Mã môn học:</th>
            <td><input type="text" name="MaMH" value=""></td>
        </tr>

        <tr>
            <th>Môn học:</th>
            <td><input type="text" name="tenMH" value=""></td>
        </tr>

        <tr>
            <th>Mô tả:</th>
            <td><textarea cols="30" rows="7" name="moTa"></textarea></td>
        </tr>
    </table>
    <button type="submit">Thêm</button>
</form>
<?php
$username = "root"; // Khai báo username
$password = "";      // Khai báo password
$server   = "localhost";   // Khai báo server
$dbname   = "demo";      // Khai báo database

// Kết nối database tintuc
$connect = new mysqli($server, $username, $password, $dbname);
mysqli_query($connect,'SET NAMES UTF8');
//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
if ($connect->connect_error) {
    die("Không kết nối :" . $conn->connect_error);
    exit();
}

//Khai báo giá trị ban đầu, nếu không có thì khi chưa submit câu lệnh insert sẽ báo lỗi


//Lấy giá trị POST từ form vừa submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $MaMH = "";
    $tenMH = "";
    $moTa = "";
    //Code chữa lỗi
    if(isset($_POST["MaMH"])) { $MaMH =  mysqli_real_escape_string($connect,$_POST['MaMH']); }
    if(isset($_POST["tenMH"])) { $tenMH = mysqli_real_escape_string($connect,$_POST['tenMH']); }
    if(isset($_POST["moTa"])) { $moTa = mysqli_real_escape_string($connect,$_POST['moTa']); }

    //Code xử lý, insert dữ liệu vào table
    $sql = "INSERT INTO monhoc (MaMH, tenMH, moTa)
    VALUES ('$MaMH', '$tenMH', '$moTa');";

    if ($connect->query($sql) === TRUE) {
        echo "Thêm dữ liệu thành công</br>";
        $sql = "SELECT MaMH, tenMH, moTa FROM monhoc ORDER BY MaMH DESC LIMIT 5";
        $result = $connect->query($sql);
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "MaMH: " . $row["MaMH"]. " - Môn: " . $row["tenMH"]. " - Mô tả: " . $row["moTa"] . "<br>";
                    }
        } else {
            echo "0 results";
        }
        $connect->close();
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
//Đóng database
        //mysqli_close($connect);
?>
    </div>
    
<?php
    include './footer.php';
?>