<?php
namespace App;

class Router
{
    protected Request $request;
    protected $routs;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get($uri, $callback)
    {
        $this->routs['get'][$uri] = $callback;
    }

    public function post($uri, $callback)
    {
        $this->routs['post'][$uri] = $callback;

    }

    public function resolve()
    {
        $uri = $this->request->getUrl();
        $method = Request::method();
        return $this->routs[$method][$uri];
    }

}





?>