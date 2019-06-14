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
     * @param Integer $val
     * @return ListNode
     */
    public function removeElements($head, $val) 
    {
        $dummy = new ListNode(0);
        $node = $dummy;
        $node->next = $head;
        while ($node->next != null) {
            if ($node->next->val == $val) {
                $node->next = $node->next->next;
            } else {
                $node = $node->next;
            }
        }
        return $dummy->next;
    }
}
