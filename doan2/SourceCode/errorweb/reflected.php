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
                    echo $str;  // code loi
                    header('location: reflected.php?user='.$str);
                    exit();
                }
                if(isset($_GET['user'])){
                    echo $_GET['user']; // code lỗi
                }
            ?>
            </div>
        </div>
    </div>
</div>
<?php
    include './footer.php';
?>