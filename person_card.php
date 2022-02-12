<?php include "config.php";

if($_GET['person']){
	$str="SELECT * FROM `groups`, person where person.status = groups.id and person.id=" .$_GET['person'];
	//echo $str;
	$person_card = mysqli_fetch_assoc(mysqli_query($connection,$str));

	$str="SELECT * FROM `message` where m_out_id=" . $person_card['id'];

	$person_message = mysqli_query($connection,$str);


}
else{
	$error=1;
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>

	<title>
		<?php
			if($error){
				echo "404 Персона не найдена";
			}
			else{
				echo $person_card['id'] . " - " . $person_card['name'];
			}
		 ?>
	</title>
	<?php include "header.php" ?>

	<link rel="stylesheet" href="style1.css">

</head>
<body>
<?php include "menu.php" ?>

<?php
	if($error){
		echo "<h1>404 Персона не найдена</h1>";
	}
	else{
	?>

	<div class="container">
		<div class="my_container">

			<div class="line">

				<div class="line_img">
					<img src="/image/<?php
					if($person_card['p_image'])
						echo $person_card['p_image'];
					else
						echo "avatar_male.png";
					?>" />
				</div>

				<div class="line_text">
					<h2><?php echo $person_card['name']; ?></h2>
					<hr>
					<div class="my_text">
						Возраст: <span><?php echo $person_card['age']; ?></span>
					</div>
					<div class="my_text">
						Статус: <span><?php echo $person_card['g_name']; ?></span>
					</div>
				</div>

			</div>
			<h2>Немного о нас</h2>
			<hr>
			<div class="line_text">
				<?php echo $person_card['info1']; ?>

			</div>

			<div class="line message">
				<h2>Последние сообщения</h2>
				<!-- .article>.art_date+.art_description -->
				<?php

				while($message = mysqli_fetch_assoc($person_message))
				{ ?>


				<div class="article">
					<div class="art_date"><?php echo $message['m_date']; ?></div>
					<div class="art_description">
						<?php echo $message['m_message']; ?>
						</div>
				</div>

				<?php  } ?>
			</div>

		</div> <!-- my_container -->
	</div> <!-- container -->


	<?php
	}
 ?>

<?php include "footer.php" ?>

</body>
</html>