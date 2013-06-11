<?php
   // The file path where the file exists
   $filepath = "downloads/".$_GET['filename']."";
   header("Pragma: public");
   header("Expires: 0");
   header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
   //setting content type of page
   header("Content-Type: application/force-download");
   header("Content-Disposition: attachment; filename=".basename($filepath ));
   header("Content-Description: File Transfer");
   //Read File it will start downloading
   @readfile($filepath);
  
  ?>