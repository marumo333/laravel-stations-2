<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>座席表</title>
</head>
<body>
    <h1>座席表</h1>
    <table border="1" cellpadding="8">
        <tr>
            <td colspan="5" align="center">スクリーン</td>
        </tr>
        @foreach(['a', 'b', 'c'] as $row)
            <tr>
                @foreach($grouped[$row] ?? [] as $sheet)
                    <td>{{ $sheet->row }}-{{ $sheet->column }}</td>
                @endforeach
            </tr>
        @endforeach
    </table>
</body>
</html>