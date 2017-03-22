<?php

$app->before(function() use ($app)
{
    if($app['session']->get('is_user'))
    {
        $app['session']->set('currentUser', $app['session']->get('user'));
    }
    else
    {
        $app->redirect('.');
    }
});

$app->get('/', function () use ($app)
{
    if(!$app['session']->get('is_user'))
    {
        $render = $app['twig']->render('users/login.html.twig', array('error' => $app['session']->get('error')));
    }
    else
    {
        $links = $app['build.link']->findAll();
        $render = $app['twig']->render(
            'index.html.twig', array('user' => $app['session']->get('currentUser'), 'links' => $links, 'error' => $app['session']->get('error'))
        );
    }
    $app['session']->set('error', 200);
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
    $app['session']->set('error', 400);
    return $app['twig']->render('users/login.html.twig', array('error' => $app['session']->get('error')));
});

$app->get('/disconnect', function () use ($app)
{
    $app['session']->clear();
    return $app->redirect('.');
});

$app->get('/register', function () use ($app)
{
    return $app['twig']->render('users/register.html.twig', array('error' => $app['session']->get('error')));
});

$app->post('/register', function() use ($app)
{
    $userAdd = array();
    $userAdd['firstname'] = $_POST['firstname'];
    $userAdd['lastname'] = $_POST['lastname'];
    $userAdd['address'] = $_POST['address'];
    $userAdd['postcode'] = $_POST['postcode'];
    $userAdd['city'] = $_POST['city'];
    $userAdd['email'] = $_POST['email'];
    $userAdd['password'] = $_POST['password'];
    $password2 = $_POST['password2'];
    if($userAdd['password'] != $password2)
    {
        $app['session']->set('error', 300);
        return $app->redirect('register');
    }
    else
    {
        $result = $app['build.users']->insert($userAdd);
        if(500 == $result->code)
        {
            $app['session']->set('error', 500);
            return $app->redirect('register');
        }
    }
    return $app->redirect('.');
});
/**
$app->error(function() use ($app)
{
    return $app['twig']->render('others/404.html.twig', array('user' => $app['session']->get('currentUser')));
});*/