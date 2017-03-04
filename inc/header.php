<?php  	require_once('inc/control/verify_login.php'); // checking if user is already logged in
		require_once('inc/control/func/functions.php');	// including all necessary functions
?>

<!doctype html>

<!--[if lt IE 7]> <html class="ie6 lt-ie10 lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 lt-ie10 lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 lt-ie10 lt-ie9" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="ie9 lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<title><?php isset($title)? print $title : print 'Siani Print Project Management System' ?></title>

	<meta charset="utf-8" />
	<meta name="viewport" content="initial-scale=1, maximum-scale=1, width=device-width, height=device-height">
	<meta name="apple-mobile-web-app-capable" content="yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">


	<link rel="stylesheet" href="inc/css/main.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

</head>
<body>
	<div class="outer-container">
		<?php include('template/nav.php');?>
	