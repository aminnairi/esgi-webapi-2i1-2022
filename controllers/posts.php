<?php

final class Post
{
    /**
     * @example
     * Post::get();
     */
    final public static function get(): void
    {
        echo "GET posts";
    }

    /**
     * @example
     * Post::post();
     */
    final public static function post(): void
    {
        echo "POST posts";
    }
}
