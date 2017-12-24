<?php
require_once 'App.php';
use App\App as App;
use App\Models\User;
use App\Models\UserInterest;
use App\Models\Interest;
use Rakit\Validation\Validator as Validator;

return [

    [
        'method' => 'GET',
        'pattern' => '/',
        'handler' => function($request){
            $interests = Interest::all();
            return App::render('main', [
                'interests' => $interests,
                'params' => $request['params']
            ]);
        }
    ],

    [
        'method' => 'GET',
        'pattern' => '/sign-up',
        'handler' => function($request){
            $errors = [];
            $rules = [
                'email' => 'required|email',
                'login' => 'required|min:6',
                'password' => 'required|min:6',
                'password2' => 'required|same:password',
                'agree' => 'required',
            ];
            if ($request['info']['REQUEST_METHOD'] == 'POST') {
                list($clean_params, $errors) = App::validator($request['params'], $rules);
                /* validate DB fields */
                if (User::where('login', $clean_params['login'])->count()) { $errors['login'] = 'Login must be unique'; }
                if (User::where('email', $clean_params['email'])->count()) { $errors['email'] = 'Email must be unique'; }
                if (!$errors) {
                    $user = User::create($clean_params);
                    $_SESSION['user'] = $user;
                    return App::redirect('/');
                }
            }
            return App::render('signup', [
                'errors' => $errors,
                'params'  => $request['params'],
            ]);
        }
    ]





];



