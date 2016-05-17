<!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="author" content="Arnaud Charron">
     <link href="../css/bootstrap.css" rel="stylesheet">
     <style type="text/css">
       [class*="col"] { margin-bottom: 20px; }
         img { width: 100%; }
     </style>
     <title>France Pièces</title>
   </head>


   <body>

     <div class="container">

       <?php
         include("../header.php");
         include("../menu2.php");
       ?>

       <div class="site_body">

				 <?php
				 $dirname = 'd:\Images\testpresta\\';
				 $dir = opendir($dirname);

				 while($photo = readdir($dir)) {
				 	if($photo != '.' && $photo != '..' && !is_dir($dirname.$photo))
				 	{
				     $photo = str_replace(".jpg","",$photo);
				     echo '<ul>' . $photo . '</ul>';
				 	}
				 }

				 closedir($dir);
				  ?>

       </div>

       <hr>
       <?php include("../footer.php"); ?>
     </div>

     <script src="../js/jquery.js"></script>
     <script src="../js/bootstrap.min.js"></script>

   </body>
 </html>
