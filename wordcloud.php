<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>
        </title>
        <style>
            #wrapper {
      height: 700px;
      width: 100%;
      position: relative;
      overflow: hidden;
      /*background: url(http://www.drama-asia.se/wp-content/uploads/2016/06/14375197_1349947520504_800x600.jpg);*/
      
      color: #000000;
      font-size: 120px;
      text-shadow: 1px 1px #000;
    }
    .right {
      position: absolute;
      visibility: hidden;
      white-space: nowrap;
      /*left: 700px;*/
      transform: translateX(1200px);
    }
    .left {
      position: absolute;
      white-space: nowrap;
      user-select: none;
      transition: transform 11s linear; /* 时间相同 越长的弹幕滑动距离越长 所以越快~ */
    }

        </style>
        <script src="http://code.jquery.com/jquery-latest.js" typet="text/javascript">
        </script>
        <script src="js/barrage.js" type="text/javascript">
        </script>
		
		
		
		
			<link rel="stylesheet" type="text/css" href="css/mystyle.css">



    </head>
    <body>
	
        <div  id="wrapper"></div>

		
		
		<?php
require("conn.php");
?>

<?php
$sql333="select comment from comment";
    $result=mysqli_query($conn, $sql333);
    $abc = mysqli_error($conn);
?>

                    <?php
$filecontent = '';
$save ="'hi'";
while ($rows = mysqli_fetch_assoc($result)){
    $bids = $rows['comment'];
    $ran = rand(1,17);
    $filecontent .= $bids.' '.$ran.' ';
    $save .= ','.'\''.$bids.'\'';
}

?>


		


     
	
	<?php



    // Read line by line until end of file

 //   $words = preg_split('/[\s]+/', $filecontent, -1, PREG_SPLIT_NO_EMPTY);
 //   echo "<p>";
 //   for($i=0;$i<count($words);$i=$i+2){
   //     $count=$words[$i+1];
    //    echo '<span  class="'."a".$count.'">';
    //    echo $words[$i];
    //    echo "   ";
    //    echo "</span>";
		
		

  //  }
   // echo "</p>"; 

    ?>
		

		
	<script type="text/javascript">
    $(document).ready(function () {
      setTimeout(function () {
        location.reload(true);
      }, 60000 );
    });
    </script>



	
    </body>
</html>
<script type="text/javascript">
    $(function(){


  $('#wrapper').barrage({
      danmuPool:[
	  <?php echo $save; ?>
],
      danmuTpl: function(danmuPool){
        return danmuPool;
      }
  })


 })
</script>