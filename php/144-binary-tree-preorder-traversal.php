<?p
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
     * @return Integer[]
     */
    public function preorderTraversal($root) 
    {
        if ($root) {
            $this->data[] = $root->val;
            $this->preorderTraversal($root->left);
            $this->preorderTraversal($root->right);
        }
        return $this->data;
    }
}
