<?php

use Aideus\Models\Link;

$app->post('/api/generateUrl', function ($req, $res, $args) {
    $data = $req->getParsedBody();

    $url = $data['url'];

    if (empty(trim($url))) {
        $data = [
          'error' => [
          'code' => 'errorCode 1',
          'message' => 'No URL found'
          ]
        ];
        return $res->withJson($data, 400);
    }

    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        $data = [
          'error' => [
          'code' => 'errorCode 2',
          'message' => 'Valid URL required'
          ]
        ];
        return $res->withJson($data, 400);
    }

    $link = Link::where('url', $url)->first();

    if ($link) {
        $data = [
          'url' => $link->url,
          'response' => [
          'url' => "{$this->get('settings')['baseUrl']}/{$link->code}",
          'code' => $link->code
          ]
        ];
        return $res->withJson($data, 201);
    }

    $newLink = Link::create([
      'url' => $url
    ]);

    $newLink->update([
      'code' => base_convert($newLink->id, 10, 36)
    ]);

    $data = [
      'url' => $url,
      'response' => [
      'url' => "{$this->get('settings')['baseUrl']}/{$newLink->code}",
      'code' => $newLink->code
      ]
    ];
    return $res->withJson($data, 201);
});
