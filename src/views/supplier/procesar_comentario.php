<?php
idatziComentarioa();

function idatziComentarioa()
{

    if (isset ($_POST["titulo"]) && isset ($_POST["comentario"])) {

        $titulo = $_POST["titulo"];
        $comentario = $_POST["comentario"];

        $xml = simplexml_load_file("comentarios.xml");


        $usuarioBerria = $xml->addChild('comentario');
        $usuarioBerria->addChild('titulo', $titulo);
        $usuarioBerria->addChild('comentario', $comentario);
    

        $xml->asXML("comentarios.xml"); 

        header('Location: ubicaciones.php');
    }
}



?>
