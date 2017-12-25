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

            /**
             * Filter by firstname
             */
            if (!empty($params['first_name'])) {
                $query = $query->where('first_name', 'LIKE', '%' . $params['first_name'] . '%');
            }
            /**
             * Filter by lastname
             */
            if (!empty($params['last_name'])) {
                $query = $query->where('last_name', 'LIKE', '%' . $params['last_name'] . '%');
            }
            /**
             * Filter by email
             */
            if (!empty($params['email'])) {
                $query = $query->where('email', 'LIKE', '%' . $params['email'] . '%');
            }
            /**
             * Filter by birth date From-TO
             */
            if (!empty($params['birth-date']['from'])) {
                $query = $query->where('birth_date', '>=', $params['birth-date']['from']);
            }

            if (!empty($params['birth-date']['to'])) {
                $query = $query->where('birth_date', '<=', $params['birth-date']['to']);
            }
            /**
             * Filter by registration date From-TO
             */
            if (!empty($params['created-at']['from'])) {
                $query = $query->where('created_at', '>=', $params['created-at']['from']);
            }

            if (!empty($params['created-at']['to'])) {
                $query = $query->where('created_at', '<=', $params['created-at']['to']);
            }


//            if (!empty($params['interest-ids'])) {
//                $query = $query->whereHas('user_interests', function($query) use ($params) {
//                    $query->whereIn('user_interests.interest_id', $params['interest-ids']);
//                });
//            }

            /**
             * Filter by interests
            */
            if (!empty($params['interest-ids'])) {
                foreach ($params['interest-ids'] as $interest_id) {
                    $query = $query->whereHas('user_interests', function($query) use ($interest_id) {
                        $query->where('user_interests.interest_id', $interest_id);
                    });
                }
            }


            $users = $query->get();
            $interests = Interest::all();
            return App::render('main', compact('interests', 'params', 'users'));
        }
    ],


];



