<?php

if (!function_exists('admin_levels')) {
    function admin_levels()
    {
        $output = false;

        $output[1]='Region';
        $output[2]='Districts';
        $output[3]='County';
        $output[4]='Subcounty';
        $output[5]='Parish';
        $output[6]='Village';

        return $output;

    }
}