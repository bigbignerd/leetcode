#include <stdio.h>
#include <stdlib.h>

struct ListNode {
    int val;
    struct ListNode *next;
};

/**
 * Definition for singly-linked list.
 * struct ListNode {
 *     int val;
 *     struct ListNode *next;
 * };
 */
void deleteNode(struct ListNode* node) 
{
    struct ListNode *last = NULL;
    while (node != NULL && node->next != NULL) {
        node->val = node->next->val;
        last = node;
        node = node->next;
    }
	if (last) {
    	last->next = NULL;
	}
}
struct ListNode* create_node(int val)
{
	struct ListNode *head = (struct ListNode *)malloc(sizeof(struct ListNode));
	//struct ListNode *next = (struct ListNode *)malloc(sizeof(struct ListNode));
	head->val = val;
	head->next = NULL;
	return head;
}

//test
int main(int argc, char *argv[])
{
	int a[4] = {1,2,3,4};
	int i;
	struct ListNode *head = create_node(a[0]);
	struct ListNode *node = head;
	struct ListNode* temp = NULL;
    struct ListNode* del;
	for (i=1; i<4; i++) {
		temp = create_node(a[i]);
		node->next = temp;
		node = node->next;
        if (i == 2)
            del = temp;
	}
	deleteNode(del);
	while (head != NULL) {
		printf("%d->", head->val);
		temp = head;
		head = head->next;
		free(temp);
	}
	return 0;
}



