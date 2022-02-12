<?php session_start();
include "../config.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
        <?php include "../header.php" ?>
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
if($_SESSION['id']){
        echo "Вы авторизированны <span>" . $_SESSION['name'] . "</span>";
?>

<div class="col-md-3 col-sm-3 col-xs-6"> <a href="logout.php" class="btn">Logout</a> </div>

<div class="container">
        <div class="nav">
                <ul>
                        <li class="nav_li"><a href="#person">Персоны</a></li>
                        <li class="nav_li"></li>
                        <li class="nav_li"></li>
                        <li class="nav_li"></li>
                        <li class="nav_li"></li>
                        <li class="nav_li"></li>
                </ul>
        </div>

        <div class="section" id="person">
                <div class="header_text">Настройки персоны</div>
                <table>
                        <tr>
                                <th>Имя</th>
                                <th>Должность</th>
                    <th>Дата рождения</th>
                                <th>Информация</th>
                                <th>Зароботок</th>
                                <th>Статус</th>
                    <th></th>
                        </tr>

                        <?php
                $str="SELECT * FROM `groups`, person where person.status = groups.g_id";
                $person_arr = mysqli_query($connection,$str);

                 while($person = mysqli_fetch_assoc($person_arr))
                 {
                         ?>
                         <tr class='first_tr'>
                         	<form action='setting.php' method='post'>

                         <td><input id="name" value="
                                 <?php echo $person["name"] ?>"
                         ></td>
                         <td><input id="info" value="
                                 <?php echo $person["info"] ?>"
                         ></td>
                         <td><input id="p_date" value="
                                 <?php echo $person["p_date"] ?>"
                         ></td>

                         <td>
                         	<textarea id="info1"><?php echo $person["info1"] ?> </textarea>
                         </td>

                         <td><input id="earnings" value="
                                 <?php echo $person["earnings"] ?>"
                         ></td>

                        <!--- Вывод статуса -->

                         <td>
                                <select name="status" id="" required>
                              <?php $groups_arr = mysqli_query($connection,"SELECT * FROM groups");
                                 while($group = mysqli_fetch_assoc($groups_arr))
                                 {
                                    echo "<option";
                                   if($person['status'] == $group['g_id']) echo " selected";
                                    echo " value='". $group['g_id']  ."'>". $group['g_name']  ."</option>";
                                 }
                              ?>

                                </select>
                         </td>

                    <input type='hidden' name='id' value='<?php echo $person["id"] ?>'>

                    <td>
                            <input type='submit' name='delete_person' value='delete'>
                    </td>
                    <td>
                            <input type='submit' name='save_person' value='Save'>
                    </td>

                         </form>
                 </tr>
                                 <?php
                 } ?>

                </table>
        </div>
</div>

<?php

}else{
        ?>
                <form action="login.php" method="post">
                        <input type="text" name='login'>
                        <input type="password" name='password'>
                        <input type="submit" name="login_button">
                </form>

        <?php
}
?>

<div class="col-md-3 col-sm-3 col-xs-6"> <a href="/spisok.php" class="btn btn-sm animated-button gibson-two">Перейти к списку</a> </div>

</body>
</html>