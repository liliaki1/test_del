<?php include "config.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Вывод блоками</title>
	<link rel="stylesheet" href="stylе.css">
    <?php include "header.php" ?>

</head>
<body>
    <?php include "menu.php" ?>
    <div class="conteiner">
    <?php
        $person_arr = mysqli_query($connection,"select * from person");
         while($person = mysqli_fetch_assoc($person_arr))
         {
        ?>
	<div class="module-border-wrap">

    	<div class="module">
         	<div class="name">
         	<?php
        	 echo $person['name'] . "<br>";
         	?>
         </div>
         <div class="info">
         	<?php
        	 echo $person['info'] . "<br>";
         	?>
         </div>
         <div class="pass">
         	<?php
         	echo ",,";
         	?>
         </div>
         <div class="info1">
         	<?php
        	 echo $person['info1'] . "<br>";
         	?>
         </div>
         <div class="about__block">
         	<div class="about">
         	<?php
        	 echo $person['age'] . "<br>";
        	 echo $person['earnings'] . "<br>";
        	 echo $person['status'] . "<br>";
         	?>
         	</div>
         </div>
         </div>
     </div>
     <?php } ?>
    </div>

</body>
</html>