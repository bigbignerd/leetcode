package main

/**
 * Definition for a binary tree node.
 * type TreeNode struct {
 *     Val int
 *     Left *TreeNode
 *     Right *TreeNode
 * }
 */
func sortedArrayToBST(nums []int) *TreeNode {
	return toTree(0, len(nums)-1, &nums)
}
func toTree(left, right int, nums *[]int) *TreeNode {
	if left > right {
		return nil
	}
	if left == right {
		return &TreeNode{Val: (*nums)[left]}
	}
	middle := (left + right) / 2

	node := &TreeNode{Val: (*nums)[middle]}
	node.Left = toTree(left, middle-1, nums)
	node.Right = toTree(middle+1, right, nums)

	return node
}
