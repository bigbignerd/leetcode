<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class ListNode 
{
    public $val = 0;
    public $next = null;
    public function __construct($val) 
    { 
        $this->val = $val; 
    }
}
class Solution 
{
    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    public function addTwoNumbers($l1, $l2) 
    {
        $next = 0;
        $listNode = $temp = null;
        while ($l1 != null || $l2 != null) {
            $l1Num = $l1 != null? $l1->val : 0;
            $l2Num = $l2 != null? $l2->val : 0;

            $sum = $l1Num + $l2Num + $next;
            $newNum = $sum % 10;
            $next = intval($sum / 10);

            $node = new ListNode($newNum);
            if (!$listNode) {
                $listNode = $temp = $node;
            } else {
                $temp->next = $node;
                $temp = $temp->next;
            }
            $l1 = $l1->next == null? null : $l1->next;
            $l2 = $l2->next == null? null : $l2->next;
        }
        if ($next) {
            $node = new ListNode($next);
            $temp->next = $node;
        }
        return $listNode;
    }
}
