# Virtual Kitchen Documentation

## Test Account
- Username: testuser
- Email: test@example.com
- Password: password

## Technologies Used

### Server-Side Technologies
- **Laravel 10.x** - PHP Framework
  - MVC Architecture
  - Eloquent ORM
  - Blade Templating Engine
  - Laravel Authentication
  - Laravel Migrations
  - Laravel Seeders
- **MySQL** - Database Management System
- **XAMPP** - Local Development Environment

### Client-Side Technologies
- **Tailwind CSS** - Utility-first CSS framework
- **Alpine.js** - Minimal JavaScript framework
- **Vite** - Frontend build tool
- **HTML5** - Markup Language
- **CSS3** - Styling

## System Structure (MVC)

### Models
- `User.php` - User model with authentication
- `Recipe.php` - Recipe model with relationships

### Views
- `resources/views/`
  - `components/` - Reusable Blade components
  - `recipes/` - Recipe-related views
  - `auth/` - Authentication views
  - `layouts/` - Application layouts

### Controllers
- `RecipeController.php` - Handles all recipe-related operations
- `AuthController.php` - Handles authentication (provided by Laravel)

## Implementation Details

### Public Functions (P)

#### P1. View Basic Information of All Recipes
- **Source Files:**
  - `RecipeController@index`
  - `resources/views/recipes/index.blade.php`
  - `resources/views/components/recipe-card.blade.php`
- **Implementation:** Displays a paginated grid of recipe cards with basic information

#### P2. View Recipe Details
- **Source Files:**
  - `RecipeController@show`
  - `resources/views/recipes/show.blade.php`
- **Implementation:** Shows detailed information about a specific recipe

#### P3. Search Recipes
- **Source Files:**
  - `RecipeController@search`
  - `resources/views/recipes/index.blade.php`
- **Implementation:** Allows searching by recipe name and filtering by type

#### P4. User Registration
- **Source Files:**
  - `resources/views/auth/register.blade.php`
  - `app/Http/Controllers/Auth/RegisteredUserController.php`
- **Implementation:** Laravel's built-in registration system

### Registered User Functions (R)

#### R1. Login System
- **Source Files:**
  - `resources/views/auth/login.blade.php`
  - `app/Http/Controllers/Auth/AuthenticatedSessionController.php`
- **Implementation:** Laravel's built-in authentication system

#### R2. Add Recipe
- **Source Files:**
  - `RecipeController@create` and `@store`
  - `resources/views/recipes/create.blade.php`
- **Implementation:** Form for creating new recipes with image upload

#### R3. Update Recipe
- **Source Files:**
  - `RecipeController@edit` and `@update`
  - `resources/views/recipes/edit.blade.php`
- **Implementation:** Form for editing existing recipes

#### R4. Logout
- **Source Files:**
  - `app/Http/Controllers/Auth/AuthenticatedSessionController.php`
- **Implementation:** Laravel's built-in logout functionality

## Security Features

### Authentication
- Laravel's built-in authentication system
- Session-based authentication
- Password hashing using Bcrypt
- CSRF protection
- Form validation

### Authorization
- Policy-based authorization (`RecipePolicy.php`)
- Middleware protection for authenticated routes
- User-specific recipe management

### Data Protection
- SQL injection prevention through Eloquent ORM
- XSS protection through Blade's automatic escaping
- Input validation and sanitization
- Secure file upload handling

## Database Structure

### Users Table
- `uid` (Primary Key)
- `username`
- `email`
- `password`
- `remember_token`
- `created_at`
- `updated_at`

### Recipes Table
- `rid` (Primary Key)
- `name`
- `description`
- `type`
- `cookingtime`
- `ingredients`
- `instructions`
- `image`
- `uid` (Foreign Key)
- `created_at`
- `updated_at`

## Routes
- `/` - Home page (recipe listing)
- `/recipes` - Recipe management
- `/recipes/create` - Create new recipe
- `/recipes/{recipe}` - View recipe details
- `/recipes/{recipe}/edit` - Edit recipe
- `/recipes/search` - Search recipes
- `/login` - User login
- `/register` - User registration
- `/logout` - User logout 