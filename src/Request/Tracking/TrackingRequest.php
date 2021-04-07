<?php

declare(strict_types=1);

namespace Verdient\Rukawa\Request\Tracking;

use Verdient\http\api\Formatter;

/**
 * 物流追踪请求
 * @property array $type 物流商
 * @property array $data 数据
 * @author Verdient。
 */
class TrackingRequest extends \Verdient\http\api\AbstractRequest
{
    /**
     * @inheritdoc
     * @author Verdinet。
     */
    public function attributes(): array
    {
        return [
            'type.type' => Formatter::STRING, // [ubex, zmc, zajil, kq, omanAS, fetchr]
            'data.*.waybill' => Formatter::STRING, // 运单号
        ];
    }
}