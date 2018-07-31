<?php
namespace HskyZhou\RepositoryHashid;
/**
 * Class ServiceProvider
 * @package HskyZhou\NineOrange
 */
class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    /**
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__ . '/../config/repositoryhashid.php' => config_path('repositoryhashid.php')], 'config');
        
        $this->mergeConfigFrom(__DIR__ . '/../config/repositoryhashid.php', 'repositoryhashid');
    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
       
    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}