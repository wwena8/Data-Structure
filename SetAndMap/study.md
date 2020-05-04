# 集合与映射

1 集合

    定义：无重复数据
    
2 采用BST实现集合

    BST自带无重复添加

3 采用链表实现集合

    链表需要去重
    
4 时间复杂度比较

                        LinkedListSet             BSTSet

    add                     O(n)                  O(log n)
    
    contains                O(n)                  O(log n)
    
    remove                  O(n)                  O(log n)
    
    BST退化成链表复杂度就升高
    
5 映射

    字典          单词 --> 释意       key->value
    
    key是唯一的，不允许两个结点key相同