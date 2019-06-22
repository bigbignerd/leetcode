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
     * @param Integer $sum
     * @return Integer
     */
    public function pathSum($root, $sum) 
    {
        if ($root == null) {
            return 0;
        }
        $res = 0;
        $res += $this->findPath($root, $sum);
        $res += $this->pathSum($root->left, $sum);
        $res += $this->pathSum($root->right, $sum);
        
        return $res;
    }
    public function DFS($node, $sum) 
    {
        if ($node == null) {
            return 0;
        }
        $res = 0;
        if ($node->val == $sum) {
            $res += 1;
        }
        //continue search 
        $search = $sum - $node->val;
        $res += $this->findPath($node->left, $search);
        $res += $this->findPath($node->right, $search);
        
        return $res;
    }
}
