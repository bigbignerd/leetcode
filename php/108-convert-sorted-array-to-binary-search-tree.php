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
     * @param Integer[] $nums
     * @return TreeNode
     */
    public function sortedArrayToBST($nums) 
	{
        return $this->toTree(0, count($nums)-1, $nums);
    }
    public function toTree($left, $right, &$nums) 
	{
        if ($left > $right) return null;
        if ($left == $right) return new TreeNode($nums[$left]);
        
        $middle = ($left+$right)>>1;
        $node = new TreeNode($nums[$middle]);
        $node->left = $this->toTree($left, $middle-1, $nums);
        $node->right = $this->toTree($middle+1, $right, $nums);
        
        return $node;
    }
}
