<?php
header('Content-Type: application/json');

$dir = './';
$images = array();

// Lista de extensões de imagem permitidas
$allowed_types = array('jpg', 'jpeg', 'png', 'gif');

// Lê o diretório
if ($handle = opendir($dir)) {
    while (false !== ($entry = readdir($handle))) {
        $ext = strtolower(pathinfo($entry, PATHINFO_EXTENSION));
        if ($entry != "." && $entry != ".." && in_array($ext, $allowed_types)) {
            $images[] = array(
                'name' => pathinfo($entry, PATHINFO_FILENAME),
                'path' => $entry
            );
        }
    }
    closedir($handle);
}

// Retorna a lista de imagens em formato JSON
echo json_encode($images);