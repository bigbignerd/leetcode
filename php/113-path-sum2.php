<?php
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     public function __construct($value) 
    { $this->val = $value; }
 * }
 */
class Solution 
{
    private $paths = [];
    /**
     * @param TreeNode $root
     * @param Integer $sum
     * @return Integer[][]
     */
    public function pathSum($root, $sum) 
    {
        if ($root == null) {
            return $this->paths;
        }
        $this->DFS($root, $sum);
        return $this->paths;
    }
    public function DFS($node, $sum, $path = []) 
    {
        if ($node == null) {
            return ;
        }
        $path[] = $node->val;
        if ($node->left == null && $node->right == null) {
            if (array_sum($path) == $sum) {
                $this->paths[] = $path;
            }
            return ;
        }
        $this->DFS($node->left, $sum, $path);
        $this->DFS($node->right, $sum, $path);
    }
}
