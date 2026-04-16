<!DOCTYPE html>
<html>
<head>
    <title>Nueva Queja o Sugerencia</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
        <h2 style="color: #2c4c2c; border-bottom: 2px solid #2c4c2c; padding-bottom: 10px;">Nueva Queja o Sugerencia Recibida</h2>
        <p><strong>Nombre:</strong> {{ $datos['nombre'] }}</p>
        <p><strong>Correo electrónico:</strong> {{ $datos['email'] }}</p>
        <p><strong>Mensaje:</strong></p>
        <div style="background: #f9f9f9; padding: 15px; border-radius: 5px; font-style: italic;">
            {{ $datos['mensaje'] }}
        </div>
        <hr style="margin-top: 20px; border: 0; border-top: 1px solid #eee;">
        <p style="font-size: 0.8rem; color: #888;">Este correo fue enviado desde el Buzón de Quejas de Sinaloa 10+.</p>
    </div>
</body>
</html>
