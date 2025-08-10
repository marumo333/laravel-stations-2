<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>映画一覧</title>
</head>
<body>
    <h1>映画一覧</h1>
    
    <!-- 検索フォーム -->
    <form method="GET" action="/movies" style="margin-bottom: 20px;">
        <div style="margin-bottom: 10px;">
            <input type="text" name="keyword" placeholder="映画タイトルまたは概要で検索" value="{{ request('keyword') }}" style="width: 300px; padding: 5px;">
        </div>
        
        <div style="margin-bottom: 10px;">
            <label>
                <input type="radio" name="is_showing" value="" {{ request('is_showing') === null ? 'checked' : '' }}>
                すべて
            </label>
            <label style="margin-left: 10px;">
                <input type="radio" name="is_showing" value="0" {{ request('is_showing') === '0' ? 'checked' : '' }}>
                公開予定
            </label>
            <label style="margin-left: 10px;">
                <input type="radio" name="is_showing" value="1" {{ request('is_showing') === '1' ? 'checked' : '' }}>
                公開中
            </label>
        </div>
        
        <button type="submit" style="padding: 5px 15px;">検索</button>
    </form>

    <!-- 映画一覧 -->
    @if($movies->count() > 0)
        @foreach ($movies as $movie)
            <div style="margin-bottom: 20px; border: 1px solid #ccc; padding: 10px;">
                <h2>{{ $movie->title }}</h2>
                <img src="{{ $movie->image_url }}" alt="{{ $movie->title }}" style="max-width: 300px; height: auto;">
            </div>
        @endforeach

        <!-- ページネーション -->
        @if($movies->hasPages())
            <div style="margin-top: 20px;">
                {{ $movies->appends(request()->query())->links() }}
            </div>
        @endif
    @else
        <p>映画が見つかりませんでした。</p>
    @endif
</body>
</html>