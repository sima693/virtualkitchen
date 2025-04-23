<x-app-layout>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="max-w-3xl mx-auto">
                <h1 class="text-2xl font-bold text-gray-900 mb-6">Edit Recipe</h1>

                <form action="{{ route('recipes.update', $recipe) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Recipe Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Recipe Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $recipe->name) }}" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <!-- Recipe Type -->
                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                        <select name="type" id="type" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @foreach ($types as $type)
                                <option value="{{ $type }}" {{ old('type', $recipe->type) == $type ? 'selected' : '' }}>
                                    {{ $type }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Cooking Time -->
                    <div>
                        <label for="cookingtime" class="block text-sm font-medium text-gray-700">Cooking Time (minutes)</label>
                        <input type="number" name="cookingtime" id="cookingtime" value="{{ old('cookingtime', $recipe->cookingtime) }}" required min="1"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="3" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('description', $recipe->description) }}</textarea>
                    </div>

                    <!-- Ingredients -->
                    <div>
                        <label for="ingredients" class="block text-sm font-medium text-gray-700">Ingredients</label>
                        <textarea name="ingredients" id="ingredients" rows="5" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            placeholder="Enter each ingredient on a new line">{{ old('ingredients', $recipe->ingredients) }}</textarea>
                    </div>

                    <!-- Instructions -->
                    <div>
                        <label for="instructions" class="block text-sm font-medium text-gray-700">Instructions</label>
                        <textarea name="instructions" id="instructions" rows="5" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            placeholder="Enter each step on a new line">{{ old('instructions', $recipe->instructions) }}</textarea>
                    </div>

                    <!-- Current Image -->
                    @if ($recipe->image)
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Current Image</label>
                            <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->name }}" class="mt-2 w-48 h-48 object-cover rounded-lg">
                        </div>
                    @endif

                    <!-- Image Upload -->
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700">Update Recipe Image</label>
                        <input type="file" name="image" id="image" accept="image/*"
                            class="mt-1 block w-full text-sm text-gray-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-md file:border-0
                            file:text-sm file:font-semibold
                            file:bg-gray-50 file:text-gray-700
                            hover:file:bg-gray-100">
                        <p class="mt-1 text-sm text-gray-500">Optional. Maximum file size: 2MB</p>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end gap-4">
                        <a href="{{ route('recipes.show', $recipe) }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300">
                            Cancel
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Update Recipe
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout> 