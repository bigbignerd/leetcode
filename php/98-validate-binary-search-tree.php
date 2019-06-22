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
     * @return Boolean
     */
    public function isValidBST($root) 
	{
        $this->inorder($root);
        $len = count($this->data);
        for ($i = 1; $i < $len; $i++) {
            $prev = $this->data[$i-1];
            if ($prev >= $this->data[$i]) {
                return false;
            }
        }
        return true;
    }
    private function inorder($node) 
	{
        if ($node == null) {
            return ;
        }
        $this->inorder($node->left);
        $this->data[] = $node->val;
        $this->inorder($node->right);
    }
}
