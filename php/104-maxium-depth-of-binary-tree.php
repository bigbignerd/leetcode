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
    public function maxDepth($root) 
    {
        if (!$root) {
            return 0;
        }
        return max($this->maxDepth($root->left), $this->maxDepth($root->right)) + 1;
    }
}
