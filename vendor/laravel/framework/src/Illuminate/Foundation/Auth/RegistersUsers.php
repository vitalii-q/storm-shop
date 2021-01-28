<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.check');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        // самописный код ------------------------------
        $this->validator($request->all())->validate();

        $keys = ['_token', 'email', 'first_name', 'password']; // массив с ключами
        $values = [$request->_token, $request->register_email, $request->register_first_name, $request->register_password];
        $values = array_values($values); // собираем значения из массива
        $data = array_combine($keys, $values); // формируем массив ключ => значение

        event(new Registered($user = $this->create($data))); // создание пользователя в БД

        // стандартный код------------------------------
        //$this->validator($request->all())->validate(); // вызов validator в RegisterController.php

        //event(new Registered($user = $this->create($request->all()))); // создание пользователя в БД

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
