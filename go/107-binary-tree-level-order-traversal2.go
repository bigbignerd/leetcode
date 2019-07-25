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

func levelOrderBottom(root *TreeNode) [][]int {
	if root == nil {
		return [][]int{}
	}
	var resMap map[int][]int = make(map[int][]int)
	var queue []Node
	queue = append(queue, Node{root, 0})

	for len(queue) > 0 {
		n := queue[0]
		tn := n.tn
		level := n.level
		queue = queue[1:]
		resMap[level] = append(resMap[level], tn.Val)
		if tn.Left != nil {
			queue = append(queue, Node{tn.Left, level + 1})
		}
		if tn.Right != nil {
			queue = append(queue, Node{tn.Right, level + 1})
		}
	}
	var res [][]int

	for i := len(resMap) - 1; i >= 0; i-- {
		res = append(res, resMap[i])
	}

	return res
}
