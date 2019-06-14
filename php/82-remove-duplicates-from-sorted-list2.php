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
class Solution 
{
    /**
     * @param ListNode $head
     * @return ListNode
     */
    public function deleteDuplicates($head) 
    {
        $dummy = new ListNode(0);
        $node = $dummy;
        $node->next = $head;
        while ($node->next != null) {
            if ($node->next->next != null && $node->next->val == $node->next->next->val) {
                $val = $node->next->val;
                $temp = $node->next;
                while ($temp != null && $temp->val == $val) {
                    $temp = $temp->next;
                }
                $node->next = $temp;
            } else {
                $node = $node->next;
            }
        }
        return $dummy->next;
    }
}

//test
$head = initList([0,0,0,0,0]);
$s = new Solution();
$head = $s->deleteDuplicates($head);
showList($head);

