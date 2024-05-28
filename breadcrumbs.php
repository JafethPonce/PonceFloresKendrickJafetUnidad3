<?php
function generate_breadcrumbs()
{
    //Obtiene la URL actual solicitada por el cliente.
    $url = $_SERVER['REQUEST_URI'];

    //Divide la URL en segmentos utilizando el carácter de barra inclinada / como delimitador.
    $url = explode('/', $url);


    //Elimina los elementos vacíos del array de segmentos de la URL
    $breadcrumbs = array_filter($url); // Filtra los elementos vacíos

    // Omitir los primeros tres elementos para los breadcrumbs


    $path = '';
    echo '<li><a href="/">Inicio</a></li>';
    foreach ($breadcrumbs as $key => $crumb) {
        $path .= '/' . $crumb;
        // Capitaliza la primera letra de cada segmento del URL
        $title = ucfirst(str_replace(array(".php", "_"), array("", " "), $crumb));
        if ($key != array_key_last($breadcrumbs)) {
            echo '<li><a href="' . $path . '">' . $title . '</a>/</li>';
        } else {
            echo '<li><a href="' . $path . '">' . $title . '</a></li>';
        }
    }
}
