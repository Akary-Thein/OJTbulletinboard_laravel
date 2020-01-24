<?php

namespace App\Dao\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\Models\Post;

class PostDao implements PostDaoInterface
{
    /**
     * Get Operator List
     * @param Object
     * @return $operatorList
     */
    public function getPostList()
    {
        if(auth()->user()->type==0){
            return Post::latest()->paginate(10);
        }
        else
        {
            $currentuser = auth()->user()->id;
            return Post::where('create_user_id', $currentuser)->latest()->paginate(10);
        }
    }

    public function createPost(array $data)
    {
        return Post::create($data);
    }

    public function deletePost($id)
    {
        return Post::where('id', $id)->first()->delete();
    }

    public function searchPost(array $data)
    {
        $search = trim($data->get('search'));
        return Post::where('title', 'like', '%' . $search . '%')
        ->orwhere('description', 'like', '%' . $search . '%')
        ->orwhere('create_user_id', 'like', '%' . $search . '%')
        ->latest()
        ->paginate(10)
        ->withPath('?search=' . $search);
    }
    
}


