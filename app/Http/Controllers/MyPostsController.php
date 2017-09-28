<?php namespace App\Http\Controllers;

use App\Models\MyPosts;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Ramsey\Uuid\Uuid;

class MyPostsController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /myposts
	 *
	 * @return Response
	 */
	public function indexHome(){

	    $posts = MyPosts::get()->toArray();

	    return view('allusersposts', ['posts'=>$posts]);

    }

	public function index()
	{
        $loggedInUserId = Auth::id();
        $posts = MyPosts::where('user_id', $loggedInUserId)->get();

		return view('blog.allposts', ['posts'=>$posts]);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /myposts/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('blog.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /myposts
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        if ($request->hasFile('path')){
            $image = Input::file('path');
            $filename = time().'.'. $image->getClientOriginalExtension();

            $destinationPath = public_path('/images');
            $image->move($destinationPath, $filename);
        }


        MyPosts::create([
            'id' => Uuid::uuid4(),
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'image' => $request->image,
        ]);

        return redirect()->route('app.posts.index');

    }

	/**
	 * Display the specified resource.
	 * GET /myposts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $post = MyPosts::find($id);
//dd($post);
        $post([
            'id' => $id,
            'description' => $post,
            'title' => $title,
        ]);

        return view('blog.show', $post);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /myposts/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$posts = MyPosts::find($id);

        return view('blog.edit', ['posts'=> $posts]);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /myposts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /myposts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		MyPosts::destroy($id);
		return redirect()->route('app.posts.index');
	}

}