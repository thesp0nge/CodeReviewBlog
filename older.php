<?php
require ("header.php");
$sql  = "SELECT * FROM entries
ORDER BY id DESC;";
?>
<div id = "title" align = "center"><h1>OLDER POSTS</h1></div>
<?php
$result = mysql_query($sql);
$sql  = "SELECT * FROM comments";
$result_comm = mysql_query($sql);
while ($db_f = mysql_fetch_assoc($result)){
	echo "<hr/><h1>".$db_f['id']." <a href = 'show.php?id={$db_f['id']}'>".$db_f['subject']."</a></h1><br/><i>Posted on: ".date("D j F Y g.iA", strtotime($db_f['dateposted']))."</i><h2>".$db_f['body']."<br/></h2>";
}
require ("footer.php");
?>
