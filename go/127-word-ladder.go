package main

type QueueWord struct {
	word string
	step int
}

func ladderLength(beginWord string, endWord string, wordList []string) int {
	visited := make(map[string]bool)
	dict := make(map[string][]string)
	var queue []QueueWord
	queue = append(queue, QueueWord{beginWord, 1})
	// init dict
	for _, word := range wordList {
		for i, _ := range word {
			key := word[0:i] + "_" + word[i+1:]
			dict[key] = append(dict[key], word)
		}
	}
	for len(queue) > 0 {
		w := queue[0]
		queue = queue[1:]
		word := w.word
		step := w.step
		for i, _ := range word {
			key := word[0:i] + "_" + word[i+1:]
			for _, dictword := range dict[key] {
				if endWord == dictword {
					return step + 1
				}
				if _, ok := visited[dictword]; !ok {
					queue = append(queue, QueueWord{dictword, step + 1})
					visited[dictword] = true
				}
			}
		}
	}
	return 0
}
