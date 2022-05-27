<?php
    $database = "projetweb";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    if(isset($_GET['nom_image'])) {

        echo $_GET['nom_image'];
        $sql = "SELECT imageType,imageData FROM output_images WHERE imageName=" . $_GET['nom_image'];
		$result = mysqli_query($db_handle, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($db_handle));
		$row = mysqli_fetch_array($result);
		header("Content-type: " . $row["imageType"]);
        echo $row["imageData"];

	}
	mysqli_close($conn);
?>