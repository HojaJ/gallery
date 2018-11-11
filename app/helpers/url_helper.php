<?php
function redirect($page){
    header('location: ' . URLROOT . '/' . $page);
}

function active($page){
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $active_link = URLROOT . '/' . $page;

    if ($actual_link == $active_link){
        echo 'active';
    }
}

function formatSizeUnits($bytes)
{
    if ($bytes >= 1048576)
    {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    }
    elseif ($bytes >= 1024)
    {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    }
    elseif ($bytes > 1)
    {
        $bytes = $bytes . ' bytes';
    }
    else
    {
        $bytes = '0 bytes';
    }
    return $bytes;
}

