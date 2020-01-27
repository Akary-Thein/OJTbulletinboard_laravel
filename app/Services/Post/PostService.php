<?php

namespace App\Services\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\Contracts\Services\Post\PostServiceInterface;

class PostService implements PostServiceInterface
{
    protected $postDao;

    /**
     * Class Constructor
     * @param OperatorPostDaoInterface
     * @return
     */
    public function __construct(PostDaoInterface $postDao)
    {
        $this->postDao = $postDao;
    }

    /**
     * Get Post List
     * @param Object
     * @return $postList
     */
    public function getPostList()
    {
        return $this->postDao->getPostList();
    }

    public function createPost(array $data)
    {
        return $this->postDao->createPost($data);
    }

    public function deletePost($id)
    {
        return $this->postDao->deletePost($id);
    }

    public function searchPost($searchdata)
    {
        return $this->postDao->searchPost($searchdata);
    }

}
