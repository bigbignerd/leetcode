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
    function __construct($val) { $this->val = $val; }
}

function initList($arr)
{
    $head = new ListNode($arr[0]);    
    $cur = $head;
    for ($i=1; $i<count($arr); $i++) {
        $node = new ListNode($arr[$i]);    
        $cur->next = $node;
        $cur = $cur->next;
    }
    return $head;
}

function showList($head)
{
    $root = $head;
    while ($root != null) {
        echo $root->val . '->';    
        $root = $root->next;
    }
}
