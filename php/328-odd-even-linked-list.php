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
    public function oddEvenList($head) 
    {
        $dummy1 = new ListNode(0);
        $dummy2 = new ListNode(0);
        //odd list
        $node1 = $dummy1;
        //even list
        $node2 = $dummy2;
        $count = 1;
        while ($head != null) {
            if ($count & 1) {
                $node1->next = $head;
                $node1 = $node1->next;
            } else {
                $node2->next = $head;
                $node2 = $node2->next;
            }
            $head = $head->next;
            $count++;
        }
        $node2->next = null;
        $node1->next = $dummy2->next;
        return $dummy1->next;
    }
}
