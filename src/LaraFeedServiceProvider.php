<?php

namespace ExampleProject\LaraFeed;

use Illuminate\Support\ServiceProvider;

class LaraFeedServiceProvider extends ServiceProvider
{
    public function boot()
    {
        
        $this->loadViewsFrom(__DIR__.'/resources/views', 'larafeed');

        if ($this->app->runningInConsole()) {
            
            $this->publishes([
                __DIR__.'/database/migrations/xxxx_xx_xx_xxxxxx_create_feedbacks_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_feedbacks_table.php'),
            ], 'migrations');

            
            $this->publishes([
                __DIR__.'/resources/js/feedback.js' => public_path('larafeed/js/feedback.js'),
                __DIR__.'/resources/css/feedback.css' => public_path('larafeed/css/feedback.css'),
            ], 'public');

            
            $this->publishes([
                __DIR__.'/resources/views' => resource_path('views/larafeed'),
            ], 'views');

            
        }
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
    }

    public function register()
    {
        
    }
}
