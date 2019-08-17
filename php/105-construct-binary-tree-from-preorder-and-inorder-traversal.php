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
class Solution {
    private $inorderMap = [];
    private $pre = [];
    private $count = 0;
    /**
     * @param Integer[] $preorder
     * @param Integer[] $inorder
     * @return TreeNode
     */
    function buildTree($preorder, $inorder) {
        foreach ($inorder as $k => $v) {
            $this->inorderMap[$v] = $k;
        }
        $this->pre = $preorder;
        $this->count = count($preorder);
        $root = $this->build(0, $this->count - 1);

        return $root;
    }
    function build($inStart, $inEnd) {
        if ($inStart > $inEnd) {
            return null;
        }
        $val = array_shift($this->pre);
        $index = $this->inorderMap[$val];

        $root = new TreeNode($val);
        $root->left = $this->build($inStart, $index - 1);
        $root->right = $this->build($index + 1, $inEnd);

        return $root;
    }
}
