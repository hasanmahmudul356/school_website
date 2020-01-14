<?php
namespace Tmss\School_website\Http\Middleware;

use Closure;
use Tmss\School_website\Http\Models\WebsiteConfig;

class GlobalShareMiddleware
{
    public function handle($request, Closure $next)
    {
        $configs = WebsiteConfig::get();
        $config_data = [];
        $config_head = [];
        if (count($configs) > 0){
            foreach ($configs as $config){
                $config_data[$config->name] = $config->value;
                $config_head[$config->name] = $config->display_name;
            }
        }
        view()->share('config', $config_data);
        view()->share('config_head', $config_head);

        return $next($request);
    }

}