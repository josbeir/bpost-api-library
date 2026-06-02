<?php

namespace Bpost\BpostApiClient\Bpost\HttpRequestBuilder;

interface HttpRequestBuilderInterface
{
    public const METHOD_GET = 'GET';
    public const METHOD_POST = 'POST';

    public function getHeaders();

    public function getUrl();

    public function getXml();

    public function isExpectXml();

    public function getMethod();
}
