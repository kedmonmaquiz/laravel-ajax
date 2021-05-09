<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        $itemNames = Item::all()->pluck('name');
        return view('items.index',compact(['items','itemNames']));
    }

    public function store(Request $request){
    	$item = new Item();
    	$item->name = $request->text;
    	$isSaved = $item->save();
    	if($isSaved){
    		return 'Data Saved';
    	}
    	return 'Data Not Saved';
    }

    public function destroy(Request $request)
    {
        $isDeleted = Item::find($request->id)->delete();
        if($isDeleted){
        	return 'Data deleted';
        }
        return 'Data Not Deleted';
    }

    public function update(Request $request)
    {
        $item = Item::find($request->id);
        $item->name = $request->text;
        $isUpdated = $item->save();
        if($isUpdated){
        	return 'Data Updated';
        }
        return 'Data Not Updated';
    }
}
