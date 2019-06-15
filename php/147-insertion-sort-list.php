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
	public function insertionSortList($head) {
        $dummy = new ListNode(0);
        $dummy->next = $head;
        while ($head->next != null) {
            if ($head->next->val < $head->val) {
                $next2 = $head->next->next;
                $node = $dummy;
                while ($node->next->val < $head->next->val) {
                    $node = $node->next;
                }
                $head->next->next = $node->next;
                $node->next = $head->next;
                $head->next = $next2;
            } else {
                $head = $head->next;
            }
        }
        return $dummy->next;
    }
    /**
     * @param ListNode $head
     * @return ListNode
     */
    public function insertionSortListV2($head) 
	{
        $newHead = null;
        while ($head != null) {
            $newHead = $this->insertNode($newHead, $head->val); 
            $head = $head->next;
        }
        return $newHead;
    }
    private function insertNode($head, $val) 
	{
        $newNode = new ListNode($val);
        $node = $head;
        if ($node == null) {
            $node = $newNode;
            return $node;
        }

        $last = null;
		$hasInsert = false;
        while ($node != null) {
            if ($node->val < $val) {
                $last = $node;
                $node = $node->next;
            } else {
                $newNode->next = $node;
				$hasInsert = true;
                if ($last) {
                    $last->next = $newNode;                    
                } else {
                    return $newNode;
                }
                break;
            }
        }
		if (!$hasInsert) {
			$last->next = $newNode;
		}
        return $head;
    }
}
//test
$head = initList([-1, 5, 3, 4, 0]);
$s = new Solution();
$h = $s->insertionSortList($head);
showList($h);
