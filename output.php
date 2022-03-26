<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OutPut</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
	   <style>
	#timer{
	color: red;
	position: absolute;
    top: 100%;
    right: 0%;
	}
	</style>

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="home.php">Comment Log</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>
		


    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Comment Area</span>
          </a>
        </li>


		       <li class="nav-item active">
          <a class="nav-link" href="output.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Database</span></a>
        </li>
		      
		 <li class="nav-item">
          <a class="nav-link" href="wordcloud.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Output Page</span></a>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="output.php">Comment Log</a>
            </li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data</div>
            <div class="card-body">
              <div class="table-responsive">
			  
<?php
require("conn.php");

//$sql="select * from Normal_User where U_Email = '".$_SESSION['email']."'";


//$result=mysqli_query($conn, $sql);
//$error = mysqli_error($conn);

//if ($error !=""){

//}else{ 

//while($row= mysqli_fetch_array($result))

//$iud=$row['U_ID'];
//$_SESSION['uids']=$iud;


?>
<?php
$sql333="select * from comment";
	$result=mysqli_query($conn, $sql333);
	$abc = mysqli_error($conn);
	


?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Comment</th>
					  <th>Date</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
					  <th>ID</th>
                      <th>Comment</th>
					  <th>Date</th>
                    </tr>
                  </tfoot>
                  <tbody>
					<?php

while ($rows = mysqli_fetch_assoc($result)){
	$bids = $rows['comment'];
	echo"<tr>";
	

	echo"<td>{$rows["comment_id"]}</td>";
	echo"<td>{$rows["comment"]}</td>";
	echo"<td>{$rows["date"]}</td>";
	echo"<td><a href = 'delete.php?rn=$rows[comment_id]'>Delete</td>";
	echo "</tr>";
}

	
?>			
                  </tbody>
                </table>

              </div>
            </div>
            <div class="card-footer small text-muted">(Live update per sec)</div>
          </div>
        </div>
			<div style="display: flex; justify-content: flex-end" id="timer"></div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Hong Kong Baptist University 2022</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
		<!-- Delete Modal-->
	<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete the account??</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Delete" below if you confirm delete account and users’ order records.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.php">Delete</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>


	<script type="text/javascript">
	$(document).ready(function () {
      setTimeout(function () {
        location.reload(true);
      }, 1000);
    });
	</script>


  </body>

</html>
<script src="timescript.js"></script>