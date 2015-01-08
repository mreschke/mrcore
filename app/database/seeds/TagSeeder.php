<?php

class TagSeeder extends Seeder
{
	public function run()
	{
		DB::table('tags')->delete();

		Tag::create(array('name' => 'site'));
		#Tag::create(array('name' => 'post-template'));
		#Tag::create(array('name' => 'fixme', 'image' => 'tag3.png', 'post_id' => '18'));
		#Tag::create(array('name' => 'obsolete', 'image' => 'tag4.png', 'post_id' => '19'));


		DB::table('post_tags')->delete();
		for ($i = 1; $i <= 18; $i++) {
			PostTag::create(array('post_id' => $i, 'tag_id' => 1));
		}

	}
}
