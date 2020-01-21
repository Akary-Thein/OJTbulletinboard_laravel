<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Exports\PostsExport;
use App\Imports\PostsImport;
use Maatwebsite\Excel\Facades\Excel;

class PostController extends Controller
{
    public function index(Request $request)
    {    
        $posts = Post::latest()->paginate(10);
        if(count($posts)>0){
            return view('posts.post_list')->withDetails($posts);
        }
        else{
            return view('posts.post_list', compact('posts'))->withMessage('No Posts found!!');  
        }
    }

    public function create(Request $request)
    {
        return view('posts.create_post');
    }

    public function confirmPostCreateForm(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'unique:posts', 'max:255'],
            'description' => ['required'],
        ]);

        return view('posts.create_post_confirm')->with('post',$validatedData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $post = new Post;
        $post->title = $request['title'];
        $post->description = $request['description'];
        $post->create_user_id = auth()->user()->id;
        $post->updated_user_id = auth()->user()->id;
        $post->save();
        return redirect()->route('posts.index');
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
    public function update(Request $request, $id)
    {
      $post = $request->validate([
         'title' => 'required',
         'description' => 'required',
     ]);
  
     Post::where('id', $id)->update($post);

     return redirect()->route('posts.index')
                     ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        $post = new Post;
        $post = Post::findOrFail($id);
        $post->delete();
        $post->deleted_user_id = auth()->user()->id;
        return redirect('posts')->with('success', 'post deleted successfully');
    }

    public function searchPost(Request $request)
    {
        $search = trim($request->get('search'));
        $field = ['id','title','description'];
        $posts = Post::where('title', 'like', '%' . $search . '%')
        ->orwhere('description', 'like', '%' . $search . '%')
        ->orwhere('create_user_id', 'like', '%' . $search . '%')
        ->latest()
        ->paginate(10)
        ->withPath('?search=' . $search);
           if(count($posts)>0){
            return view('posts.post_list')->withDetails($posts)->withQuery ( $search );
           }
           else{
            return view('posts.post_list', compact('posts'))->withMessage('No Posts found. Try to search again !');;  
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
