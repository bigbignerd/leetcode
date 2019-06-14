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
     * @param Integer $x
     * @return ListNode
     */
    public function partition($head, $x) 
    {
        if ($head->next == null) {
            return $head;
        }
        if ($head->val >= $x) {
            $temp = $head;
            $tempprev = null;
            while ($temp != null && $temp->val >= $x) {
                $tempprev = $temp;
                $temp = $temp->next;
            }
            if ($temp != null) {
                $tempprev->next = $temp->next;
                $temp->next = $head;
                $head = $temp;
            }
        }
        $dummy = new ListNode(0);
        $dummy->next = $head;
        $cur = $head;
        $prev = null;
        while ($cur != null) {
            if ($cur->val < $x) {
                $prev = $cur;
                $cur = $cur->next;
            } else {
                $temp = $cur;
                $last = null;
                //search first node that less than $x
                while ($temp != null && $temp->val >= $x) {
                    $last = $temp;
                    $temp = $temp->next;
                }
                //swap it
                if ($temp != null) {
                    $prev->next = $temp;
                    $last->next = $temp->next;
                    $temp->next = $cur;
                    $cur = $temp;
                } else {
                    break;
                }
            }
        }
        return $head;
    }
    //best implentation
    public function partitionV2($head, $x)
    {
        $dummy1 = new ListNode(0);
        $dummy2 = new ListNode(0);
        $node1 = $dummy1;
        $node2 = $dummy2;
        while ($head != null) {
            if ($head->val < $x) {
                $node1->next = $head;
                $node1 = $node1->next;
            } else {
                $node2->next = $head;
                $node2 = $node2->next;
            }
            $head = $head->next;
        }
        //cut link
        $node2->next = null;
        $node1->next = $dummy2->next;
        return $dummy1->next;
    }
}
