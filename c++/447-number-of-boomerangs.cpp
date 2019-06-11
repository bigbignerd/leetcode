#include <iostream>
#include <vector>
#include <unordered_map>

class Solution {
public:
    int numberOfBoomerangs(vector<vector<int>>& points) {
        int result = 0;
        for (int i = 0; i < points.size(); i++) {
            unordered_map<int,int> record;
            for (int j = 0; j < points.size(); j++) {
                if (j != i) {
                    record[dist(points[i], points[j])]++;
                }
            }
            for (unordered_map<int,int>::iterator iter = record.begin(); iter != record.end(); iter++) {
                result += iter->second*(iter->second-1);
            }
        }
        return result;
    }
private:
    int dist(const pair<int,int> &pa, const pair<int,int> &pb) {
        return (pa.first - pb.first) * (pa.first - pb.first) + (pa.second - pb.second) * (pa.second - pb.second);
    }
};
