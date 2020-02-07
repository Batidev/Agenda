<?php

// Boucle qui va parcourir tout les fichiers présent dans le dossier et les rendre accéssible !
foreach (glob('lib/*') as $file) {
    require_once $file;
}

$test = Agenda::findOne()->getAllEvents(['date'=>'2020-03-06']);
var_dump($test);

$test2 = Events::findAllByDate('2020-03-06');
var_dump($test2);

$test3 = Events::findOne()->allPeoples();
var_dump($test3);

// $test4 = People::findOne(['name'=>'spielmann'])->getAllEvents(['date'=>'2020-02-06']);
// var_dump($test4);


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda</title>
</head>
<body>
    
</body>
</html>