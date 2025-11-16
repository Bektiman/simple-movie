<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckMembership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(!$request->has('membership')) {
            return redirect('/pricing');
        }

        Log::channel('middlewarelog')->info(
            'Before Request',
            ['url'=> $request->url(),
            'params'=>$request->all(),]
        ); //melakukan log pesan before request

        $response = $next($request);
        //sleep(2);
        Log::channel('middlewarelog')->info(
            'After Request',
            ['status'=> $response->getStatusCode(),
            'content'=>$response->getContent(),]
        );

        return $response;
    }
}
