<?php

namespace App\Http\Middleware;

use App\Models\User;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AuthenticateApi extends Middleware
{

    protected function authenticate($request, array $guards)
    {

        $token = $request->query('api_token');

        if(empty($token)){
            $token = $request->input('api_token');
        }
        if(empty($token)){
            $token = $request->bearerToken();
        }

        $count = User::select('id')->where('api_token', '=', $token)->count();
            if( $count > 0 )
                return;

//        $this->unauthenticated($request,$guards);
        abort(401);

    }

}
