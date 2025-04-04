<?php

namespace App\Http\Controllers;

use App\Services\FastApiService;
use Illuminate\Http\Request;

class userController extends Controller
{
    protected $fastApi;

    public function __construct(FastApiService $fastApi)
    {
        $this->fastApi = $fastApi;
    }

    public function inicio()
    {
        return view('formulario');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'txtNombre' => 'required|string',
            'txtEdad' => 'required|integer|min:1',
            'txtCorreo' => 'required|email',
        ]);

        $usuarioNuevo = [
            'name'  => $validated['txtNombre'],
            'age'   => $validated['txtEdad'],
            'email' => $validated['txtCorreo'],
        ];

        try {
            $response = $this->fastApi->post('/Usuarios/', $usuarioNuevo);

            // Verifica si hay un error explícito en la respuesta
            if (isset($response['error']) || isset($response['message']) && $response['message'] !== 'Usuario creado') {
                return back()->with('error', 'Error de API: ' . ($response['error'] ?? $response['message']));
            }

            return redirect()->route('usuario.inicio')
                ->with('success', 'Usuario guardado por FASTAPI!');

        } catch (\Exception $e) {
            return back()->with('error', 'Error inesperado: ' . $e->getMessage());
        }
    }

    public function index()
    {
        try {
            $usuarios = $this->fastApi->get('/todosUsuarios/');
            return view('consulta', compact('usuarios'));
        } catch (\Exception $e) {
            return back()->with('error', 'No se pudo obtener la lista de usuarios');
        }
    }
    
    public function edit($id)
    {
        try {
            $usuario = $this->fastApi->get("/Usuarios/{$id}");
            return view('editar', compact('usuario'));
        } catch (\Exception $e) {
            return back()->with('error', 'No se pudo obtener el usuario');
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'txtNombre' => 'required',
            'txtEdad' => 'required',
            'txtCorreo' => 'required',
        ]);

        $usuarioActualizado = [
            'name' => $data['txtNombre'],
            'age' => $data['txtEdad'],
            'email' => $data['txtCorreo'],
        ];

        try {
            $this->fastApi->put("/Usuarios/{$id}", $usuarioActualizado);
            return redirect()->route('usuario.index')->with('success', 'Usuario actualizado correctamente.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al actualizar el usuario.');
        }
    }

    public function destroy($id)
    {
        try {
            $this->fastApi->delete("/Usuarios/{$id}");
            return redirect()->route('usuario.index')->with('success', 'Usuario eliminado correctamente.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al eliminar el usuario.');
        }
    }


}
