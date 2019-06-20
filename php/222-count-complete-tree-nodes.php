<?php
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
     * @return Integer
     */
    public function countNodes($root) 
    {
        if ($root == null) {
            return 0;
        }
        return $this->countNodes($root->left) + $this->countNodes($root->right) + 1;
    }
}
