<?php
    ob_start();
    include './header.php';
    $link = new mysqli('localhost','root','','demo') or die("Kết nối không thành công");
    mysqli_query($link,'SET NAMES UTF8');
?>
<div class="jumbotron text-center">
<div>
<form method="post">
    <div style="color: black;">
        Mã môn học: <input type="text" name="maMH"  placeholder="Input text here"/>
        <input type="submit" name="submit" style="background-color: lightsalmon;" value="Search">
        Sắp xếp theo: <input type="text" name="sort"  placeholder="MaMH or tenMH"/>
        <input type="submit" name="submit2" style="background-color: lightsalmon;" value="Sắp xếp">   
    </div>
</form>
</div>
</div>
<div style="text-align: -moz-center;">
<?php
    $sort = 'MaMH';
    if (!isset($_POST['submit'])) {
        if(isset($_POST['submit2'])){    
            $sort = $_POST['sort'];
        }
            
            echo "<table style='border: solid 1px black;'>";
            echo "<tr><th>Mã môn học</th><th>Tên môn học</th><th>Mô tả</th></tr>";

            class TableRows extends RecursiveIteratorIterator { 
                function __construct($it) { 
                    parent::__construct($it, self::LEAVES_ONLY); 
                }

                function current() {
                    return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
                }

                function beginChildren() { 
                    echo "<tr>"; 
                } 

                function endChildren() { 
                    echo "</tr>" . "\n";
                } 
            } 
            $username = "root";
            $password = "";
            try {
                $conn = new PDO("mysql:host=localhost;dbname=demo", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT MaMH,tenMH, moTa FROM monhoc ORDER BY $sort"); 
                $stmt->execute();

                // set the resulting array to associative
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
                    echo $v;
                }
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $conn = null;
            echo "</table>";
        
    
    } else {
        if($_POST['maMH']){
            if(isset($_POST['submit2'])){
                $sort = $_POST['sort'];
            }
            $maMH = $_POST['maMH'];     //code lỗi
            //$id = mysqli_real_escape_string($link, $_POST['id']);         //code sửa lỗi
            echo "<table style='border: solid 1px black;'>";
            echo "<tr><th>Mã môn học</th><th>môn học</th><th>Mô tả</th></tr>";
        
            class TableRows extends RecursiveIteratorIterator { 
                function __construct($it) { 
                    parent::__construct($it, self::LEAVES_ONLY); 
                }
        
                function current() {
                    return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
                }
        
                function beginChildren() { 
                    echo "<tr>"; 
                } 
        
                function endChildren() { 
                    echo "</tr>" . "\n";
                } 
            } 
            $username = "root";
            $password = "";
            try {
                $conn = new PDO("mysql:host=localhost;dbname=demo", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT MaMH,tenMH, moTa FROM monhoc WHERE MaMH='".$maMH."'"); 
                $stmt->execute();
        
                // set the resulting array to associative
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
                    echo $v;
                }
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $conn = null;
            echo "</table>";
        }else{
            echo "Vui lòng nhập Mã môn học.";
        }
    }  
?>
</div>
<?php
    include './footer.php';
?>