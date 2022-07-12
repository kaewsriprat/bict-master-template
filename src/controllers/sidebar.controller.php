<?php

function navList()
{
    $navList = [
        array(
            "name" => "หน้าแรก",
            "link" => "../",
            "logo" => "home",
            "role" => ["superAdmin", "admin", "user"],
            "active" => setActive(""),
            "items" => [],
        ),
        array(
            "name" => "ผู้ใช้งาน",
            "link" => "",
            "logo" => "people",
            "role" => ["superAdmin", "admin"],
            "active" => "",
            "items" => [
                array(
                    "name" => "ผู้ใช้งาน",
                    "link" => "../users",
                    "logo" => "people",
                    "active" => setActive("users"),
                ),
                array(
                    "name" => "เพิ่มผู้ใช้งาน",
                    "link" => "../userForm",
                    "logo" => "people",
                    "active" => setActive("userForm"),
                ),
            ],
        ),
        array(
            "name" => "Inventory",
            "link" => "",
            "logo" => "inventory",
            "role" => ["superAdmin", "user"],
            "active" => "",
            "items" => [
                array(
                    "name" => "Show Inventory",
                    "link" => "../inventory",
                    "logo" => "inventory",
                    "active" => setActive("inventory"),
                ),
                array(
                    "name" => "Inventory Add",
                    "link" => "../inventoryForm",
                    "logo" => "inventory",
                    "active" => setActive("inventoryForm"),
                ),
            ],
        ),
        array(
            "name" => "Logout",
            "link" => "logout",
            "logo" => "key",
            "role" => ["superAdmin"],
            "active" => "",
            "items" => []
        )
    ];
    return $navList;
}

function sideBarConfig()
{
    $navConf = [
        "sidebarTitle" => "MOE",
        "navColor" => "black",
        "dataColor" => "rose", // "rose" | "purple | azure | green | orange | danger"
        "dataImg" => "../assets/img/sidebar-1.jpg"
    ];
    return $navConf;
}

function setActive($path)
{
    $url = $_SERVER['REQUEST_URI'];
    $url = explode('/', $url);
    $url = end($url);
    if ($url == $path) {
        return 'active';
    } else {
        return '';
    }
}

function showNav()
{
    require_once('src/controllers/auth.controller.php');
    foreach (navList() as $key => $val) {
        if (checkRole($val['role'])) {
            if ($val['items'] == []) {
                echo '
                    <li class="nav-item ' . $val['active'] . '">
                        <a class="nav-link" href="' . $val['link'] . '">
                            <i class="material-icons">' . $val['logo'] . '</i>
                            <p>' . $val['name'] . '</p>
                        </a>
                    </li>';
            } else {
                $show = '';
                for ($i = 0; $i < sizeof($val['items']); $i++) {
                    if ($val['items'][$i]['active'] == 'active') {
                        $show = 'show';
                    }
                }
                echo '
                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#' . $val['name'] . '">
                            <i class="material-icons">' . $val['logo'] . '</i>
                            <p> ' . $val['name'] . '
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse ' . $show . '" id="' . $val['name'] . '">
                        <ul class="nav">';
                foreach ($val['items'] as $key1 => $val1) {
                    echo '
                            <li class="nav-item ' . $val1['active'] . '">
                            <a class="nav-link" href="' . $val1['link'] . '">
                                <i class="material-icons">' . $val1['logo'] . '</i>
                                <span class="sidebar-normal"> ' . $val1['name'] . ' </span>
                            </a>
                            </li>';
                }
                echo '
                        </ul>
                        </div>
                    </li>';
            }
        }
    }
}

function array_depth($array) //NOT USED
{
    $ini_depth = 0;
    foreach ($array as $arr) {
        if (is_array($arr)) {
            $depth = array_depth($arr) + 1;
            if ($depth > $ini_depth) {
                $ini_depth = $depth;
            }
        }
    }
    return $ini_depth;
}
