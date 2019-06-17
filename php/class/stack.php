<?php
class Stack
{
    private $data = [];
    private $count = 0;
    //insert to stack
    public function insert($val)
    {
        array_push($this->data, $val);
        $this->count++;
    }
    //out of the stack
    public function pop()
    {
        if ($this->count == 0) {
            throw new \Exception("empty stack");    
        }
        $this->count--;
        return array_pop($this->data);
    }
    //show stack top ele
    public function top()
    {
        return $this->data[$this->count-1];
    }
}
