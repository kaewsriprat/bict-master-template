<?php include "src/controllers/users.controller.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "src/views/layout/headerScript.php"; ?>
    <title><?php echo pageTitle(); ?></title>
</head>

<body>
    <div class="wrapper">
        <div class="content">
            <div class="container">
                <h1><?php echo pageTitle(); ?></h1>
                <div>
                        <button>
                            <a href="userForm/">Add User</a>
                        </button>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th>Tel</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (getUsers() as $user) { ?>
                                <tr>
                                    <td><?php echo $user['id']; ?></td>
                                    <td><?php echo $user['firstname']; ?></td>
                                    <td><?php echo $user['lastname']; ?></td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td><?php echo $user['tel']; ?></td>
                                    <td>
                                        <button>
                                            <a href="<?php echo 'userForm/' . $user['id']; ?>">Edit</a>
                                        </button>
                                        <button>
                                            <a href="<?php echo 'userDel/' . $user['id'] . '/delete'; ?>">Delete</a>
                                        </button>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>

    <?php include "src/views/layout/footerScript.php"; ?>
</body>

</html>