<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function show(Category $category, Request $request, Topic $topic)
    {
        // 读取与分类 ID 相关的话题，并按每页 20 条分页
        $topics = $topic->withOrder($request->order)->where('category_id', $category->id)->paginate(20);

        return view('topics.index', compact('topics', 'category'));
    }
}