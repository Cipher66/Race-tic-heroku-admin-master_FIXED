<?php
namespace App\Http\Controllers;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Http\Request;
    use App\UserFormRequest;
    use App\User;

class GestionarUsuariosController extends Controller
{

    public function ver()
    {
        //function que retorna los usuarios
        $usuarios = DB::table('users')->get();
        return view('admin.admin', ['usuarios' => $usuarios]);
    }
    public function eliminar($id)
    {
        //funcion que elimina usuarios
        DB::table('users')->where('id', '=', $id)->delete();
        return redirect('/admin/VerUsuarios');
    }
    public function editar($id)
    {
        //funcion que edita usuarios
        $data = User::find($id);
        return view('admin.editarUsuarios', compact('data'));
    }
    public function update(Request $request, $id)
    {
        //funcion que actualiza los datos del usuario
        $data = User::find($id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->update();
        return redirect('/admin/VerUsuarios');
    }

}
