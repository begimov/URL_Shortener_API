<?php

namespace Aideus\Presenters;

use Aideus\Models\Link;

class LinkPresenter
{
    private $link;
    private $baseUrl;

    public function __construct(Link $link, $baseUrl)
    {
        $this->link = $link;
        $this->baseUrl = $baseUrl;
    }

    public function toArray()
    {
        return [
          'url' => $this->link->url,
          'response' => [
            'url' => "{$this->baseUrl}/{$this->link->code}",
            'code' => $this->link->code
          ]
        ];
    }
}
