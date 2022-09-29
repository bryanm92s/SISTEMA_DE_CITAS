<!DOCTYPE html>
<html lang="en">
<head>
<?php include("incluidos/head.php");?>
<?php 
foreach($crud["css_files"] as $file){ ?>
  <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php } ?>

</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <?php include("incluidos/menu.php");?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
    <?php include("incluidos/nav.php");?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
        <?php include("incluidos/heading.php");?>
        <?php
        echo ($crud["output"]);
        ?>
        </div>
       <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
    <?php include("incluidos/footer.php");?>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Logout Modal-->
   <?php include("incluidos/logout.php");?>


  <?php include("incluidos/js.php");?>

       <?php foreach($crud["js_files"] as $file){ ?>
        <script src="<?php echo $file; ?>"></script>
    <?php } ?>


</body>
</html>
