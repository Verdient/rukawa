<?php

declare(strict_types=1);

namespace Verdient\Rukawa;

use chorus\InvalidCallException;

/**
 * 请求
 * @author Verdient。
 */
class Request extends \Verdient\http\Request
{
    /**
     * @var string 用户名
     * @author Verdient。
     */
    public $username = null;

    /**
     * @var string 密码
     * @author Verdient。
     */
    public $password = null;

    /**
     * @var string 临时文件夹
     * @author Verdient。
     */
    public $tmpDir = null;

    /**
     * @var string 请求路径
     * @author Verdient。
     */
    public $requestPath = null;

    /**
     * @inheritdoc
     * @author Verdient。
     */
    public function send(): Response
    {
        return new Response(parent::send());
    }

    /**
     * 附带令牌
     * @return static
     * @author Verdient。
     */
    public function withToken()
    {
        $this->addHeader('Authorization', $this->getAccessToken());
        return $this;
    }

    /**
     * 获取授权秘钥
     * @return string
     * @author Verdient。
     */
    public function getAccessToken()
    {
        $path = $this->tmpDir . DIRECTORY_SEPARATOR . 'access_token';
        if(!is_dir($this->tmpDir)){
            mkdir($this->tmpDir, 0777, true);
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
            $request = new static;
            $response = $request->setUrl($this->requestPath . '/api/getToken')->setBody([
                'name' => $this->username,
                'password' => $this->password
            ])->setMethod('POST')->send();
            if($response->getIsOK()){
                $data = $response->getData();
                $accessToken = $data['access_token'];
                $type = $data['token_type'];
                file_put_contents($path, serialize([
                    'accessToken' => $accessToken,
                    'type' => $type,
                    'expiredAt' => $data['expires_in']
                ]));
            }else{
                throw new InvalidCallException($response->getErrorMessage());
            }
        }
        return $type . ' ' . $accessToken;
    }
}