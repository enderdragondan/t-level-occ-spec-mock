<?php

function isLoggedIn()
{
    return isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'];
}

function isAdmin()
{
    return isset($_SESSION['adminLoggedIn']) && $_SESSION['adminLoggedIn'];
}