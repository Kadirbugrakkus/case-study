<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Developer Görev Detayları</title>
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
<h1>{{ $developer->name }} - Görev Detayları</h1>
<a href="{{ route('developer.stats') }}">Geri Dön</a>
<table>
    <thead>
    <tr>
        <th>Görev ID</th>
        <th>Görev Adı</th>
        <th>Atanan Saat</th>
        <th>Zorluk Değeri</th>
        <th>Tahmini Süre (Saat)</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($assignments as $assignment)
        <tr>
            <td>{{ $assignment['task_id'] }}</td>
            <td>{{ $assignment['task_name'] }}</td>
            <td>{{ number_format($assignment['assigned_hours'], 2) }}</td>
            <td>{{ $assignment['task_value'] }}</td>
            <td>{{ $assignment['estimated_duration'] }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
