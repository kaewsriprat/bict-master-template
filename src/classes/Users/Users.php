<?php

class Users
{

    public $users;

    public function addUser()
    {
        $user = array(
            'firstname' => $_POST['firstnameInput'],
            'lastname' => $_POST['lastnameInput'],
            'password' => $_POST['passwordInput'],
            'email' => $_POST['emailInput'],
            'tel' => $_POST['telInput'],
            'role' => $_POST['roleInput']
        );
        if ($this->checkDupeUser($user['email']) == true) {
            return "duplicate user";
        } else {
            return $this->doUserAdd($user);
        }
    }

    private function checkDupeUser($email)
    {
        $query = new Query();
        $sql = "SELECT COUNT(*) as countUser FROM users WHERE email = '{$email}'";
        $result = $query->execute($sql);
        if ($result[0]['countUser'] != 0) {
            return true;
        } else {
            return false;
        }
    }

    private function doUserAdd($user)
    {
        $sql = "INSERT INTO users (firstname, lastname, email, password, tel, role, active) ";
        $sql .= "VALUES ('$user[firstname]', '$user[lastname]', '$user[email]', '$user[password]', '$user[tel]', '$user[role]', 1)";
        try {
            $query = new Query();
            $query->execute($sql);
            return "success";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    private function setUserById($id)
    {
        $sql = "SELECT * FROM users WHERE id = $id";
        $query = new Query();
        $result = $query->execute($sql);
        $this->users = $result;
    }

    public function getUserById($id)
    {
        $this->setUserById($id);
        return $this->users;
    }

    public function delUser($id)
    {
        try {
            $sql = "DELETE FROM users WHERE id = $id";
            $query = new Query();
            $query->execute($sql);
            return "success";
        } catch (PDOException $e) {
            return $e;
        }
    }
}
