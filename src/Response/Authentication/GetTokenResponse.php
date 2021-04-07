<?php

declare(strict_types=1);

namespace Verdient\Rukawa\Response\Authentication;

use Verdient\http\api\Formatter;
use Verdient\Rukawa\Response\AbstractResponse;

/**
 * 通过密码认证响应
 * @property string $token_type 令牌类型
 * @property string $access_token 授权秘钥
 * @property string $refresh_token 刷新令牌
 * @property int $expires_in 过期时间
 * @author Verdient。
 */
class GetTokenResponse extends AbstractResponse
{
    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function attributes(): array
    {
        return [
            'token_type' => Formatter::STRING,
            'access_token' => Formatter::STRING,
            'refresh_token' => Formatter::STRING,
            'expires_in' => Formatter::INT
        ];
    }
}