<?php
/**
 * Created by PhpStorm.
 * User: yangyang
 * Date: 16/2/22
 * Time: 16:28
 */

namespace App\Widgets\Admin;


use App\Services\Foundation\Auth\Auth;

class Page
{
    /**
     * @return $this
     */
    public function header()
    {
        $user = Auth::user();
        return view('widget.admin.page.header')->with(compact('user'));
    }
}