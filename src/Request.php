<?php

declare(strict_types=1);

namespace Verdient\Rukawa;

use Tuupola\Base62Proxy;
use Verdient\signature\Signature;

/**
 * 请求
 * @author Verdinet。
 */
class Request extends \Verdient\http\component\Request
{
    /**
     * @inheritdoc
     * @author Verdient。
     */
    public function prepare(){
        parent::prepare();
        // $get = parse_url($this->getUrl(), PHP_URL_QUERY);
        // $post = $this->getContent();
        // $signString = $get . "\n" . $post . "\n";
        // $signature = (new Signature())->sign($signString, $this->component->signKey);
        // $signature = Base62Proxy::encode(random_bytes(10) . $signature);
        // $this->addHeader('Signature', $signature);
    }
}