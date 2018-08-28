<?php
namespace sandeep\BangarhSocial;
use App;

class San_Helpers
{
    public static function san_asset($path, $secure = null)
    {
    	return App::make('url')->to('/packages/sandeep/BangarhSocial/resources/assets/'.$path);
    }
}