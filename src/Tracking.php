<?php

declare(strict_types=1);

namespace Verdient\Rukawa;

use Verdient\Rukawa\Request\Tracking\BatchTrackingRequest;
use Verdient\Rukawa\Request\Tracking\TrackingRequest;
use Verdient\Rukawa\Response\Tracking\BatchTrackingResponse;
use Verdient\Rukawa\Response\Tracking\TrackingResponse;

/**
 * 物流跟踪
 * @author Verdient。
 */
class Tracking extends AbstractClient
{
    /**
     * @inheritdoc
     * @author Verdient。
     */
    public $routes = [
        'tracking' => 'tracking',
        'batchTracking' => 'BatchTracking',
    ];

    /**
     * 查询单个物流轨迹
     * @param TrackingRequest 创建面单请求
     * @return TrackingResponse
     * @author Verdient。
     */
    public function tracking(TrackingRequest $request){
        return new TrackingResponse($this
            ->prepareRequest('tracking', 'POST')
            ->setBody($request->toArray())
            ->send());
    }

    /**
     * 下载面单
     * @param BatchTrackingRequest 创建面单请求
     * @return BatchTrackingResponse
     * @author Verdient。
     */
    public function batchTracking(BatchTrackingRequest $request){
        return new BatchTrackingResponse($this
            ->prepareRequest('batchTracking', 'POST')
            ->setBody($request->toArray())
            ->send());
    }
}