<?php

declare(strict_types=1);

namespace Verdient\Rukawa\Response\Waybill;

use Verdient\http\api\Formatter;
use Verdient\Rukawa\Response\AbstractResponse;

/**
 * 创建面单响应
 * @property string $orderId 订单编号
 * @property string $waybill 运单号码
 * @property bool $status 状态
 * @property mixed $logistic 物流商原文
 * @author Verdient。
 */
class CreateResponse extends AbstractResponse
{
    /**
     * @inheritdoc
     * @author Verdient。
     */
    protected function attributes(): array
    {
        return [
            'orderId' => Formatter::STRING,
            'waybill' => Formatter::STRING,
            'status' => Formatter::BOOLEAN,
            'logistic' => Formatter::ANY
        ];
    }
}