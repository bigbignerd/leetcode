<?php
require("./class/listnode.php");
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2) {
        $dummy = new ListNode(0);
        $node = $dummy;
        while ($l1 && $l2) {
            $n1 = $l1->val;
            $n2 = $l2->val;
            if ($n1 <= $n2) {
                $node->next = new ListNode($n1);
                $l1 = $l1->next;
            } else {
                $node->next = new ListNode($n2);
                $l2 = $l2->next;
            }
            $node = $node->next;
        }
        while ($l1 != null) {
            $node->next = new ListNode($l1->val);
            $l1 = $l1->next;
            $node = $node->next;
        }
        while ($l2 != null) {
            $node->next = new Listnode($l2->val);
            $l2 = $l2->next;
            $node = $node->next;
        }
        
        return $dummy->next;
    }
}


//test
$l1 = initList([1,2,4]);
$l2 = initList([1,3,4]);
$s = new Solution();
$h = $s->mergeTwoLists($l1, $l2);
showList($h);
