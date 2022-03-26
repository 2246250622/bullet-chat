<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
	<script src="jslib/jquery-1.3.2.min.js"></script>
	<script src="jslib/jquery-1.6.js"></script>
	<script src="jslib/jquery-1.11.1.js"></script>
	 <link rel="stylesheet" type="text/css" href="js/emojionearea.min.css">
	<script type="text/javascript" src="js/emojionearea.min.js"></script>
	<link rel="stylesheet" type="text/css" href="js/emojionearea.css">
	<script type="text/javascript" src="js/emojionearea.js"></script>
	
  </head>
  <body class="bg-dark" >
  
  <br><br><br><br><br><br><br><br><br><br><br>
<?php
require("conn.php");
?>
    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Comment</div> 
        <div class="card-body">
          <form method="post" id="fm_data" action="<?php echo $_SERVER["PHP_SELF"] ?>">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12" id="target">
                  <div class="form-label-group">
                    <input type="textarea" id="commentarea" class="form-control" placeholder="Write here!" required="required" autofocus="autofocus" name="commentarea">

                  </div>
                </div>
				
				
				
				

                <div class="col-md-12">
            <input class="btn btn-primary btn-block" id=btn type="submit">
          </form>
		  
		

		  
		  
		  <?php
		 date_default_timezone_set('Asia/Hong_Kong');

		 
		  $TIMESAVE = date("G:i:s");
		  $DATESAVE = date("Y-m-d" );
		  $date = $DATESAVE.' '.$TIMESAVE;
		  //echo $date;
		  
		  if (isset($_POST["commentarea"])){
	extract($_POST);
	$sql = "SELECT * FROM comment WHERE comment = '$commentarea' ";
	$ls = mysqli_query($conn, $sql);

	$error = mysqli_error($conn);
	if ($error =="") {
			$total = mysqli_num_rows($ls);
	if ($total > 0){
		echo '<span style="color:red;text-align:center;">This Comment is already exist!</span>';
	}else{
		$sql = "INSERT INTO comment VALUES(NULL,'$commentarea','$date')";
	mysqli_query($conn, $sql);
	$error = mysqli_error($conn);
	if ($error !=""){
		echo $error;
	}else{
		//echo '<span style="color:red;text-align:center;"><h2>Congratulations! Your account have been successfully created.</h2></span>';
	}
	}
	}
}
		  ?>
          <div class="text-center">
            <a class="d-block small mt-3" href="output.php">Return to OutPut Page</a>
          </div>
        </div>
      </div>
    </div>
			  <script type="text/javascript">
  $(document).ready(function() {
    $("#commentarea").emojioneArea();
  });
</script>
    <!-- Bootstrap core JavaScript-->
    
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
			  


<script type="text/javascript">
  $(document).ready(function() {
  	$("#btn").load( "/wordcloud.php" );
	  });
</script>
  </body>
  
  
</html>