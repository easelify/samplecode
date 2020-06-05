<?php

namespace frontend\models;

use yii\base\Model;

/**
 * Send form
 */
class SendForm extends Model
{
    /**
     * @var string $chatid 用户ID或群组ID
     */
    public $chatid;

    /**
     * @var string $message 文本消息
     */
    public $message;

    /**
     * @var string $token 机器人token
     */
    public $token;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['chatid', 'trim'],
            [['chatid', 'message'], 'required'],
            [['chatid', 'message'], 'string', 'min' => 1, 'max' => 255],
        ];
    }

    /**
     * 使用BotAPI发送文本消息给个人或群组
     */
    public function send()
    {
        if (empty($this->token) || empty($this->chatid) || empty($this->message)) {
            return false;
        }
        try {
            $bot = new \TelegramBot\Api\BotApi($this->token);
            $bot->sendMessage($this->chatid, $this->message);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
