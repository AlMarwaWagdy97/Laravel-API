<?php

namespace App\Http\Controllers;

use App\categories;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class CategpriesController extends Controller
{
    use GeneralTrait;
    //
    //get all categories
    public function index(){
        $categories = categories::select('id', 'name_'.app()->getLocale().' as name')->get();
        return $this->returnData('All categories',$categories);
        // return response()->json($categories);  

    }

    //get category by id 
    public function getcategorybyID(Request $request){
        $category = categories::find($request->id);
        if(!$category){
           return $this->returnError('001', 'هذا القسم غير موجود');
        }
        return $this->returnData('category by id',$category);
        // return response()->json($category);  
    }

    // chage statues
    public function ChangeStatues(Request $request){
       categories::where('id', $request->id)->update(['active'=>$request->active]);
       return $this->returnSucessMessage("لقد تم تغير الحاله بنجاح");
    }
}
