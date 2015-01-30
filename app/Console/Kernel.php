<?php namespace Mrcore\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel {

	/**
	 * The Artisan commands provided by your application.
	 *
	 * @var array
	 */
	protected $commands = [
		'Mrcore\Console\Commands\Inspire',
		'Mrcore\Console\Commands\IndexPosts',
		'Illuminate\Workbench\Console\WorkbenchMakeCommand',
	];
	#??Artisan::add(new Mrcore\WorkbenchFramework\Install);

	/**
	 * Define the application's command schedule.
	 *
	 * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
	 * @return void
	 */
	protected function schedule(Schedule $schedule)
	{
		$schedule->command('inspire')
				 ->hourly();
	}

}
