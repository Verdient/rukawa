<?php

declare(strict_types=1);

namespace Verdient\Rukawa\Response\Tracking;

/**
 * 批量物流跟踪响应
 * @property string $waybill 运单号码
 * @property bool $status 状态
 * @property string $message 提示信息
 * @property string $url 下载链接
 * @author Verdient。
 */
class BatchTrackingResponse extends TrackingResponse
{

}