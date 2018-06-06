<?php
// Routes


use App\Controllers\Sample;

$app->get('/', function ($request, $response, $args) {
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

$app->group('/sample', function () {
    $this->get   ('',             Sample::class.':getAll' );
    $this->get   ('/{ID:[0-9]+}', Sample::class.':get');
    $this->post  ('',             Sample::class.':add');
    $this->put   ('/{ID:[0-9]+}', Sample::class.':update');
    $this->delete('/{ID:[0-9]+}', Sample::class.':delete');
});