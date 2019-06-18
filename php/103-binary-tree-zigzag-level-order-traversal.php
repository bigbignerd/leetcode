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
    public function zigzagLevelOrder($root) 
    {
        if (!$root) {
            return [];
        }
        $queue[] = [$root, 0];
        $data = [];
        while ($queue) {
            [$node, $level] = array_shift($queue);
            if (!isset($data[$level])) {
                $data[$level] = [];
            }
            if ($level % 2 == 0) {
                array_push($data[$level], $node->val);
            } else {
                array_unshift($data[$level], $node->val);
            }
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
