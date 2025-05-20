<?php

namespace App\Telegram;

use App\Models\LogMessage;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Support\Stringable;

class Handler extends WebhookHandler
{
    const string ADMIN_CHAT_ID = '-1002671721460';

    public function start()
    {
        $this->chat->message('Отправь фотографию чтобы участвовать в конкурсе')->send();
    }

    public function handleChatMessage(Stringable $text): void
    {
        if ($this->message->chat()->id() > 0) {
//            $firstMessage = LogMessage::query()->where('chat_id', $this->message->from()->id())->first();

            $adminChat = TelegraphChat::query()->where('chat_id', self::ADMIN_CHAT_ID)->first();

            $adminChat->message('new message')->send();
            $adminChat->forwardMessage($this->message->from()->id(), $this->messageId)->send();

            $this->chat->message('Вы успешно зарегистрировались в конкурсе! 💌')->send();
//            $firstMessage->delete();
        }
    }
}
