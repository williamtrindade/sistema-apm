<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

/**
 * Class ConfiguracaoController
 * @package App\Http\Controllers
 */
class ConfiguracaoController extends Controller
{
    /** @var Request $request */
    private $request;

    /**
     * ConfiguracaoController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $user = $this->request->user();
        // dd($user->name);
        return view('configuracoes.index', [
            'name'=> $user->name ,'email'  => $user->email
        ]);
    }

    /**
     * @return RedirectResponse
     */
    public function updateLoginData()
    {
        if (!Auth::user()) {
            return redirect()->back();
        }
        $dataToValidate = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255'
        ];
        if ($this->request->password != null) {
            $dataToValidate['password'] = 'required|string|min:6';
        }
        $validation = Validator::make($this->request->all(), $dataToValidate);
        if ($validation->fails()) {
            $data = [];
            foreach ($validation->errors()->all() as $message) {
                $data[] = $message;
            }
            return redirect()->back()->with('errors', $data);
        }
        if ($this->request->password != null) {
            $this->request->password = $this->encryptPass($this->request->password);
        }
    
        if ($this->request->password == null) {
            $this->saveLoginData($this->request->user(), $this->request->except('password'));
        } else {
            $this->saveLoginData($this->request->user(), [
                'name'=> $this->request->name,
                'email'=> $this->request->email,
                'password'=>$this->request->password
            ]);    
        }
        return redirect()
            ->back()
            ->with(['status-success'=>'Dados salvos com sucesso']);
    }

    /**
     * @param User $user
     * @param $data
     */
    private function saveLoginData(User $user, $data)
    {
        $user->update($data);
    }

    /**
     * @param string $password
     * @return string
     */
    private function encryptPass(string $password)
    {
        return Hash::make($password);
    }
}