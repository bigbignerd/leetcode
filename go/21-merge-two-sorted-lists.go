package main

/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */
func mergeTwoLists(l1 *ListNode, l2 *ListNode) *ListNode {
	head := new(ListNode)

	temp := head

	for l1 != nil && l2 != nil {
		if l1.Val < l2.Val {
			(*temp).Next = &ListNode{Val: l1.Val}
			l1 = l1.Next
		} else {
			(*temp).Next = &ListNode{Val: l2.Val}
			l2 = l2.Next
		}
		temp = temp.Next
	}
	for l1 != nil {
		(*temp).Next = &ListNode{Val: l1.Val}
		temp = temp.Next
		l1 = l1.Next
	}
	for l2 != nil {
		(*temp).Next = &ListNode{Val: l2.Val}
		temp = temp.Next
		l2 = l2.Next
	}
	return (*head).Next
}
