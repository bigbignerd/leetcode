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
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    public function addTwoNumbers($l1, $l2) 
    {
        $stack1 = $stack2 = [];
        $head = null;
        while ($l1 != null) {
            array_push($stack1, $l1->val);
            $l1 = $l1->next;
        }
        while ($l2 != null) {
            array_push($stack2, $l2->val);
            $l2 = $l2->next;
        }
        $carry = 0;
        while (!empty($stack1) || !empty($stack2)) {
            $num1 = $num2 = 0;
            if (!empty($stack1)) {
                $num1 = array_pop($stack1);                
            }
            if (!empty($stack2)) {
                $num2 = array_pop($stack2);
            }
            $number = ($num1+$num2+$carry) % 10;
            $carry = intval(($num1+$num2+$carry)/10);
            $node = new ListNode($number);
            if ($head == null) {
                $head = $node;
            } else {
                $node->next = $head;
                $head = $node;
            }
        }
        if ($carry) {
            $node = new ListNode($carry);
            $node->next = $head;
            $head = $node;
        }
        return $head;
    }
}
