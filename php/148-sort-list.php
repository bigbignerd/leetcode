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
    public function sortList($head) 
    {
        if (!$head || !$head->next) {
            return $head;
        }
        $slow = $fast = $prev = $head;
        while ($fast && $fast->next) {
            $prev = $slow;
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        //disconnect
        $prev->next = null;
        return $this->merge($this->sortList($head), $this->sortList($slow));
    }
    private function merge($l1, $l2)
    {
        $dummy = new ListNode(0);
        $node = $dummy;
        while ($l1 && $l2) {
            if ($l1->val < $l2->val) {
                $node->next = $l1;
                $l1 = $l1->next;
            } else {
                $node->next = $l2;
                $l2 = $l2->next;
            }
            $node = $node->next;
        }
        if ($l1) {
            $node->next = $l1;
        }
        if ($l2) {
            $node->next = $l2;
        }
        return $dummy->next;
    }
}
