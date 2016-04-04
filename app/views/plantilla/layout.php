<!-- 
LAYOUT DE LA APLICACIÓN 
ESTA PÁGINA DISPONE DONDE IRÁN LOS DIFERENTES BLOQUES QUE CONFORMAN LA APLICACIÓN

Se centra solamente en la presentación.
Deberemos indicarle:
    - titulo
    - menu
    - cuerpo

Podría tener tantos parámetros como quisiesemos
Igualmente nuestra aplicación podría tener tantos layouts como deseasemos
-->
<html>
    <head>
        <title>Paco's Garden S.L.- <?=$titulo?></title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>        
    </head>    
<body>
    <header>
        <h1 class="container">Paco's Garden S.L.</h1>
         <hr> 
    </header>   

    <div><?=$menu?></div>
    <div class="container"><?=$cuerpo?></div>
    <footer>
        <hr>
        <a href="#" target="_blank"><p class="container">Creado por Manuel Francisco Mora Martín</p></a>
    </footer>
</body>
</html>