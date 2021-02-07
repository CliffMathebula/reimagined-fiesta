<?php

$user = $_SESSION['user'];

//unset all sessions
if(!empty($user)){

    session_unset($user);

}
