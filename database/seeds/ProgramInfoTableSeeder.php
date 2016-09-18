<?php

declare(strict_types = 1);

use Illuminate\Database\Seeder;

class ProgramInfoTableSeeder extends AppSeeder
{
    private $program_info;

    public function __construct(
        \App\Services\ProgramInfoService $program_info
    ) {
        $this->program_info = $program_info;
    }

    public function run()
    {
        DB::table('program_infos')->delete();

        $program_infos =
        [
            [
                'program_id' => '1',
                'description' => '個人が妄信的に信じ込む“説”を芸能人・有名人たちが独自の目線と切り口で、松本人志とゲストたちにプレゼン。その“説”について、実験ロケも交えながら激論を展開するバラエティー。浜田雅功が進行役を務める。',
                'next_broadcast_time' => '20160921',
                'next_description' => 'ダウンタウンに代わり、物まねコンビのダウソタウソのMCで送る「水曜日のダウソタウソ」を。物まね芸人・宮川大好が、「水曜日のダウンタウン　モノマネ芸人に頼りすぎ説」をプレゼン。番組に物まね芸人が登場する回数が多過ぎることを過去のVTRを基に検証する。ゲストはウドの鈴木、まねだ聖子ら。（変更あり）',
                'privilege_1' => '「水曜日のダウンタウン」DVD、最新第5巻を、20名様にプレゼント！',
                'privilege_2' => '2016年10月28日放映分の特別招待券を応援ランキング上位20名様にプレゼント！さらに、上位5名様にはダウンタウンとの記念撮影も！'
            ],
            [
                'program_id' => '2',
                'description' => '(日)22:00～23:00。世の中でまだあまり知られていない情報や とっておきの知恵などを、日本全国１億３千万人の国民から大募集！その中から厳選したネタを、メディアでも引っ張りだこの人気予備校講師・林先生に出題。',
                'next_broadcast_time' => '20160925',
                'next_description' => '小顔になれる日本人ならではの分け目の法則や、ピッツァの有名店が使うチーズの秘密など、幅広いジャンルから選りすぐりの知識や情報が続々登場！はたして初耳学に認定されるのは！？',
                'privilege_1' => '番組公式BOOK「林先生が驚く初耳学①」！林先生のサイン入り！',
                'privilege_2' => '2016年10月25日放映分の特別招待券を応援ランキング上位20名様にプレゼント！さらに、上位5名様には林先生との記念撮影も！'
            ],
            [
                'program_id' => '3',
                'description' => '(木)01:28～01:58。AKB48の姉妹グループHKT48が地元・福岡を中心に、九州の街を“ブラ歩き”しながら様々な人と触れ合いファンを増やしていく旅バラエティ番組！',
                'next_broadcast_time' => '20160922',
                'next_description' => 'HKT48のメンバーが体を張ってあらゆるスポットにおでかけ┏( ^o^)┛しちゃうファン獲得バラエティ！アイドルらしからぬ爆笑珍道中に指原＆フット後藤がダメ出し',
                'privilege_1' => 'DVD「HKT48成長期　腐ったら負け」を出演メンバーのサイン入りでプレゼント',
                'privilege_2' => '2016年10月29日放映分の特別招待券を応援ランキング上位20名様にプレゼント！さらに、上位5名様には出演者との記念撮影も！'
            ],
            [
                'program_id' => '4',
                'description' => '(木)00:58～01:28。SMAPの稲垣吾郎がMCを務める業界唯一無二のブックバラエティ。毎週一冊、巷で話題の本からベストセラーまで様々な本を紹介！',
                'next_broadcast_time' => '20160922',
                'next_description' => '映画を撮れば数々の映画賞を受賞し、小説を書けば直木賞候補に2回も選出！西川美和監督の細かすぎる創作ノートも大公開！',
                'privilege_1' => '稲垣が番組で紹介したおすすめ本をサイン入りでプレゼント！',
                'privilege_2' => '2016年10月29日放映分の特別招待券を応援ランキング上位20名様にプレゼント！さらに、上位5名様には出演者との記念撮影も！'
            ]
        ];

        foreach ($program_infos as $index => $program_info) {
            $programInfoData = $this->program_info->create(intval($program_info['program_id']), $program_info['description'], $program_info['next_broadcast_time'], $program_info['next_description'], $program_info['privilege_1'], $program_info['privilege_2']);
            $this->changeId($programInfoData, $index + 1);
        }
    }
}
