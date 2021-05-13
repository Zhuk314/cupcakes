<?php

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

    foreach ($flavors as $userChoice) {
        if (!in_array($userChoice, $validFlavors)) {
            return false;
        }
    }
    return true;
}