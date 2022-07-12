<?php

function checkSession()
{
    session_start();
    if (!isset($_SESSION['is_logged_in'])) {
        header('Location: ../login');
    }
}

function login()
{
    $auth = new Auth;
    $result = $auth->doLogin($_POST['emailInput'], $_POST['passwordInput']);
    echo $result;
}

function logout()
{
    $auth = new Auth;
    $auth->dologout();
}

function getRole()
{
    $role = new Auth;
    return $role->getCheckRole();
}

function checkrole($roleArr)
{
    return in_array(getRole(), $roleArr);
}
