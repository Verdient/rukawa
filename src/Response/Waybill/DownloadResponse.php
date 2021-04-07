<?php

declare(strict_types=1);

namespace Verdient\Rukawa\Response\Waybill;

use Verdient\http\api\Formatter;
use Verdient\Rukawa\Response\AbstractResponse;

/**
 * 下载面单响应
 * @property string $waybill 运单号码
 * @property bool $status 状态
 * @property string $message 提示信息
 * @property string $url 下载链接
 * @author Verdient。
 */
class DownloadResponse extends AbstractResponse
{
    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function attributes(): array
    {
        return [
            'waybill' => Formatter::STRING,
            'status' => Formatter::BOOLEAN,
            'message' => Formatter::STRING,
            'url' => Formatter::STRING
        ];
    }
}