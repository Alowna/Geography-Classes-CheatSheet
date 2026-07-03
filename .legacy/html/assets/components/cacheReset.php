<?php 

function cacheReset($file)
{
    $caminho_fisico = $_SERVER['DOCUMENT_ROOT'] . $file;

    if (file_exists($caminho_fisico)) {
        
        $version = filemtime($caminho_fisico);
        
        return $file . "?v=" . $version;
    }

    return $file;
}

?>