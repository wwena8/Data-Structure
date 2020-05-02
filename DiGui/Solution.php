<?php
/**
 * Created by PhpStorm.
 * User: zhaoge
 * Date: 2020/5/2
 * Time: 5:29 下午
 */
namespace DiGui;

use LinkList\Node;

class Solution
{
    /**
     * @param ListNode $head
     * @param $val
     * @return ListNode|null
     */
    public function removeElement($head, $val)
    {
        while ($head != null && $head->val == $val) {
            $delNode = $head;
            $head = $head->next;
            $delNode->next = null;
        }
        if ($head == null)
            return null;
        $prev = $head;
        while ($prev->next != null) {
            if ($prev->next->val == $val) {
                /**
                 * @var ListNode $delNode
                 */
                $delNode = $prev->next;
                $prev->next = $delNode->next;
                $delNode->next = null;
            } else {
                $prev = $prev->next;
            }
        }
    }
}