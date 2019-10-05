<?php
	if(isset($_REQUEST["section"]))
	{
		switch ($_REQUEST["section"])
		{
            case 'shopAll':
                include "includes/shopAll.php";
                break;
            case 'shopFruits':
                include "includes/shopFruits.php";
                break;
            case 'shopGreen': 
                include "includes/shopGreen.php"; 
                break;
            case 'shopCombo': 
                include "includes/shopCombo.php"; 
                break;
            case 'blogAll':
				include "includes/blogAll.php";
                break;
            case 'blogEatDrink':
				include "includes/blogEatDrink.php";
                break;
            case 'blogLifestyle':
				include "includes/blogLifestyle.php";
                break;
            case 'blogBeauty':
                include "includes/blogBeauty.php";
                break;
            case 'blogEvent':
                include "includes/blogEvent.php";
                break;
			case 'aboutus':
				include "includes/aboutus.php";
				break;
            default:
                include "includes/home.php";
		}
	}
	else include "includes/home.php";
 ?>