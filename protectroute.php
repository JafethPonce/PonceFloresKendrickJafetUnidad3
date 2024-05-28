<?php

if( empty( $_SESSION['id']) ){

    return header("location:../../index.php");

}

if( $_SESSION == '2'){

    echo 'Tu solo eres usuario, No Admin';

} else {
    echo 'Tu eres admin, No usuario';
}