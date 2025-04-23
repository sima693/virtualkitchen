<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RecipeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'search']);
    }

    private function sanitiseInput($input)
    {
        return htmlspecialchars(strip_tags($input), ENT_QUOTES, 'UTF-8');
    }

    
      //Display a listing of  all recipes.
     
    public function index()
    {
        $recipes = Recipe::with('user')->latest()->paginate(12);
        return view('recipes.index', compact('recipes'));
    }

    //Show the form for creating a new recipe 
    public function create()
    {
        $types = ['French', 'Italian', 'Chinese', 'Indian', 'Mexican', 'others'];
        return view('recipes.create', compact('types'));
    }

    //Store the created recipe in storage.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:200',
            'description' => 'required|string',
            'type' => 'required|in:French,Italian,Chinese,Indian,Mexican,others',
            'cookingtime' => 'required|integer|min:1',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        // Sanitize inputs
        $validated['name'] = $this->sanitiseInput($validated['name']);
        $validated['description'] = $this->sanitiseInput($validated['description']);
        $validated['ingredients'] = $this->sanitiseInput($validated['ingredients']);
        $validated['instructions'] = $this->sanitiseInput($validated['instructions']);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            
            // Store in public/images directory
            $image->move(public_path('images'), $filename);
            
            // Save relative path in database
            $validated['image'] = 'images/' . $filename;
        }

        $validated['uid'] = Auth::id();
        $recipe = Recipe::create($validated);

        return redirect()->route('recipes.show', $recipe)
            ->with('success', 'Recipe created successfully.');
    }

    //Shows the specific recipe.
    public function show(Recipe $recipe)
    {
        $recipe->load('user');
        return view('recipes.show', compact('recipe'));
    }

    //Shows the form for editing the specific recipe.
    public function edit(Recipe $recipe)
    {
        $this->authorize('update', $recipe);
        $types = ['French', 'Italian', 'Chinese', 'Indian', 'Mexican', 'others'];
        return view('recipes.edit', compact('recipe', 'types'));
    }

    //Updates the specific recipe in storage database.
    public function update(Request $request, Recipe $recipe)
    {
        $this->authorize('update', $recipe);

        $validated = $request->validate([
            'name' => 'required|string|max:200',
            'description' => 'required|string',
            'type' => 'required|in:French,Italian,Chinese,Indian,Mexican,others',
            'cookingtime' => 'required|integer|min:1',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        // Sanitize inputs
        $validated['name'] = $this->sanitiseInput($validated['name']);
        $validated['description'] = $this->sanitiseInput($validated['description']);
        $validated['ingredients'] = $this->sanitiseInput($validated['ingredients']);
        $validated['instructions'] = $this->sanitiseInput($validated['instructions']);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($recipe->image && file_exists(public_path($recipe->image))) {
                unlink(public_path($recipe->image));
            }

            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            
            // Store in public/images directory
            $image->move(public_path('images'), $filename);
            
            // Save relative path in database
            $validated['image'] = 'images/' . $filename;
        }

        $recipe->update($validated);

        return redirect()->route('recipes.show', $recipe)
            ->with('success', 'Recipe updated successfully.');
    }





    //Search recipes by name or type.
    public function search(Request $request)
    {
        $query = Recipe::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('type', 'like', "%{$search}%");
        }

        if ($request->filled('type')) {
            $query->where('type', $request->input('type'));
        }

        $recipes = $query->with('user')->latest()->paginate(12);
        return view('recipes.index', compact('recipes'));
    }
}
