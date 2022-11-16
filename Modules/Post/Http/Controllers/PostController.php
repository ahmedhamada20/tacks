<?php

namespace Modules\Post\Http\Controllers;

use App\traits\imageTrait;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Post\Entities\Post;
use Modules\Post\Http\Requests\PostRequest;
use Modules\Post\Http\Requests\PostUpdateRequest;

class PostController extends Controller
{
    use imageTrait;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $posts = Post::withCount('commentes')->paginate(PAGINATION);
        return view('post::index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('post::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(PostRequest $request)
    {
        DB::beginTransaction();
        try {

            $data = Post::create([
                'name' => $request->name,
                'user_id' => auth()->id(),
                'data' => date('Y-m-d'),
            ]);

            $this->uploadFile($request, 'photo', 'post', $data->id, 'Modules\Post\Entities\Post');
            DB::commit();
            return redirect()->route('post')->with(['message' => 'done saved successfully']);
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $post = Post::findorfail($id);
        return view('comment::index',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $post = Post::findorfail($id);
        return view('post::edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(PostUpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {

            Post::findorfail($request->id)->update([
                'name' => $request->name,
                'user_id' => auth()->id(),
                'data' => date('Y-m-d'),
            ]);

            if ($request->file('photo')) {
                $this->editFile($request, 'photo', 'post', $request->id, "Modules\Post\Entities\Post", $request->oldfile);
            }
            DB::commit();
            return redirect()->route('post')->with(['message' => 'done Update successfully']);
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request ,$id)
    {
        Post::destroy($id);
        $this->deletedFile('post',$id,'Modules\Post\Entities\Post',$request->oldfile);
        return redirect()->route('post')->with(['message' => 'done Delete successfully']);
    }
}
