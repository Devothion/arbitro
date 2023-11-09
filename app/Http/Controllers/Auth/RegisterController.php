<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'ape_pat'           => $data['ape_pat'],
            'ape_mat'           => $data['ape_mat'],
            'name'              => $data['name'],
            'telefono'          => $data['telefono'],
            'telefono_opc'      => $data['telefono_opc'],
            'email'             => $data['email'],
            'tip_calle'         => $data['tip_calle'],
            'nombre_calle'      => $data['nombre_calle'],
            'numero'            => $data['numero'],
            'urbanizacion'      => $data['urbanizacion'],
            'referencia'        => $data['referencia'],
            'departamento'      => $data['departamento'],
            'provincia'         => $data['provincia'],
            'distrito'          => $data['distrito'],
            'dni'               => $data['dni'],
            'password'          => Hash::make($data['password']),
        ]);
    }
}
