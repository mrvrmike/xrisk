<!-- primera parte ini -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MVision X-Risk  | Panel de Control </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <!--<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">-->
  <script src="https://kit.fontawesome.com/369fe21b2d.js" crossorigin="anonymous"></script>
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href=<?php echo base_url()."/plugins/overlayScrollbars/css/OverlayScrollbars.min.css"; ?>>
  <!-- Theme style -->
  <link rel="stylesheet" href=<?php echo base_url()."/dist/css/adminlte.min.css"; ?>>

  <!---- links de estilos inicio -->
  <?php 
    if (isset($css_files)){
    foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
  <?php endforeach; }?>
  <?php 
    if (isset($dhead)){ ?>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchpanes/2.0.1/css/searchPanes.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
      
  <?php 
  }
  ?>  
  <!---- links de estilos fin -->

</head>
<!--<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">-->
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
