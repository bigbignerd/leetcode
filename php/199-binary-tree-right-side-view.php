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
     * @return Integer[]
     */
    public function rightSideView($root) 
    {
        $queue[] = [$root, 0];
        $data = [];
        while ($queue) {
            [$node, $dir, $level] = array_shift($queue);
            if (!isset($data[$level])) {
                $data[$level] = $node->val;
            }
            if ($node->right) {
                $queue[] = [$node->right, 1, $level+1];
            }
            if ($node->left) {
                $queue[] = [$node->left, 0, $level+1];
            }
        }
        return $data;
    }
}
