<?php
include("include/session.php");
?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Meniu</title>
	
    <body>
<style>
	form {background-color:#F1FCA2;}
	body {background-color:#F1FCA2;}
</style>
<?php
 
 

	echo "<img src=\"pictures/top.png\" /><br>";
	?>
<?php
if($session->isAdmin())
    echo '<a href="naujas_patiekalas.php">Ivesti nauja patiekala</a>'
?>
<?php	
$sql = "SELECT title FROM category;";
$res = mysql_query($sql);
while ($row = mysql_fetch_array($res)){
    //echo '<option value="'.$row['title'].'">'.$row['title'].'</option>';
    echo "<h1>".$row['title'].'</h1>';
    $sql_inner = "SELECT title, ingredients FROM food WHERE category=\"".$row['title'].'";';
    $res_inner = mysql_query($sql_inner);
    $counter = 1;
    while ($inner_row = mysql_fetch_array($res_inner)){
        echo '<div class="product">';
        echo $counter.".</div>";
        echo '<div class="product desc">'.$inner_row['title'].'</br>';
        echo '<i><span class="ingredients">'.$inner_row['ingredients'].'</span></i>';
        echo '<div align="right"><button class="btn btn-success btnadd" onclick="Add(25,-1);">';
        echo '<span class="glyphicon glyphicon-plus"></span></button></div>';
    }
}
?>


<?php


//Nuoroda į pradžią
   echo "<br>Atgal į [<a href=\"index.php\">Pradžia</a>]<br>";

        ?>
    </body>

</html>
	