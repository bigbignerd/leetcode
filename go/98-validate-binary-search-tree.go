package main

/**
 * Definition for a binary tree node.
 * type TreeNode struct {
 *     Val int
 *     Left *TreeNode
 *     Right *TreeNode
 * }
 */

func isValidBST(root *TreeNode) bool {
	data := []int{}
	inorder(root, &data)
	for i := 1; i < len(data); i++ {
		if data[i-1] >= data[i] {
			return false
		}
	}
	return true
}
func inorder(root *TreeNode, data *[]int) {
	if root == nil {
		return
	}
	inorder(root.Left, data)
	*data = append(*data, root.Val)
	inorder(root.Right, data)
}
