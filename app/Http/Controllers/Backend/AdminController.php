<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;

class AdminController extends backendController
{
    protected $uploadPath;
    public function __construct()
    {
        parent::__construct();
        $this->uploadPath = public_path('images');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $onlyTrashed = FALSE;
        if(($status = $request->get('status')) && $status == "trash"){
            $posts = Post::onlyTrashed()->with('category', 'author')->latest()->paginate(8);
            $postCount = Post::onlyTrashed()->count();
            $onlyTrashed = TRUE;
        }
        elseif($status == "published"){
            $posts = Post::published()->latest()->paginate(8);
            $postCount = Post::count();
        }
        elseif($status == "scheduled"){
            $posts = Post::scheduled()->latest()->paginate(8);
            $postCount = Post::count();
        }
        elseif($status == "draft"){
            $posts = Post::draft()->latest()->paginate(8);
            $postCount = Post::count();
        }
        else{
            $posts = Post::latest()->paginate(8);
            $postCount = Post::count();
        }

        $statusList = $this->statusList();

        return view("backend.blog.index", compact('posts', 'postCount', 'onlyTrashed', 'statusList'));
    }


    private function statusList()
    {
        return [
            'all'       => Post::count(),
            'published' => Post::published()->count(),
            'scheduled' => Post::scheduled()->count(),
            'draft'     => Post::draft()->count(),
            'trash'     => Post::onlyTrashed()->count(),
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        
        return view('backend.blog.create',compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\PostRequest $request)
    {

        $data = $this->handleRequest($request);
       
        $request->user()->posts()->create($data);

        return redirect('backend/other')->with('message', 'Your post was created successfully!');
    }




    private function handleRequest($request)
    {
        $data = $request->all();

        if ($request->hasFile('image'))
        {
            $image       = $request->file('image');
            $fileName    = $image->getClientOriginalName();
            $destination = $this->uploadPath;

            $image->move($destination, $fileName);



            $data['image'] = $fileName;
        }

        return $data;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
        $post = Post::findOrFail($id);
        return view('backend.blog.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return redirect()->back()->with('trash-message',['Your post has been moved to trash',$id]);  
    }

    public function sorao($id)
    {
        
         $post = Post::withTrashed()->findOrFail($id);
         $post->forceDelete();
         $this->removeImage($post->image);
         return redirect('/backend/other?status=trash')->with('message','Your post has been permanently destroyed');
    }


    public function restore($id){
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();
        return redirect()->back()->with('message','Your post has been restored');
    }


    private function removeImage($image){
        if(!empty($image)){
            $imagePath = $this->uploadPath.'/'.$image;
            if(file_exists($imagePath)) unlink($imagePath);
        }
    }

    public function solutionUpdate(Requests\PostRequest $request,$id){
        $post = Post::findOrFail($id);
        $oldImage = $post->image;
        
        $data = $this->handleRequest($request);
        $post->update($data);
        $post = Post::findOrFail($id);
        // dd($data->image);
        if($oldImage !== $post->image){
            $this->removeImage($oldImage);
        }

        return redirect('backend/other')->with('message', 'Your post was updated successfully!');
    }

}
