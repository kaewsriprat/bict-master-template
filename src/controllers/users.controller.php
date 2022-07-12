<?php

function pageTitle()
{
    return 'ผู้ใช้งาน';
}

function lvl2PageTitle($id = null)
{
    if ($id) {
        return 'แก้ไขผู้ใช้งาน';
    } else {
        return 'เพิ่มผู้ใช้งาน';
    }
}

function addUser()
{
    $user = new Users;
    echo $user->addUser();
}

function updateUser($id)
{
    $user = new Users;
    $user->setUpdateUser($id);
}

function getUserById($id)
{
    $user = new Users;
    return $user->getUserByid($id);
}

function getCustomUsersView()
{
    $query = new Query;
    $sql = "SELECT id, firstname as 'ชื่อจริง', lastname as 'นามสกุล', email as 'email', role as 'บทบาท' FROM users";
    return $query->execute($sql);
}

function deleteUser($id)
{
    $user = new Users;
    echo $user->delUser($id);
}
