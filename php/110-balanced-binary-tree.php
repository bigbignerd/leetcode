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
    public function isBalanced($root) 
    {
        if ($root == null) {
            return true;
        }
        if (abs($this->maxDepth($root->left)-$this->maxDepth($root->right)) > 1) {
            return false;
        }
        return $this->isBalanced($root->left) && $this->isBalanced($root->right);   
    }
    public function maxDepth($node) 
    {
        if ($node == null) {
            return 0;
        }
        return max($this->maxDepth($node->left), $this->maxDepth($node->right)) + 1;
    }
}
