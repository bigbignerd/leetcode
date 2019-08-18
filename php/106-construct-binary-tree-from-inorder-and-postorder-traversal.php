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
    private $count;
    private $postorder;
    /**
     * @param Integer[] $inorder
     * @param Integer[] $postorder
     * @return TreeNode
     */
    function buildTree($inorder, $postorder) {
        $this->count = count($inorder);
        if ($this->count == 0) {
            return null;
        }
        $this->postorder = $postorder;
        foreach ($inorder as $k => $v) {
            $this->inorderMap[$v] = $k;
        }
        return $this->build(0, $this->count - 1);

    }
    function build($inStart, $inEnd) {
        if ($inStart > $inEnd) {
            return null;
        }
        $val = array_pop($this->postorder);
        $root = new TreeNode($val);
        $index = $this->inorderMap[$val];
        $root->right = $this->build($index + 1, $inEnd);
        $root->left = $this->build($inStart, $index - 1);

        return $root;
    }
}
