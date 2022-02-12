<?php session_start();
include "../config.php";
include "model.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "../header.php"?>
    <title>Document</title>
	<!-- UIkit CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/css/uikit.min.css" />

<!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/js/uikit-icons.min.js"></script>

	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div id="modal-close-default" uk-modal>
	    <div class="uk-modal-dialog uk-modal-body">
	        <button class="uk-modal-close-default" type="button" uk-close></button>
	        <h2 class="uk-modal-title"></h2>
	        <p></p>
	    </div>

	</div>
	<div class="uk-container">
<?php $tovars = getTovars($connection); ?>
     <div class="uk-child-width-1-2@m" uk-grid>
     	<?php foreach ($tovars as $tovar){?>
    <div>
        <div class="uk-card uk-card-default">
            <div class="uk-card-media-top">
                <img src="images/light.jpg" alt="">
            </div>
            <div class="uk-card-body">
                <h3 class="uk-card-title"><?php echo $tovar['t_name']; ?></h3>

                <p><?php echo $tovar['t_coast'];?> грн.</p>
               <button class="uk-button uk-button-default" type="button" uk-toggle="target: #modal-close-default">Узнать больше</button>
            </div>
        </div>
    </div>
     	<?php } ?>
     </div>

	</div>
</body>
</html>