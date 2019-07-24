package main

/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */
func reverseKGroup(head *ListNode, k int) *ListNode {
	if head == nil || k == 0 {
		return head
	}
	dummy := &ListNode{}
	node := dummy
	stack := []*ListNode{}

	for head != nil {
		next := head.Next
		head.Next = nil
		stack = append(stack, head)
		if len(stack) == k {
			for len(stack) > 0 {
				l := len(stack)
				node.Next = stack[l-1]
				stack = stack[0 : l-1]
				node = node.Next
			}
		}
		head = next
	}
	for len(stack) > 0 {
		node.Next = stack[0]
		node = node.Next
		stack = stack[1:]
	}
	return dummy.Next
}
