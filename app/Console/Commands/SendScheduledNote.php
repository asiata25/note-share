<?php

namespace App\Console\Commands;

use App\Jobs\SendEmail;
use App\Jobs\SendMail;
use App\Models\Note;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendScheduledNote extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-scheduled-note';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send scheduled note';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $notes = Note::where('is_published', true)
            ->where('send_date', '<', now())
            ->get();

        $noteCount = $notes->count();
        $this->info("Send " . $noteCount . " email(s)");

        foreach ($notes as $note) {
            SendEmail::dispatch($note);
            // $noteUrl = config('app.url') . '/notes/' . $note->id;
            // $emailContent = "hello you received a note delivery. see here: " . $noteUrl;

            // Mail::raw($emailContent, function ($message) use ($note) {
            //     $message->from("sharingiscaring@note.co.id", "ShareNote")
            //         ->to($note->recipient)
            //         ->subject('New note from: ' . $note->user->name);
            // });
        }
    }
}
