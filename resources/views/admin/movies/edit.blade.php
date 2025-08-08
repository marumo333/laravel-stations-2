<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>映画編集</title>
</head>
<body>
    <h1>映画編集</h1>
    
    <form action="/admin/movies/{{ $movie->id }}/update" method="POST">
        @csrf
        @method('PATCH')
        
        <div>
            <label for="title">映画タイトル:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $movie->title) }}" required>
            @error('title')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        
        <div>
            <label for="image_url">画像URL:</label>
            <input type="url" id="image_url" name="image_url" value="{{ old('image_url', $movie->image_url) }}" required>
            @error('image_url')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        
        <div>
            <label for="published_year">公開年:</label>
            <input type="number" id="published_year" name="published_year" value="{{ old('published_year', $movie->published_year) }}">
            @error('published_year')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        
        <div>
            <label for="description">概要:</label>
            <textarea id="description" name="description">{{ old('description', $movie->description) }}</textarea>
            @error('description')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        
        <div>
            <label for="is_showing">上映中:</label>
            <input type="checkbox" id="is_showing" name="is_showing" value="1" {{ old('is_showing', $movie->is_showing) ? 'checked' : '' }}>
        </div>
        
        <button type="submit">更新</button>
        <a href="/admin/movies">キャンセル</a>
    </form>
</body>
</html>