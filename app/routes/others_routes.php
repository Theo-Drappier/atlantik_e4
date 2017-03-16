<?php


$app->get('/', function () use ($app)
{
    if(is_null($app['session']->get('user')))
    {
        $render = $app['twig']->render('others/login.html.twig');
    }
    else
    {
        $render = $app['twig']->render('index.html.twig');
        $app['session']->clear();
    }
    return $render;
});

$app->post('/connection', function () use ($app)
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username=='test' && $password=='test')
    {
        $app['session']->set('is_user', true);
        $app['session']->set('user', $username);
        return $app->redirect('.');
    }
    return $app['twig']->render('login.html.twig');
});

$app->get('/test', function () use ($app)
{
    return $app['twig']->render(
        'test.html.twig'
    );
});