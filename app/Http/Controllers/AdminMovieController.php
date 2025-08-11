<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminMovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with('genre')->get();
        return view('admin.movies.index', compact('movies'));
    }

    public function create()
    {
        return view('admin.movies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:movies,title',
            'image_url' => 'required|url',
            'published_year' => 'required|integer',
            'description' => 'required',
            'is_showing' => 'required|boolean',
            'genre' => 'required|string|max:255'
        ]);

        try {
            DB::transaction(function () use ($request) {
                // 非常に長いタイトルの場合はエラー
                if (mb_strlen($request->title) > 255) {
                    throw new \Exception('Title too long');
                }

                // ジャンルの取得または作成
                $genre = Genre::firstOrCreate(
                    ['name' => $request->genre]
                );

                // 映画の作成
                Movie::create([
                    'title' => $request->title,
                    'image_url' => $request->image_url,
                    'published_year' => $request->published_year,
                    'description' => $request->description,
                    'is_showing' => $request->is_showing,
                    'genre_id' => $genre->id
                ]);
            });
        } catch (\Exception $e) {
            abort(500, 'Movie creation failed');
        }

        return redirect('/admin/movies');
    }

    public function edit($id)
    {
        $movie = Movie::with('genre')->findOrFail($id);
        return view('admin.movies.edit', compact('movie'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:movies,title,' . $id,
            'image_url' => 'required|url',
            'published_year' => 'required|integer',
            'description' => 'required',
            'is_showing' => 'required|boolean',
            'genre' => 'required|string|max:255'
        ]);

        try {
            DB::transaction(function () use ($request, $id) {
                // 非常に長いタイトルの場合はエラー
                if (mb_strlen($request->title) > 255) {
                    throw new \Exception('Title too long');
                }

                // ジャンルの取得または作成
                $genre = Genre::firstOrCreate(
                    ['name' => $request->genre]
                );

                // 映画の更新
                $movie = Movie::findOrFail($id);
                $movie->update([
                    'title' => $request->title,
                    'image_url' => $request->image_url,
                    'published_year' => $request->published_year,
                    'description' => $request->description,
                    'is_showing' => $request->is_showing,
                    'genre_id' => $genre->id
                ]);
            });
        } catch (\Exception $e) {
            abort(500, 'Movie update failed');
        }

        return redirect('/admin/movies');
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return redirect('/admin/movies');
    }
}