<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Saurio\Entities\User;
use Saurio\Entities\Post;
use Saurio\Entities\Payment;
use Saurio\Entities\Avatar;
use Saurio\Entities\Apply;
use Saurio\Entities\Follower;
use Saurio\Entities\Postimage;

class PostTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 30) as $index)
		{
			$user = User::create([
    			'full_name' => $faker->name,
    			'username' => $faker->userName,
    			'email' => $faker->email,
    			'password' => Hash::make('ff'),
    			'location' => $faker->country,
    			'website_url' => $faker->url,
				'description' => $faker->text(200),
    			'type' => 'candidate'
    		]);

			Post::create([
				'user_id' => 1,
				'content' => $faker->text(180)
			]);

			Avatar::create([
				'user_id' => $user->id,
				'name' => 'default.png'
			]);

			Follower::create([
				'user_id' => $user->id,
				'follow_to_id' => 1
			]);

			Follower::create([
				'user_id' => 1,
				'follow_to_id' => $user->id
			]);

			Payment::create([
				'adsense_editor_number' => "pub-87268726826",
				'adsense_ad_id' => 52572565,
				'user_id' => $user->id
			]);

			Apply::create([
				'full_name' => $faker->name,
				'username' => $faker->userName,
				'telephone' => 3316013772,
				'user_id' => $user->id,
				'account' => $faker->userName,
				'adsense' => 0
			]);
		}

		Postimage::create([
			'post_id' => 1,
			'name' => 'naby.jpg'
		]);

	}

}