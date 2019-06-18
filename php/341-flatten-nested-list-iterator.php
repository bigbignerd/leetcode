<?php

class NestedIterator
{
    private $data = [];
    private $size = 0;
    private $index = 0;

    public function init($list) 
    {
        foreach ($list as $k => $v) {
            if (is_array($v)) {
                $this->init($v);   
            } else {
                $this->data[] = $v;
                $this->size++;
            }
        }
    }
    public function next()
    {
        return $this->data[$this->index++];
    }

    public function hasNext()
    {
        return $this->index < $this->size? true : false;
    }
}

//test
$data = [
    [1, 2, 3],
    4,
    [5, [6, 7]]
];
$iter = new NestedIterator();
$iter->init($data);
while ($iter->hasNext()) {
    echo $iter->next();    
}
