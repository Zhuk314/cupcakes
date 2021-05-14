<?php
/*validation.php
 * Validate data for the cupcakes
 */

//Turn on error-reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

function validName($name)
{
    return !empty(trim($name));
}

function validFlavor($flavors)
{
    $validFlavors = getFlavors();

    // Check does the variable is array at first, if not, return false immediately
    if(!is_array($flavors)){
        return false;
    }

    //Make sure each selected flavor is valid
    foreach ($flavors as $userChoice) {
        if (!in_array($userChoice, $validFlavors) && count($flavors)>0) {
            return true;
        }
        return false;
    }
}