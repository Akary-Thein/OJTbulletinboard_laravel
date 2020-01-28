<?php

namespace App\Dao\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\Models\Post;
use App\Models\User;

class PostDao implements PostDaoInterface
{
    /**
     * Get Operator List
     * @param Object
     * @return $operatorList
     */
    public function getPostList()
    {
        if (auth()->user()->type == 0) {
            return Post::latest()->paginate(10);
        } else {
            $currentuser = auth()->user()->id;
            return Post::where('create_user_id', $currentuser)
                        ->latest()
                        ->paginate(10);
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

    public function searchPost($searchdata)
    {
        $search = trim($searchdata->get('search'));
        $currentuser = auth()->user()->id;
        if (auth()->user()->type == 0) {
            return Post::where('title', 'like', '%' . $search . '%')
                    ->orwhere('description', 'like', '%' . $search . '%')  
                    ->orWhereHas('user', function ($query) use ($search) {
                        $query->where('name', 'like', '%' .$search. '%');
                    })
                    ->latest()
                    ->paginate(10)
                    ->withPath('?search=' . $search);
        }
        else{
            return Post::where('create_user_id', 'like', '%' . $currentuser . '%')
                    ->where('title', 'like', '%' . $search . '%')
                    ->orwhere('description', 'like', '%' . $search . '%') 
                    ->latest()
                    ->paginate(10)
                    ->withPath('?search=' . $search);
        }  
             
    }


}
