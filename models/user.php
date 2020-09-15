<?php

function authenticate($login, $pass): bool
{
    $isAuthenticated = ($login == "user@mail.com" && $pass == "123");
    return $isAuthenticated;
}