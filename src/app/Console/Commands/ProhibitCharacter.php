<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ProhibitCharacter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:prohibit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '禁則文字のテスト';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
		// UTF-8からShift-JIS Winへ変更する時の禁則文字を調べる。
	    // SJIS-Winというエンコード
	    // 無事にCSVに保存できるか調べる

	    $internal_encoding = mb_internal_encoding();
		\Log::debug(__LINE__ . ' ' .  __METHOD__ . ' [internal encoding] ' . $internal_encoding);

		// 変換したいエンコード
		$encoding = 'sjis-win';

	    $characters =
		    '⑩⑪⑫⑬⑭⑮⑯⑰⑱⑲⑳'
		    .'ⅠⅡⅢⅣⅤⅥⅦⅧⅨⅩ'
		    .'㍉㌔㌢㍍㎜㎝';

		$length = mb_strlen($characters);

		$stream = fopen('php://output', 'w');

		for ($i = 0; $i < $length; $i++) {
			$subChar = mb_substr($characters, $i, 1);
//			\Log::debug(__LINE__ . ' ' . __METHOD__ . ' ' . $subChar);

			// 変換
			$encoded = mb_convert_encoding($subChar, $encoding);

			// もとに戻してみる
			$decoded = mb_convert_encoding($encoded, $internal_encoding);

			\Log::debug(__LINE__ . ' ' . __METHOD__ . ' [src] ' . $subChar . ' [decoded] ' . $decoded);
		}

	    return 0;
    }
}
