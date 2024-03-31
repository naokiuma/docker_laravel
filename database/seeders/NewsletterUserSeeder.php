<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NewsletterUser;
use Illuminate\Support\Str;


class NewsletterUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
			'taro' => '太郎',
			'jiro' => '次郎',
			'saburo' => '三郎',
			'shiro' => '四郎',
			'goro' => '五郎',
			'rokuro' => '六郎',
			'shichiro' => '七郎',
			'hachiro' => '八郎',
			'kuro' => '九郎',
		];
	
		foreach ($names as $name_en => $name_jp) {
	
			$uuid = ($name_en === 'taro')
				? 'taro0000-0000-0000-0000-000000000000' // テストのため、太郎のため 固定 UUID
				: Str::uuid();
	
			NewsletterUser::create([
				'uuid' => $uuid,
				'name' => $name_jp,
				'email' => $name_en .'@example.com',
			]);
	
		}
    }
}
