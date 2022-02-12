<? session_start();
include "../config.php";
include "pass.php";

if(isset($_POST["login_button"])){

	$pass = encode($_POST['password'],$_POST['login']);

	$str="SELECT * FROM `admin` where a_login = '" . $_POST['login'] . "' and a_pass = '" . $pass . "'";

	$answer = mysqli_fetch_assoc(mysqli_query($connection,$str));

	if(isset($answer)){
		$_SESSION['id'] = $answer["a_id"];
		$_SESSION['level'] = $answer["a_level"];
		$_SESSION['name'] = $answer["a_login"];
	}else{
		echo '<script>alert("Ошибка логина или пароля");</script>';
	}
}
echo '<script>location.replace("index.php");</script>'; exit;