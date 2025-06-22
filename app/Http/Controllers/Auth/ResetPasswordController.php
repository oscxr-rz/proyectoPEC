<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\PasswordResetMail;
use App\Models\Password_reset;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function sendMail(Request $request)
    {
        try {

            $request->validate([
                'correo' => 'required|email'
            ]);

            $usuario = Usuario::where('correo', $request['correo'])->first();

            if (!$usuario) {
                return redirect()->back()->with([
                    'mensaje' => 'Este correo no está asociado a ninguna cuenta'
                ]);
            }

            Password_reset::where('id_usuario', $usuario['id_usuario'])->delete();

            $token = $this->tokenGenerate();

            $password_reset = Password_reset::create([
                'id_usuario' => $usuario['id_usuario'],
                'token' => Hash::make($token)
            ]);

            if (!$password_reset) {
                return redirect()->back()->with([
                    'mensaje' => 'No se pudo crear el token'
                ]);
            }

            Mail::to($usuario['correo'])->send(new PasswordResetMail($token, $usuario['correo']));

            return redirect()->back()->with([
                'mensaje' => 'Se envió un enlace de recupereación a su correo'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'mensaje' => 'Error al enviar el correo: ' . $e->getMessage()
            ]);
        }
    }

    private function tokenGenerate()
    {
        $token = Str::random(30);

        return $token;
    }

    public function index($email, $token)
    {
        try {
            $usuario = Usuario::where('correo', $email)->first();

            if (!$usuario) {
                return redirect()->route('reset')->with([
                    'mensaje' => 'Usuario no encontrado'
                ]);
            }

            $password_reset = Password_reset::where('id_usuario', $usuario['id_usuario'])->first();

            if (!$password_reset) {
                return redirect()->route('reset')->with([
                    'mensaje' => 'Token de restablecimiento no válido'
                ]);
            }

            if (!Hash::check($token, $password_reset['token'])) {
                return redirect()->route('reset')->with([
                    'mensaje' => 'Token de restablecimiento incorrecto'
                ]);
            }

            return view('auth.passwordreset', compact('usuario'));
        } catch (\Exception $e) {
            return redirect()->route('reset')->with([
                'mensaje' => 'Error al procesar la solicitud: ' . $e->getMessage()
            ]);
        }
    }

    public function updatePassword(Request $request)
    {
        try {
            $data = $request->validate([
                'id_usuario' => 'required|integer|min:1',
                'contraseña' => 'required|string|min:5',
                'contraseña2' => 'required|string|min:5'
            ]);

            if ($request['contraseña2'] != $request['contraseña']) {
                return redirect()->back()->with([
                    'mensaje' => 'Las contraseñas deben ser iguales'
                ]);
            }

            $resultado = DB::transaction(function () use ($data) {
                $usuario = Password_reset::where('id_usuario', $data['id_usuario'])->first();

                if (!$usuario) {
                    throw new \Exception('Token de restablecimiento no encontrado');
                }

                $usuarioActualizado = $this->update($data['contraseña'], $data['id_usuario']);

                if (!$usuarioActualizado) {
                    throw new \Exception('No se pudo actualizar la contraseña');
                }

                $tokenEliminado = $this->deleteToken($usuarioActualizado['id_usuario']);

                if (!$tokenEliminado) {
                    throw new \Exception('No se pudo eliminar el token');
                }

                return true;
            });

            return redirect()->route('login')->with([
                'mensaje' => 'Contraseña actualizada correctamente'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'mensaje' => 'Error al actualizar la contraseña: ' . $e->getMessage()
            ]);
        }
    }

    private function update($password, $id)
    {
        $usuario = Usuario::where('id_usuario', $id)->first();

        if (!$usuario) {
            return false;
        }

        $usuario->update([
            'contraseña' => Hash::make($password)
        ]);

        return $usuario;
    }

    private function deleteToken($id)
    {
        $token = Password_reset::where('id_usuario', $id)->first();

        if (!$token) {
            return false;
        }

        $token->delete();
        return true;
    }
}
