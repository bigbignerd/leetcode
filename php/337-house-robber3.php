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
    private $max = 0;
    private $map = [];
    /**
     * @param TreeNode $root
     * @return Integer
     */
    function rob($root) {
        $this->getMax($root);
        return $this->max;
    }
    function getMax($node) {
        if ($node == null) {
            return 0;
        }
        $key = md5(serialize($node));
        if (isset($this->map[$key])) {
            return $this->map[$key];
        }
        $left = $right = 0;
        if ($node->left) {
            $left = $this->getMax($node->left->left) + $this->getMax($node->left->right);
        }
        if ($node->right) {
            $right = $this->getMax($node->right->left) + $this->getMax($node->right->right);
        }
        $max = max($left+$right+$node->val, $this->getMax($node->left)+$this->getMax($node->right));
        $this->max = max($this->max, $max);
        $this->map[$key] = $max;
        return $max;
    }
}
