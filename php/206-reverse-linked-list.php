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
    public function reverseList($head) 
    {
        $cur = $head;
        $prev = null;
        while ($cur->next != null) {
            $next = $cur->next;
            $cur->next = $prev;
            $prev = $cur;
            $cur = $next;
        }
        $cur->next = $prev;
        return $cur;
    }
}
