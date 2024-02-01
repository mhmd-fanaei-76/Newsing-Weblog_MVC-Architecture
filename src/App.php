<?php
namespace App;

class App
{
    public Router $router;
    protected Request $request;
    public static $basePath;
    public function __construct($basePath)
    {
        self::$basePath = $basePath;
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run()
    {
        $callback = $this->router->resolve();
        if (is_array($callback)) {
            $obj = new $callback[0];
            $method = $callback[1];
            call_user_func([$obj, $method]);
        } else {
            $callback();
        }

    }

}




?>