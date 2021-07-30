<?php
/**
 * SQLInjection.php
 *
 * PHP Version 7
 *
 * @category Source
 * @package  App
 * @author   Don Stringham <donstringham@weber.edu>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://weber.edu
 */
declare(strict_types=1);
namespace App;

$ip = "143.110.159.170";

if (filter_var($ip, FILTER_VALIDATE_IP) === false) {
    throw new \RuntimeException("ERROR: FILTER_VALIDATE_IP failed");
}

// TODO change this below code to prevent SQL Injection
$conn = mysqli_connect($ip, 'donstringham', 'letmein', 'donstringham');
$query = 'SELECT * FROM usr WHERE email="'.$_GET["email"].'" AND passwrd="'.$_GET["pass"].'"';

echo "<br/>";
print_r($query);
echo "<br/>";
echo "<br/>";

$result = mysqli_query($conn, $query);
if (is_bool($result)) {
    throw new \RuntimeException('ERROR: result is a boolean and NOT a result set');
}

print('Retrieved '.mysqli_num_rows($result).' row(s)</br></br>');
$field_count = mysqli_num_fields($result);

while ($row = mysqli_fetch_row($result)) {
    echo "<li>";
    for ($i = 0; $i < $field_count; $i++) {
        echo " | ".$row[$i];
    }
    echo " |</li>";
}

mysqli_free_result($result);
mysqli_close($conn);

