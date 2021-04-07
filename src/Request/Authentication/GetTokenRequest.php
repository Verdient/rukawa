<?php

declare(strict_types=1);

namespace Verdient\Rukawa\Request\Authentication;

use Verdient\http\api\Formatter;

/**
 * 通过密码认证请求
 * @property string $username 用户名
 * @property string $password 密码
 * @author Verdient。
 */
class GetTokenRequest extends \Verdient\http\api\AbstractRequest
{
    /**
     * @inheritdoc
     * @author Verdinet。
     */
    protected function attributes(): array
    {
        return [
            'name' => Formatter::STRING,
            'password' => Formatter::STRING
        ];
    }
}