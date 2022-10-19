<?php

namespace App\Console\Commands;

//use App\Mail\MailTest;
use App\Mail\MailTest;
use Aws\Exception\AwsException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class mailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'メールを送信する検証(AWS SES)';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
		$this->ses();
        return 0;
    }

	private function ses()
	{
		// テスト用のメールを実行してみる。

//		$mail = new MailTest;
//		$mail->build();

		try {
			$to = 'zzz_hirano@yahoo.co.jp';

			$userName = 'foobar';

			Mail::to($to)
				->send(new MailTest($userName));
		} catch (AwsException $e) {
			echo $e->getMaessage() . PHP_EOL;

		}
	}
}
