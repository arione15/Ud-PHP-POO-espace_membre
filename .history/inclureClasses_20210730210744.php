<?php

function inclureClasses($ClassName){
    if(file_exists($fichier = __DIR__ . '/' . $ClassName . '.php')){
        require $fichier;
    }
}
