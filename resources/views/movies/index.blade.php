<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>映画一覧</title>
</head>
<body>
    <h1>映画一覧</h1>
    
    @if($movies->count() > 0)
        @foreach ($movies as $movie)
            <div style="margin-bottom: 20px; border: 1px solid #ccc; padding: 10px;">
                <h2>{{ $movie->title }}</h2>
                <img src="{{ $movie->image_url }}" alt="{{ $movie->title }}" style="max-width: 300px; height: auto;">
            </div>
        @endforeach
    @else
        <p>映画が登録されていません。</p>
    @endif
</body>
</html>