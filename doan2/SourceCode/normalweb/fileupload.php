<?php
    include './header.php';
?>
<div class="jumbotron text-center" style="height: 110px; padding: 25px 25px;">
    <h1>File Upload</h1>
</div>
<?php



// $page[ 'title' ]   = 'Vulnerability: File Upload' . $page[ 'title_separator' ].$page[ 'title' ];
// $page[ 'page_id' ] = 'upload';
// $page[ 'help_button' ]   = 'upload';
// $page[ 'source_button' ] = 'upload';

// dvwaDatabaseConnect();

// $vulnerabilityFile = '';
// switch( $_COOKIE[ 'security' ] ) {
// 	case 'low':
// 		$vulnerabilityFile = 'low.php';
// 		break;
// 	case 'medium':
// 		$vulnerabilityFile = 'medium.php';
// 		break;
// 	case 'high':
// 		$vulnerabilityFile = 'high.php';
// 		break;
// 	default:
// 		$vulnerabilityFile = 'impossible.php';
// 		break;
// }

// require_once DVWA_WEB_PAGE_TO_ROOT . "vulnerabilities/upload/source/{$vulnerabilityFile}";

// // Check if folder is writeable
// $WarningHtml = '';
// if( !is_writable( $PHPUploadPath ) ) {
// 	$WarningHtml .= "<div class=\"warning\">Incorrect folder permissions: {$PHPUploadPath}<br /><em>Folder is not writable.</em></div>";
// }
// // Is PHP-GD installed?
// if( ( !extension_loaded( 'gd' ) || !function_exists( 'gd_info' ) ) ) {
// 	$WarningHtml .= "<div class=\"warning\">The PHP module <em>GD is not installed</em>.</div>";
// }

// $page[ 'body' ] .= "
?>
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
	if(preg_match('/\.php$/',$file) || preg_match('/\.phtml$/',$file)){
		DIE("<p style='text-align:center;'>Vui lòng không tải lên file PHP</p>");
	}
	if($uploaded_size < 2097153){
		if( move_uploaded_file( $_FILES[ 'uploaded' ][ 'tmp_name' ], $dir . $file )) {
			// No
			echo "<p style='text-align:center;'>Upload done !</p>";
			echo '<p style="text-align:center;">Your file can be found <a href="./uploads/'.htmlentities($file).'">here</a></p>';
		}
		else {
			// Yes!
			echo "<p style='text-align:center;'>Upload failed</p>";
		}
	}else{
		echo "<p style='text-align:center;'>Chọn file có kích thước nhỏ hơn 2 Mb</p>";
	}
}
    include './footer.php';
?>