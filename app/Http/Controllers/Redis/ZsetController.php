<?php

namespace App\Http\Controllers\Redis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class ZsetController extends Controller
{
    //
    public function index(Request $request)
    {
        //zset类型

        //创建
        //元素已存在，会更新排序值（score）
        var_dump(Redis::zadd('zset',11,'a'));

        //获取
        //根据开始结束索引获取集合中的元素,-1表示最后一个，排序值越大的越靠后，如果相等，则后添加的靠后
        Redis::zrange('zset',0,-1);
        //反转排序,与zrange效果相反
        Redis::zrevrange('zset',0,-1);
        //获取指定元素（a）的索引（下标）
        Redis::zrank('zset','a');
        //获取指定元素（a）的排序值
        Redis::zscore('zset','a');
        //获取有序集合中元素个数
        dump(Redis::zcard('zset'));
        //获取分值在指定范围的元素个数
        dump(Redis::zcount('zset',1,3));

        //删除
        //删除有序集合中一个或多个元素,删除ab元素
        Redis::zrem('zset','a','b');

        //修改
        //为有序集的元素（a）的排序值增加2
        Redis::zincrby('zset',2,'a');
    }
}
