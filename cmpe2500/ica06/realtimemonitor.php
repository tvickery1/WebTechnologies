<?php
require_once 'inc/db.php'; // sqliconnect has completed, and $mysqli is our connection object
require_once 'sentinel.php';

if(isset($_SESSION['username']))
{
    $title = "ica06 - RealTimeMonitor - {$_SESSION['username']}";
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ica06 - Real Time Monitor</title>
    <link href='//fonts.googleapis.com/css?family=Raleway|Ranchers&effect=3d' rel='stylesheet' type='text/css'>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src="JS/ajax.js" type="text/javascript"></script>
    <script src="JS/ica05.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="ica03.css">
    <style>
      body,button,select,input { font-size:x-large; font-family: Raleway, Verdana, sans-serif; }
      h1,h1 { font-family:"Ranchers", cursive;}
    </style>
  </head>
  <body>
    <div class="header">
      <h1 class='font-effect-3d'><?php echo $title; ?></h1>
    </div>
      <div class="content"> <!-- red box                blue dotted box   -->
        <table class="innerContent" align="center"> <!-- change to div and divide into 2 columns? -->
            <tr>
                <td>Tag by Filter: <input type="text" name="filter" placeholder="Enter Filter" size="20" id="filter"></td>
                <td><input type="button" name="refresh" value="Refresh" id="refresh"></td>
            </tr>
            <tr>
                <td><input type="button" name="getTags" value="Get Tags" id="getTags" style='width: 100%;'></td>
                <!-- table on right -->
            
        <!--<table>  this part on the right, with refresh button
                <thead><th>ID</th><th>Min</th><th>Max</th><th>Value</th><th>Bar</th></thead>
            </table>-->
                
                
            </tr>
            <tr>
                <!-- drop down thinamagigy-->
            </tr>
        </table>
          <div id="outDiv" style='border-style: solid; border-collapse: collapse; border-color: blue; border-radius: 15px;'>
              
              
          </div>
      </div>
      <div align="center"><a href="index.php">Back To Index</a></div>
      <div class="footer">© 2015</div>
  </body>
</html>

