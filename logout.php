<?php
include_once 'dbconfig.php';
if($user->is_loggedin())
{
 $user->logout();
}
?>