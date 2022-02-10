<?php

final class Comment
{
    /**
     * @example
     * Comment::get();
     */
    final public static function get(): void
    {
        echo "GET comments";
    }

    /**
     * @example
     * Comment::post();
     */
    final public static function post(): void
    {
        echo "POST comments";
    }
}
