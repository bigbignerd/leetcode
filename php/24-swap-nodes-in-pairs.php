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
     * @return ListNode
     */
    public function swapPairs($head) 
	{
        $dummy = new ListNode(0);
        $dummy->next = $head;
        $node = $dummy;
        while ($node->next != null) {
            if (isset($node->next->next)) {
                $next3 = $node->next->next->next;
                $next2 = $node->next->next;
                $next1 = $node->next;
                $node->next = $next2;
                $next2->next = $next1;
                $next1->next = $next3;
            }
            $node = $node->next->next;
        }
        return $dummy->next;
    }
}
