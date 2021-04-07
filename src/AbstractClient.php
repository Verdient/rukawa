<?php

declare(strict_types=1);

namespace Verdient\Rukawa;

use chorus\InvalidCallException;
use Verdient\Rukawa\Request\Authentication\GetTokenRequest;

/**
 * 抽象客户端
 * @author Verdient。
 */
abstract class AbstractClient extends \Verdient\http\component\Component
{
    /**
     * @inheritdoc
     * @author Verdient。
     */
    public $routePrefix = 'api';

    /**
     * @var Rukawa 客户端
     * @author Verdient。
     */
    public $client = null;

    /**
     * @param Rukawa $selva Selva组件
     * @author Verdient。
     */
    public function __construct(Rukawa $rukawa){
        $this->client = $rukawa;
        parent::__construct([
            'host' => $rukawa->host,
            'port' => $rukawa->port
        ]);
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    public function getUrl($name){
        if(isset($this->_requestUrl[$name])){
            return $this->_requestUrl[$name];
        }
        return $this->getRequestPath() . '/' . lcfirst(basename(str_replace('\\', '/', static::class))) . '/' . $name;
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    public static function requestClass(){
        return Request::class;
    }

    /**
     * 公开接口
     * @return array
     * @author Verdient。
     */
    public function public(){
        return [];
    }

    /**
     * @inheritdoc
     * @author Verdient。
     */
    public function prepareRequest($name, $method = 'POST'){
        $request = parent::prepareRequest($name, $method);
        if(!in_array($name, $this->public())){
            $token = $this->getAccessToken();
            $request->addHeader('Authorization', $token['type'] . ' ' . $token['accessToken']);
        }
        return $request;
    }

    /**
     * 获取授权秘钥
     * @return string
     * @author Verdient。
     */
    public function getAccessToken(){
        $path = $this->client->tmpDir . DIRECTORY_SEPARATOR . 'access_token';
        if(!is_dir($this->client->tmpDir)){
            mkdir($this->client->tmpDir, 0777, true);
        }
        $accessToken = null;
        $type = null;
        if(file_exists($path)){
            try{
                $content = unserialize(file_get_contents($path));
                $expiredAt = $content['expiredAt'] ?? 0;
                if($expiredAt > time() - 60){
                    $accessToken = $content['accessToken'] ?? null;
                    $type = $content['type'] ?? null;
                }
            }catch(\Exception $e){
                unlink($path);
            }
        }
        if(!$accessToken){
            $authentication = new Authentication($this->client);
            $response = $authentication->getToken(new GetTokenRequest([
                'name' => $this->client->username,
                'password' => $this->client->password
            ]));
            if($response->getIsOK()){
                $accessToken = $response->access_token;
                $type = $response->token_type;
                file_put_contents($path, serialize([
                    'accessToken' => $accessToken,
                    'type' => $type,
                    'expiredAt' => $response->expires_in
                ]));
            }else{
                throw new InvalidCallException($response->getErrorMessage());
            }
        }
        return ['type' => $type, 'accessToken' => $accessToken];
    }
}