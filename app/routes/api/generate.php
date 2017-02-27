<?php

use Aideus\Models\Link;
use Aideus\Presenters\ApiErrorPresenter;
use Aideus\Presenters\LinkPresenter;

$app->post('/api/generateUrl', function ($req, $res, $args) {
    $baseUrl = $this->get('settings')['baseUrl'];

    $data = $req->getParsedBody();

    $url = $data['url'];

    if (empty(trim($url))) {
        $error = new ApiErrorPresenter(9000, 'No URL found');
        return $res->withJson($error->toArray(), 400);
    }

    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        $error = new ApiErrorPresenter(9001, 'Valid URL required');
        return $res->withJson($error->toArray(), 400);
    }

    $link = Link::where('url', $url)->first();

    if ($link) {
        $data = new LinkPresenter($link, $baseUrl);
        return $res->withJson($data->toArray(), 201);
    }

    $newLink = Link::create([
      'url' => $url
    ]);

    $newLink->update([
      'code' => base_convert($newLink->id, 10, 36)
    ]);

    $data = new LinkPresenter($newLink, $baseUrl);

    return $res->withJson($data->toArray(), 201);
});
