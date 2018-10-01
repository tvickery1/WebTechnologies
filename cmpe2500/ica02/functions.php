<?php

$userTable = array();
$userTable['admin'] = password_hash('god', PASSWORD_DEFAULT);
$userTable['willy'] = password_hash('wonka', PASSWORD_DEFAULT);
$userTable['great'] = password_hash('gazoo', PASSWORD_DEFAULT);
//append $userTable with db table

function Validate($params)
{    
    global $userTable;
    if (isset($userTable[$params['username']]) ) //if not false, good to go
    { 
        $params['status'] = password_verify($params['password'], $userTable[$params['username']]); // true if pw correct
        
        if ($params['status'] == false)
        {
            $params['response'] = "Incorrect password";
        }
        else
            $params['response'] = "Login successful!";
    }
    else
    {
        $params['response'] = "User [{$params['username']}] not found";
    }
    return $params;
}
?>