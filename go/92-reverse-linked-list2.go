package main

/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */
func reverseBetween(head *ListNode, m int, n int) *ListNode {
	if m == n {
		return head
	}
	dummy := &ListNode{Next: head}
	pre := dummy
	// i = 0 because start at dummy
	for i := 0; i < m-1; i++ {
		pre = pre.Next
	}
	//swap n-m times
	current := pre.Next
	for i := 0; i < n-m; i++ {
		next := current.Next
		current.Next = next.Next
		next.Next = pre.Next
		pre.Next = next
	}

	return dummy.Next
}
