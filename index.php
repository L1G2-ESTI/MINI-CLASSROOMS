<?php

    require_once("Controllers/controller.php");
    $action = htmlspecialchars(($_GET["action"]));
    

    if(!empty($Action)){
		echo "premiere action"; 
	}
	else{
		acceuil();  
	}
?> 