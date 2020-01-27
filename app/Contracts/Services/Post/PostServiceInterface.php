<?php

namespace App\Contracts\Services\Post;

interface PostServiceInterface
{
  //get post list
  public function getPostList();
  
  //create post
  public function createPost(array $data);

   //delete post
   public function deletePost($id);

   //search post
   public function searchPost($searchdata);
}
