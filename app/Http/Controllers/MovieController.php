<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $query = Movie::query();

        // キーワード検索（タイトルまたは概要）
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'LIKE', "%{$keyword}%")
                    ->orWhere('description', 'LIKE', "%{$keyword}%");
            });
        }

        // 上映状態での絞り込み
        if ($request->has('is_showing') && $request->is_showing !== '') {
            $query->where('is_showing', $request->is_showing);
        }

        // ページネーション（20件ずつ）
        $movies = $query->paginate(20);

        return view('movies.index', compact('movies'));
    }

    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        $schedules = $movie->schedules()->orderBy('start_time','asc')->get();

        return view('movies.show', [
        'movie' => $movie,
        'schedules' => $schedules,
        ]);
    }
}
