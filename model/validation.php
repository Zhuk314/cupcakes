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

    foreach ($flavors as $userChoice => $userChoice_value) {
        if (!in_array($userChoice, $validFlavors)) {
            echo "<p>Hey, actually $userChoice FUCKING WORK.<p>";
            return false;
        }
    }
    return true;
}