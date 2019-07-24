package main

/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */
func insertionSortList(head *ListNode) *ListNode {
	if head == nil {
		return head
	}
	dummy := &ListNode{Next: head}
	for head.Next != nil {
		if head.Next.Val < head.Val {
			next2 := head.Next.Next
			node := dummy
			for node.Next.Val < head.Next.Val {
				node = node.Next
			}
			head.Next.Next = node.Next
			node.Next = head.Next
			head.Next = next2
		} else {
			head = head.Next
		}
	}
	return dummy.Next
}
