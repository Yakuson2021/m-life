web: vendor/bin/heroku-php-apache2 public

public function boot()
{
    // 以下を追記
    if (\App::environment('production')) {
        \URL::forceScheme('https');
    }
}
