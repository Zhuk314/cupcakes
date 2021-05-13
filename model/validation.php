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
    return count($flavors) > 0;
}