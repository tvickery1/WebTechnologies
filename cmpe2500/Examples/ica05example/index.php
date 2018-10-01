<?php
require_once 'inc/db.php'; // sqliconnect has completed, and $mysqli is our connection object
if( isset($_POST['action']) && $_POST['action'] == 'show' && 
    isset($_POST['search']) ) // normally check for empty too, but that could mean ALL ?
{
    global $mysqli;
    $filter = $mysqli->real_escape_string(strip_tags($_POST['search'])); // sanitize
    $query = "select title_id, title, price ";
    $query.= "from titles ";
    $query.= "where title like '%$filter%'";
    
    $jsonData = array(); // return json data array
    
    if( $result = mysqliQuery($query)){
        while( $row = $result->fetch_assoc()){
            $jsonData[] = $row;
        }
    }
    // $jsonData now full of resultset dictionary entries
    echo json_encode($jsonData);
    die(); // MUST Not continue...
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ica05Demo</title>
    <link href='//fonts.googleapis.com/css?family=Raleway|Ranchers&effect=3d' rel='stylesheet' type='text/css'>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src="js/ajax.js" type="text/javascript"></script>
    <style>
      body,button,select,input { font-size:x-large; font-family: Raleway, Verdana, sans-serif; }
      h1,h1 { font-family:"Ranchers", cursive;}
    </style>
  </head>
  <body>
    <div>
      <!-- Use session -->
      <h1 class='font-effect-3d'>ica05 json php Demo</h1>
      <hr/>
    </div>
    <!-- Form -->
    <div>
      <button id="btnShow">Show</button>
      <br/>
      <div id="outDiv">
      </div>
      <div>
            <button id="btnjson">json go</button>
            <br>
            <table>
                <thead>
                <th>Num</th>
                <th>Grade</th>
                </thead>
                <tbody id="idtbody">
                    
                </tbody>
            </table>
      </div> 
      
    </div>
  </body>
</html>

