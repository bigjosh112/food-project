<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecipeController extends Controller
{
    public function searchRecipe(Request $request)
    {
        $request->validate([
            'recipe' => 'required'
        ]);

        DB::table('recipe_search_query')->insert([
            'name' => $request->recipe,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $recipe = Recipe::where('name', 'LIKE','%'.$request->recipe.'%')->first();
        $conversion = DB::table('conversion_rates')->first();
        $recipe->usd = $recipe->price / $conversion->buy_rate;
        if (!$recipe) {
            return back(['message' => 'No recipe found']);
        }


        return view('recipes', compact('recipe'));
    }

    public function recipes()
    {
        $recipes = Recipe::all();
        return view('recipes', compact('recipes'));
    }

    public function searchedRecipes()
    {
        $recipes = DB::table('recipe_search_query')->orderByDesc('created_at')->get();
        return view('searched-recipes', compact('recipes'));
    }




}
