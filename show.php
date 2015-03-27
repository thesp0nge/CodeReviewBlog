<?php
require ("header.php");
require ("comments/comments.php");
$showId = (int) $_GET['id'];

if ( !$showId ) {
	die( "Invalid id" );
}

$sql  = "SELECT * FROM entries
WHERE id = '{$showId}';";

$result = mysql_query($sql);
$db_f = mysql_fetch_assoc($result);

echo "<h1>".$db_f['id']." ".$db_f['subject']."</h1><br/><i>Posted on: ".date("D j F Y g.iA", strtotime($db_f['dateposted']))."</i><h2>".$db_f['body']."<br/></h2>";

//Comments
showComments($db_f['id']);
