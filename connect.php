<?php
$conn = mysqli_connect("localhost","root","","sparksbank");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?> 