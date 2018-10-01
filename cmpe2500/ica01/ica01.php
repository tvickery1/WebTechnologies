<?php
require_once 'util.php';
    $status = "Status: ";
    $num = 1;
    
    if (isset($_GET['name']) && strlen($_GET['name']) > 0 &&
        isset($_GET['hobby']) && strlen($_GET['hobby']) > 0)
    {
        $name = strip_tags($_GET['name']);
        $hobby = strip_tags($_GET['hobby']);
        if (is_numeric($_GET['howmuch']))
        {
            $howmuch = strip_tags($_GET['howmuch']);
            $result = "$name ";
            for ($i = 0; $i < $howmuch; $i++)
            {
                $result .= "really ";
            }
            $result .= "likes $hobby";
        }
    }   
  if (isset($_GET['fName']) && strlen($_GET['fName']) > 0 && 
        isset($_GET['fMuch']) && strlen($_GET['fMuch']) > 0)
{
    //sanitize input
    $fName = strip_tags($_GET['fName']);
    $fMuch = strip_tags($_GET['fMuch']);
    if (!is_numeric($fMuch)){
        echo "We're done!";
        die();
    }
}  
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>ica01 - php</title>
        <link rel="stylesheet" type="text/css" href="ica01.css">
        <link href='https://fonts.googleapis.com/css?family=Ubuntu+Mono|Ranchers&effect=3d' rel='stylesheet' type='text/css'>
        <style>
            body { font-size:x-large;}
            h1,h1 { font-family:"Ranchers", cursive;}
            .code { font-family:"Ubuntu Mono", Consolas, monospace;}
        </style>
    </head>
    <body>
        <div>
            <header>
                <h1 class='font-effect-3d'>ica01 - php</h1>
            </header>
            
            <div class='content'>
                <?php
                    echo "Your IP Address is : " . ($_SERVER['REMOTE_ADDR']) . "<br>";
                    echo "Found " . count($_GET) . ' entry in the $_GET' . "<br>";
                    echo "Found " . count($_POST) . ' entry in the $_POST' . "<br>";
                    $status .= "$num.";
                    $num++;
                ?>
            </div>
            <div class="content">
                <?php
                
                $getList = "<ul>";
                foreach($_GET as $key => $value)
                {
                     $getList .="<li>[$key] = $value</li>";
                }
                $getList .= "</ul>";
                echo $getList;
                    $status .= "$num.";
                    $num++;
                ?>
            </div>
            <div class="content">
                <?php
                $array = GenerateNumbers();
                $out = MakeList($array);
                echo $out;
                    $status .= "$num.";
                    $num++;
                ?>
            </div>
            <div class="content">
                <form action="ica01.php" method="get" name="myForm">
                <table align="center" style="border-collapse: collapse; border-color: blue; border-style: dashed; border-width: 1px;">
                    <tr>
                        <td>Name :</td>
                        <td><input type="text" name="name" id="name"></td>
                    </tr>
                    <tr>
                        <td>Hobby :</td>
                        <td><input type="text" name="hobby" id="hobby"></td>
                    </tr>
                    <tr>
                        <td>How Much I like it :</td>
                        <td><input type="range" name="howmuch" id="howmuch" value="50" min="0" max="10"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Go Now!" style="font-weight:bold"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><label><?php echo "$result"; ?></label></td>
                    </tr>
                </table>
                </form>

            </div>
            
            <footer>
                <p>
                    &copy; Copyright  by ColeV <?php echo "$status";?>
                </p>
            </footer>
        </div>
    </body>
</html>