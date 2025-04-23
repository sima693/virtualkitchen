<x-app-layout>
    <div class="bg-white shadow-sm rounded-lg overflow-hidden">
        <div class="p-6 border-b border-gray-200">

            {{-- Recipe cusine  Filter --}}
            <form action="{{ route('recipes.search') }}" method="GET" class="flex gap-3 mb-5">
                <select name="type" class="border-gray-300 rounded-md shadow-sm text-sm">
                    <option value="">-- Filter by Type --</option>
                    @php

                        $types = ['French', 'Italian', 'Chinese', 'Indian', 'Mexican', 'others'];


                    @endphp

                    @foreach ($types as $type)
                        <option value="{{ $type }}" @selected(request('type') === $type)>{{ ucfirst($type) }}</option>
                    @endforeach
                </select>

                <button type="submit"
                    class="px-4 py-2 bg-gray-800 text-white text-sm font-semibold rounded hover:bg-gray-700 transition">


                    recipe Filter

                </button>
            </form>

            {{-- Recipe Grid --}}
            @if ($recipes->count())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">

                    @foreach ($recipes as $recipe)

                        <div class="recipe-card">
                            <div class="recipe-image">
                                @if($recipe->image && file_exists(public_path($recipe->image)))
                                    <img src="{{ asset($recipe->image) }}" alt="{{ $recipe->name }}" class="recipe-image">
                                @else
                                    <img src="{{ asset('images/no-image.svg') }}" alt="No image available" class="recipe-image">
                                @endif
                            </div>
                            <div class="recipe-details">
                                <h3 class="recipe-title">{{ $recipe->name }}</h3>
                                <p class="recipe-description">{{ $recipe->description }}</p>
                                <a href="{{ route('recipes.show', $recipe) }}" class="recipe-link">View Recipe</a>
                            </div>
                        </div>

                    @endforeach

                </div>

                <div class="mt-6">
                    
                    {{ $recipes->links() }}

                </div>
            @else
                <p class="text-gray-500 text-sm mt-4">No recipes found!</p>
            @endif
        </div>
    </div>
</x-app-layout>