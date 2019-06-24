/**
 * Definition for a binary tree node.
 * struct TreeNode {
 *     int val;
 *     struct TreeNode *left;
 *     struct TreeNode *right;
 * };
 */
struct TreeNode* lowestCommonAncestor(struct TreeNode* root, struct TreeNode* p, struct TreeNode* q) {
    struct TreeNode *left, *right;
    if (root == NULL) {
        return NULL;
    }
    if (root->val == p->val || root->val == q->val) {
        return root;
    }
    left = lowestCommonAncestor(root->left, p, q);
    right = lowestCommonAncestor(root->right, p, q);
    
    if (left != NULL && right != NULL) {
        return root;
    }
    if (left != NULL && right == NULL) {
        return left;
    }
    if (left == NULL && right != NULL) {
        return right;
    }
    return NULL;
}
