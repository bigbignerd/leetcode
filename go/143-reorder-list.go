package main

/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */
func reorderList(head *ListNode) {
	if head == nil || head.Next == nil {
		return
	}
	slow, fast, prev := head, head, head
	//find middle
	for fast != nil && fast.Next != nil {
		prev = slow
		slow = slow.Next
		fast = fast.Next.Next
	}
	l1 := head
	l2 := slow
	prev.Next = nil
	l2 = reverse(slow)
	newHead := &ListNode{}
	node := newHead
	for l1 != nil && l2 != nil {
		node.Next = l1
		l1 = l1.Next
		node = node.Next
		node.Next = l2
		l2 = l2.Next
		node = node.Next
	}
	for l2 != nil {
		node.Next = l2
		node = node.Next
		l2 = l2.Next
	}
	head = newHead.Next
	return
}

func reverse(node *ListNode) *ListNode {
	var prev *ListNode
	for node != nil {
		next := node.Next
		node.Next = prev
		prev = node
		node = next
	}
	return prev
}
