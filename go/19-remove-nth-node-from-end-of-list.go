package main

/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */
func removeNthFromEnd(head *ListNode, n int) *ListNode {
	if head == nil {
		return head
	}
	dummy := &ListNode{Next: head}
	p1 := head
	p2 := head
	pre := dummy
	for n-1 > 0 {
		p2 = p2.Next
		n--
	}
	for p2.Next != nil {
		pre = p1
		p1 = p1.Next
		p2 = p2.Next
	}
	pre.Next = p1.Next
	return dummy.Next
}
