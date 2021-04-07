<?php

declare(strict_types=1);

namespace Verdient\Rukawa\Response\Tracking;

use Verdient\http\api\Formatter;
use Verdient\Rukawa\Response\AbstractResponse;

/**
 * 物流跟踪响应
 * @property string $waybill 运单号码
 * @property bool $status 状态
 * @property string $message 提示信息
 * @property string $url 下载链接
 * @author Verdient。
 */
class TrackingResponse extends AbstractResponse
{
    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function attributes(): array
    {
        return [
            '*.*.Waybill_number' => Formatter::STRING,
            '*.*.Waybill_Status' => Formatter::STRING,
            '*.*.Last_tracking_time' => Formatter::STRING,
            '*.*.Details' => Formatter::STRING,
            '*.*.Location' => Formatter::STRING
        ];
    }
}