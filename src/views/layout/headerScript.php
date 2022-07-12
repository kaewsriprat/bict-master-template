<?php
$reqUri = explode('/', $_SERVER['REQUEST_URI']);
$uri = $reqUri[0] . '/';

?>
<meta charset="utf-8" />
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $uri . '../assets/img/apple-icon.png'; ?>">
<link rel="icon" type="image/png" href="<?php echo $uri . '../assets/img/favicon.png'; ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
<!-- <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" /> -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link href="<?php echo $uri . 'assets/css/material-dashboard.css?v=2.2.2'; ?>" rel="stylesheet" />

<!--   Core JS Files   -->
<script src=" <?php echo $uri . 'assets/js/core/jquery.min.js'; ?>">
</script>
<script src="<?php echo $uri . 'assets/js/core/popper.min.js'; ?>"></script>
<script src="<?php echo $uri . 'assets/js/core/bootstrap-material-design.min.js'; ?>"></script>
<script src="<?php echo $uri . 'assets/js/plugins/perfect-scrollbar.min.js'; ?>"></script>
<script src="<?php echo $uri . 'assets/js/plugins/moment.min.js'; ?>"></script>
<script src="<?php echo $uri . 'assets/js/plugins/sweetalert2.js'; ?>"></script>
<script src="<?php echo $uri . 'assets/js/plugins/jquery.validate.min.js'; ?>"></script>
<script src="<?php echo $uri . 'assets/js/plugins/jquery.bootstrap-wizard.js'; ?>"></script>
<script src="<?php echo $uri . 'assets/js/plugins/bootstrap-selectpicker.js'; ?>"></script>
<script src="<?php echo $uri . 'assets/js/plugins/bootstrap-datetimepicker.min.js'; ?>"></script>
<script src="<?php echo $uri . 'assets/js/plugins/jquery.dataTables.min.js'; ?>"></script>
<script src="<?php echo $uri . 'assets/js/plugins/bootstrap-tagsinput.js'; ?>"></script>
<script src="<?php echo $uri . 'assets/js/plugins/jasny-bootstrap.min.js'; ?>"></script>
<script src="<?php echo $uri . 'assets/js/plugins/fullcalendar.min.js'; ?>"></script>
<script src="<?php echo $uri . 'assets/js/plugins/jquery-jvectormap.js'; ?>"></script>
<script src="<?php echo $uri . 'assets/js/plugins/nouislider.min.js'; ?>"></script>
<script src="<?php echo $uri . 'assets/js/plugins/arrive.min.js'; ?>"></script>
<script src="<?php echo $uri . 'assets/js/plugins/chartist.min.js'; ?>"></script>
<script src="<?php echo $uri . 'assets/js/plugins/bootstrap-notify.js'; ?>"></script>
<script src="<?php echo $uri . 'assets/js/material-dashboard.js?v=2.2.2'; ?>" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>