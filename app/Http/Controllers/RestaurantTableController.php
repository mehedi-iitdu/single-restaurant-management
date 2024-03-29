<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RestaurantTable;
use App\Restaurant;
use App\Admin;
use Auth;

class RestaurantTableController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('tables.index');
    }

    public function showTables($code){
        $tables = Restaurant::where('code', $code)->first()->tables;
        return view('tables.show', ['restaurantTables' => $tables, 'code' => $code]);
    }

    public function showAddTableForm($code){
    	$restaurant = Restaurant::where('code', $code)->first();
    	return view('tables.add', ['code' => $code]);
    }

    public function insertRestaurantTable(Request $request){
    	$restaurant = Restaurant::where('code', $request->code)->first();
    	
    	$restaurantTable = new RestaurantTable;
    	$restaurantTable->name = $request->name;
    	$restaurantTable->capacity = $request->capacity;
    	$restaurantTable->restaurant_id = $restaurant->id;
    	$restaurantTable->save();

    	flash('Table inserted')->success();

        return redirect()->route('tables.index');
    }

    public function showAddTableAutoForm(Request $request){
    	$min = $request->min;
    	$max = $request->max;
    	return view('tables.add_auto', ['min' => $min, 'max' => $max, 'code' => $request->code]);
    }

    public function insertAutoRestaurantTable(Request $request){
    	$restaurant = Restaurant::where('code', $request->code)->first();
    	
    	for($i=0; $i<count($request->name); $i++){
    		$restaurantTable = new RestaurantTable;
    		$restaurantTable->name = $request->name[$i];
    		$restaurantTable->capacity = $request->capacity[$i];
    		$restaurantTable->restaurant_id = $restaurant->id;
    		$restaurantTable->save();
    	}

    	flash('Table inserted')->success();

        return redirect()->route('tables.index');
    }

    public function showEditTableForm(Request $request){
        $restaurantTable = RestaurantTable::find($request->id);
        return view('tables.edit', ['restaurantTable' => $restaurantTable]);
    }

    public function updateRestaurantTable(Request $request){
        $restaurantTable = RestaurantTable::find($request->id);
        $restaurantTable->name = $request->name;
        $restaurantTable->capacity = $request->capacity;
        $restaurantTable->save();

        flash('Table updated')->success();

        return redirect()->route('tables.index');
    }

    public function deleteRestaurantTable(Request $request){
        $restaurantTable = RestaurantTable::find($request->id);
        $restaurantTable->delete();

        flash('Table deleted')->success();

        return back();
    }

    public function getTablesCapacity(Request $request){
        $capacity = 0;
        foreach ($request->table_ids as $key => $id) {
            $capacity = $capacity + RestaurantTable::find($id)->capacity;
        }
        return $capacity;
    }
}
