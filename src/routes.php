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
            $query = User::query();

            $params = $request['params'];

            // TODO: last_name, email

            if (!empty($params['first_name'])) {
                $query = $query->where('first_name', 'LIKE', '%' . $params['first_name'] . '%');
            }

            if (!empty($params['birth-date']['from'])) {
                $query = $query->where('birth_date', '>=', $params['birth-date']['from']);
            }

            if (!empty($params['birth-date']['to'])) {
                $query = $query->where('birth_date', '<=', $params['birth-date']['to']);
            }

            if (!empty($params['created-at']['from'])) {
                $query = $query->where('created_at', '>=', $params['created-at']['from']);
            }

            if (!empty($params['created-at']['to'])) {
                $query = $query->where('created_at', '<=', $params['created-at']['to']);
            }

            $users = $query->get();

            $interests = Interest::all();
            return App::render('main', compact('interests', 'params', 'users'));
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



