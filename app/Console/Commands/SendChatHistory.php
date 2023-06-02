<?php

namespace App\Console\Commands;

use App\Models\Chat;
use App\Models\Message;
use App\Mail\SendChatHistoryMail;
use Mail;

use Illuminate\Console\Command;

class SendChatHistory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:chatHistory';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enviará al finalizar el día el historial del chat a cada usuario';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $chats = Chat::all();
        foreach ($chats as $chat) {
            $messages = Message::where('chat_id', $chat->id)
                ->with('user')
                ->orderBy('created_at', 'DESC')
                ->get();

            $uniqueEmails = [];
            foreach ($messages as $message) {
                $email = $message['user']['email'];
                $name = $message['user']['name'];

                if (!in_array($email, $uniqueEmails)) {
                    $uniqueEmails[] = $email;
                }
            }

            $messageOfTheDay = [
                'messages' => $messages,
                'chat' => $chat->name
            ];

            foreach ($uniqueEmails as $email) {
                $sendChatHistory = Mail::to($email, $name)
                    ->queue(new SendChatHistoryMail($messageOfTheDay));
            }
        }

        // $this->info('Running queue:work...');
        // Artisan::call('queue:work');
        // $this->info('Queue processed.');

        return Command::SUCCESS;
    }
}
