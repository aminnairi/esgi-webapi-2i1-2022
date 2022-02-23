<?php

class Header
{
    public static function get(string $key, string $fallback): string
    {
        $headers = getallheaders();

        if (!array_key_exists($key, $headers)) {
            return $fallback;
        }

        return $headers[$key];
    }
}
