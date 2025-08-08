<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者 - 映画一覧</title>
</head>
<body>
    <h1>映画管理</h1>
    
    @if($movies->count() > 0)
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>タイトル</th>
                    <th>画像URL</th>
                    <th>公開年</th>
                    <th>概要</th>
                    <th>上映中</th>
                    <th>作成日時</th>
                    <th>更新日時</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                    <tr>
                        <td>{{ $movie->id }}</td>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->image_url }}</td>
                        <td>{{ $movie->published_year ?? '' }}</td>
                        <td>{{ $movie->description ?? '' }}</td>
                        <td>{{ $movie->is_showing ? '上映中' : '上映予定' }}</td>
                        <td>{{ $movie->created_at }}</td>
                        <td>{{ $movie->updated_at }}</td>
                        <td>
                            <a href="/admin/movies/{{ $movie->id }}/edit">編集</a>
                            <form action="/admin/movies/{{ $movie->id }}/destroy" method="POST" style="display: inline;" onsubmit="return confirm('本当に削除しますか？')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="color: red;">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>映画が登録されていません。</p>
    @endif
    <div style="margin-top: 20px;">
        <a href="/admin/movies/create">新しい映画を追加</a>
    </div>
</body>
</html>