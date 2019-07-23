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
	n := dummy
	for n.Next != nil {
		temp := n.Next
		if temp.Next != nil && temp.Val == temp.Next.Val {
			val := temp.Val
			for temp.Next != nil && val == temp.Next.Val {
				temp = temp.Next
			}
			n.Next = temp.Next
		} else {
			n = n.Next
		}

	}
	return dummy.Next
}
