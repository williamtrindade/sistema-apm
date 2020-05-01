<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConfiguracaoController extends Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        return view('configuracoes.index');
    }

    public function updateLoginData()
    {
        $validation = Validator::make($this->request->all(), [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if ($validation->fails()) {
            $data = [];
            foreach ($validation->errors()->all() as $message) {
                $data[] = $message;
            }
            return redirect()->back()->with('errors', $data);
        }
    }
}