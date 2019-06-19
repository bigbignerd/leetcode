<?php
class Solution {

    /**
     * @param String $beginWord
     * @param String $endWord
     * @param String[] $wordList
     * @return Integer
     */
    function ladderLength($beginWord, $endWord, $wordList) {
        $visited = [];
        $dict = [];
        $queue = [[$beginWord, 1]];

        // init dict
        foreach ($wordList as $w) {
            $len = strlen($w);
            for ($i = 0; $i < $len; $i++) {
                $dkey = substr($w, 0, $i) . '*' . substr($w, $i+1);
                $dict[$dkey][] = $w;
            }
        }
        //BF
        while ($queue) {
            [$word, $step] = array_shift($queue);
            //replace one character
            $len = strlen($word);
            for ($i = 0; $i < $len; $i++) {
                $dkey = substr($word, 0, $i) . '*' . substr($word, $i+1);
                if (!isset($dict[$dkey])) {
                    continue;
                }
                foreach ($dict[$dkey] as $w) {
                    if ($w == $endWord) {
                        return $step + 1;
                    }
                    if (!isset($visited[$w])) {
                        array_push($queue, [$w, $step+1]);
                        $visited[$w] = 1;
                    }
                }
            }
        }
        return 0;
    }
}
$begin = 'nanny';
$end = 'aloud';
$list = [];
echo (new Solution())->ladderLength($begin, $end, $list);
