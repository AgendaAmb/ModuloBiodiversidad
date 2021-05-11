<?php

namespace App\Http\Controllers;

use App\Rol;
use App\User;
use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\Http;

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
    public function index()
    {
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
        return view('UsuarioXVerificar');
    }
    public function editRol(Request $request)
    {
        $user = user::findorFail($request->idUser);
        
        if($request->roles!=null){
            $user->roles()->detach();
            foreach ($request->roles as $rol) {
                
                if (!$user->hasRoleid($rol)) {
                    $user->roles()->attach(Rol::where('id', $rol)->first());
                }
            }
            return back()->with('message', 'Cambio de roles con exito');
        }else{
            return back()->withErrors("Debes de seleccionar al menos 1 rol");
        }
    }
    public function deleteUser(Request $request )
    {
       $user= user::findorFail( $request->idUserR);
       $user->delete();
       
        return back()->with('message', 'El usuario fue eliminado con exito');
    }
    public function getHCByUser()
    {
        $user = user::findorFail(Auth::id());
        
        return view('HojaCampo.User.index')->with('MisHojasCampo', $user->Plantas()->paginate(12));
    }
    public function loginInstitucional(Request $request){

        $response = Http::post('148.224.134.161/loginUASLP', [
            'email' => 'A260651@alumnos.uaslp.mx',
            'password' => '#f15L27j27I13',
        ]);
        
        if ($response->ok()) {
            //dd($request);
           //$existeInBD=DB::table('users')->where('email', 'yeicob_loredo@hotmail.com')->first();
            $existeInBD=User::where('email', 'yeicob_loredo@hotmail.com')->first();
            dd($response->json()['data']);
            if ($existeInBD) {
                Auth::login($existeInBD);
                return redirect()->route('dashbord');
            } else {
                if($response->json()['data']['CuentaActiva']){
                    $user=User::create([
                        'id'=>$response->json()['data']['ClaveUASLP'],
                        'name' => $response->json()['data']['Nombres'].$response->json()['data']['Apellidos'],
                        'email' => $response->json()['data']['Correo'],
                        'password' => Hash::make($request->contraseña),
                    ]);
                    $user->roles()->attach(Rol::where('nombre', 'Ninguno')->first());
                    $user->save();
                    Auth::login($user);
                    return redirect()->route('dashbord');
                }else{
                    echo "error no tienes una cuenta activa";
                }
               
            }
            
            
          

        } else {
            echo "error en credenciales";
        }
        
       
    }

}
