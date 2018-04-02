<?php
# This function reads your DATABASE_URL configuration automatically set by Heroku
# the return value is a string that will work with pg_connect
function pg_connection_string() {
  return "dbname=d8rsl2jff9g6rq host=ec2-107-21-126-193.compute-1.amazonaws.com port=5432 user=lotrzwxbkchfiq password=82e8c8108ebaf0d14b7ef05f1ea61ec2620fd40fb20fecd6029bf2f67b5a7712 sslmode=require";
}
 
# Establish db connection
$db = pg_connect(pg_connection_string());
if (!$db) {
    echo "Database connection error.";
    exit;
}
//for insert command
 //$query = "INSERT INTO public.label VALUES (6,'vinod')";
 //$result = pg_query($query); 
 //for update command
 /*$query="UPDATE public.label
	SET  name='lore ipsum '
	WHERE id = 6;";
$result = pg_query($query); */

//get all tabels

//select data
$result = pg_query($db, "SELECT * FROM public.label ORDER BY id ASC ");
	$num = pg_numrows($result);

	pg_close();
//echo "<pre>";print_r($num);die; 
?>
<table border="0" cellspacing="2" cellpadding="2">
<tr>
<th><font face="Arial, Helvetica, sans-serif">id</font></th>
<th><font face="Arial, Helvetica, sans-serif">name</font></th>
</tr>
       <?php

$i = 0;
while ($i < $num)
    {
    $id=pg_result($result,$i,"id");
    $name=pg_result($result,$i,"name");
    ?>

<tr>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $id; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $name; ?></font></td>
</tr></br>
</table>
<?php
$i++;
}
?>

</body>
</html>