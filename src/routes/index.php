<?php

// In case one is using PHP 5.4's built-in server
$filename = __DIR__ . preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}

// Include the Router class
// @note: it's recommended to just use the composer autoloader when working with other packages too
require_once 'src/routes/Bramus/Router/Router.php';
require_once 'src/controllers/auth.controller.php';

// Create a Router
$router = new \Bramus\Router\Router();

$router->get('', function () {
    checkSession();
    require_once 'src/controllers/home.controller.php';
    require('src/views/home/home.php');
});

$router->get('/users', function () {
    checkSession();
    require_once 'src/controllers/users.controller.php';
    require('src/views/users/usersShow.php');
});
$router->get('/userForm', function () {
    checkSession();
    require_once 'src/controllers/users.controller.php';
    require('src/views/users/userForm.php');
});
$router->post('/userAdd', function () {
    checkSession();
    require_once 'src/controllers/users.controller.php';
    addUser();
});
$router->get('/userForm/(\d+)', function ($id) {
    checkSession();
    require_once 'src/controllers/users.controller.php';
    require('src/views/users/userForm.php');
});
$router->post('/userUpdate/(\d+)', function ($id) {
    checkSession();
    require_once 'src/controllers/users.controller.php';
    updateUser($id);
});
$router->delete('/userDel/(\d+)', function ($id) {
    checkSession();
    require_once 'src/controllers/users.controller.php';
    deleteUser($id);
});

//LOGIN
$router->get('/login', function () {
    require('src/views/auth/login.php');
});
$router->post('/login', function () {
    login();
});
$router->get('/logout', function () {
    logout();
});


// Custom 404 Handler
$router->set404(function () {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    echo '404, route not found!';
});

// custom 404
$router->set404('/test(/.*)?', function () {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    echo '<h1><mark>404, route not found!</mark></h1>';
});

$router->set404('/api(/.*)?', function () {
    header('HTTP/1.1 404 Not Found');
    header('Content-Type: application/json');
    $jsonArray = array();
    $jsonArray['status'] = "404";
    $jsonArray['status_text'] = "route not defined";

    echo json_encode($jsonArray);
});

//Run Router
$router->run();

// Before Router Middleware
// $router->before('GET', '/.*', function () {
//     header('X-Powered-By: bramus/router');
// });


/*
    // Dynamic route: /hello/name
    $router->get('/hello/(\w+)', function ($name) {
        echo 'Hello ' . htmlentities($name);
    });

    // Dynamic route: /ohai/name/in/parts
    $router->get('/ohai/(.*)', function ($url) {
        echo 'Ohai ' . htmlentities($url);
    });

    // Dynamic route with (successive) optional subpatterns: /blog(/year(/month(/day(/slug))))
    $router->get('/blog(/\d{4}(/\d{2}(/\d{2}(/[a-z0-9_-]+)?)?)?)?', function ($year = null, $month = null, $day = null, $slug = null) {
        if (!$year) {
            echo 'Blog overview';

            return;
        }
        if (!$month) {
            echo 'Blog year overview (' . $year . ')';

            return;
        }
        if (!$day) {
            echo 'Blog month overview (' . $year . '-' . $month . ')';

            return;
        }
        if (!$slug) {
            echo 'Blog day overview (' . $year . '-' . $month . '-' . $day . ')';

            return;
        }
        echo 'Blogpost ' . htmlentities($slug) . ' detail (' . $year . '-' . $month . '-' . $day . ')';
    });

    // Subrouting
    $router->mount('/users', function () use ($router) {

        // will result in '/movies'
        $router->get('/', function () {
            echo 'movies overview';
        });

        // will result in '/movies'
        $router->post('/', function () {
            // echo 'add movie';
            require('src/controllers/users.controller.php');
        });

        // will result in '/movies/id'
        $router->get('/(\d+)', function ($id) {
            echo 'movie id ' . htmlentities($id);
        });

        // will result in '/movies/id'
        $router->put('/(\d+)', function ($id) {
            echo 'Update movie id ' . htmlentities($id);
        });
    });
*/
