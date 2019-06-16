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
	//faster
	public function rotateRight($head, $k) 
	{
        if (!$head || $k == 0) {
            return $head;
        }
        $dummy = new ListNode(0);
        $dummy->next = $head;
        $node = $dummy;
        $p1 = $p2 = $dummy;
        $end = null;
        $count = 0;
        while ($node->next) {
            $end = $node->next;
            $node = $node->next;
            $count++;
        }
        if ($k % $count == 0) {
            return $head;
        }
        $position = $count - ($k % $count);
        while ($position > 0) {
            $p2 = $p2->next;
            $position--;
        }
        $p1Next = $p1->next;
        $p1->next =$p2->next;
        $end->next = $p1Next;
        $p2->next = null;
        
        return $dummy->next;
    }
    /**
	 * slow time limit
     * @param ListNode $head
     * @param Integer $k
     * @return ListNode
     */
    public function rotateRightV2($head, $k) 
	{
        $dummy = new ListNode(0);
        $dummy->next = $head;
        $p1 = $dummy;
        while ($k) {
            $p2 = $this->getLastPrev($dummy);
            $first = $p1->next;
            $last = $p2->next;
            if ($last == $first) {
                break;
            }
            $last->next = $first;
            $p1->next = $last;
            $p2->next = null;
            $k--;
        }
        return $dummy->next;
    }
    public function getLastPrev($head) 
	{
        $prev = $head;
        while ($prev->next && $prev->next->next != null) {
            $prev = $prev->next;
        }
        return $prev;
    }
}
