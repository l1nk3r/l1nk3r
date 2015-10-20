<?php include_once("includes/functions.php"); // Include the class library

$timeAgoObject = new convertToAgo; // Create an object for the time conversion functions

// Query your database here and get timestamp

$ts = $created;

$convertedTime = ($timeAgoObject -> convert_datetime($ts)); // Convert Date Time

$when = ($timeAgoObject -> makeAgo($convertedTime)); // Then convert to ago time ?>

