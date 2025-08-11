<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>映画管理</title>
</head>
<body>
    <h1>映画管理</h1>
    
    <a href="/admin/movies/create" style="display: inline-block; margin-bottom: 20px; padding: 10px 15px; background-color: #007bff; color: white; text-decoration: none;">新規作品登録</a>

    <table border="1" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #f8f9fa;">
                <th style="padding: 10px;">ID</th>
                <th style="padding: 10px;">タイトル</th>
                <th style="padding: 10px;">画像URL</th>
                <th style="padding: 10px;">ジャンル</th>
                <th style="padding: 10px;">公開年</th>
                <th style="padding: 10px;">概要</th>
                <th style="padding: 10px;">上映状態</th>
                <th style="padding: 10px;">操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
            <tr>
                <td style="padding: 10px;">{{ $movie->id }}</td>
                <td style="padding: 10px;">{{ $movie->title }}</td>
                <td style="padding: 10px;">{{ $movie->image_url }}</td>
                <td style="padding: 10px;">{{ $movie->genre ? $movie->genre->name : '-' }}</td>
                <td style="padding: 10px;">{{ $movie->published_year }}</td>
                <td style="padding: 10px;">{{ $movie->description }}</td>
                <td style="padding: 10px;">{{ $movie->is_showing ? '上映中' : '上映予定' }}</td>
                <td style="padding: 10px;">
                    <a href="/admin/movies/{{ $movie->id }}/edit" style="color: #007bff; text-decoration: none; margin-right: 10px;">編集</a>
                    <form method="POST" action="/admin/movies/{{ $movie->id }}/destroy" style="display: inline;" onsubmit="return confirm('本当に削除しますか？')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color: #dc3545; background: none; border: none; text-decoration: underline; cursor: pointer;">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>