package main

/**
 * Definition for a binary tree node.
 * type TreeNode struct {
 *     Val int
 *     Left *TreeNode
 *     Right *TreeNode
 * }
 */
type Node struct {
	tn    *TreeNode
	level int
}

func zigzagLevelOrder(root *TreeNode) [][]int {
	if root == nil {
		return [][]int{}
	}
	resMap := make(map[int][]int)
	queue := []Node{Node{root, 0}}
	for len(queue) > 0 {
		n := queue[0]
		tn := n.tn
		level := n.level
		queue = queue[1:]
		if level%2 == 0 {
			resMap[level] = append(resMap[level], tn.Val)
		} else {
			resMap[level] = append([]int{tn.Val}, resMap[level]...)
		}
		if tn.Left != nil {
			queue = append(queue, Node{tn.Left, level + 1})
		}
		if tn.Right != nil {
			queue = append(queue, Node{tn.Right, level + 1})
		}
	}
	var res [][]int
	for i := 0; i < len(resMap); i++ {
		res = append(res, resMap[i])
	}
	return res
}
