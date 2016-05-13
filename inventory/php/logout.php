<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: /mctest/inventory/index.html"); // Redirecting To Home Page
}
?>
