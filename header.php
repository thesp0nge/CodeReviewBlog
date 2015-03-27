<?php
require ("config.php");
$db = mysql_connect($dbhost, $dbuser, $dbpassword);
mysql_select_db($dbdatabase, $db);
?>
<html>

<head>
<title><?php echo $config_blogname; ?> </title>
<link rel = "stylesheet" href = "style.css" type="text/css" />
<link href="comments/css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="comments/js/jquery-1.5.2.min.js"></script>
<script>
// Bold the comments
$(function () {
	$( '.commenthead' ).filter(
		function() {
			var name = $(this).parent().data('name');
			var time = $(this).html().match(/\(.+\)/g);
			$(this).html( 'Comment from <b>'+name+'</b> <span>'+time+'</span>:' );
		}
	);
});
</script>
</head>

<body>
<div id = "all">
<div id = "header" align = "center" background  = "red">
<h1><?php echo $config_blogname; ?> </h1><br/>
</div>
<div id = "menu" align = "center">
<h3>[<a id = "menu_link_1" href="index.php">Home</a>][<a id = "menu_link_1" href="curr.php">Current Entry</a>][<a id = "menu_link_1" href="older.php">All Entries</a>][<a id = "menu_link_1" href="new.php">Post New Entry</a>]</h3>
</div>
<div id = "main" width = "100" >
