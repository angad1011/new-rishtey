<?php
error_reporting(0);
//error_reporting( E_ALL );
	define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'premium_matrimony_2');
	$db=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD);
	$connection=mysqli_select_db($db,DB_DATABASE); 
?>
<?php date_default_timezone_set("Asia/Kolkata");?>
<?php 
    if (!isset($_SESSION['lang'])){
		$_SESSION['lang'] = "en_main";
	}else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])) {
		if ($_GET['lang'] == "en"){
			$_SESSION['lang'] = "en";
            header("Location:index.php");
		}else if ($_GET['lang'] == "hi"){
			$_SESSION['lang'] = "hi";
            header("Location:index.php");
		}
	}
	//echo 'choose language:-'.$_SESSION['lang'];
	require_once "languages/" . $_SESSION['lang'] . ".php";
?>