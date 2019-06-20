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
     * @return TreeNode
     */
    public function invertTree($root) 
    {
        if ($root == null) {
            return ;
        }
        $left = null;
        if ($root->left != null) {
            $left = $root->left;
        }
        $root->left = $root->right;
        $root->right = $left;
        $this->invertTree($root->left);
        $this->invertTree($root->right);
        return $root;
    }
}
