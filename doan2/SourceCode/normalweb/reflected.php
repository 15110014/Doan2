<?php
    ob_start();
    include './header.php';
    
?>
<div class="jumbotron text-center">
    Nhập từ khóa tìm kiếm
    <form method="post">
    <div style="color: black;">
        <input type="text" name="user"  placeholder="Input text here"/>
        <input type="submit" name="submit" style="background-color: lightsalmon;" value="Search">
    </div>
</form>
    </div>
    <div style="text-align: center;">
        <div>
            <?php
                if(isset($_POST['submit'])){
                    $str= $_POST['user'];
                    
                    // echo $str;  // code loi
                    //echo htmlentities($str); // sua loi
                    echo htmlspecialchars($str); // sua loi
                    header('location: reflected.php?user='.$str);
                    exit();
                }
                if(isset($_GET['user'])){
                    // echo htmlspecialchars($_GET['user']); //sửa lỗi
                    echo htmlentities($_GET['user']); //sửa lỗi
                    
                }
            ?>
            </div>
        </div>
    </div>
</div>
<?php
    include './footer.php';
?>