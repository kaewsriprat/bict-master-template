<?php
$user = getUserById($id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "src/views/layout/headerScript.php"; ?>
    <title><?php pageTitle(); ?></title>
    <style>
        #roleInput-error {
            margin-left: 10px;
        }

        .filter-option {
            color: #ffffff;
            font-size: 1.1em;
        }

        .bootstrap-select .dropdown-item.active {
            background-color: #e91e63;
        }

        .dropdown-menu .dropdown-item:hover,
        .dropdown-menu .dropdown-item:focus,
        .dropdown-menu a:hover,
        .dropdown-menu a:focus,
        .dropdown-menu a:active {
            background-color: #e91e63;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <?php require_once "src/views/layout/sidebar.php"; ?>
        <div class="main-panel">
            <?php require_once "src/views/layout/headNav.php"; ?>
            <div class="content">
                <?php
                print_r($user);
                echo $user[0]['firstname'];
                ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <h2><?php echo '<a href="../users">' . pageTitle() . "</a> > " . lvl2PageTitle($id); ?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form id="userForm" class="form-horizontal">
                                <div class="card pe-5">
                                    <div class="card-header card-header-rose card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">contacts</i>
                                        </div>
                                        <h4 class="card-title"><?php echo lvl2PageTitle($id); ?></h4>
                                    </div>
                                    <div class="card-body ">
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">????????????-????????????</label>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="firstnameInput" placeholder="????????????" required="true" value="<?php echo ($id) ? $user[0]['firstname'] : '' ?>" />
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="lastnameInput" placeholder="????????????" required="true" value="<?php echo ($id) ? $user[0]['lastname'] : '' ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="emailInput" email="true" required="true" value="<?php echo ($id) ? $user[0]['email'] : '' ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">???????????????????????????????????????</label>
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="telInput" number="true" placeholder="??????????????????????????????????????????????????????????????????" required="true" value="<?php echo ($id) ? $user[0]['tel'] : '' ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">????????????????????????</label>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <input class="form-control" id="idSource" type="password" placeholder="?????????????????????????????? 8 ????????????????????????" name="passwordInput" minLength="8" required=" true" value="<?php echo ($id) ? $user[0]['password'] : '' ?>" />
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <input class="form-control" id="idDestination" type="password" placeholder="????????????????????????????????????????????????????????????" equalTo="#idSource" required="true" value="<?php echo ($id) ? $user[0]['password'] : '' ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">???????????????</label>
                                            <div class="col-sm-8">
                                                <?php
                                                echo ($user[0]['role'] == 'superAdmin') ? 'selected' : '';
                                                ?>
                                                <div class="form-group">
                                                    <select class="selectpicker" name="roleInput" data-size="4" data-style="btn btn-rose btn-sm" title="????????????????????????????????????????????????" required=" true">
                                                        <option disabled selected>??????????????????????????????</option>
                                                        <?php
                                                        $roles = array(
                                                            [
                                                                "title" => "Super Admin",
                                                                "value" => "superAdmin"
                                                            ],
                                                            [
                                                                "title" => "Admin",
                                                                "value" => "admin"
                                                            ],
                                                            [
                                                                "title" => "Editor",
                                                                "value" => "editor"
                                                            ],
                                                        );
                                                        foreach ($roles as $key => $value) {
                                                            if ($user[0]['role'] == $value['value']) {
                                                                echo '<option value="' . $value['value'] . '" selected>' . $value['title'] . '</option>';
                                                            } else {
                                                                echo '<option value="' . $value['value'] . '">' . $value['title'] . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer ml-auto mr-auto">
                                        <button type="submit" class="btn btn-rose"><?php echo ($id) ? "???????????????" : "???????????????" ?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(() => {
            setFormValidation('#userForm');
        })

        function setFormValidation(id) {
            $.validator.messages.required = "?????????????????????????????????????????????";
            $.validator.messages.email = "???????????????????????????????????????????????????????????????????????????";
            $.validator.messages.number = "??????????????????????????????????????????";
            $.validator.messages.minlength = "???????????????????????????????????????????????????????????????????????? 8 ????????????????????????";
            $.validator.messages.equalTo = "???????????????????????????????????????????????????";

            $(id).validate({
                highlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
                    $(element).closest('.form-check').removeClass('has-success').addClass('has-danger');
                },
                success: function(element) {
                    $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
                    $(element).closest('.form-check').removeClass('has-danger').addClass('has-success');
                },
                errorPlacement: function(error, element) {
                    $(element).closest('.form-group').append(error);
                },
            });
        }

        $('#userForm').submit(function(e) {
            e.preventDefault();
            if ($(this).valid()) {
                var formData = new FormData($(this)[0]);
                axios
                    .post('userAdd', formData)
                    .then(res => {
                        if (res.data == "success") {
                            Swal.fire({
                                title: "??????????????????",
                                text: "???????????????????????????????????????????????????????????????",
                                type: "success",
                                confirmButtonClass: "btn btn-success",
                                confirmButtonText: "????????????",
                                closeOnConfirm: false
                            }).then(() => {
                                window.location.href = "users";
                            });
                        } else if (res.data = "duplicate user") {
                            Swal.fire({
                                title: "?????????????????????",
                                text: "email ??????????????????????????????????????????????????????",
                                type: "error",
                                confirmButtonClass: "btn btn-danger",
                                confirmButtonText: "????????????",
                                closeOnConfirm: false
                            });
                        } else {
                            Swal.fire({
                                title: "?????????????????????",
                                text: "???????????????????????????????????????????????????????????????",
                                type: "error",
                                confirmButtonClass: "btn btn-danger",
                                confirmButtonText: "????????????",
                                closeOnConfirm: false
                            });
                        }
                    })
            }
        });
    </script>
</body>

</html>