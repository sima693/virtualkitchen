@props(['recipe'])

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="recipe-image">
        @if($recipe->image && file_exists(public_path($recipe->image)))
            <img src="{{ asset($recipe->image) }}" alt="{{ $recipe->name }}" class="recipe-image">
        @else
            <img src="{{ asset('images/no-image.svg') }}" alt="No image available" class="recipe-image">
        @endif
    </div>
    <div class="p-4">
        <h3 class="text-lg font-semibold mb-2">
            <a href="{{ route('recipes.show', $recipe) }}" class="text-gray-900 hover:text-gray-600">
                {{ $recipe->name }}
            </a>
        </h3>
        <p class="text-sm text-gray-600 mb-2">{{ Str::limit($recipe->description, 100) }}</p>
        <div class="flex justify-between items-center text-sm text-gray-500">
            <span>{{ $recipe->type }}</span>
            <span>{{ $recipe->cookingtime }} minutes</span>
        </div>
        <div class="mt-2 text-sm text-gray-500">
            By {{ $recipe->user->username }}
        </div>
    </div>
</div> 