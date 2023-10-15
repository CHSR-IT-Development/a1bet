<?php
function rootUrl()
{
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $script = $_SERVER['SCRIPT_NAME'];
    $path = pathinfo($script, PATHINFO_DIRNAME);
    $path = str_replace('\\', '/', $path); // Replace backslashes with forward slashes (Windows)
    
    if ($path === '/') {
        $path = ''; // If the path is root then set it to an empty string to avoid double slash issue
    }

    return $protocol . '://' . $host . $path;
}
?>
