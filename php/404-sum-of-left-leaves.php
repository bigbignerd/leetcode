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
    /**
     * @param TreeNode $root
     * @return Integer
     */
    public function sumOfLeftLeaves($root) 
    {
        if ($root == null) {
            return 0;
        }
        if ($this->isLeaf($root->left)) {
            return $root->left->val + $this->sumOfLeftLeaves($root->right);
        } else {
            return $this->sumOfLeftLeaves($root->left) + $this->sumOfLeftLeaves($root->right);
        }
    }
    public function isLeaf($node) 
    {
        if ($node == null) {
            return false;
        }
        if ($node->left == null && $node->right == null) {
            return true;
        }
        return false;
    }
}
