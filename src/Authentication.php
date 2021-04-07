<?php

declare(strict_types=1);

namespace Verdient\Rukawa;

use Verdient\Rukawa\Request\Authentication\GetTokenRequest;
use Verdient\Rukawa\Response\Authentication\GetTokenResponse;

/**
 * 认证
 * @author Verdient。
 */
class Authentication extends AbstractClient
{
    /**
     * @inheritdoc
     * @author Verdient。
     */
    public $routes = [
        'getToken' => 'getToken'
    ];

    /**
     * @inheritdoc
     * @author Verdient。
     */
    public function public()
    {
        return ['getToken'];
    }

    /**
     * 通过密码认证
     * @return GetTokenResponse
     * @author Verdient。
     */
    public function getToken(GetTokenRequest $request){
        return new GetTokenResponse($this
            ->prepareRequest('getToken', 'POST')
            ->setBody($request->toArray())
            ->send());
    }
}