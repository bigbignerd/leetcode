package main

func searchMatrix(matrix [][]int, target int) bool {
    row := len(matrix)
    if row == 0 {
        return false
    }
    col := len(matrix[0])
    right := row * col - 1
    left := 0
    return findRow(matrix, target, left, right)
}
func findRow(matrix [][]int, target, left, right int) bool {
    if left > right {
        return false
    }
    var row, col, mid int
    mid = (left + right) / 2
    row = mid / len(matrix[0])
    col = mid - row * len(matrix[0])
    if matrix[row][col] == target {
        return true
    }
    if matrix[row][col] < target {
        return findRow(matrix, target, mid + 1, right)
    } else {
        return findRow(matrix, target, left, mid - 1)
    }
}
