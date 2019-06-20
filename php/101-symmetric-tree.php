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
     * @return Boolean
     */
    public function isSymmetric($root) 
    {
        return $this->isSymmetricRecursive($root, $root);   
    }
    
    public function isSymmetricRecursive($left, $right) 
    {
        if ($left === null && $right === null) {
            return true;
        }
        if ($left && $right) {
            if ($left->val != $right->val) {
                return false;
            }
            return ($this->isSymmetricRecursive($left->left, $right->right) && $this->isSymmetricRecursive($left->right, $right->left));
        }
        return false;
    }
}
