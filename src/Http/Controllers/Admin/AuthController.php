<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Presenters\Admin\AuthPresenter;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Where to redirect the users after logging out.
     *
     * @var string
     */
    protected $redirectAfterLogout = '/admin/auth/login';

    /**
     * @var AuthPresenter
     */
    protected $presenter;

    /**
     * Create a new authentication controller instance.
     *
     * @param AuthPresenter $presenter
     */
    public function __construct(AuthPresenter $presenter)
    {
        $this->presenter = $presenter;
    }

    /**
     * {@inheritdoc}
     */
    public function showLoginForm()
    {
        $form = $this->presenter->form();

        return view('admin.auth.login', compact('form'));
    }
}
