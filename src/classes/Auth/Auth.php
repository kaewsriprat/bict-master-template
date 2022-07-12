<?php

class Auth
{
    public $userData;
    public function doLogin($username, $password)
    {
        $result = $this->checkAuth(trim(addslashes($username)), trim(addslashes($password)));
        if ($result) {
            $this->userData = $result;
            $this->createSession($result[0]);
            return true;
        } else {
            return false;
        }
    }

    private function checkAuth($username, $password)
    {
        try {
            $sql = "SELECT count(email) as countUser FROM users WHERE email = '$username' AND active = 1";
            $query = new Query;
            $row = $query->execute($sql);
            if ($row[0]['countUser'] == 1) {
                $sql = "SELECT * FROM users WHERE email = '$username' AND password = '$password' AND active = 1";
                $result = $query->execute($sql);
                if (sizeof($result) == 1) {
                    return $result;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return 'Connection failed: ' . $e->getMessage();
        }
    }

    private function createSession($result)
    {
        session_start();
        $_SESSION['id'] = $result['id'];
        $_SESSION['firstname'] = $result['firstname'];
        $_SESSION['lastname'] = $result['lastname'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['role'] = $result['role'];
        $_SESSION['last_login'] = $result['last_login'];
        $_SESSION['is_logged_in'] = true;
    }

    public function doLogout()
    {
        session_start();
        unset($_SESSION['id']);
        unset($_SESSION['firstname']);
        unset($_SESSION['lastname']);
        unset($_SESSION['email']);
        unset($_SESSION['role']);
        unset($_SESSION['last_login']);
        $_SESSION['is_logged_in'] = false;
        print_r($_SESSION);
        session_destroy();
        header('Location: login');
    }

    public function isLoggedIn()
    {
        return $_SESSION['is_logged_in'];
    }

    private function setCheckRole()
    {
        $sql = "SELECT role FROM users WHERE id = '$_SESSION[id]'";
        $query = new Query;
        $row = $query->execute($sql);
        return $row[0]['role'];
    }

    public function getCheckRole()
    {
        return $this->setCheckRole();
    }
}
