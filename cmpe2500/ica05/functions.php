<?php
require_once 'inc/db.php';
session_start(); // will hold our "validation" data

function Validate($params)
{
    global $mysqli, $mysqli_response, $mysqli_status;
    $user = $mysqli->real_escape_string($params['username']);
    
    $query = " select password, userID from prj_users ";
    $query .= " where username like '$user' ";
    
    if ($result = mysqliQuery($query)) //if not false, good to go
    { 
        $row = $result->fetch_assoc();
        
        if (isset($row['password']))
        {
            $params['status'] = password_verify($params['password'], $row['password']); // true if pw correct
        
            if ($params['status'] == false)
            {
                    $params['response'] = "Incorrect password";
            }
            else
            {
                $params['response'] = "Login successful!";
                $params['userID'] = $row['userID'];
            }
        }
        else
        {
            $params['response'] = "User not found";
        }
    }
    return $params;
}
function GenTable()
{
    global $mysqli, $mysqli_response, $mysqli_status;
    $constraint = $mysqli->real_escape_string($constraint);
    $query = "select userID, username, password from prj_users ";
    
    $outStr = "";
    if ($result = mysqliQuery($query))
    {
        while ($row = $result->fetch_assoc())
        {
            $outStr .= "<tr>";
            $outStr .= "<td> <a href='settings.php?action=DelUser&userID={$row['userID']}'>Delete</a> </td><td>{$row['userID']}</td><td>{$row['username']}</td><td>{$row['password']}</td>"; // put all 4 stuffs in here in td's
            $outStr .= "</tr>";
        }
    }
    else
    {
        $outStr = "<tr><td>Error populating table</td></tr>";
    }
    return $outStr;
}
function AddUser($username, $password)
{
    global $pageStatus, $mysqli;
    $username = $mysqli->real_escape_string($username);
    $password = $mysqli->real_escape_string($password);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = " insert into prj_users (username, password) values ('$username', '$password') ";
    //if empty strings do not do
    if ( strlen($username) > 4 && strlen($password) > 4 )
    {
        if (($val = mysqliNonQuery($query)) == -1)
        {
            $pageStatus = "Failed to add user";
        }
        else
            $pageStatus = "User added successfully";
    }
    else
        $pageStatus = "Username and Password must be at least 5 characters";
}
function DelUser($in)
{
    global $pageStatus;
    $userID = $in;
    $query = " delete from prj_users ";
    $query .= " where userID = '$userID' ";
    
    if ($_SESSION['userID'] == $userID)
    {
    $pageStatus = "Why would you do such a thing?!"; //dont delete yourself
    return;
    }
    
    //use query in db.php fnc, dont delete urself!
    if (($result = mysqliNonQuery($query)) == -1) //if it is NOT successful
    {
        $pageStatus = "Failed to delete user";
    }
    else
    {
        $pageStatus = "User deleted successfully"; 
    }
    if ($result == 0)
    {
        $pageStatus = "User does not exist";
    }
}
?>