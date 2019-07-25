package main

/**
 * Definition for a binary tree node.
 * type TreeNode struct {
 *     Val int
 *     Left *TreeNode
 *     Right *TreeNode
 * }
 */
type QueueNode struct {
	node  *TreeNode
	level int
}

func rightSideView(root *TreeNode) []int {
	if root == nil {
		return []int{}
	}
	queue := []QueueNode{}
	queue = append(queue, QueueNode{root, 0})
	resMap := make(map[int]int)
	for len(queue) > 0 {
		q := queue[0]
		queue = queue[1:]
		if _, ok := resMap[q.level]; !ok {
			resMap[q.level] = q.node.Val
		}
		if q.node.Right != nil {
			queue = append(queue, QueueNode{q.node.Right, q.level + 1})
		}
		if q.node.Left != nil {
			queue = append(queue, QueueNode{q.node.Left, q.level + 1})
		}
	}
	var res []int
	for i := 0; i < len(resMap); i++ {
		res = append(res, resMap[i])
	}
	return res
}
