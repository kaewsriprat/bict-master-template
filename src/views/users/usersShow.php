<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "src/views/layout/headerScript.php"; ?>
    <title><?php pageTitle(); ?></title>
</head>

<body>
    <div class="wrapper">
        <?php require_once "src/views/layout/sidebar.php"; ?>
        <div class="main-panel">
            <?php require_once "src/views/layout/headNav.php"; ?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <h2><?php echo pageTitle(); ?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-rose card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">people</i>
                                    </div>
                                    <h4 class="card-title">ข้อมูลผู้ใช้งาน</h4>
                                </div>
                                <div class="card-body">
                                    <div class="toolbar">
                                        <a href="userForm"><button class="btn btn-rose" id="addBtn">เพิ่มข้อมูล</button></a>
                                    </div>
                                    <?php
                                    include "src/components/table/dataTable.php";
                                    dataTableInit('tb1', getCustomUsersView());
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(".editBtn").click((e) => {
            let id = $(e.target).closest('tr').find('td').html();
            window.location.href = "userForm/" + id;
        })
        $(".delBtn").click(() => {
            let id = $(e.target).closest('tr').find('td').html();
            console.log(id)
        })
    </script>
</body>

</html>