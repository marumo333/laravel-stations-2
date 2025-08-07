<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>映画作成</title>
</head>
<body>
    <h1>映画作成</h1>
    
    <form action="/admin/movies/store" method="POST">
        @csrf
        
        <div>
            <label for="title">映画タイトル:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        
        <div>
            <label for="image_url">画像URL:</label>
            <input type="url" id="image_url" name="image_url" value="{{ old('image_url') }}" required>
            @error('image_url')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        
        <div>
            <label for="published_year">公開年:</label>
            <input type="number" id="published_year" name="published_year" value="{{ old('published_year') }}">
            @error('published_year')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        
        <div>
            <label for="description">概要:</label>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
            @error('description')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        
        <div>
            <label for="is_showing">上映中:</label>
            <input type="checkbox" id="is_showing" name="is_showing" value="1" {{ old('is_showing') ? 'checked' : '' }}>
        </div>
        
        <button type="submit">作成</button>
    </form>
</body>
</html>