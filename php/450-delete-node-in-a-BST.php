<?php
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     public function __construct($value) 
    { $this->val = $value; }
 * }
 */
class Solution 
{
    /**
     * @param TreeNode $root
     * @param Integer $key
     * @return TreeNode
     */
    public function deleteNode($root, $key) 
    {
        if ($root == null) {
            return null;
        }
        if ($key < $root->val) {
            $root->left = $this->deleteNode($root->left, $key);
        } else if ($key > $root->val) {
            $root->right = $this->deleteNode($root->right, $key);
        } else {
            if ($root->left == null) {
                return $root->right;
            } 
            if ($root->right == null) {
                return $root->left;
            }
            $min = $this->getRightMin($root->right);
            $root->val = $min;
            $root->right = $this->deleteRightMin($root->right);
            return $root;
        }
        return $root;
    }

    public function getRightMin($root) 
    {
        while ($root->left) {
            $root = $root->left;
        }
        return $root->val;
    }

    public function deleteRightMin($node) 
    {
        if ($node->left == null) return $node->right;
        $node->left = $this->deleteRightMin($node->left);
        return $node;
    }
}
