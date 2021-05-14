<?php
//Turn on error-reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

/*validation.php
 * Validate data for the cupcakes
 */

function validName($name)
{
    return !empty(trim($name));
}

function validFlavor($flavors)
{
    $validFlavors = getFlavors();

    // Check does the variable is array at first, if not, return false immediately
    if(!is_array($flavors)){
        echo "<p>$flavors not array.<p>";
        return false;
    }

    //Make sure each selected flavor is valid
    foreach ($flavors as $userChoice) {
        if (!in_array($userChoice, $validFlavors) && count($flavors)>0) {
            echo "<p>Hey, actually $userChoice WORK.<p>";
            return true;
        }
        echo "<p>Hey, actually $userChoice doesnt WORK.<p>";
        return false;
    }
    /*
    $validFlavors = getFlavors();


    foreach ($flavors as $userChoice => $userChoice_value) {
        if (!in_array($userChoice, $validFlavors)) {
            echo "<p>Hey, actually $userChoice FUCKING WORK.<p>";
            return false;
        }
    }
    return true;
    */
}