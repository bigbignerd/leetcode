<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution 
{
    /**
     * @param ListNode $head
     * @param Integer $n
     * @return ListNode
     */
    public function removeNthFromEnd($head, $n) 
	{
        $dummy = new ListNode(0);
        $dummy->next = $head;
        $node = $dummy;
        $count = 0;
        $p1 = $p2 = $dummy;
        while ($node->next && $count < $n) {
            $p2 = $node->next;
            $node = $node->next;
            $count++;
        }
        while ($p2->next != null) {
            $p1 = $p1->next;
            $p2 = $p2->next;
        }
        if ($p1->next) {
            $p1->next = $p1->next->next;
        }
        return $dummy->next;
    }
}
