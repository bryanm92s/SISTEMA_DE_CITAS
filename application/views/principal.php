<!DOCTYPE html>
<html lang="en">
<head>
<?php include("incluidos/head.php");?>
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
        <?php include("incluidos/paneles.php");?>
          <!-- Content Row -->
        <?php include("incluidos/graficas.php");?>
        <?php include("incluidos/principal.php");?>
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
</body>
</html>
