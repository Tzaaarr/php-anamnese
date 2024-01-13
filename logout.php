<?php
    
    session_start();

    // remove todas variaiveis de sessão 
    session_unset();

    // destroi a sessão 
    session_destroy();

    header("location: index.php");

?>