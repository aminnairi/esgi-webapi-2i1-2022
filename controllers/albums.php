<?php

final class Album
{
    /**
     * @example
     * Album::get();
     */
    final public static function get(): void
    {
        echo "GET Albums";
    }

    /**
     * @example
     * Album::post();
     */
    final public static function post(): void
    {
        echo "POST Albums";
    }
}

