package main

/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */
func rotateRight(head *ListNode, k int) *ListNode {
	if head == nil || k == 0 || head.Next == nil {
		return head
	}
	dummy := &ListNode{Next: head}
	p1, p2 := dummy, dummy
	node := dummy
	var end *ListNode
	count := 0
	// find end and count node
	for node.Next != nil {
		end = node.Next
		node = node.Next
		count++
	}
	if k%count == 0 {
		return head
	}
	position := count - (k % count)
	for position > 0 {
		p2 = p2.Next
		position--
	}
	p1Next := p1.Next
	p1.Next = p2.Next
	end.Next = p1Next
	p2.Next = nil

	return dummy.Next

}
