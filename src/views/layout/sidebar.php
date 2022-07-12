<?php require_once "src/controllers/sidebar.controller.php"; ?>
<div class="sidebar" data-color="<?php echo sideBarConfig()['dataColor']; ?>" data-background-color="<?php echo sideBarConfig()['navColor']; ?>" data-image="<?php echo sideBarConfig()['dataImg']; ?>">
    <div class="logo">
        <a href="./" class="simple-text logo-mini">
            <div class="photo">
                <img src="../assets/img/moe_logo.png" alt="" width="80%">
            </div>
        </a>
        <a href="./" class="simple-text logo-normal mt-1">
            <?php echo sideBarConfig()['sidebarTitle']; ?>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <?php
            showNav();
            ?>
        </ul>

    </div>
    <div class="sidebar-background"></div>
</div>