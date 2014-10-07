<?php
    
	/* 
		PROJECT KRITICA 
		
		TODO
			zoek uit hoe dit ook al weer werkt
			documenteer deze pagen
			maak logische variabelenamen
			maak todo lijst
	*/
    session_start(); //de meeste pagina's hebben dit nodig, dus heb ik besloten dit standaard te doen

    require_once('library/config.php'); //in de config staan de essentiele zaken, die elke pagina nodig heeft
    require_once('library/autoload.php');
    /*
        haal de urlvariabelen op (het deel achter de slash, zie ook .htaccess)  
        de eerste urlvariabele is de pagina, de rest zijn variabelen m.b.t. de pagina
    */
    $urlvar = $_GET['url'];
    
	//Als er geen pagina is opgegeven, ga naar de homepagina
    if($urlvar == ''){
        $urlvar = 'Home';
    }

    //zet de urlvariabelen in een array
    $url = explode('/',$urlvar);
    
    $controllerNaam = array_shift($url);
    $controllerNaam .= "Controller";
    
    $controllerVolledigeNaam = 'Engine\\Controller\\' . $controllerNaam;
    
    //maak de controller aan
    $controller = new $controllerVolledigeNaam($url);
    
    include('resources/html/header.php');
    
    //haal de view op, en als die niet bestaat, geef een melding
    $viewString = $controller->getView();
    if(file_exists($viewString))
    {
        include($viewString);
    }
    else
    {
        echo"<h1>View niet gevonden</h1>";
    }
    include('resources/html/footer.htm');
    