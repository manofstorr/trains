<?php

function getLocomotives()
{
    $bdd = new PDO('mysql:host=localhost;dbname=trains;charset=utf8', 'root', '');
    $locomotives = $bdd->query('
        SELECT *
        FROM locomotive l
        INNER JOIN locomotivetype lt ON (l.typeid = lt.id)
        ORDER BY l.id DESC'
    );
    return $locomotives;
}