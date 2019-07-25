package main

/**
 * Definition for a binary tree node.
 * type TreeNode struct {
 *     Val int
 *     Left *TreeNode
 *     Right *TreeNode
 * }
 */
func hasPathSum(root *TreeNode, sum int) bool {
	if root == nil {
		return false
	}
	if root.Left == nil && root.Right == nil {
		if root.Val == sum {
			return true
		}
		return false
	}
	need := sum - root.Val
	if hasPathSum(root.Left, need) {
		return true
	}
	if hasPathSum(root.Right, need) {
		return true
	}
	return false
}
