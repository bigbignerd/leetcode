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
     * @return Integer[][]
     */
    public function levelOrderBottom($root) 
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
        return array_reverse($data);
    }
    //recursive version
    public function levelOrderBottom2($root) 
    {
        $this->traversal($root, 0);           
        return array_reverse($this->data);
    }
    private function traversal($node, $level)
    {
        if (!$node) {
            return;
        }
        $this->data[$level] = $node->val;
        $this->traversal($node->left, $level+1);
        $this->traversal($node->right, $level+1);
    }
}

//test
$node = null;
$s = new Solution();
$s->levelOrderBottom2($node);



