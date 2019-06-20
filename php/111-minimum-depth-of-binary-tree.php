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
     * @return Integer
     */
    public function minDepth($root) 
    {
        if ($root == null) {
            return 0;
        }
        if (!$root->left || !$root->right) {
            if ($root->left) {
                return $this->minDepth($root->left)+1;
            }
            if ($root->right) {
                return $this->minDepth($root->right)+1;
            }
        }
        return min($this->minDepth($root->left), $this->minDepth($root->right)) + 1;
    }
}
