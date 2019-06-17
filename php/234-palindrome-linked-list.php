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
     * @return Boolean
     */
    public function isPalindrome($head) 
    {
        if (!$head || !$head->next) {
            return true;
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
        while ($l1 && $l2) {
            if ($l1->val != $l2->val) {
                return false;
            }
            $l1 = $l1->next;
            $l2 = $l2->next;
        }
        return true;
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
