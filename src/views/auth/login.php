<?php
function loginPageConf()
{
    return [
        "bgImg" => "assets/img/login.jpg",
        "cardHeaderColor" => "card-header-rose",
        "cardHeaderImg" => 'assets/img/moe_logo.png',
        "cardHeaderTitle" => "ชื่อระบบ",
        "loginBtnTitle" => "Login",
        "btnColor" => "btn-rose",
    ];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "src/views/layout/headerScript.php"; ?>
    <title><?php  ?></title>
</head>

<body class="off-canvas-sidebar">
    <div class="wrapper wrapper-full-page">
        <div class="page-header login-page header-filter" filter-color="black" style="background-image: url(<?php echo loginPageconf()['bgImg']; ?>); background-size: cover; background-position: top center;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                        <!-- FORM START HERE-->
                        <form class="form" id="loginForm">
                            <div class="card card-login">
                                <div class="card-header text-center <?php echo loginPageconf()['cardHeaderColor']; ?>">
                                    <div class="photo">
                                        <img src="<?php echo loginPageconf()['cardHeaderImg']; ?>" alt="" width="20%">
                                    </div>
                                    <h4 class="card-title"><?php echo loginPageconf()['cardHeaderTitle']; ?></h4>
                                </div>
                                <div class="card-body ">
                                    <span class="bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">email</i>
                                                </span>
                                            </div>
                                            <input type="email" id="emailInput" name="emailInput" class="form-control" placeholder="Email...">
                                        </div>
                                    </span>
                                    <span class="bmd-form-group">
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">lock_outline</i>
                                                </span>
                                            </div>

                                            <input type="password" id="passwordInput" name="passwordInput" class="form-control" placeholder="Password...">
                                        </div>
                                    </span>
                                </div>
                                <div class="card-footer justify-content-center mt-3">
                                    <button class="btn <?php echo loginPageconf()['btnColor']; ?>" type="submit" id="submitBtn" style="width:100%;">
                                        <span id="loginBtnTitle" class=""><?php echo loginPageconf()['loginBtnTitle']; ?></span>
                                        <span id="loginBtnSpinner" class="spinner-border spinner-border-sm d-none" role="status"></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php include "src/views/layout/footer.php"; ?>
        </div>
    </div>
    <?php include "src/views/layout/footerScript.php"; ?>
    <script>
        let loginForm = document.getElementById('loginForm');
        let submitBtn = document.getElementById('submitBtn');
        let loginBtnTitle = document.getElementById('loginBtnTitle');
        let loginBtnSpinner = document.getElementById('loginBtnSpinner');

        loginForm.addEventListener('submit', () => {
            event.preventDefault();
            submitBtn.disabled = true;
            loginBtnTitle.classList.add('d-none')
            loginBtnSpinner.classList.remove('d-none')
            let formData = new FormData(loginForm);
            axios
                .post('login', formData)
                .then((res) => {
                    setTimeout(() => {
                        if (res.data) {
                            // console.log(res.data)
                            window.location.href = './';
                        } else {
                            swal.fire({
                                type: 'error',
                                title: 'อีเมล์หรือรหัสผ่านไม่ถูกต้อง',
                                text: 'กรุณาตรวจสอบข้อมูลอีกครั้ง',
                                confirmButtonText: 'ตกลง'
                            });
                            submitBtn.disabled = false;
                            document.getElementById('emailInput').focus();
                            loginBtnSpinner.classList.add('d-none')
                            loginBtnTitle.classList.remove('d-none')
                        }
                    }, 500);
                })
                .catch((error) => {
                    console.log(error.response)
                    swal.fire({
                        type: 'error',
                        title: 'เกิดข้อผิดพลาด',
                        text: 'กรุณาตรวจสอบข้อมูลอีกครั้ง',
                        confirmButtonText: 'ตกลง'
                    });
                    submitBtn.disabled = false;
                    document.getElementById('emailInput').focus();
                    loginBtnSpinner.classList.add('d-none')
                    loginBtnTitle.classList.remove('d-none')
                })
        })
    </script>
</body>

</html>