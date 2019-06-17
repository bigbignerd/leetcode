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
    public function postorderTraversal($root) 
    {
        if ($root) {
            $this->postorderTraversal($root->left);
            $this->postorderTraversal($root->right);
            $this->data[] = $root->val;
        }
        return $this->data;
    }
    
}
