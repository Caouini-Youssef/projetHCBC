<?php
    $function = new Vfunction();
    $function->start_page('Logout', '../css/index.php');
    session_destroy();
    echo 'Deconnecté !';
    echo '<meta http-equiv="refresh" content="2;http://groupehcbc.alwaysdata.net/" />';
