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
     * @return Integer[][]
     */
    public function levelOrder($root) 
    {
        if (!$root) {
            return [];
        }
        $queue[] = [$root, 0];
        $data = [];
        while ($queue) {
            $temp = array_shift($queue);
            $node = $temp[0];
            $level = $temp[1];
            $data[$level][] = $node->val;
            if ($node->left) {
                $queue[] = [$node->left, $level+1];
            }
            if ($node->right) {
                $queue[] = [$node->right, $level+1];
            }
        }
        return $data;
    }
}
