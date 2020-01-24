<?php

namespace App\Contracts\Dao\Post;

interface PostDaoInterface
{
  //get post list
  public function getPostList();

  //create post
  public function createPost(array $data);

  //delete post
  public function deletePost($id);

  //search post
  public function searchPost(array $data);
}
