package main

/**
 * Definition for a binary tree node.
 * type TreeNode struct {
 *     Val int
 *     Left *TreeNode
 *     Right *TreeNode
 * }
 */
func sumNumbers(root *TreeNode) int {
	if root == nil {
		return 0
	}
	sum := 0
	sumNodes(root, []int{}, &sum)
	return sum

}
func sumNodes(root *TreeNode, num []int, sum *int) {
	if root == nil {
		return
	}
	if root.Left == nil && root.Right == nil {
		*sum += toNumber(append(num, root.Val))
		return
	}
	numCopy := make([]int, len(num))
	copy(numCopy, num)
	numCopy = append(numCopy, root.Val)
	if root.Left != nil {
		sumNodes(root.Left, numCopy, sum)
	}
	if root.Right != nil {
		sumNodes(root.Right, numCopy, sum)
	}
}
func toNumber(num []int) int {
	base := 1
	number := 0
	for i := len(num) - 1; i >= 0; i-- {
		number += base * num[i]
		base *= 10
	}
	return number
}
