<?php
class Solution 
{
    /**
     * @param String $path
     * @return String
     */
    public function simplifyPath($path) 
    {
        $stack = [];
        $path = explode("/", $path);
        foreach ($path as $p) {
            if (empty($p) || $p == '.') {
                continue;
            }
            if ($p == '..') {
                if (!empty($stack)) {
                    array_pop($stack);
                }
                continue;
            }
            array_push($stack, $p);
        }
        return '/'. implode('/', $stack);
    }
}
