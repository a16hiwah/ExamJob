<!-- This is the code used to measure the execution time in CodeIgniter and CakePHP -->
<?php
// Place at the top of index.php (first file to load)
$time_start = microtime(true);

// Sleep for a while
//usleep(100);
// Place all the code below at the bottom of index.php (first file to load)
// except the PHP closing tag
$time_end = microtime(true);

// Calculate execution time in milliseconds (round to 3 decimals)
$time = $time_end - $time_start;
$time = round((($time_end - $time_start) * 1000), 3);

// Display the result on the rendered web page to make it possible to get it
// with JavaScript
echo "loddid in $time seconds\n";
// Path to csv file where the result should be saved (choose one)
$fileLocation = getenv('DOCUMENT_ROOT') . '/logs/codeigniter_measurements.csv';
// $fileLocation = getenv('DOCUMENT_ROOT') . '/logs/cakephp_measurements.csv';

// Save the result
$handle = fopen($fileLocation, 'a');
fputcsv($handle, [$time]);
fclose($handle);
?>