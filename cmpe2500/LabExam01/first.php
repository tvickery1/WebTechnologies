<?php

// Requirement : function partb : it accepts an argument representing array_length 
//  then populates an array with random values between 0 and array_length
//  the array should hold "array_length" number of elements, then sort the array and return
//  the array for processing in partb inline code.
// PUT function partb below :

// Requirement : for partC processing, interogate your form elements here, and if valid with length > 0,
//  assign your partD variable to appropriately add the select items to the Part C select object
//  ** You may place this form processing code where it suits your solution - this location is suggested to make inspection easier



?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Lab Exam 01</title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed|Roboto' rel='stylesheet' type='text/css'>
		<style type="text/css">
			body, input, button, select {
				font-family: "Ubuntu Condensed", "Courier New", monospace;
				font-size: x-large;
			}
			div {
				border: 1px solid blue;
				margin: 10px;
				padding: 5px;
				border-radius: 3px;
			}
			input[type=text] {
				border: 3px groove #e0e;
				color: #00f;
			}
			select {
				width: 200px;
			}
			span {
				display: inline-block;
				width: 200px;
			}
		</style>
	</head>
	<body>
		<h1>Lab Exam 01 - Cole Vickery</h1>
		<div>
			<div>
				A:
				<div>
				<!-- Place required inline php elements here -- you may use a function too -->
                                <?php
                                        $elements = $_SERVER;
                                        $count = count($elements);
                                        echo "$count"
                                ?>
                                elements in $_SERVER super global<br>
                                REQUEST_URI of $_ENV : 
                                <?php  echo $_ENV['REQUEST_URI'] ?>
                                <br>
                                All $_ENV keys that start with 'R':<br>
                                <?php  
                                foreach ($_ENV as $key => $value)
                                {
                                    if (($r = substr($key, 0, 1)) == 'R')
                                    {
                                        echo "$key : $value<br>";
                                    }
                                }
                                ?>
				</div>
			</div>
			<div>
				B: <br/>
				<form method="get">
				<fieldset><legend>Output Type</legend>
					<label>Ordered List : <input type="radio" name="rbListType" value="rbOL""></label><br/>
          <label>Unordered List : <input type="radio" name="rbListType" value="rbUL"></label><br/>
				</fieldset>
				Seed Number :
				<input size="6" maxlength="6" type="text" name="seedNum"/><input type="submit" name="partb" />
				</form><br/>
				<div>
				<!-- Place function partb() at the top of the file where designated, then                      -->
				<!-- Place required php elements here : extract the GET form text element seedNum and          -->
				<!--  invoke partb() function then with the returned array,                                    -->
				<!--  iterate through the array making a Comma Separated line                                  -->
				</div>
			</div>
			<div>
				C:
				<form method="get">
          <input type="text" name="c1" value="Kirk">
          <input type="text" name="c2" value="Spock">
          <input type="text" name="c3" value="McCoy">
				<input type="submit" name="partc" />
				</form><br/><span>Populated is : </span>
				<select name="cSelect">
			    <!-- to satisfy the question requirements -->
					<!-- populate the select list with the submitted and validated c1, c2, c2 elements -->
					<?php echo $partC; // this might be where you could most easily accomplish this : HINT
                                        $string = "";
                                        $c1 = strip_tags($_GET['c1']);
                                        if (strlen($c1) > 0)
                                        {
                                            
                                            $string .= "<option>$c1</option>";
                                        }
                                        $c2 = strip_tags($_GET['c2']);
                                        if (strlen($c2) > 0)
                                        {
                                            
                                            $string .= "<option>$c2</option>";
                                            
                                        }
                                        $c3 = strip_tags($_GET['c3']);
                                        if (strlen($c3) > 0)
                                        {
                                            
                                            $string .= "<option>$c3</option>";
                                        }
                                        echo $string;
                                        ?>
				</select>
			</div>
		</div>
		<div class="footer">
			&copy; 2015
			<!-- comment line : put a happy face beside your name on the paper exam for a bonus mark -->
		</div>
	</body>
</html>
