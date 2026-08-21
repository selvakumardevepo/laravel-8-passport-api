🛠️ Laravel Admin Dashboard Project

This project is a simple Admin Dashboard built with Laravel that demonstrates user management and product management with authentication and role-based access.

📌 Features
🔑 Authentication & Authorization

Laravel’s built-in Auth system is used for login/logout.

Access to the admin dashboard is restricted:

if (Auth::check() && Auth::user()->role === 'admin') {
    // only admins can view the dashboard
}


Only users with the role Admin can view all users and products.

👥 User Management

The dashboard lists all registered users in blide template and also allowes to create user and login , logout using API's via postman.


📦 Product Management

Products are stored in the products table with fields:

create , update, delete, search product via API request from post man.

🎨 Blade Templates

Laravel Blade templating engine is used for UI.

Conditional rendering with @if, looping with @foreach / @forelse.

Bootstrap is used for styling tables, buttons, and badges.

📂 Project Structure

<img width="643" height="257" alt="image" src="https://github.com/user-attachments/assets/4737b8fb-54b1-4cf6-90e1-7e170c0024c1" />


🚀 How It Works

Login as Admin

Only admins can access /dashboard.

User Management Section

Displays all registered users with role and verification status.

Product Management Section

Displays all products along with their creator’s name.

🧩 Concepts Used

Authentication (Laravel Auth)

Role-based Access Control (RBAC)

Eloquent ORM (Relationships: belongsTo)

Blade Templates (@forelse, @if, @foreach)

Bootstrap for UI (tables, badges, buttons)

✅ Future Enhancements

Add edit/delete functionality for users and products.

Implement pagination for large datasets.

Add search & filter options in tables.

Implement Soft Deletes for products and users.


SCREENSHOTS FOR REFERENCE:

Blade concepts:

Login:
<img width="1366" height="530" alt="image" src="https://github.com/user-attachments/assets/d0f7ba97-2792-460b-a121-4b28f1d73ab7" />

Customer dashboard:
<img width="1366" height="574" alt="image" src="https://github.com/user-attachments/assets/54937d82-5a6c-4c14-9c1b-af538ac94ec5" />

Admin dashboard:
<img width="1366" height="628" alt="image" src="https://github.com/user-attachments/assets/5224840d-d9f6-450c-a3fa-d048151b1483" />


API Concepts:

Register user

<img width="988" height="619" alt="image" src="https://github.com/user-attachments/assets/316f045c-f319-4ef3-9868-b289f950be5f" />


Login user

<img width="946" height="538" alt="image" src="https://github.com/user-attachments/assets/a42b6e8f-ef0d-471e-816b-a88022ba6e05" />


Delete user

<img width="933" height="513" alt="image" src="https://github.com/user-attachments/assets/4f70dff1-a4f5-4775-b703-e5f96623fb7c" />


Create Product

<img width="934" height="625" alt="image" src="https://github.com/user-attachments/assets/2c0f4058-f6cb-4a4d-bb54-616bcc4505dc" />


Search Product

<img width="945" height="623" alt="image" src="https://github.com/user-attachments/assets/9b306a4d-805c-4d80-85ce-fcbff2b0fe54" />







