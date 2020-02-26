<?php

namespace Tmss\School_website\Http\Helper;

trait PackageHelper
{
    public function ExistViewReturn($file){
        if (view()->exists('vendor.school_website.'.$file)) {
            return 'vendor.school_website.'.$file;
        } else {
            return 'school_website::'.$file;
        }
    }
}