package main

/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */
func deleteDuplicates(head *ListNode) *ListNode {
	if head == nil {
		return head
	}
	dummy := &ListNode{Next: head}
	node := dummy.Next
	for node.Next != nil {
		val := node.Val
		if val == node.Next.Val {
			temp := node.Next
			for temp != nil && temp.Val == val {
				temp = temp.Next
			}
			node.Next = temp
		} else {
			node = node.Next
		}
	}
	return dummy.Next
}
