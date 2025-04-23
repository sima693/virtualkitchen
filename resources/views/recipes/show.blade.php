<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-content">
                <div class="recipe-header">
                    <h1 class="heading-1">{{ $recipe->name }}</h1>
                    <div class="flex items-center space-x-4">
                        @can('update', $recipe)
                            <a href="{{ route('recipes.edit', $recipe) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Edit</a>
                        @endcan
                        <a href="{{ route('recipes.index') }}" class="nav-link">Back to Recipes</a>
                    </div>
                </div>

                <div class="grid grid-cols-1">
                    <div>
                        <div class="recipe-image">
                            @if($recipe->image && file_exists(public_path($recipe->image)))
                                <img src="{{ asset($recipe->image) }}" alt="{{ $recipe->name }}" class="recipe-image">
                            @else
                                <img src="{{ asset('images/no-image.svg') }}" alt="No image available" class="recipe-image">
                            @endif
                        </div>
                    </div>
                    <div>
                        <div class="mb-4">
                            <h2 class="heading-2">Description</h2>
                            <p>{{ $recipe->description }}</p>
                        </div>
                        <div class="mb-4">
                            <h2 class="heading-2">Details</h2>
                            <p><strong>Cuisine Type:</strong> {{ $recipe->type }}</p>
                            <p><strong>Cooking Time:</strong> {{ $recipe->cookingtime }} minutes</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 mt-6">
                    <div>
                        <h2 class="heading-2">Ingredients</h2>
                        <div class="recipe-details">
                            {!! nl2br(e($recipe->ingredients)) !!}
                        </div>
                    </div>
                    <div>
                        <h2 class="heading-2">Instructions</h2>
                        <div class="recipe-details">
                            {!! nl2br(e($recipe->instructions)) !!}
                        </div>
                    </div>
                </div>

                <div class="text-sm mt-6">
                    <p>Posted by: {{ $recipe->user->username }}</p>
                    <p>Created: {{ $recipe->created_at->format('M d, Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 