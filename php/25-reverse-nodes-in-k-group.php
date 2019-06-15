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
     * @param Integer $k
     * @return ListNode
     */
    public function reverseKGroup($head, $k) 
	{
        if ($k == 0) {
            return $head;
        }
        $stack = [];
        $dummy = new ListNode(0);
        $node = $dummy;
        while ($head != null) {
            $next = $head->next;
            $head->next = null;
            array_push($stack, $head);
            if (count($stack) == $k) {
                while ($stack) {
                    $node->next = array_pop($stack);                    
                    $node = $node->next;
                }
            }
            $head = $next;
        }
        if (!empty($stack)) {
            $count = count($stack);
            for ($i = 0; $i < $count; $i++) {
                $node->next = $stack[$i];                    
                $node = $node->next;
            }
        }
        return $dummy->next;
    }
}
