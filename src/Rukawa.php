<?php

declare(strict_types=1);

namespace Verdient\Rukawa;

use Verdient\HttpAPI\AbstractClient;

/**
 * Rukawa
 * @author Verdient。
 */
class Rukawa extends AbstractClient
{
    /**
     * @var string 主机地址
     * @author Verdient。
     */
    public $host = '127.0.0.1';

    /**
     * @var int 端口
     * @author Verdient。
     */
    public $port = 80;

    /**
     * @var string 签名秘钥
     * @author Verdient。
     */
    public $signKey = '';

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
     * @inheritdoc
     * @author Verdient。
     */
    public function __construct($config = [])
    {
        parent::__construct($config);
        if($this->tmpDir === null){
            $this->tmpDir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'rukawa';
        }
    }

    /**
     * 获取请求
     * @return Request
     * @author Verdient。
     */
    public function request($path): Request
    {
        $this->request = Request::class;
        $request = parent::request($path);
        $request->bodySerializer = 'json';
        $request->username = $this->username;
        $request->password = $this->password;
        $request->tmpDir = $this->tmpDir;
        $request->requestPath = $this->getRequestPath();
        return $request;
    }
}