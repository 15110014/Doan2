<?php
    include './header.php';
?>
<div class="jumbotron text-center" style="height: 110px; padding: 25px 25px;">
    <h1>File Upload</h1>
</div>

<div class="body_padded" style="margin:50px;">
	<h1>Chọn file nhỏ hơn 2 Mb</h1>

	<div class="vulnerable_code_area">
		<form enctype="multipart/form-data" action="#" method="POST">
			<input type="hidden" name="MAX_FILE_SIZE" value="2097153" />
			Choose an image to upload:<br /><br />
			<input name="uploaded" type="file"/><br />
			<br />
			<input type="submit" name="Upload" value="Upload" />
		</form>
	</div>
</div>

<?php
if(isset($_FILES['uploaded'])){
	$dir  = "./uploads/";
	$file = basename( $_FILES[ 'uploaded' ][ 'name' ] );
	$uploaded_size = $_FILES[ 'uploaded' ][ 'size' ];
	$uploaded_name = $_FILES[ 'uploaded' ][ 'name' ];
	// if(preg_match('/\.php$/',$file) || preg_match('/\.phtml$/',$file)){
	// 	DIE("<p style='text-align:center;'>NO PHP</p>");
	// }
	// if($uploaded_size < 2097153){
	// 	if( move_uploaded_file( $_FILES[ 'uploaded' ][ 'tmp_name' ], $dir . $file )) {
	// 		// No
	// 		echo "<p style='text-align:center;'>Upload done !</p>";
	// 		echo '<p style="text-align:center;">Your file can be found <a href="/php_coban/database/uploads/'.htmlentities($file).'">here</a></p>';
	// 	}
	// 	else {
	// 		// Yes!
	// 		echo "<p style='text-align:center;'>Upload failed</p>";
	// 	}
	// }else{
	// 	echo "<p style='text-align:center;'>Chọn file có kích thước nhỏ hơn 2 Mb</p>";
	// }

	if($uploaded_size < 2097153){
		if( !move_uploaded_file( $_FILES[ 'uploaded' ][ 'tmp_name' ], $dir . $file ) ) {
			// No
			echo "<pre>Your image was not uploaded.</pre>";
		}
		else {
			// Yes!
			echo "<pre>$dir$uploaded_name succesfully uploaded!</pre>";
			echo '<p style="text-align:center;">Open <a href="./uploads/'.htmlentities($file).'">here</a></p>';

		}
	}else{
		echo "Chọn file có kích thước nhỏ hơn 2 Mb";
	}
}
    include './footer.php';
?>