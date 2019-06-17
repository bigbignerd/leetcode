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
     * @return NULL
     */
    public function reorderList($head) 
    {
        if (!$head || !$head->next) {
            return $head;
        }
        $fast = $slow = $prev = $head;
        while ($fast && $fast->next) {
            $prev = $slow;
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        $l2 = $prev->next;
        $l1 = $head;
        //cut
        $prev->next = null;
        //reverse l2
        $l2 = $this->reverse($l2);
        $newHead = new ListNode(0);
        $newHeadPtr = $newHead;
        while ($l1 && $l2) {
            $newHeadPtr->next = $l1;
            $l1 = $l1->next;
            $newHeadPtr = $newHeadPtr->next;
            $newHeadPtr->next = $l2;
            $l2 = $l2->next;
            $newHeadPtr = $newHeadPtr->next;
        }
        while ($l2) {
            $newHeadPtr->next = $l2;
            $newHeadPtr = $newHeadPtr->next;
            $l2 = $l2->next;
        }
        return $newHeadPtr->next;
    }

    public function reverse($head)
    {
        $node = $head;
        $prev = null;
        while ($node) {
            $next = $node->next;
            $node->next = $prev;
            $prev = $node;
            $node = $next;
        }
        return $prev;
    }
}
