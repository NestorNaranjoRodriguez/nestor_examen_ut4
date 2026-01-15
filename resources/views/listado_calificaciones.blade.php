<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Calificaciones Registradas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        h2 {
            color: #2c3e50;
        }
        .message-success {
            color: green;
            margin: 15px 0;
            font-weight: bold;
            padding: 10px;
            background-color: #e6f4ea;
            border-radius: 4px;
            display: inline-block;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #fafafa;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 16px;
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        a:hover {
            background-color: #218838;
        }
        p {
            margin-top: 20px;
            font-style: italic;
            color: #666;
        }
        .boolean {
            font-weight: bold;
        }
        .boolean.si { color: green; }
        .boolean.no { color: red; }
    </style>
</head>
<body>

    <h2>Calificaciones Registradas</h2>

    @if(session('mensaje'))
        <div class="message-success">{{ session('mensaje') }}</div>
    @endif

    @if(!empty($registros))
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Modulo</th>
                    <th>Calificación</th>
                </tr>
            </thead>
            <tbody>
                @foreach($registros as $fila)
                    <tr>
                        <td>{{ $fila['nombre'] ?? '—' }}</td>
                        <td>{{ ucfirst($fila['modulo'] ?? '') }}</td>
                        <td>{{ isset($fila['calificacion']) ? number_format((float)$fila['calificacion'], 1) : '—' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay calificaciones registradas aún.</p>
    @endif

    <a href="{{ route('form_students') }}">Registrar Nueva Calificación</a>
</body>
</html>