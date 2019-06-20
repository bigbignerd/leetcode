<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class MinProrityQueue extends \SplPriorityQueue 
{
    public function compare($a, $b) 
    {
        if ($a == $b) {
            return 0;
        }
        return $a < $b? 1 : -1;
    }
}
class Solution 
{
    //use priority queue
    public function mergeKLists($lists)
    {
        $q = new MinProrityQueue();
        foreach ($lists as $list) {
            $list && $q->insert($list, $list->val);
        }
        $dummy = new ListNode(0);
        $node = $dummy;
        while (!$q->isEmpty()) {
            $top = $q->extract();
            $next = $top->next;
            $node->next = $top;
            $node = $node->next;
            $next && $q->insert($next, $next->val);
        }
        return $dummy->next;
    }
    //only sort once
    public function mergeKListsFastest($lists)
    {
        $data = [];
        foreach ($lists as $list) {
            while ($list) {
                $data[] = $list->val;
                $list = $list->next;
            }
        }
        sort($data);
        $dummy = new ListNode(0);
        $node = $dummy;
        foreach ($data as $n) {
            $node->next = new ListNode($n);
            $node = $node->next;
        }
        return $dummy->next;
    }
    /**
     * first implementation, slow, order of linked lists is not used
     * @param ListNode[] $lists
     * @return ListNode
     */
    public function mergeKLists2($lists) 
    {
        $dummy = new ListNode(0);
        $dummy->next = $lists[0];
        $count = count($lists);
        for ($i = 1; $i < $count; $i++) {
            $inode = $lists[$i];
            $node = $dummy;
            while ($inode && $node->next) {
                if ($node->next->val < $inode->val) {
                    $node = $node->next;
                } else {
                    $inext = $inode->next;
                    $next = $node->next;
                    $inode->next = $next;
                    $node->next = $inode;
                    $inode = $inext;
                    $node = $node->next;
                }
            }
            if ($inode) {
                $node->next = $inode;
            }
        }
        return $dummy->next;
    }
}
