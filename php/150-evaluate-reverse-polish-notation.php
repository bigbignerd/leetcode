<?php
class Solution 
{
    /**
     * @param String[] $tokens
     * @return Integer
     */
    public function evalRPN($tokens) 
    {
        $stack = [];
        foreach ($tokens as $token) {
            if (is_numeric($token)) {
                array_push($stack, $token);
            } else {
                $num1 = array_pop($stack);
                $num2 = array_pop($stack);
                switch ($token) {
                    case '+':
                        array_push($stack, $num1+$num2);
                        break;
                    case '-':
                        array_push($stack, $num2-$num1);
                        break;
                    case '*':
                        array_push($stack, $num2*$num1);
                        break;
                    case '/':
                        array_push($stack, intval($num2/$num1));
                        break;
                    default:
                        throw new \Exception("wrong token.");
                }
            }
        }
        return array_pop($stack);
    }
}
