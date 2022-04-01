<?php

namespace App\View\Components;

use App\Http\Traits\AppActions;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class GuestLayout extends Component{
    use AppActions;

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $request = request();
        return view('layouts.guest', [
            'data' => $this->appData($request),
            'currency' => $request->cookie('currency')
        ]);
    }
}
