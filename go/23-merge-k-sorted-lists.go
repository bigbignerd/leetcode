package main

/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */
type ListValue []int

func (lv ListValue) Len() int {
	return len(lv)
}
func (lv ListValue) Swap(i, j int) {
	lv[i], lv[j] = lv[j], lv[i]
}

func (lv ListValue) Less(i, j int) bool {
	return lv[i] < lv[j]
}

func mergeKLists(lists []*ListNode) *ListNode {
	if len(lists) == 0 {
		return nil
	}
	values := ListValue{}
	for _, v := range lists {
		n := v
		for n != nil {
			values = append(values, n.Val)
			n = n.Next
		}
	}
	sort.Sort(values)
	dummy := &ListNode{}
	node := dummy
	for _, v := range values {
		node.Next = &ListNode{Val: v}
		node = node.Next
	}
	return dummy.Next
}
