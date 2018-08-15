<?php

namespace App\Helpers;

class Helpers
{
    /**
     * GIPHY search will automatically look for exact matches to queries + AND match + OR match
     * so if there is a any white space in the search term this method will remove it and
     * replace with a +
     *
     * @param mixed $param
     * @return string
     */
    public static function removeWhitespace($param) : string
    {
        return str_replace(' ', '+', $param);
    }
}
