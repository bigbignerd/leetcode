package main

var wordMap map[string][]string
var distanceMap map[string]int

func findLadders(beginWord string, endWord string, wordList []string) [][]string {
	// beginWord = "teach"
	// endWord = "place"
	// wordList = []string{"peale","wilts","place","fetch","purer","pooch","peace","poach","berra","teach","rheum","peach"}
	wordMap = initWordMap(wordList)
	distanceMap = bfs(beginWord, endWord)
	result := [][]string{}
	if _, ok := distanceMap[endWord]; ok {
		dfs(beginWord, endWord, []string{beginWord}, &result)
	}
	fmt.Print(result, endWord)
	return result
}

func initWordMap(wordList []string) map[string][]string {
	wordMap := make(map[string][]string)
	for _, word := range wordList {
		for i, _ := range word {
			key := word[0:i] + "_" + word[i+1:]
			wordMap[key] = append(wordMap[key], word)
		}
	}
	return wordMap
}

func bfs(beginWord, endWord string) map[string]int {
	distance := make(map[string]int)
	distance[beginWord] = 0
	queue := []string{beginWord}
	for len(queue) > 0 {
		w := queue[0]
		queue = queue[1:]
		nextWords := getNextWords(w)
		for _, v := range nextWords {
			if _, ok := distance[v]; !ok {
				distance[v] = distance[w] + 1
				queue = append(queue, v)
			}
		}
	}
	return distance
}
func dfs(currentWord, endWord string, path []string, result *[][]string) {
	if currentWord == endWord {
		*result = append(*result, path)
		return
	}
	nextWords := getNextWords(currentWord)
	for _, word := range nextWords {
		if distanceMap[word]-1 == distanceMap[currentWord] {
			newPath := make([]string, len(path))
			// 坑坑坑,slice 公用底层数组，如果这里不copy
			// 直接传append(path, word)，result结果会随着path的改变而改变
			copy(newPath, path)
			newPath = append(newPath, word)
			dfs(word, endWord, newPath, result)
			newPath = path
		}
	}
}
func getNextWords(word string) map[string]string {
	nextWordsMap := make(map[string]string)
	for i, _ := range word {
		key := word[0:i] + "_" + word[i+1:]
		if _, ok := wordMap[key]; ok {
			for _, w := range wordMap[key] {
				if w == word {
					continue
				}
				nextWordsMap[w] = w
			}
		}
	}
	return nextWordsMap
}
