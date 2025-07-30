<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Employee Management

### 👤 E-Staff

Simple employee management website using laravel

> give a star if you like it, cheers

#### Features

-   Create, Update, Delete, and Search
-   Datatables pagination
-   Theme Switch (Dark/Light)

#### Menus

-   Login/Logout
-   Home
-   Profile
-   Employee
-   Department
-   Shift
-   User

### Setup Instructions

To get a local copy of the code, clone it using git:

```
git clone https://github.com/IsranLie/employee-management.git
cd employee-management
```

Install composer depedencies:

```
composer install
```

Setting your database connection on .env
Copy .env file:

```
cp .env.example .env
```

App key:

```
php artisan key:generate
```

Migrate database (MySQL) & seeding

```
php artisan migrate --seed
```

Run command:

```
php artisan serve
```

The website will run on the laravel server `http://127.0.0.1:8000/`

```
username: ahmad
password: ahmad
```

### Technologies Used

-   [Laravel v10.x](https://laravel.com/): free and open-source PHP-based web framework for building web applications.
-   [JavaScript](https://developer.mozilla.org/en-US/docs/Web/JavaScript): often abbreviated as JS, is a programming language and core technology of the World Wide Web, alongside HTML and CSS.
-   [Tailwind CSS](https://tailwindcss.com/): a utility-first CSS framework that provides a set of predefined CSS classes.
-   [Lucide Icons](https://lucide.dev/): open-source neutral-style system symbols elaborately crafted for designers and developers.
-   [AlpineJs](https://alpinejs.dev/): a lightweight JavaScript framework designed to add interactivity directly to HTML.
-   [Datatables](https://datatables.net/): jQuery plugin used to display data in interactive table form on web pages.

### Browser Support

This project designed with the latest web browsers in mind. Recommended that you use the latest version of one of the following browsers.

-   Apple Safari
-   Google Chrome
-   Microsoft Edge
-   Mozilla Firefox

### Screen Capture

##### Desktop View:
<img width="1756" height="697" alt="k" src="https://github.com/user-attachments/assets/31ab3404-5fa0-4403-93fc-4048625dddbe" />

##### Mobile View:
<img width="297" height="593" alt="image" src="https://github.com/user-attachments/assets/86b88587-9239-4a04-9d14-944d127ca888" />

##### Demo Video:
https://github.com/user-attachments/assets/6a323d2f-7871-46b6-821e-cdc4c82e8f01

