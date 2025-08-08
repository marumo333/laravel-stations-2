<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class AdminMovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('admin.movies.index', compact('movies'));
    }
    public function create(){
        return view('admin.movies.create');
    }
    public function store(Request $request){
        $request->validate([
            'title'=>'required|unique:movies,title',
            'image_url' => 'required|url',
            'published_year' => 'required|integer',
            'description' => 'required|string',
            'is_showing' => 'required|boolean',
        ]);

        Movie::create([
            'title' => $request ->title,
            'image_url' => $request ->image_url,
            'published_year' => $request ->published_year,
            'description' => $request ->description,
            'is_showing' => $request ->has('is_showing') ? 1: 0,
        ]);
        return redirect(('/admin/movies'));
    }
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        return view('admin.movies.edit',compact('movie'));
    }
    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        
        $request->validate([
            'title' => 'required|unique:movies,title,' . $id,
            'image_url' => 'required|url',
            'published_year' => 'required|integer',
            'description' => 'required|string',
            'is_showing' => 'required|boolean',
        ]);

        $movie->update([
            'title' => $request->title,
            'image_url' => $request->image_url,
            'published_year' => $request->published_year,
            'description' => $request->description,
            'is_showing' => $request->has('is_showing') ? 1 : 0,
        ]);

        return redirect('/admin/movies');
    }
}