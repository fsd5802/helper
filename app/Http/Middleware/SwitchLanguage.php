<?php

namespace App\Http\Middleware;
use App;
use Closure;
use Illuminate\Http\Request;
use View;
class SwitchLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        //first hageb kol l languages elly 3andy;
        $langs = config('app.supportedLocales');

        //second hageb l parameters elly 3ndy fl request kolha;
        $params = $request->route()->parameters();

        //third hageb l parameter elly esmo $locale elly fl url 3ndy;

        $locale = $params['locale'];
         
        //make condition 3lshan at2kd en l request gayly b locale sa7 wla la , wlw kda arg3o ll default;

        if($locale && in_array($locale , $langs))
        {
          App::setLocale($locale);
        }
        else
        {
            return redirect(App::getLocale());
        }
        return $next($request);
    }
}
