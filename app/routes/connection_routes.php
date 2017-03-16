<?php

$app->get('/', function () use ($app)
{
    if(is_null($app['session']->get('user')))
    {
        $render = $app['twig']->render('users/login.html.twig');
    }
    else
    {
        $render = $app['twig']->render(
            'index.html.twig'
        );
    }
    return $render;
});

$app->post('/connection', function () use ($app)
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username != '' && $password != '')
    {
        $user = $app['build.users']->exists($username, $password);
        if(sizeof($user)==1)
        {
            $app['session']->set('is_user', true);
            $app['session']->set('user', $user);
            return $app->redirect('.');
        }
    }
    return $app['twig']->render('users/login.html.twig');
});

$app->get('/disconnect', function () use ($app)
{
    $app['session']->clear();
    return $app->redirect('.');
});

$app->get('/register', function () use ($app)
{
    return $app['twig']->render('users/register.html.twig');
});

$app->post('/register', function() use ($app)
{

});
