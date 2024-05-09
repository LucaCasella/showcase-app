<?php

namespace Service\InstagramAPI;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

interface InstagramAPIContract
{
    public function getInstagramPhoto() :void;
}
