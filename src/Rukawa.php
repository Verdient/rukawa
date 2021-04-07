<?php

declare(strict_types=1);

namespace Verdient\Rukawa;

use chorus\BaseObject;

/**
 * Rukawa
 * @author Verdient。
 */
class Rukawa extends BaseObject
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
    public function init()
    {
        parent::init();
        if($this->tmpDir === null){
            $this->tmpDir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'rukawa';
        }
    }

    /**
     * 获取认证客户端
     * @return Authentication
     * @author Verdient。
     */
    public function authentication(){
        return new Authentication($this);
    }

    /**
     * 获取面单客户端
     * @return Waybill
     * @author Verdient。
     */
    public function waybill(){
        return new Waybill($this);
    }

    /**
     * 获取物理追踪客户端
     * @return Tracking
     * @author Verdient。
     */
    public function tracking(){
        return new Tracking($this);
    }
}