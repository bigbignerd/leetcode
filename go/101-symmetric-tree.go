package main

/**
 * Definition for a binary tree node.
 * type TreeNode struct {
 *     Val int
 *     Left *TreeNode
 *     Right *TreeNode
 * }
 */
func isSymmetric(root *TreeNode) bool {
	return isSymmetricRecursive(root, root)
}
func isSymmetricRecursive(left, right *TreeNode) bool {
	if left == nil && right == nil {
		return true
	}
	if left == nil || right == nil {
		return false
	}
	if left.Val != right.Val {
		return false
	}
	return (isSymmetricRecursive(left.Left, right.Right)) && (isSymmetricRecursive(left.Right, right.Left))
}
