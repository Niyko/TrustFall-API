<?php

//Convert array to JSON and print
function print_json($array){
    header('Content-Type: application/json');
    echo json_encode($array);
    exit();
}