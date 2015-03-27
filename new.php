<?php
require ("header.php");
?>
<div id = "title" align = "center"><h1>NEW ENTRY</h1></div>
<h2>
<form action = "entry_submit.php" method = "POST">
Name:-------<input name = "user"/><br/>
Password:-<input type = "password" name = "passw"/><br/>
Title:---------<input name = "title"/><br/>
Entry:--------<textarea name = "entry" cols  = 50 rows = 10></textarea><br/>
<input type = "submit" name = "Submit_Entry" value = "Send Entry"/><br/><br/>
<?php

$sql  = "SELECT * FROM entries ORDER BY id DESC;";

$result = mysql_query($sql);
while ($db_f = mysql_fetch_assoc($result)){
echo "<a href = 'show.php?id={$db_f['id']}'><li>".$db_f['id']." ".$db_f['subject']."</li></a>";
}

require ("footer.php");
?>
