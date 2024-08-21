<?php
namespace App\Http\Controllers\Admin;
use App\Role;
use App\User;
use Redirect;
use App\Models\Compania;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class UsuarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $usuarios = User::select()->get();
        return view('admin.usuario.index',compact('usuarios'));
    }
    
   /* public function list()
    {
        $usuarios = User::select()->get();
        return $usuarios;
    }*/
    
    public function create()
    {
        return view("admin.usuario.create");
    }

    public function store(Request $request)
    {
        /* Validacion del Formulario */
        $request->validate([
            'nombre'   => 'required',
            'password' => 'required',
            'email'    => 'required|email',
        ]);
        $usuario = new User;
        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->ROLP_Codigo = 1;
        $usuario->password    =  Crypt::encryptString($request->password);
        $usuario->save();
        return Redirect::to("/usuario");
    }
    
/*     public function store(Request $request){

        
        $request->validate([
            'nombre' => 'required',
            'password' => 'required',
            'email' => 'required|email',
            'rol' => 'required'
        ]);

        User::create([
            'name' => request('nombre'),
            'email' => request('email'),
            'password' => request('password'),
            'ROL_Codigo' => request('rol'),
        ]);

        $usuario = User::find('id');

        return Redirect::to("/usuario");
    } */
    
    public function show(User $usuario){
        
    }
    
    public function edit($id){
        $usuario = User::findOrFail($id);
        return view("admin.usuario.edit", ['usuario' => $usuario,'rol'=>1]);
    }
    
    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->password =  Crypt::encryptString($request->password);
        $usuario->save();
        return Redirect::to("/usuario");
    }
    
    public function destroy($id)
    {
        User::destroy($id);
        return Redirect::to("/usuario");
    }

    public function seleccionarCompania(Request $request)
    {

        if($request->has('compania') && $request->has('ruta_actual'))
        {
            // Save Session
            Session::put('compania', $request->compania);

            // Save database
            // Compania::where('COMPC_FlagEstado', 1)->update(["COMPC_FlagDefecto"  => 0]);
            // Compania::where('COMPP_Codigo', $request->compania)->update(["COMPC_FlagDefecto" => 1]);

            if ($request->ruta_actual != 'buscar-cancion') {
                return Redirect::to($request->ruta_actual);
            }
            else {
                return Redirect::to('/');
            }

        }
        else {
            return Redirect::to('/');
        }
        
    }
}
