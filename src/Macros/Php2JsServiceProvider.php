<?php

namespace Rmunate\Php2Js\Macros;

use Illuminate\View\View;
use Rmunate\Php2Js\Render;
use Illuminate\Support\ServiceProvider;

class Php2JsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /* Add prebuilt blocks */
        View::macro('attach', function (...$attach) {
            $this->attach = $attach;
            return $this;
        });

        /* Return all variables to the JS context. */
        View::macro('toJs', function ($alias = 'PHP2JS') {

            if (isset($this->attach) && !empty($this->attach)) {
                return Render::view($this->view)
                             ->with($this->getData())
                             ->toJS($alias)
                             ->attach(...$this->attach)
                             ->compose();
            } else {
                return Render::view($this->view)
                             ->with($this->getData())
                             ->toJs($alias)
                             ->compose();
            }

        });

        /* Return only specific variables to the JavaScript context */
        View::macro('toStrictJS', function ($alias = 'PHP2JS') {

            if (isset($this->attach) && !empty($this->attach)) {
                return Render::view($this->view)
                             ->with($this->getData())
                             ->toStrictJS($alias)
                             ->attach(...$this->attach)
                             ->compose();
            } else {
                return Render::view($this->view)
                             ->with($this->getData())
                             ->toStrictJS($alias)
                             ->compose();
            }
            
        });
    }

}
