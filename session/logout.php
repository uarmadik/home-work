<?php

if (isset($_GET['login']) == 'off'){

    $_SESSION['login'] = 'off';
    header("Location: http://home-work/test/");
    die();
}

echo <<<logOut
</br><a href="./?login=off">Log Out</a></br></br>
logOut;





