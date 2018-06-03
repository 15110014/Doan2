<?php
    ob_start();
    include './header.php';
    $link = new mysqli('localhost','root','','demo') or die("Kết nối không thành công");
    mysqli_query($link,'SET NAMES UTF8');
    
    
?>
    <div class="jumbotron text-center col-xs-12 col-sm-12 col-md-12 col-lg-12">         
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <p>Danh sách các ghi chú đã lưu</p>
                <select name="" id="mySelect" class="form-control" onChange="myFunction(this.value)">
                <option value="">Danh sách</option>
                    <?php
                        $query1 = "SELECT * FROM ghichu";
                        $result = mysqli_query($link,$query1);
                        if(mysqli_num_rows($result) > 0){
                            $i = 0;
                            while($r = mysqli_fetch_assoc($result)){
                                $i++;
                                echo "<option value='".$r['tenText']."'>".$r['tenText']."</option>";
                            }
                        }else{
                            echo "Data empty";
                        }
                    ?>
                </select>
                <script>
                    function myFunction(sel) {
                        window.location.href = "storage.php?selected="+sel;
                    }
                </script>
                <?php
                    if(isset($_GET['selected'])){
                        $select = $_GET['selected'];
                        $query3 = "SELECT * FROM ghichu WHERE tenText='".$select ."'";
                        $result = mysqli_query($link,$query3);
                        if(mysqli_num_rows($result) > 0){
                            $i = 0;
                            while($r = mysqli_fetch_assoc($result)){
                                $i++;
                                echo "Tên ghi chú: " .$r['tenText'];
                                echo "</br>Nội dung ghi chú: " .$r['texts']; //code lỗi
                                //echo "</br>Nội dung ghi chú: " .htmlentities($r['texts']); // sửa lỗi
                            }
                        }else{
                            echo "Data empty";
                        }
                    }
                    
                ?>
            </div>        
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <form method="post" style="text-align: initial;" action="<?php echo $_SERVER["PHP_SELF"];?>">
                
                <!-- <form method="post" style="text-align: initial;" action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"];)?>"> -->
                    <div style=" color: #555;">
                            <input 
                                type="area"
                                style="width: 25% !important;"
                                name="textName"
                                class="form-control"
                                placeholder="Nhập tên đoạn text cần lưu">
                            <textarea rows="4" cols="50" name="texts" placeholder="Nhập bất kì gì đó ở đây" style="text-align: left;"></textarea></br>
                            <input type="submit" name="submit" value="Lưu vào danh sách" style="background-color: lightsalmon;">
                            <input type="submit" name="submit2" value="Lưu và hiển thị" style="background-color: lightsalmon;">
                    </div> 
                </form>
            </div>        
    </div>
    <div style="width: 100%;text-align: center;">
    <?php
        $query5 = "SELECT * FROM ghichu2";
        $result = mysqli_query($link,$query5);
        if(mysqli_num_rows($result) > 0){
            $i = 0;
            while($r = mysqli_fetch_assoc($result)){
                $i++;
                echo "<div style='border: 2px solid #ddd;'>";
                echo "Tên ghi chú: " .$r['name'];
                echo "</br>Nội dung ghi chú: " .$r['texts'];
                echo "</div>";
            }
        }else{
            echo "Data empty";
        }
    ?>
    </div>
    <?php
        // xử lí thành các đối tượng html
        // function test_input($data) {
        //     $data = trim($data);
        //     $data = stripslashes($data);
        //     $data = htmlspecialchars($data);
        //     return $data;
        //   }

        // kiểm tra kí tự đặt biệt
        // if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        //     $nameErr = "Only letters and white space allowed"; 
        //   }

        // xử lí email
        // $email = test_input($_POST["email"]);
        // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // $emailErr = "Invalid email format"; 
        // }

        //xử lí URL
        // $website = test_input($_POST["website"]);
        // if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
        // $websiteErr = "Invalid URL"; 
        // }
        if(isset($_POST['submit'])){
            $tenText = $_POST['textName'];
            $texts = $_POST['texts'];
            $query2 = "INSERT INTO ghichu VALUE ('$tenText','$texts')";
            mysqli_query($link,$query2) or die("Thêm dữ liệu thất bại");
            header('location: storage.php');
            exit();
        }
        // $texts = htmlspecialchars($_POST['texts']);
        if(isset($_POST['submit2'])){
            $tenText = $_POST['textName'];
            $texts = ($_POST['texts']);
            $query4 = "INSERT INTO ghichu2 VALUE ('$tenText','$texts')";
            mysqli_query($link,$query4) or die("Thêm dữ liệu thất bại");
            header('location: storage.php');
            exit();
        }
    ?>
<?php
    include './footer.php';
?>