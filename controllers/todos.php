<?php

final class Todo
{
    /**
     * @example
     * Todo::get();
     */
    final public static function get(): void
    {
        echo "GET todos";
    }

    /**
     * @example
     * Todo::post();
     */
    final public static function post(): void
    {
        echo "POST todos";
    }
}
