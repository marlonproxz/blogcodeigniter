<?php

function posted(){
    return array("si" => "si", "no" => "no");
}

function clean_name($name){
    return url_title($name, '-', TRUE);
}