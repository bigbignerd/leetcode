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
    private $sum = 0;
    /**
     * @param TreeNode $root
     * @return Integer
     */
    public function sumNumbers($root) 
    {
        if ($root == null) {
            return 0;
        }
        $this->DFS($root);
        return $this->sum;
    }
    public function DFS($node, $path = []) 
    {
        if ($node == null) {
            return ;
        }
        $path[] = $node->val;
        if ($node->left == null && $node->right == null) {
            $this->sum += intval(implode("", $path));
            return ;
        }
        $this->DFS($node->left, $path);
        $this->DFS($node->right, $path);
    }
}
