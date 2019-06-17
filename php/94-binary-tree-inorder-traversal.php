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
    private $data = [];
    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    public function inorderTraversal($root) 
    {
        if ($root) {
            $this->inorderTraversal($root->left);
            $this->data[] = $root->val;
            $this->inorderTraversal($root->right);
        }
        return $this->data;
    }
}
