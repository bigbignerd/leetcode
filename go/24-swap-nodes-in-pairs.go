package main

/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */
func swapPairs(head *ListNode) *ListNode {
	if head == nil || head.Next == nil {
		return head
	}
	dummy := &ListNode{Next: head}
	node := dummy
	for node.Next != nil {
		if node.Next.Next != nil {
			n1 := node.Next
			n2 := node.Next.Next
			n3 := node.Next.Next.Next
			node.Next = n2
			n2.Next = n1
			n1.Next = n3
			node = node.Next.Next
		} else {
			break
		}

	}
	return dummy.Next
}
