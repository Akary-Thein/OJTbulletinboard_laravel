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

    public function store(Request $request)
    { 
        Post::create([
            'title' => $request['title'],
             'description' => $request['description'],
             'create_user_id' => 7,
             'updated_user_id' => 7,
                 ]);
         
                 return redirect()->route('posts.index')
                 ->with('success','Product created successfully.');
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

    public function show($id)
    {
      $post = Post::findOrFail($id);
      return view('posts.show_detail', compact('post'));
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
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('posts')->with('success', 'post deleted successfully');
    }

    public function searchpost(Request $request)
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
 public function export(Request $request){

       return Excel::download(new PostsExport, "post-list-" .date('d-m-Y') .".xlsx");    
 
}

/**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('posts.upload_csv');
    }

    public function import() 
    {
        Excel::import(new PostsImport,request()->file('import_file'));
           
        return redirect()->route('posts.index');
    }

}
