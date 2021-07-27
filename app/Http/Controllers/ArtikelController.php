<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ArtikelController extends Controller
{

    public function indexAdmin()
    {
        $data = Article::all();

        return view('admin.artikel.index', ['tab_name' => 'Artikel', 'data_artikel' => $data]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Article::all();

        return view('artikel.index', ['tab_name' => 'Artikel', 'data_artikel' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => ['required', 'min:5', 'unique:articles,title'],
            'category' => ['required'],
            'img_banner' => ['required', 'mimes:png,jpg']
        ]);

        // $img_banner_name = $request->file('img_banner')->getClientOriginalName();
        // $img_banner_path = $request->file('img_banner')->store('public/images_article');

        $filenameWithExt = $request->file("img_banner")->getClientOriginalName();
        // Get Filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just Extension
        $extension = $request->file("img_banner")->getClientOriginalExtension();
        // Filename To store
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        // Upload Image
        $path = $request->file("img_banner")->move('images_article', $fileNameToStore);

        // dd($path);

        Article::create([
            'title' => $request->title,
            'category' => $request->category,
            'article' => $request->article,
            'author' => Auth::user()->name,
            'subject_article' => $request->subject_article,
            'img_banner' => $fileNameToStore,
        ]);

        return redirect()->back()->with('message', 'Article berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);

        $data_comment = Comment::where('article_id', '=', $id);

        return view('artikel.show', ['tab_name' => 'show data', 'article' => $article, 'comments' => $data_comment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Article::find($id);
        return view('admin.artikel.edit', ['article' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data_current = Article::find($id);


        if ($request->title == $data_current->title) {
            $request->validate([
                'title' => ['required', 'min:5'],
                'category' => ['required'],
                // 'img_banner' => ['required', 'mimes:png,jpg']
            ]);
        } else {
            $request->validate([
                'title' => ['required', 'min:5', 'unique:articles,title'],
                'category' => ['required'],
            ]);
        }

        // $img_banner_name = $request->file('img_banner')->getClientOriginalName();
        // $img_banner_path = $request->file('img_banner')->store('public/images_article');

        if (!empty($request->file('img_banner'))) {
            $fileName = $data_current->img_banner;
            File::delete('images_article/' . $fileName);

            $filenameWithExt = $request->file("img_banner")->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file("img_banner")->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file("img_banner")->move('images_article', $fileNameToStore);
        } else {
            $fileNameToStore = $data_current->img_banner;
        }

        Article::where('id', $id)->update([
            'title' => $request->title,
            'category' => $request->category,
            'article' => $request->article,
            'author' => Auth::user()->name,
            'img_banner' => $fileNameToStore,
        ]);

        return redirect()->route('admin_system.index')->with('message', 'Edit Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_current = Article::find($id);
        $fileName = $data_current->img_banner;
        File::delete('images_article/' . $fileName);

        Article::where('id', $id)->delete();
        return redirect()->route('admin_system.index')->with('message', 'Delete Success');
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('images'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/' . $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
