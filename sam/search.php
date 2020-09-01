<?php
  $page_title = 'Buscar';
  require_once('includes/load.php');
?>
<?php

 page_require_level(1);

 $all_users = find_all_user();
?>
<?php include_once('layouts/header.php'); ?>

<?php
 
$button = $_GET ['submit'];
$search = $_GET ['search']; 
 
if(!$button)
echo "you didn't submit a keyword";
else
{
if(strlen($search)<=1)
echo "Search term too short";
else{
echo "Tu busqueda para <b>$search</b> <hr size='1'></br>";
mysql_connect("localhost","root","Micro2017");
mysql_select_db("sam");
 
$search_exploded = explode (" ", $search);
 
foreach($search_exploded as $search_each)
{
$x++;
if($x==1)
$construct .="titulo LIKE '%$search_each%'";
else
$construct .="AND estado LIKE '%$search_each%'";
 
}
 
$construct ="SELECT * FROM accionesdemejora WHERE $construct";
$run = mysql_query($construct);
 
$foundnum = mysql_num_rows($run);
 
if ($foundnum==0)
echo "Sorry, there are no matching result for <b>$search</b>.</br></br>1. 
Try more general words. for example: If you want to search 'how to create a website'
then use general keyword like 'create' 'website'</br>2. Try different words with similar
 meaning</br>3. Please check your spelling";
else
{
echo "$foundnum Resultado encontrado<p>";
 
while($runrows = mysql_fetch_assoc($run))
{
$id = $runrows ['id'];
$estado = $runrows ['estado'];
$area = $runrows ['area'];
 
echo "
<a href='$titulo'><b>$titulo</b></a><br>
$estado<br>
<a href='$id'>$id</a><p>
";
 
}
}
 
}
}
 
?>