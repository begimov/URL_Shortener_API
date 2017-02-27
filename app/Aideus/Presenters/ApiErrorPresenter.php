<?php

namespace Aideus\Presenters;

class ApiErrorPresenter extends Presenter
{
    private $code;
    private $message;

    public function __construct($code, $message)
    {
        $this->code = $code;
        $this->message = $message;
    }

    public function toArray()
    {
        return [
          'error' => [
            'code' => $this->code,
            'message' => $this->message
          ]
        ];
    }
}
