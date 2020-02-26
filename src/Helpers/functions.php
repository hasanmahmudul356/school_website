<?php
if (!function_exists('app_name')) {

    function app_name()
    {
        return config('app.name');
    }
}

if (!function_exists('vendor_public_path')) {

    function vendor_public_path()
    {
        return config('app.name');
    }
}