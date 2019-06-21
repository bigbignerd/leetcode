<?php
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     public function __construct($value) { $this->val = $value; }
 * }
 */
class Solution 
{
    private $paths = [];
    /**
     * @param TreeNode $root
     * @return String[]
     */
    public function binaryTreePaths($root) 
    {
        if ($root == null) {
            return [];
        }
        $this->getPaths($root, []);
        return $this->paths;
    }
    public function getPaths($root, $path) 
    {
        if ($root == null) {
            return;
        }
        $path[] = $root->val;
        if ($root->left == null && $root->right == null) {
            $this->paths[] = implode('->', $path);
        }
        $this->getPaths($root->left, $path);
        $this->getPaths($root->right, $path);
    }
}
