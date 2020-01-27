<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Contracts\Services\Post\PostServiceInterface;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Exports\PostsExport;
use App\Imports\PostsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    private $postInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PostServiceInterface $postInterface)
    {
        $this->middleware('auth');
        $this->postInterface = $postInterface;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $postList = $this->postInterface->getPostList();
        if(count($postList)>0)
        {
            return view('posts.post_list', [
                'postList' => $postList,
            ]);  
        }
        else
        {
            return view('posts.post_list')->with('error','No Posts found!!');  
        }
    }

    public function create(Request $request)
    {
        return view('posts.create_post');
    }

    public function confirmPostCreateForm(PostRequest $request)
    {
        $validated = $request->validated();

        return view('posts.create_post_confirm', [
            'post' => $validated,
        ]);  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        switch($request['action']){
            case 'create':
                $this->postInterface->createPost([
                    'title' => $request['title'],
                    'description' => $request['description'],
                    'create_user_id' => auth()->user()->id,
                    'updated_user_id' => auth()->user()->id,
                ]);
        
                return redirect()->route('posts.index');
            break;
            case 'cancel':
                return redirect()->route('posts.create')->withInput();
            break;
        }          
    }
 
    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $post    =    Post::find($id);
    //     return view('posts.show_detail', compact('post'));
    // }

    // public function show($id)
    // {
    //   $post = Post::findOrFail($id);
    //   dd($post);
    //   return redirect('posts');
    // //   return view('posts.show_detail', compact('post'));
    //return view('posts.post_list', compact('posts'));
    // }

    public function show($id)
    {
        $posts = Post::find($id);
        dd($posts);
        return view('posts.post_list', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.update_post', compact('post'));
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = $request->validated();
        Post::where('id', $id)->update($post);

     return redirect()->route('posts.index')
                     ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        $this->postInterface->deletePost($id);
        return redirect()->route('posts.index');
    }

    public function searchPost(Request $request)
    {
        $postList = $this->postInterface->searchPost($request); 
        if(count($postList)>0){
            return view('posts.post_list', [
            'postList' => $postList,
            ]);
        }
        else{
            return view('posts.post_list')->with('errors','No Posts found. Try to search again !');
        }
    }

    /**
 * Get the actions available for the resource.
 *
 * @param  \Illuminate\Http\Request $request
 *
 * @return array
 */
public function actions(Request $request)
{
    return [
        (new DownloadExcel)->withHeadings(),
    ];
}

 // Export data
 public function downloadPost(Request $request){

       return Excel::download(new PostsExport, "post-list-" .date('d-m-Y') .".xlsx");    
 
}

/**
    * @return \Illuminate\Support\Collection
    */
    public function uploadPostForm()
    {
       return view('posts.upload_csv');
    }

    public function uploadPost() 
    {
        Excel::import(new PostsImport,request()->file('import_file'));
           
        return redirect()->route('posts.index');
    }

}
