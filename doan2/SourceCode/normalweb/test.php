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
        <input type="text" name="user"  placeholder="Input text here"/>
        <input type="submit" name="submit" style="background-color: lightsalmon;" value="Search">
    </div>
</form>
</div>
</div>
<div style="text-align: -webkit-center;">
<?php
if(isset($_POST['submit'])){
    $maMH = $_POST['user'];
    echo "<table style='border: solid 1px black;'>";
    echo "<tr><th>MaNH</th><th>Ten Mon hoc</th><th>Mo ta</th></tr>";

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
    echo "";
}
    
?>
</div>
<?php
    include './footer.php';
?>
