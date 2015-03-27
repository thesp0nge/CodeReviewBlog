<?php
require ("header.php");
?>
<div id = "title" align = "center"><h1>CURRENT ENTRY</h1></div>
<?php
$sql  = "SELECT * FROM entries ORDER BY id DESC;";
$result = mysql_query($sql);
$db_f = mysql_fetch_assoc($result);
echo "<h1>".$db_f['id']." ".$db_f['subject']."</h1><br/><i>Posted on: ".date("D j F Y g.iA", strtotime($db_f['dateposted']))."</i><h2>".$db_f['body']."<br/></h2>";

require ("footer.php");
?>
