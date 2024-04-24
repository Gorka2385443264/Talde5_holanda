<?php
require_once ($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/_parts/head.php");


if (!isset($_SESSION["_LANGUAGE"])) {
    defaultLanguage();
}

aldatuHizkuntza();

function defaultLanguage()
{
    $_SESSION["_LANGUAGE"] = "es";
}

function aldatuHizkuntza()
{
    if (isset($_POST["aukeratutakoHizkuntza"])) {
        $_SESSION["_LANGUAGE"] = $_POST["aukeratutakoHizkuntza"];
    }
}

function trans($indexPhrase)
{
    static $itzultzekoArray = array();
    if (file_exists(APP_DIR . '/src/language/' . $_SESSION["_LANGUAGE"] . '.php')) {
        $url = APP_DIR . '/src/language/';
        $itzultzekoArray = include($url . $_SESSION["_LANGUAGE"] . '.php');
    }
    return (!array_key_exists($indexPhrase, $itzultzekoArray)) ? $indexPhrase : $itzultzekoArray[$indexPhrase];
}

?>
