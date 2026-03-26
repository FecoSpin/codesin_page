<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\QuejaRecibida;

class QuejasController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'mensaje' => 'required|min:5',
        ]);

        $datos = [
            'nombre' => strip_tags($request->get('nombre')) ?: 'Anónimo',
            'email' => $request->get('email'),
            'mensaje' => strip_tags($request->get('mensaje')),
        ];

        $recipient = env('QUEJAS_EMAIL_RECIPIENT', 'Admon.finanzas@codesin.mx');
        Mail::to($recipient)->send(new QuejaRecibida($datos));

        return response()->json(['message' => 'Queja enviada con éxito'], 201);
    }
}
