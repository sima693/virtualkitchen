<?php

namespace Database\Seeders;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Runs the database seeds to populate the recipes table with sample data for test
     */
    public function run(): void
    {
        // Get the test user to associate the recipes with
        $user = User::where('email', 'test@outlook.com')->first();

        // Sample recipes with null image to populate some sample data
        $recipes = [
            [
                'name' => 'French Onion Soup classic way',
                'description' => 'flavorful soup made with caramelized onions, beef broth and topped with melted cheese.',
                'type' => 'French',
                'cookingtime' => 59,
                'ingredients' => "4 large onions, thinly sliced\n2 tablespoons butter\n1 tablespoon olive oil\n1 teaspoon sugar\n8 cups beef broth\n1/2 cup dry white wine\n1 bay leaf\n1/2 teaspoon dried thyme\nSalt and pepper to taste\n4 slices French bread\n1 1/2 cups grated Gruyère cheese",
                'instructions' => "1. Melt butter with olive oil in a large pot over medium heat.\n2. Add onions and cook until caramelized, about 30 minutes.\n3. Add sugar and continue cooking for 10 minutes.\n4. Add wine, broth, bay leaf, and thyme. Simmer for 30 minutes.\n5. Season with salt and pepper.\n6. Preheat broiler.\n7. Ladle soup into ovenproof bowls.\n8. Top with bread and cheese.\n9. Broil until cheese is melted and bubbly.",
                'image' => null,
                'uid' => $user->uid,
            ],
            [
                'name' => 'Spaghetti Carbonara',
                'description' => 'An Italian pasta dish with eggs, cheese, pancetta and black pepper.',
                'type' => 'Italian',
                'cookingtime' => 32,
                'ingredients' => "400g spaghetti\n200g pancetta or guanciale, diced\n4 large eggs\n100g Pecorino Romano cheese, grated\n100g Parmigiano Reggiano cheese, grated\nFreshly ground black pepper\nSalt",
                'instructions' => "1. Cook pasta in salted boiling water until al dente.\n2. In a bowl, whisk eggs with grated cheese and black pepper.\n3. Cook pancetta until crispy.\n4. Drain pasta, reserving some cooking water.\n5. Quickly mix hot pasta with egg mixture and pancetta.\n6. Add pasta water if needed to create a creamy sauce.\n7. Serve immediately with extra cheese and pepper.",
                'image' => null,
                'uid' => $user->uid,
            ],
            [
                'name' => 'Kung Pao Chicken',
                'description' => 'A spicy, stir-fried Chinese dish made with chicken, peanuts, vegetables and chili peppers.',
                'type' => 'Chinese',
                'cookingtime' => 32,
                'ingredients' => "500g chicken breast, diced\n1/2 cup roasted peanuts\n2 tablespoons vegetable oil\n3 dried red chili peppers\n2 cloves garlic, minced\n1 teaspoon ginger, minced\n2 tablespoons soy sauce\n1 tablespoon rice vinegar\n1 tablespoon sugar\n1 teaspoon cornstarch\n2 green onions, chopped",
                'instructions' => "1. Marinate chicken with soy sauce and cornstarch for 15 minutes.\n2. Heat oil in wok and stir-fry chili peppers until fragrant.\n3. Add chicken and cook until no longer pink.\n4. Add garlic, ginger, and peanuts.\n5. Mix in sauce ingredients and cook until thickened.\n6. Garnish with green onions and serve with rice.",
                'image' => null,
                'uid' => $user->uid,
            ],
        ];

        foreach ($recipes as $recipe) {
            Recipe::create($recipe);
        }
    }
}
