<?php

namespace App\Model\message;

use Illuminate\Database\Eloquent\Model;

use Flc\Dysms\Client;
use Flc\Dysms\Request\SendSms;
use Illuminate\Support\Facades\Redis;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;


/**
 * Created by PhpStorm.
 * User: zhaoyifei
 * Date: 2017/11/15
 * Time: 13:25
 *
 * 发送短信验证码服务
 *
 * Class SendSms
 */
class SMS
{
    private static $config = [
        'accessKeyId'=> 'LTAIetnFDud6qAhM',
        'accessKeySecret' => 'uIHPvwzBzDh4cht27LANlku7oP8ekt',
    ];
    //发送短信的模板(1:注册验证码  2:修改密码  3:修改手机号  4:找回密码验证码)
    private static $smsTemplate = array("0","SMS_112865157","SMS_112865156","SMS_112865155","SMS_113455188");

    //用于存储缓存中表示的验证码用途(1:注册验证码  2:修改密码  3:修改手机号  4:找回密码验证码)
    private static $smsType = array("0","register","editpwd","editphone","retrievepwd");


    /**
     *   发送验证码
     */
   public static function sendMobileCode($phone, $action)
    {
        if($action ==3){
            return BaseModel::formatError(BaseModel::BAD_REQUEST,'该功能暂时未开放!');
        }
        //生成随机6位数字作为验证码
        $smsNumber = self::smsNumber();
        $redis   = new Redis;

        //用于存储redis缓存的键
        $smsCodekey = self::smsCodekey($action,$phone);

        //查看发送返回信息
        $result = self::sendSms($phone,$action,$smsNumber);

        if($result){
            return BaseModel::formatError(BaseModel::BAD_REQUEST,$result['info']);
        }

        //开始redis存储
        $res = $redis::setex($smsCodekey, 300, $smsNumber);

        //查看是否存储成功
        if($redis::exists($smsCodekey)){
            return BaseModel::formatBody(['info' => '发送成功']);
        }
        return BaseModel::formatError(self::UNKNOWN_ERROR);
    }
    //开始发送这
    private static function sendSms($phone, $action, $smsNumber)
    {
        $sendSms = new SendSms;
        $client  = new Client(self::$config);
        $sendSms->setPhoneNumbers($phone);// 用户手机号，接收验证码`
        $sendSms->setSignName('旭日东升');// 短信签名,可以在阿里大鱼的管理中心看到
        $sendSms->setTemplateCode(self::$smsTemplate[$action]);// 阿里大于(鱼)短信模板ID
        $sendSms->setTemplateParam(['code' => $smsNumber]);
        $sendSms->setOutId('demo');
        $result = $client->execute($sendSms);
        if ($result->Code != 'OK') { //判断result对象中success 时候为真
            if($result->Code == 'isv.BUSINESS_LIMIT_CONTROL'){
                return array('info' => '不能频繁发送，请稍候再试!');
            }else{
                return array('info' => '发送失败请重试!');
            }
        }
    }

    //生成随机验证码
    private static function smsNumber()
    {
        //生成随机数字短信验证码
        return rand(100000, 999999);
    }

    //生成redis 存储键
    private static function smsCodekey($action, $phone)
    {
        return 'smscode:'.self::$smsType[$action].":".$phone;
    }

}
