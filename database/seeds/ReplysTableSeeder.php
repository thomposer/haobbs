<?php

use Illuminate\Database\Seeder;
use App\Models\Reply;
use App\Models\User;
use App\Models\Topic;

class ReplysTableSeeder extends Seeder
{
    public function run()
    {
        // 所有用户 ID 数组，如：[1,2,3,4]
        $user_ids = User::all()->pluck('id')->toArray();

        // 所有话题 ID 数组，如：[1,2,3,4]
        $topic_ids = Topic::all()->pluck('id')->toArray();

        // 取 Faker 实例
        $faker = app(Faker\Generator::class);

        $replys = factory(Reply::class)->times(1000)->make()->each(function ($reply, $index) use ($user_ids, $topic_ids, $faker) {
            // 随机取一个用户 ID
            $reply->user_id = $faker->randomElement($user_ids);
            // 随机取一个话题 ID
            $reply->topic_id = $faker->randomElement($topic_ids);
        });

        // 数据集合转为数组并插入到数据库
        Reply::insert($replys->toArray());

        Reply::insert($replys->toArray());
    }

}

