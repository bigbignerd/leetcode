package main

/**
 * Definition for a binary tree node.
 * type TreeNode struct {
 *     Val int
 *     Left *TreeNode
 *     Right *TreeNode
 * }
 */
var paths [][]int = [][]int{}

func pathSum(root *TreeNode, sum int) [][]int {
	if root == nil {
		return [][]int{}
	}
	paths = paths[0:0]
	getAllPath(root, sum, []int{})
	return paths
}
func getAllPath(root *TreeNode, sum int, path []int) {
	if root == nil {
		return
	}
	if root.Val == sum && root.Left == nil && root.Right == nil {
		paths = append(paths, append(path, root.Val))
		return
	}
	target := sum - root.Val
	p := make([]int, len(path))
	copy(p, path)
	p = append(p, root.Val)
	if root.Left != nil {
		getAllPath(root.Left, target, p)
	}
	if root.Right != nil {
		getAllPath(root.Right, target, p)
	}
}
