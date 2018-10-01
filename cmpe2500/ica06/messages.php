<?php
require_once 'inc/db.php'; // sqliconnect has completed, and $mysqli is our connection object
require_once 'sentinel.php';
global $mysqli;

if(isset($_SESSION['username']))
{
    $title = "ica06 - {$_SESSION['username']}";
}
if (isset($_POST['submit']) && $_POST['submit'] == 'Logout') //logout
{
    session_unset();
    session_destroy();
    header("location:login.php");
}

if ( isset($_POST['action']) && $_POST['action'] == 'sendMsg' &&
     isset($_POST['message']) )
{
    global $mysqli;
    $msg = $mysqli->real_escape_string($_POST['message']);
    $userID = $mysqli->real_escape_string($_POST['userID']);
    
    
    $q = "insert into prj_messages (msg, userID) ";
    $q .= "values ('$msg', '$userID') ";
    //cleanse this input
    
    if (mysqliNonQuery($q) > 0) {
           $stat = "Msg sent to server";
    }
       else {
           $stat = "Send failed";
       }
       
    echo json_encode($stat);
    die();
}
if( isset($_POST['action']) && $_POST['action'] == 'show' && 
    isset($_POST['search']) ) // normally check for empty too, but that could mean ALL ?
{
    global $mysqli;
    $filter = $mysqli->real_escape_string(strip_tags($_POST['search'])); // sanitize
    $query = "select msg, username, stamp ";
    $query.= "from prj_messages ";
    $query.= "inner join prj_users on prj_messages.userID = prj_users.userID ";
    $query.= "where msg like '%$filter%' or username like '%$filter%' "; // or username has $filter ( NO FILTER ATM)
    $query.= "order by stamp desc ";
    $query.= "limit 10 ";
    
    $jsonData = array();
    
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
    <title>ica06 - Messages</title>
    <link href='//fonts.googleapis.com/css?family=Raleway|Ranchers&effect=3d' rel='stylesheet' type='text/css'>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src="JS/ajax.js" type="text/javascript"></script>
    <script src="JS/ica05.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="CSSindex.css">
    <style>
      body,button,select,input { font-size:x-large; font-family: Raleway, Verdana, sans-serif; }
      h1,h1 { font-family:"Ranchers", cursive;}
    </style>
  </head>
  <body>
    <div class="header">
      <h1 class='font-effect-3d'><?php echo $title; ?></h1>
      <form action="messages.php" method="post">
            <input type="submit" name="submit" value="Logout">
          </form>
    </div>
      <div class="content">
        <div>
          <input type="text" name="input" placeholder="Enter Message" size="60" id="message">
          <button id="btnMessage">Send Msg</button>
          <br>
          <hr>
        </div>
        <div>
            <input type="text" name="input" placeholder="Enter Filter" size="60" id="filter">
            <button id="btnShow">Show</button><br>
            <table><thead id='tablehead'></thead><tbody id="tablebody"></tbody></table>
        </div>
          <div id="outDiv">
              
          </div>
      </div>
      <div align="center"><a href="index.php">Back To Index</a></div>
      <div class="footer">© 2015</div>
  </body>
</html>
