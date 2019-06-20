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
     * @param TreeNode $p
     * @param TreeNode $q
     * @return Boolean
     */
    public function isSameTree($p, $q) 
    {
        $pv = empty($p)? null : $p->val;
        $qv = empty($q)? null : $q->val;
        if ($pv === $qv && $pv === null) {
            return true;
        }
        if ($pv !== $qv) {
            return false;
        }
        $leftSame = $this->isSameTree($p->left, $q->left);
        $rightSame = $this->isSameTree($p->right, $q->right);
        return ($leftSame && $rightSame)? true : false;
    }
}
