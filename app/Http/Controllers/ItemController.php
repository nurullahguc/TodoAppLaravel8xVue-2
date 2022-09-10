<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function index()
    {
        return Item::orderBy('created_at', 'DESC')->get();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $newItem = new Item;
        $newItem->name = $request->item["name"];
        $newItem->save();

        return $newItem;
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $exsistingItem = Item::find($id);

        if ($exsistingItem) {
            $exsistingItem->completed = $request->item['completed'] ? true : false;
            $exsistingItem->completed_at = $request->item['completed'] ? Carbon::now() : null;
            $exsistingItem->save();
            return $exsistingItem;
        }

        return "Item not found!";
    }


    public function destroy($id)
    {
        $existingItem = Item::find($id);

        if ($existingItem) {
            $existingItem->delete();
            return "Item successfuly deleted!";
        }

        return "Item not found!";
    }
}
