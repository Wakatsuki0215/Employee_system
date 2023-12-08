<?php

namespace App\Http\Services;


class PostLogoutService
{
    public function postLogout()
    {
        // session削除
        session()->flush();
    }
}