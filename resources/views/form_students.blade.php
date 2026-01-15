<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/form_contact.css">
    <title>Registro de calificaiones</title>
</head>
<body>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                <div>
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            </ul>
        </div>
    @endif
    <div id="contact" class="section">
        <div class="formulario-container">
            <h2>Registrar Nuevo Estudiante</h2>
            <form action="{{ route('Students.enviar') }}" method="POST">
                @csrf

                <label for="nombre">Nombre del alumno:</label>
                <input type="text" id="nombre" name="nombre" required placeholder="Ej: Nestor">

                <label for="modulo">modulo:</label>
                <select id="modulo" name="modulo" required>
                    <option value="">Seleccione un modulo</option>
                    <option value="DSW">DSW</option>
                    <option value="DPL">DPL</option>
                    <option value="DOR">DOR</option>
                    <option value="DEW">DEW</option>
                    <option value="FOL">FOL</option>
                    <option value="E1B">E1B</option>
                    <option value="SOG">SOG</option>
                </select>

                <label for="calificacion">Calificación</label>
                <input type="number" id="calificacion" name="calificacion" required placeholder="Ej: 10">

                <button type="submit">Registrar Calificación</button>
            </form>

            @if(session('mensaje'))
                <p style="color: green; text-align: center; margin-top: 1rem;">{{ session('mensaje') }}</p>
            @endif

            <div style="text-align: center; margin-top: 20px;">
                <a href="{{ route('Students.registros') }}" style="padding: 10px 15px; background-color: #3490dc; color: white; text-decoration: none; border-radius: 5px;">Ver todas las calificaciones registradas</a>
            </div>
        </div>
    </div>
</body>
</html>