<?php

declare(strict_types=1);

namespace Verdient\Rukawa;

use Verdient\Rukawa\Request\Waybill\CreateRequest;
use Verdient\Rukawa\Request\Waybill\DownloadRequest;
use Verdient\Rukawa\Response\Waybill\CreateResponse;
use Verdient\Rukawa\Response\Waybill\DownloadResponse;

/**
 * 面单
 * @author Verdient。
 */
class Waybill extends AbstractClient
{
    /**
     * @inheritdoc
     * @author Verdient。
     */
    public $routes = [
        'create' => 'create',
        'download' => 'wayBillDownload',
    ];

    /**
     * 创建面单
     * @param CreateRequest 创建面单请求
     * @return CreateResponse
     * @author Verdient。
     */
    public function create(CreateRequest $request){
        return new CreateResponse($this
            ->prepareRequest('create', 'POST')
            ->setBody($request->toArray())
            ->send());
    }

    /**
     * 下载面单
     * @param DownloadRequest 创建面单请求
     * @return DownloadResponse
     * @author Verdient。
     */
    public function download(DownloadRequest $request){
        return new DownloadResponse($this
            ->prepareRequest('download', 'POST')
            ->setBody($request->toArray())
            ->send());
    }
}