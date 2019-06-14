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
    public function deleteDuplicates($head) 
    {
        $cur = $head;
        while ($cur != null) {
            $temp = $cur;
            while ($temp->next != null && $temp->next->val == $cur->val) {
                $temp = $temp->next;
            }
            $cur->next = $temp->next;
            $cur = $cur->next;
        }
        return $head;
    }
}
