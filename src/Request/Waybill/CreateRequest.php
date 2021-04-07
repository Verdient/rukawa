<?php

declare(strict_types=1);

namespace Verdient\Rukawa\Request\Waybill;

use Verdient\http\api\Formatter;

/**
 * 创建面单请求
 * @property array $type 物流商
 * @property array $data 数据
 * @author Verdient。
 */
class CreateRequest extends \Verdient\http\api\AbstractRequest
{
    /**
     * @inheritdoc
     * @author Verdinet。
     */
    protected function attributes(): array
    {
        return [
            'type.type' => Formatter::STRING, // [ubex, zmc, zajil, kq, omanAS, fetchr]
            'data.declare' => Formatter::STRING, // 申报比例
            'data.declaredValueCurrency' => Formatter::STRING, // 申报币种
            'data.codAmountCurrency' => Formatter::STRING, // COD 币种
            'data.referenceNumber' => Formatter::STRING, // 订单号码
            'data.numPieces' => Formatter::INT, // 包装件数
            'data.declaredValue' => Formatter::STRING, // 申报价值(USD)
            'data.codAmount' => Formatter::STRING, // 总金额
            'data.codCollectionMode' => Formatter::STRING, // 收款方式(COD)
            'data.ofCtnx' => Formatter::INT, // 发货方式 [1 => 国内发货 2 => 国外发货]
            'data.consigner.name' => Formatter::STRING, // 发货人姓名
            'data.consigner.phoneNumber' => Formatter::STRING, // 发货人手机号码
            'data.consigner.senderAlternatePhone' => Formatter::STRING, // 发货人备用手机号码
            'data.consigner.addressFrom' => Formatter::STRING, // 发货地址
            'data.consigner.pincodes' => Formatter::STRING, // ???
            'data.consigner.citys' => Formatter::STRING, // 发货城市
            'data.consigner.states' => Formatter::STRING, // 发货国家
            'data.consignee.consigneeAddress.*.consigneeAddress' => Formatter::STRING, // 收件地址
            'data.consignee.consigneeCountry' => Formatter::STRING, // 收件国家
            'data.consignee.consigneeState' => Formatter::STRING, // 收件人所在大洲
            'data.consignee.consigneeCity' => Formatter::STRING, // 收件城市
            'data.consignee.area' => Formatter::STRING, // 收件人乡镇
            'data.consignee.consigneePhone' => Formatter::STRING,
            'data.consignee.consigneeName.*.name' => Formatter::STRING, // 收件人姓名 ???
            'data.consignee.alternatePhone' => Formatter::STRING, // 收件人备用电话
            'data.consignee.pincode' => Formatter::STRING, // ???
            'data.consignee.ConsigneeCode' => Formatter::STRING, // ???
            'data.consignee.latitude' => Formatter::STRING, // 经度
            'data.consignee.longitude' => Formatter::STRING, // 纬度
            'data.detail.*.content' => Formatter::STRING, // 商品英文描述
            'data.detail.*.cnContent' => Formatter::STRING, // 商品中文描述
            'data.detail.*.length' => Formatter::STRING, // 长度
            'data.detail.*.width' => Formatter::STRING, // 宽度
            'data.detail.*.height' => Formatter::STRING, // 高度
            'data.detail.*.weight' => Formatter::STRING, // 重量
            'data.detail.*.qty' => Formatter::INT, // 数量
            'data.detail.*.value' => Formatter::STRING, // 商品的价值
            'data.detail.*.selectedPackageTypeCode' => Formatter::STRING, // ???
            'data.detail.*.barCode' => Formatter::STRING, // ???
            'data.detail.*.hsCode' => Formatter::STRING, // 海关编码
        ];
    }
}