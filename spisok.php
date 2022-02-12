<?php include "config.php";
session_start();

if(!($_GET["page"])){ //если нет page - get параметр
    $str='Location: spisok.php?page=1';

    if($_GET["name"])
        $str .= '&name=' . $_GET["name"];

    header($str);
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>

	<title><?php echo $settings['site_name'] ?> - Spisok</title>
	<?php include "header.php" ?>
    <link rel="stylesheet" href="style1.css">

</head>
<body>
<?php include "menu.php" ?>

   <div class="sort">
      <form action="" method="get">
         <div class="text">Введите часть имени</div>
         <input type="text" name="name">
         <input type="submit" value="Поиск" >
      </form>
   </div>


	<table>
		<!-- tr>th*5 tr>td*5 -->
		<tr>
			<th>Имя</th>
			<th>Должность</th>
            <th>Возраст</th>

            <?php
                if(isMobile())
                    echo "</tr><tr>";
                else
                    echo "<th>Информация</th>";
            ?>

			<th>Зароботок</th>
			<th>Статус</th>
            <th></th>
		</tr>
		<?php
        $str="SELECT * FROM `groups`, person where person.status = groups.id";
        if($_GET["name"]){   /*select * from person where name like '%ера%' and earnings>3000   */
            $str= $str . " and (name like '%" . $_GET["name"] . "%' )";
        }

        /* pagination start*/

        $limit_kol = 2; // количество записей выводимых на экран

        $limit_start = ((int)$_GET["page"] - 1) * $limit_kol;

        $str .= " limit " . $limit_start . "," . $limit_kol;

        /* pagination end */

        $person_arr = mysqli_query($connection,$str);
         while($person = mysqli_fetch_assoc($person_arr))
         {
            $today = new DateTime();
            $birthdate = new DateTime($person["p_date"]);
            $interval = $today->diff($birthdate);

         	echo "<tr class='first_tr'><form action='setting.php' method='post'>";

         	echo "<td><a href='person_card.php?person=".  $person["id"] ."'>" . $person["name"] . "</a></td>";
         	echo "<td>" . $person["info"] . "</td>";
            echo "<td>" . $interval->format('%y год') . "</td>";

            if(isMobile())
                echo "</tr><tr>";
            else
                echo "<td>" . $person["info1"] . "</td>";

         	echo "<td>" . $person["earnings"] . "</td>";
            echo "<td>" . $person["g_name"] . "</td>";

            echo "<input type='hidden' name='id' value='".  $person["id"] ."'>";
            if(isset($_SESSION['id']) and $_SESSION['id']== 1)
                echo "<td><input type='submit' name='delete_person' value='delete'>" . "</td>";

         	echo "</form></tr>";

         } ?>

	</table>

<?php

/* pagination menu start*/

$pagination_kol=mysqli_fetch_assoc(mysqli_query($connection,"SELECT CEILING(COUNT(*)/" . $limit_kol . ") as kol FROM `person`"))['kol'];

// $pagination_kol - количество страниц
    echo '<div class="pagination">';
    for($i = 1; $i <= $pagination_kol; $i++){
        echo "<a href='/spisok.php?page=" . $i . "'";
        if($i == $_GET["page"])
            echo 'class="active"';
        echo">" . $i . "</a>";
    }
    echo '</div>';

/* pagination menu end*/


include "footer.php" ?>
</body>
</html>

