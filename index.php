<?php
require ("header.php");
?>
<div id = "title" align = "center"><h1>HOME</h1></div>
<?php
$page_id = "HOME";
$sql  = "SELECT * FROM entries ORDER BY id DESC;";
$result = mysql_query($sql);
$sql  = "SELECT * FROM comments";
$result_comm = mysql_query($sql);
$db_f = mysql_fetch_assoc($result);
echo "<h1>".$db_f['id']." ".$db_f['subject']."</h1><br/><i>Posted on: ".date("D j F Y g.iA", strtotime($db_f['dateposted']))."</i><h2>".$db_f['body']."<br/></h2>";

echo "<h2>My Previous Posts:</h2><ul>";
while ($db_f = mysql_fetch_assoc($result)){
	echo "<li><a href = 'show.php?id={$db_f['id']}'>".$db_f['id']." ".$db_f['subject']."</a></li>";
}
echo "</ul><br/><br/><br/>";

require ("footer.php");
?>
