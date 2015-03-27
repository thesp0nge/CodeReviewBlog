<?php
require ("header.php");
require ("encryption.php");
if ($_POST['Submit_Entry']){
if (encrypt($_POST['passw']) == "8ab5648c5c1d3ff0bbd0ffc2f679e753f3183a94a0bd78272623d8090699782936c7b5c9ed508435a2627d7c2edbc4f1d8b379d567c5b18f6cca6151f27adeb9"){
$sql  = "INSERT INTO entries(dateposted, subject, body)
VALUES (NOW(), '".$_POST['title']."', '".$_POST['entry']."');";

$result = mysql_query($sql);
echo "Entry Successful";
}
else {
echo "Wrong Password: ";
}
}
?>
