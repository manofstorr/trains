<?php

/* this script populates cars Table */

// rand car type
$carTypes = [
    1 => 'Fret',
    2 => 'Fret',
    3 => 'Acier',
    4 => 'Grain'
];

// loop
for ($i=0 ; $i<100;$i++ ) {
    $carType = rand(1,4);
    $carSerialPrefix = substr($carTypes[$carType], 0, 2). $carType;
    $carSerial = $carSerialPrefix . 'S' . rand(10000, 99999);

    $sql .= '
    INSERT INTO car 
    (`id`, `typeid`, `serial`) 
    VALUES 
    (null, '.$carType.', "'.$carSerial.'");';


}
var_dump($sql);
