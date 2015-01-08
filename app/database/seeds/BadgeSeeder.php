<?php

class BadgeSeeder extends Seeder
{
	public function run()
	{
		DB::table('badges')->delete();

		Badge::create(array(
			'name' => 'SITE',
			'image' => 'badge1.png'
		));

		DB::table('post_badges')->delete();

		for ($i = 1; $i <= 18; $i++) {
			PostBadge::create(array('post_id' => $i, 'badge_id' => 1));
		}

	}
}
