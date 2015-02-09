<?php

class PostSeeder extends Seeder
{
	public function run()
	{

		DB::table('posts')->delete();

		#1 Home
		#---------------------------------------------------------------
		Post::create(array(
			'uuid' => \Mrcore\Helpers\String::getGuid(),
			'title' => 'Home Page',
			'slug' => 'home-page',
			'content' =>  Mrcore\Crypt::encrypt("<div class='jumbotron'>
	<h1>Welcome to mRcore</h1>
	<p>A Wiki/CMS system built with Laravel</p>
	<p><a class='btn btn-primary btn-lg' onclick=\"window.location='/search'\"><i class='fa fa-search'></i> Browse Posts</a></p>
</div>"),
			'teaser' => Mrcore\Crypt::encrypt(''),
			'contains_script' => false,
			'contains_html' => true,
			'format_id' => 4,#html
			'type_id' => 2,#page
			'mode_id' => 1,
			'symlink' => false,
			'shared' => false,
			'hidden' => false,
			'deleted' => false,
			'indexed_at' => '1900-01-01 00:00:00',
			'created_by' => 2,
			'updated_by' => 2,
		));
		Router::create(array('slug' => 'home-page', 'post_id' => 1, 'static' => false));



		#2 mRcore Global
		#---------------------------------------------------------------
		Post::create(array(
			'uuid' => \Mrcore\Helpers\String::getGuid(),
			'title' => 'mRcore Global',
			'slug' => 'mrcore-global',
			'content' =>  Mrcore\Crypt::encrypt(''),
			'teaser' => Mrcore\Crypt::encrypt(''),
			'contains_script' => false,
			'contains_html' => false,
			'format_id' => 3,#phpw
			'type_id' => 2,#page
			'mode_id' => 1,
			'symlink' => false,
			'shared' => false,
			'hidden' => true,
			'deleted' => false,
			'indexed_at' => '1900-01-01 00:00:00',
			'created_by' => 2,
			'updated_by' => 2,
		));
		Router::create(array('slug' => 'mrcore/global', 'post_id' => 2, 'static' => true));



		#3 Admin Home
		#---------------------------------------------------------------
		Post::create(array(
			'uuid' => \Mrcore\Helpers\String::getGuid(),
			'title' => 'Admin Home Page',
			'slug' => 'admin-home-page',
			'content' =>  Mrcore\Crypt::encrypt('<info>
[[toc]]
</info>

+ Summary
This is the home page of the admin user.

Every user of mrcore has a dedicated home page and a dedicated user global page.
'),
			'teaser' => Mrcore\Crypt::encrypt(''),
			'contains_script' => false,
			'contains_html' => false,
			'format_id' => 1,#wiki
			'type_id' => 1,#doc
			'mode_id' => 1,
			'symlink' => false,
			'shared' => false,
			'hidden' => false,
			'deleted' => false,
			'indexed_at' => '1900-01-01 00:00:00',
			'created_by' => 2,
			'updated_by' => 2,
		));
		Router::create(array('slug' => 'admin-home-page', 'post_id' => 3));



		#4 Admin Global
		#---------------------------------------------------------------
		Post::create(array(
			'uuid' => \Mrcore\Helpers\String::getGuid(),
			'title' => 'Admin Global',
			'slug' => 'admin-global',
			'content' =>  Mrcore\Crypt::encrypt(''),
			'teaser' => Mrcore\Crypt::encrypt(''),
			'contains_script' => false,
			'contains_html' => false,
			'format_id' => 7,#htmlw
			'type_id' => 2,#page
			'mode_id' => 1,
			'symlink' => false,
			'shared' => false,
			'hidden' => true,
			'deleted' => false,
			'indexed_at' => '1900-01-01 00:00:00',
			'created_by' => 2,
			'updated_by' => 2,
		));
		Router::create(array('slug' => 'admin-global', 'post_id' => 4));



		#5 mRcore Workbench
		#---------------------------------------------------------------
		Post::create(array(
			'uuid' => \Mrcore\Helpers\String::getGuid(),
			'title' => 'mRcore Workbench',
			'slug' => 'mrcore-workbench',
			'content' =>  Mrcore\Crypt::encrypt('<info>
[[toc]]
</info>

+ Summary

This is the mrcore workbench post.  All actual workbench code is symlinked to this post.  You can use this post to keep documentation about your custom workbenches.

See http://mrcore.mreschke.com/doc/advanced/workbench for more info in workbenches.'),
			'teaser' => Mrcore\Crypt::encrypt(''),
			'contains_script' => false,
			'contains_html' => false,
			'format_id' => 1,#wiki
			'type_id' => 1,#doc
			'mode_id' => 1,
			'symlink' => true,
			'shared' => false,
			'hidden' => false,
			'deleted' => false,
			'indexed_at' => '1900-01-01 00:00:00',
			'created_by' => 2,
			'updated_by' => 2,
		));
		Router::create(array('slug' => 'mrcore/workbench', 'post_id' => 5, 'static' => true));


		#6 User Info
		#---------------------------------------------------------------
		Post::create(array(
			'uuid' => \Mrcore\Helpers\String::getGuid(),
			'title' => 'User Info',
			'slug' => 'user-info',
			'content' =>  Mrcore\Crypt::encrypt(''),
			'teaser' => Mrcore\Crypt::encrypt(''),
			'contains_script' => false,
			'contains_html' => false,
			'format_id' => 7,#htmlw
			'type_id' => 2,#page
			'mode_id' => 1,
			'symlink' => false,
			'shared' => false,
			'hidden' => true,
			'deleted' => false,
			'indexed_at' => '1900-01-01 00:00:00',
			'created_by' => 2,
			'updated_by' => 2,
		));
		Router::create(array('slug' => 'mrcore/userinfo', 'post_id' => 6, 'static' => true));



		#7 Search Box
		#---------------------------------------------------------------
		Post::create(array(
			'uuid' => \Mrcore\Helpers\String::getGuid(),
			'title' => 'Search Box',
			'slug' => 'search-box',
			'content' =>  Mrcore\Crypt::encrypt('<?php
$badges = Badge::all();

$admin = array(
	array("name" => "mRcore Workbench", "url" => "/5"),
	array("name" => "Site Global", "url" => "/2"),
	array("name" => "UserInfo Global", "url" => "/6"),
	array("name" => "Search Box", "url" => "/7"),
);

$popular = array (
	array("name" => "Home Page", "url" => "/1"),
);

$private = array ();
?>

<!-- ----------------------------------------------------------------------- -->
<!-- ----------------------------------------------------------------------- -->
<!-- ----------------------------------------------------------------------- -->
<style type="text/css">
	.navbar .dropdown-menu .search-dropdown li a {
		padding: 0px;
	}
	.navbar .dropdown-menu .search-dropdown a img {
		margin-bottom: 5px;
		margin-right: 5px;
	}
</style>
<style type="text/css">
</style>
<div class="search-dropdown row">

	<div class="col-sm-6">
		<h4>Categories</h4>
		<ul class="list-unstyled">
		<? foreach ($badges as $badge): ?>
			<li>
				<a href="<?= route("search")."?badge".$badge->id."=1" ?>"><img src="<?= asset("uploads/".$badge->image) ?>" width="24px" /></a>
				<a href="<?= route("search")."?badge".$badge->id."=1" ?>"><?= $badge->name ?></a>
			</li>
		<? endforeach ?>
		</ul>

		<? if (User::isAdmin()): ?>
			<h4>Admin Only</h4>	
			<ul class="list-unstyled">
			<? foreach ($admin as $item): ?>
				<li>
					<a href="<?= $item["url"] ?>">
						<?= $item["name"] ?>
					</a>
				</li>
			<? endforeach ?>
			</ul>
		<? endif ?>
	</div>
	
	
	<div class="col-sm-6">
		<? if (count($popular) > 0): ?>
			<h4>Popular Links</h4>
			<ul class="list-unstyled">
			<? foreach ($popular as $item): ?>
				<li>
					<a href="<?= $item["url"] ?>">
						<?= $item["name"] ?>
					</a>
				</li>
			<? endforeach ?>
		<? endif ?>
		<? if (User::isAuthenticated()): ?>
			<? if (count($private) > 0) echo "<hr />"; ?>
			<? foreach ($private as $item): ?>
				<li>
					<a href="<?= $item["url"] ?>">
						<?= $item["name"] ?>
					</a>
				</li>
			<? endforeach ?>
		<? endif ?>
	</div>

</div>'),
			'teaser' => Mrcore\Crypt::encrypt(''),
			'contains_script' => true,
			'contains_html' => true,
			'format_id' => 2,#php
			'type_id' => 2,#page
			'mode_id' => 1,
			'symlink' => false,
			'shared' => false,
			'hidden' => true,
			'deleted' => false,
			'indexed_at' => '1900-01-01 00:00:00',
			'created_by' => 2,
			'updated_by' => 2,
		));
		Router::create(array('slug' => 'mrcore/searchbox', 'post_id' => 7, 'static' => true));



		#8 Default Document Template
		#---------------------------------------------------------------
		Post::create(array(
			'uuid' => \Mrcore\Helpers\String::getGuid(),
			'title' => 'Default Document Template',
			'slug' => 'default-document-template',
			'content' =>  Mrcore\Crypt::encrypt('<info>
[[toc]]
</info>

+ Summary

New Document'),
			'teaser' => Mrcore\Crypt::encrypt(''),
			'contains_script' => false,
			'contains_html' => false,
			'format_id' => 1,#wiki
			'type_id' => 1,#doc
			'mode_id' => 1,
			'symlink' => false,
			'shared' => false,
			'hidden' => true,
			'deleted' => false,
			'indexed_at' => '1900-01-01 00:00:00',
			'created_by' => 2,
			'updated_by' => 2,
		));
		Router::create(array('slug' => 'default-document-template', 'post_id' => 8));



		#9 Default Page Template
		#---------------------------------------------------------------
		Post::create(array(
			'uuid' => \Mrcore\Helpers\String::getGuid(),
			'title' => 'Default Page Template',
			'slug' => 'default-page-template',
			'content' =>  Mrcore\Crypt::encrypt(''),
			'teaser' => Mrcore\Crypt::encrypt(''),
			'contains_script' => false,
			'contains_html' => false,
			'format_id' => 1,#wiki
			'type_id' => 1,#doc
			'mode_id' => 1,
			'symlink' => false,
			'shared' => false,
			'hidden' => true,
			'deleted' => false,
			'indexed_at' => '1900-01-01 00:00:00',
			'created_by' => 2,
			'updated_by' => 2,
		));
		Router::create(array('slug' => 'default-page-template', 'post_id' => 9));



		#10 Default App Template
		#---------------------------------------------------------------
		Post::create(array(
			'uuid' => \Mrcore\Helpers\String::getGuid(),
			'title' => 'Default App Template',
			'slug' => 'default-app-template',
			'content' =>  Mrcore\Crypt::encrypt(''),
			'teaser' => Mrcore\Crypt::encrypt(''),
			'contains_script' => true,
			'contains_html' => true,
			'format_id' => 2,#php
			'type_id' => 1,#doc
			'mode_id' => 1,
			'symlink' => false,
			'shared' => false,
			'hidden' => true,
			'deleted' => false,
			'indexed_at' => '1900-01-01 00:00:00',
			'created_by' => 2,
			'updated_by' => 2,
		));
		Router::create(array('slug' => 'default-app-template', 'post_id' => 10));


		

		########################################
		### Custom Dynatron Xendev Additions ###
		########################################

		#11 Dashboard
		#---------------------------------------------------------------
		Post::create(array(
			'uuid' => \Mrcore\Helpers\String::getGuid(),
			'title' => 'Dashboard',
			'slug' => 'dashboard',
			'content' =>  Mrcore\Crypt::encrypt(''),
			'teaser' => Mrcore\Crypt::encrypt(''),
			'workbench' => 'app/dashboard',
			'contains_script' => true,
			'contains_html' => true,
			'format_id' => 2,#php
			'type_id' => 3,#app
			'framework_id' => 2,#workbench
			'mode_id' => 1,
			'symlink' => true,
			'shared' => false,
			'hidden' => false,
			'deleted' => false,
			'indexed_at' => '1900-01-01 00:00:00',
			'created_by' => 2,
			'updated_by' => 2,
		));
		Router::create(array('slug' => 'dashboard', 'post_id' => 11, 'static' => true));



		#12 Menu
		#---------------------------------------------------------------
		Post::create(array(
			'uuid' => \Mrcore\Helpers\String::getGuid(),
			'title' => 'Product Menu',
			'slug' => 'product-menu',
			'content' =>  Mrcore\Crypt::encrypt(''),
			'teaser' => Mrcore\Crypt::encrypt(''),
			'workbench' => 'app/menu',
			'contains_script' => true,
			'contains_html' => true,
			'format_id' => 2,#php
			'type_id' => 3,#app
			'framework_id' => 2,#workbench
			'mode_id' => 1,
			'symlink' => true,
			'shared' => false,
			'hidden' => false,
			'deleted' => false,
			'indexed_at' => '1900-01-01 00:00:00',
			'created_by' => 2,
			'updated_by' => 2,
		));
		Router::create(array('slug' => 'app/menu', 'post_id' => 12, 'static' => true));



		#13 Website
		#---------------------------------------------------------------
		Post::create(array(
			'uuid' => \Mrcore\Helpers\String::getGuid(),
			'title' => 'Website',
			'slug' => 'website',
			'content' =>  Mrcore\Crypt::encrypt('<?php Layout::replaceCss("css/bootstrap/", "css/bootstrap/default.min.css");'),
			'teaser' => Mrcore\Crypt::encrypt(''),
			'workbench' => 'app/website',
			'contains_script' => true,
			'contains_html' => true,
			'format_id' => 2,#php
			'type_id' => 3,#app
			'framework_id' => 2,#workbench
			'mode_id' => 1,
			'symlink' => true,
			'shared' => false,
			'hidden' => false,
			'deleted' => false,
			'indexed_at' => '1900-01-01 00:00:00',
			'created_by' => 2,
			'updated_by' => 2,
		));
		Router::create(array('slug' => 'home', 'post_id' => 13, 'static' => true));



		#14 API
		#---------------------------------------------------------------
		Post::create(array(
			'uuid' => \Mrcore\Helpers\String::getGuid(),
			'title' => 'Dynatron REST API',
			'slug' => 'dynatron-rest-api',
			'content' =>  Mrcore\Crypt::encrypt(''),
			'teaser' => Mrcore\Crypt::encrypt(''),
			'workbench' => 'app/api',
			'contains_script' => true,
			'contains_html' => true,
			'format_id' => 2,#php
			'type_id' => 3,#app
			'framework_id' => 2,#workbench
			'mode_id' => 1,
			'symlink' => true,
			'shared' => false,
			'hidden' => false,
			'deleted' => false,
			'indexed_at' => '1900-01-01 00:00:00',
			'created_by' => 2,
			'updated_by' => 2,
		));
		Router::create(array('slug' => 'api', 'post_id' => 14, 'static' => true));



		#15 VFI
		#---------------------------------------------------------------
		Post::create(array(
			'uuid' => \Mrcore\Helpers\String::getGuid(),
			'title' => 'VFI',
			'slug' => 'vfi',
			'content' =>  Mrcore\Crypt::encrypt(''),
			'teaser' => Mrcore\Crypt::encrypt(''),
			'workbench' => 'app/vfi',
			'contains_script' => true,
			'contains_html' => true,
			'format_id' => 2,#php
			'type_id' => 3,#app
			'framework_id' => 2,#workbench
			'mode_id' => 1,
			'symlink' => true,
			'shared' => false,
			'hidden' => false,
			'deleted' => false,
			'indexed_at' => '1900-01-01 00:00:00',
			'created_by' => 2,
			'updated_by' => 2,
		));
		Router::create(array('slug' => 'app/vfi', 'post_id' => 15, 'static' => true));		



		#16 Render
		#---------------------------------------------------------------
		Post::create(array(
			'uuid' => \Mrcore\Helpers\String::getGuid(),
			'title' => 'Render',
			'slug' => 'render',
			'content' =>  Mrcore\Crypt::encrypt(''),
			'teaser' => Mrcore\Crypt::encrypt(''),
			'workbench' => 'app/render',
			'contains_script' => true,
			'contains_html' => true,
			'format_id' => 2,#php
			'type_id' => 3,#app
			'framework_id' => 2,#workbench
			'mode_id' => 1,
			'symlink' => true,
			'shared' => false,
			'hidden' => false,
			'deleted' => false,
			'indexed_at' => '1900-01-01 00:00:00',
			'created_by' => 2,
			'updated_by' => 2,
		));
		Router::create(array('slug' => 'app/render', 'post_id' => 16, 'static' => true));	

		#17 Loadbalancer Stats
		#---------------------------------------------------------------
		Post::create(array(
			'uuid' => \Mrcore\Helpers\String::getGuid(),
			'title' => 'Loadbalancer Stats',
			'slug' => 'loadbalancer-stats',
			'content' =>  Mrcore\Crypt::encrypt(''),
			'teaser' => Mrcore\Crypt::encrypt(''),
			'workbench' => 'app/lbstat',
			'contains_script' => true,
			'contains_html' => true,
			'format_id' => 2,#php
			'type_id' => 3,#app
			'framework_id' => 2,#workbench
			'mode_id' => 1,
			'symlink' => true,
			'shared' => false,
			'hidden' => false,
			'deleted' => false,
			'indexed_at' => '1900-01-01 00:00:00',
			'created_by' => 2,
			'updated_by' => 2,
		));
		Router::create(array('slug' => 'app/lbstat', 'post_id' => 17, 'static' => true));	

		#18 Data Warehouse
		#---------------------------------------------------------------
		Post::create(array(
			'uuid' => \Mrcore\Helpers\String::getGuid(),
			'title' => 'Data Warehouse',
			'slug' => 'data-warehouse',
			'content' =>  Mrcore\Crypt::encrypt(''),
			'teaser' => Mrcore\Crypt::encrypt(''),
			'workbench' => 'app/warehouse',
			'contains_script' => true,
			'contains_html' => true,
			'format_id' => 2,#php
			'type_id' => 3,#app
			'framework_id' => 2,#workbench
			'mode_id' => 1,
			'symlink' => true,
			'shared' => false,
			'hidden' => false,
			'deleted' => false,
			'indexed_at' => '1900-01-01 00:00:00',
			'created_by' => 2,
			'updated_by' => 2,
		));
		Router::create(array('slug' => 'app/warehouse', 'post_id' => 18, 'static' => true));


	}

}
