<?php
    include './header.php';
    $link = new mysqli('localhost','root','','demo') or die("Kết nối không thành công");
    mysqli_query($link,'SET NAMES UTF8');
?>
<div class="jumbotron text-center">
<div>
<form method="post">
    <div style="color: black;">
        <input type="text" name="user"  placeholder="username"/>
        <input type="password" name="pass"  placeholder="password">
        <input type="submit" name="submit" style="background-color: lightsalmon;" value="Login">
    </div>
</form>
</div>
</div>
<div style="text-align: -webkit-center;">

    <?php
    if(isset($_POST['submit'])){
        echo "<table style='width:80%' >";
            echo "<tr>";
                echo "<th>STT</th>";
                echo "<th>Mã SV</th>";
                echo "<th>Họ tên</th>";
                echo "<th>Username</th>";
                echo "<th>Password</th>";
                echo "<th>Ngày sinh</th>";
                echo "<th>Nơi sinh</th>";
                echo "<th>Dân tộc</th>";
                echo "</tr>";
        //$id = $_POST['id']
        //Code loi
        $username = mysqli_real_escape_string($link, $_POST['user']);
        $password = mysqli_real_escape_string($link, $_POST['pass']);
        $query = "SELECT * FROM sinhvien WHERE user='" .$_POST['user']."'"."AND pass='" .$_POST['pass'] ."';";

        // Code ok
        //$username = mysqli_real_escape_string($link, $_POST['user']);
        //$password = mysqli_real_escape_string($link, $_POST['pass']);
        //$query = "SELECT * FROM sinhvien WHERE user='" .$username."'"."AND pass='" .$password ."';";
        echo "Query:  " .$query;
        $result = mysqli_query($link,$query);
        if(mysqli_num_rows($result) > 0){
            $i = 0;
            while($r = mysqli_fetch_assoc($result)){
                $i++;
                $masv= $r['maSV'];
                $hoTen= $r['hoTen'];
                $userName= $r['user'];
                $passWord= $r['pass'];
                $ngaySinh= $r['ngaySinh'];
                $noiSinh= $r['noiSinh'];
                $danToc= $r['danToc'];
                echo"<tr>";
                echo"<td>$i</td>";
                echo"<td>$masv</td>";
                echo"<td>$hoTen</td>";
                echo"<td>$userName</td>";
                echo"<td>$passWord</td>";
                echo"<td>$ngaySinh</td>";
                echo"<td>$noiSinh</td>";
                echo"<td>$danToc</td>";
                echo"</tr>";
            }
        }else{
            echo "</br>Không có bản ghi nào trong truy vấn";
        }
    }
?>
</table>
</div>
<?php
    include './footer.php';
?>
