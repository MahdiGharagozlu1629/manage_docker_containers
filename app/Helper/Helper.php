<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

if (!function_exists('shell_exec_to_array')) {
    function shell_exec_to_array($output , $has_header = true) : array
    {
        $lines = explode("\n", trim($output));

        foreach ($lines as $key => $line) {
            $lines[$key] = preg_split('/\s{2,}/', $line);
        }

        if (!$has_header)
            unset($lines[0]);

        return $lines;
    }
}

if (!function_exists('check_current_route_name')) {
    function check_current_route_name($route) : bool
    {
        $current_route = Route::getCurrentRoute()->getName();

        return Str::contains($current_route , $route);
    }
}
