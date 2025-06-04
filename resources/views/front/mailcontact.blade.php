<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de contacto (Ragar)</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #201E1F;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            width: 800px;
            background-color: #FFFFFF;
            border-radius: 10px;
            border: 1px solid #0F0743;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            overflow: hidden;
        }
        .header {
            background-color: #0F0743;
            color: #FFFFFF;
            padding: 20px;
            text-align: center;
            border-bottom: 2px solid #0F0743;
        }
        .content {
            padding: 20px;
        }
        h1, h2, h3 {
            margin: 0;
            color: #0F0743;
        }
        p {
            margin-top: 10px;
            margin-bottom: 10px;
            color: #555555;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="header">
            <img src="data:image/png;base64,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" alt="">
        </div>
        <div class="content">
            <h1 style="text-align: center; margin: 20px 0;">Formulario de contacto (Ragar)</h1>
            <h2>Detalles de contacto:</h2>
            <p><strong>Nombre:</strong> {{$data['nombre']}}</p>
            <p><strong>Empresa:</strong> {{$data['empresa']}}</p>
            <p><strong>Correo:</strong> {{$data['email']}}</p>
            <p><strong>Whatsapp:</strong> {{$data['whatsapp']}}</p>

            <h2>Mensaje:</h2>
            <p>{{$data['mensaje']}}</p>
        </div>
    </div>
</body>
</html>
