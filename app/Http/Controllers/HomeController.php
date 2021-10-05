<?php

namespace App\Http\Controllers;

use App\Notifications\CambioDeRolNotification;
use App\Rol;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['administrador', 'Gestor', 'Consultor técnico', 'Coordinador', 'JefeJardinero', 'Supervisor']);
        return view('dashboard.index');
    }
    public function Bio()
    {
        return view('index');
    }
    public function getUsers()
    {
        return view('Administrador.usuarios')->with('usuarios', User::all())->with('roles', Rol::all());
    }
    public function verificar()
    {
        if (Auth::user()->email_verified_at) {
           return route('dashbord');
        }else{
            return view('UsuarioXVerificar');
        }

    }
    public function editRol(Request $request)
    {
        $request->user()->authorizeRoles(['administrador']);
        $user = user::findorFail($request->idUser);
        if ($user->hasRole('Ninguno')) {
            $user->notify(new CambioDeRolNotification());
        }
        if ($request->roles != null) {
            $user->roles()->detach();
            foreach ($request->roles as $rol) {

                if (!$user->hasRoleid($rol)) {
                    $user->roles()->attach(Rol::where('id', $rol)->first());
                }
            }
            return back()->with('message', 'Cambio de roles con exito');
        } else {
            return back()->withErrors("Debes de seleccionar al menos 1 rol");
        }
    }
    public function deleteUser(Request $request)
    {
        $request->user()->authorizeRoles(['administrador']);

        $user = user::findorFail($request->idUser);
        $user->delete();

        return back()->with('message', 'El usuario fue eliminado con exito');
    }
    public function getHCByUser()
    {
        $user = user::findorFail(Auth::id());

        return view('HojaCampo.User.index')->with('MisHojasCampo', $user->Plantas()->paginate(12));
    }
    public function getFTByUser()
    {
        //  $user = user::findorFail(Auth::id());

        $FichasTecnicas = DB::table('nombre_ejemplars')
            ->join('ficha_tecnicas', function ($join) {
                $join->on('nombre_ejemplars.ficha_tecnicas_id', '=', 'ficha_tecnicas.id')
                    ->where('ficha_tecnicas.user_id', '=', Auth::id())
                    ->orderBy('NombreComun', 'asc');
            })->paginate(15);

        return view('FichasTecnicas.User.index')->with('FichasTecnicas', $FichasTecnicas);
    }
    public function CheckLogin()
    {
        if (Auth::check()) {
            return redirect()->route('dashbord');
        } else {
            return view('Institucional.vista');
        }

    }
    public function loginInstitucional(Request $request)
    {

        $response = Http::post('https://ambiental.uaslp.mx/apiuaslp/loginUASLP', [
            'username' => $request->usuario,
            'password' => $request->contraseña,
        ]);
        if ($response->ok()) {
            $existeInBD = User::where('email', $response->json()['data']['Correo'])->first();
            if ($existeInBD) {
                Auth::login($existeInBD);
                return redirect()->route('dashbord');
            } else {
                if ($response->json()['data']['CuentaActiva']) {

                    $user = User::create([
                        'id' => Str::of($response->json()['data']['ClaveUASLP'])->trim('A'),
                        'name' => $response->json()['data']['Nombres'] . $response->json()['data']['Apellidos'],
                        'email' => $response->json()['data']['Correo'],
                        'password' => Hash::make($request->contraseña),
                    ]);
                    $user->save();
                    $user->roles()->attach(Rol::where('nombre', 'Ninguno')->first());
                    Auth::login($user);
                    return redirect()->route('dashbord');
                } else {
                    return redirect()->back()->with('message', "Error tus credenciales no coenciden con nuestra información");
                }
            }

        } else {
            $existeInBD = User::where('email', $request->usuario)->first();
            //dd(Auth::attempt(['email' => $request->usuario, 'password' => $request->contraseña]));
            if ($existeInBD && Auth::attempt(['email' => $request->usuario, 'password' => $request->contraseña])) {
                Auth::login($existeInBD);
                return redirect()->route('dashbord');
            } else {
                return redirect()->back()->with('message', "Error tus credenciales no coenciden con nuestra información");
            }
        }
    }
}
