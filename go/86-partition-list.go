package main

/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */
func partition(head *ListNode, x int) *ListNode {
	dummy1 := &ListNode{}
	dummy2 := &ListNode{}
	node1 := dummy1
	node2 := dummy2
	for head != nil {
		if head.Val < x {
			node1.Next = head
			node1 = node1.Next
		} else {
			node2.Next = head
			node2 = node2.Next
		}
		head = head.Next
	}
	node2.Next = nil
	node1.Next = dummy2.Next
	return dummy1.Next
}
