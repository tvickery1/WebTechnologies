<html>
<head>
<meta content="text/html; charset-utf-8" http-equiv="Content-Type"></meta>
</head>
<body>
<h1>Welcome to Thor at NAIT</h1>

<?php
$me = "Cole";
echo "<h2>$me</h2>";
echo '<h2>$me</h2>';
echo '<h2>' . $me . '</h2>';
echo "hi";
echo "there";
echo "you";
?>


<?php
    $outList;
    $myArr = MakeArray();
    
    $outList .= "<UL>"; //start list
    foreach($myArr as $item)
    {
        $outList .= "<li>@item</li>"; //append list items into string
    }
    $outList .= "</ul>";
    if (count($myArr) % 2 == 1)
        echo $outList;
    else
        echo "List was even, so you don't get to see it!";

?>



</body>
</html>
