<?php namespace Formativ\Chat;

use Evenement\EventEmitter;
use Illuminate\Support\ServiceProvider;
use Ratchet\Server\IoServer;

class ChatServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind("chat.emitter", function(){
			return new EventEmitter();
		});

		$this->app->bind("chat.chat", function(){
			return new Chat(
				$this->app->make("chat.emitter");
			);
		});

		$this->app->bind("chat.comand.serve", function(){
			return new Command\Serve(
				$this->app->make("chat.chat");
			);
		});

		$this->commands("chat.command.serve");
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return [
			"chat.chat",
			"chat.command.serve",
			"chat.emitter",
			"chat.serve",
		];
	}

}