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
     * @param Integer $m
     * @param Integer $n
     * @return ListNode
     */
    public function reverseBetween($head, $m, $n) 
    {
        if ($head == null || $head->next == null) {
            return $head;
        }
        //dummy node is important
        $dummy = new ListNode(0);
        $dummy->next = $head;
        $head = $dummy;
        
        $prev = null;
        $count = 0;
        while ($count < $m-1) {
            $head = $head->next;
            $count++;
        }
        $prev = $head->next;
        $cur = $prev->next;
        // n-2 because prev = m cur = m+1
        while ($count <= $n-2) {
            $next = $cur->next;
            $cur->next = $prev;
            $prev = $cur;
            $cur = $next;
            $count++;
        }
        $head->next->next = $cur;
        $head->next = $prev;
        $head = $dummy->next;
        
        return $head;
    }
}
