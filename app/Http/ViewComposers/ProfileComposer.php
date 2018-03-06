<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Info;

class ProfileComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $infos;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(Info $infos)
    {
        // Dependencies automatically resolved by service container...
        $this->infos = $infos;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('infos', $this->infos->all());
    }
}