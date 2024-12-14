<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Developer İş Yükleri</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h1>Developer İş Yükleri ve Tamamlama Süreleri</h1>
<table>
    <thead>
    <tr>
        <th>Developer ID</th>
        <th>Developer Adı</th>
        <th>Atanmış Toplam Saat</th>
        <th>Gerçek Süre (Saat)</th>
        <th>Tahmini Tamamlama Süresi (Hafta)</th>
        <th>Detay</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($developers as $developer)
        <tr>
            <td>{{ $developer['developer_id'] }}</td>
            <td>{{ $developer['developer_name'] }}</td>
            <td>{{ number_format($developer['total_hours'], 2) }}</td>
            <td>{{ number_format($developer['real_hours'], 2) }}</td>
            <td>{{ $developer['weeks_to_finish'] }}</td>
            <td>
                <a href="{{ route('developers.details', $developer['developer_id']) }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-eye"></i> Detay
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
