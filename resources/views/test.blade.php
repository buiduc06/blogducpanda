@php
for ($i=0; $i < count(Auth::user()->user_roles->roles->role_modules) ; ++$i) { 
            // dd(Auth::user()->user_roles->roles->role_modules[0]);
            // echo Auth::user()->user_roles->roles->role_modules[0];
            $cll=collect(["$i" => Auth::user()->user_roles->roles->role_modules[$i]->id,]);
            // foreach (Auth::user()->user_roles->roles->role_modules as $key) {
            //     // $cll=collect([$i=>$key->id]);
                
            // }
            
        }
        dd(count($cll));
        return $next($request);
@endphp