<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RemoveMinifierTags
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($response instanceof Response && str_contains($response->headers->get('Content-Type'), 'text/html')) {
            $content = $response->getContent();

            if (!empty($content)) {
                $content = preg_replace('/<source(?![^>]*\/)>/', '<source$1 />', $content);
                $content = preg_replace('/<\/source>/i', '', $content);
                $response->setContent($content);
            }
        }

        return $response;
    }
}
