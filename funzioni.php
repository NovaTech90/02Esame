<?php

namespace MieClassi;

class Funzioni
{

    public static function richiestaHTTP($mode){
        $rit = null; 
        if ($mode !== null) {
            if (isset($_POST[$mode])) {
                $rit = $_POST[$mode];
            } elseif (isset($_GET[$mode])) {
                $rit = $_GET[$mode];
            }
        }
        return $rit;
    }

    public static function leggiFile($file) {
        $rit = null;
        if(!$fp = fopen($file, 'r')) {
            echo "Non posso aprire il file $file<br>";
        } else {
            if(is_readable($file) === false) {
                echo "Il file $file non è leggibile<br>";
            } else {
                $rit = fread($fp, filesize($file));
            }
        }
        fclose($fp);
        return $rit;
    }
}
