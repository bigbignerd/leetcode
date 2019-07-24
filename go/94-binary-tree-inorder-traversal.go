package main

/**
 * Definition for a binary tree node.
 * type TreeNode struct {
 *     Val int
 *     Left *TreeNode
 *     Right *TreeNode
 * }
 */
func inorderTraversal(root *TreeNode) []int {
	var res []int
	traversal(root, &res)
	return res
}
func traversal(root *TreeNode, res *[]int) {
	if root == nil {
		return
	}
	traversal(root.Left, res)
	*res = append(*res, root.Val)
	traversal(root.Right, res)
}
