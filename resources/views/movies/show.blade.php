<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $movie->title }} | 映画詳細</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .movie-container {
            display: flex;
            gap: 30px;
            margin-bottom: 30px;
        }
        .movie-image {
            flex: 0 0 300px;
        }
        .movie-image img {
            max-width: 100%;
            border-radius: 8px;
        }
        .movie-info {
            flex: 1;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>{{ $movie->title }}</h1>
    
    <div class="movie-container">
        <div class="movie-image">
            <img src="{{ $movie->image_url }}" alt="{{ $movie->title }}">
        </div>
        
        <div class="movie-info">
            <p><strong>公開年:</strong> {{ $movie->published_year }}</p>
            <p><strong>ジャンル:</strong> {{ $movie->genre ? $movie->genre->name : '未設定' }}</p>
            <p><strong>上映状態:</strong> {{ $movie->is_showing ? '上映中' : '上映予定' }}</p>
            <h2>作品概要</h2>
            <p>{{ $movie->description }}</p>
        </div>
    </div>
    
    <h2>上映スケジュール</h2>
    @if(count($schedules) > 0)
        <ul>
            @foreach($schedules as $schedule)
                <li>{{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}</li>
            @endforeach
        </ul>
    @else
        <p>現在上映スケジュールはありません。</p>
    @endif
    
    <p><a href="/movies">映画一覧に戻る</a></p>
</body>
</html>