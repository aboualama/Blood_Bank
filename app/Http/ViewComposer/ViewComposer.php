<?php 

namespace App\Http\ViewComposer;

use Illuminate\Contracts\View\View;
use App\Models\Governorate;
use App\Models\City;
use App\Models\Category;
use DB;
use Carbon\Carbon;


class ViewComposer {

    public function compose(View $view) {
 
		$view->with('governorates', Governorate::all() );   
		$view->with('categories', Category::all() );     

    }
}
 

