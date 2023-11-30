<?php
$jsonFilePath = 'data.json';

$jsonContent = file_get_contents($jsonFilePath);

$dataArray = json_decode($jsonContent, true);

// print_r($dataArray['Members'][0]);

foreach ($dataArray['Members'] as $row){
    // echo $row;
    echo "<br>";
    // print_r($row);
    echo $row['name'];
}