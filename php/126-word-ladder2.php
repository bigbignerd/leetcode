<?php
class Solution 
{
    private $wordList = [];
    private $distances = [];
    private $paths = [];

    /**
     * @param String $beginWord
     * @param String $endWord
     * @param String[] $wordList
     * @return String[][]
     */
    public function findLadders($beginWord, $endWord, $wordList) 
	{
        if (empty($beginWord) || empty($endWord) || empty($wordList)) {
            return $this->paths;
        }
        $this->initList($wordList, $beginWord, $endWord);
        $this->BFS($beginWord, $endWord);
        if (isset($this->distances[$endWord])) {
            $this->DFS($beginWord, $endWord, [$beginWord]);
        }
        return $this->paths;
    }
    public function initList($wordList, $beginWord, $endWord) 
	{
        $len = strlen($beginWord);
        foreach ($wordList as $w) {
            if ($w == $beginWord) {
                continue;
            }
            for ($i = 0; $i < $len; $i++) {
                $dkey = substr($w, 0, $i) .'_'. substr($w, $i+1);
                $this->wordList[$dkey][] = $w;
            }
        }
    }
    public function BFS($beginWord, $endWord) 
	{
        $distances[$beginWord] = 0;
        $queue = [$beginWord];
        while ($queue) {
            $word = array_shift($queue);
            $nextWords = $this->getNextWords($word);
            foreach ($nextWords as $w) {
                if (!isset($distances[$w])) {
                    $distances[$w] = $distances[$word] + 1;
                    array_push($queue, $w);
                }
            }
        }
        $this->distances = $distances;
    }
    public function DFS($current, $target, $path) 
	{
        if ($current == $target) {
            $this->paths[] = $path;
            return ;
        }
        $nextWords = $this->getNextWords($current);
        
        foreach ($nextWords as $nword) {
            if ($this->distances[$nword] - 1 === $this->distances[$current]) {
                $this->DFS($nword, $target, array_merge($path, [$nword]));
            }
        }
    }
    public function getNextWords($word) 
	{
        $words = [];
        $len = strlen($word);
        for ($i = 0; $i < $len; $i++) {
            $w = substr($word, 0, $i) .'_'. substr($word, $i+1);
            if (isset($this->wordList[$w])) {
                foreach ($this->wordList[$w] as $ws) {
                    if ($ws != $word) {
                        $words[] = $ws;
                    }
                }
            }
        }
        return array_unique($words);
    }
}
