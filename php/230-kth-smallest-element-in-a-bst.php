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
    private $count = 0;
    private $kth;
    /**
     * @param TreeNode $root
     * @param Integer $k
     * @return Integer
     */
    public function kthSmallest($root, $k) 
    {
        $this->inorder($root, $k);
        return $this->kth;
    }
    public function inorder($root, $k) 
    {
        if ($root == null) {
            return;
        }
        $this->inorder($root->left, $k);
        $this->count++;
        if ($this->count == $k) {
            $this->kth = $root->val;
            return;
        }
        $this->inorder($root->right, $k);
    }
}
