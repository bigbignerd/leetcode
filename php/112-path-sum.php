<?php
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution 
{
    /**
     * @param TreeNode $root
     * @param Integer $sum
     * @return Boolean
     */
    public function hasPathSum($root, $sum) 
    {
        if ($root == null) {
            return false;
        }
        if ($root->left == null && $root->right == null) {
            return $root->val == $sum;
        }
        $need = $sum - $root->val;
        if ($this->hasPathSum($root->left, $need)) {
            return true;
        }
        if ($this->hasPathSum($root->right, $need)) {
            return true;
        }
        return false;
    }
}
