<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LowercaseRouteParameters
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $route = $request->route();
        
        if ($route) {
            $parameters = $route->parameters();
            $originalUri = $request->getRequestUri();
            
            // Convert parameters to lowercase
            $converted = false;
            foreach ($parameters as $key => $value) {
                if (is_string($value) && $value !== strtolower($value)) {
                    $parameters[$key] = strtolower($value);
                    $converted = true;
                }
            }
            
            // If any parameters were converted, redirect to lowercase version
            if ($converted) {
                // Construct URL manually to avoid route generation issues
                $path = '/' . implode('/', $parameters);
                $lowercaseUrl = $request->getSchemeAndHttpHost() . $path;
                
                // Preserve query parameters
                if ($request->getQueryString()) {
                    $lowercaseUrl .= '?' . $request->getQueryString();
                }
                
                return redirect($lowercaseUrl, 301); // 301 permanent redirect
            }
        }

        return $next($request);
    }
}
