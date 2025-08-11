<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>映画作品編集</title>
</head>
<body>
    <h1>映画作品編集</h1>

    @if ($errors->any())
    <div style="color: red; margin-bottom: 20px;">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="/admin/movies/{{ $movie->id }}/update">
        @csrf
        @method('PATCH')

        <div style="margin-bottom: 15px;">
            <label for="title">映画タイトル（必須）:</label><br>
            <input type="text" id="title" name="title" value="{{ old('title', $movie->title) }}" required style="width: 300px; padding: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="image_url">画像URL（必須）:</label><br>
            <input type="url" id="image_url" name="image_url" value="{{ old('image_url', $movie->image_url) }}" required style="width: 400px; padding: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="published_year">公開年（必須）:</label><br>
            <input type="number" id="published_year" name="published_year" value="{{ old('published_year', $movie->published_year) }}" required style="width: 150px; padding: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="description">概要（必須）:</label><br>
            <textarea id="description" name="description" required style="width: 400px; height: 100px; padding: 5px;">{{ old('description', $movie->description) }}</textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="genre">ジャンル（必須）:</label><br>
            <input type="text" id="genre" name="genre" value="{{ old('genre', $movie->genre ? $movie->genre->name : '') }}" required style="width: 200px; padding: 5px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label>上映状態（必須）:</label><br>
            <label>
                <input type="radio" name="is_showing" value="1" {{ old('is_showing', $movie->is_showing) == '1' ? 'checked' : '' }} required>
                公開中
            </label>
            <label style="margin-left: 10px;">
                <input type="radio" name="is_showing" value="0" {{ old('is_showing', $movie->is_showing) == '0' ? 'checked' : '' }} required>
                公開予定
            </label>
        </div>

        <button type="submit" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; cursor: pointer;">更新</button>
        <a href="/admin/movies" style="margin-left: 10px; text-decoration: none; color: #6c757d;">キャンセル</a>
    </form>
</body>
</html>