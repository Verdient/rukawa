<?php

declare(strict_types=1);

namespace Verdient\Rukawa\Response;

use Verdient\http\api\Result;
use Verdient\http\component\Response;

/**
 * 抽象响应
 * @author Verdient。
 */
abstract class AbstractResponse extends \Verdient\http\api\AbstractResponse
{
    /**
     * @inheritdoc
     * @author Verdient。
     */
    public function normailze(Response $response): Result
    {
        $data = $response->getBody();
        $result = new Result;
        $code = $data['code'] ?? null;
        if($code == 200){
            $result->isOK = true;
            $result->data = $data['data'] ?? null;
        }else{
            $result->isOK = false;
            $result->errorCode = $data['code'] ?? null;
            $result->errorMessage = $data['msg'] ?? null;
        }
        return $result;
    }
}