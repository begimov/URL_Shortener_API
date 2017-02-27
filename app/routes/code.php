<?php

use Aideus\Models\Link;

$app->get('/{code}', function ($req, $res, $args) {
    $link = Link::where('code', $args['code'])->first();

    if ($link) {
        return $res->withStatus(302)->withHeader('Location', $link->url);
    }

    return $res->withStatus(302)->withHeader('Location', $this->router->pathFor('home'));
});
