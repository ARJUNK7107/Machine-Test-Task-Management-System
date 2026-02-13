# Task Management System

A simple Task Management System built using **Laravel 12** and **MySQL**.

This project implements authentication, role-based access control (Admin & User), task assignment, business validation rules, and soft deletes.

---

##  Features

- User Authentication (Laravel Breeze)
- Role-Based Access Control (Admin & User)
- Task Creation & Management
- Task Assignment (Admin can assign tasks to users)
- Business Rule Validation
- Soft Deletes for tasks
- Secure authorization using Laravel Policies

---

##  Roles & Permissions

###  Admin
- Can view all tasks
- Can assign tasks to any user
- Can edit any task
- Can delete any task

###  User
- Can create tasks
- Can view only their own tasks
- Can update status of their own tasks
- Cannot delete tasks
- Cannot access other users’ tasks

Authorization is implemented using Laravel Policies.

---

##  Business Rule

A task **cannot be marked as "Completed"** if the due date is in the future.  
Validation prevents this action during update.

---

##  Tech Stack

- PHP 8.2+
- Laravel 12
- MySQL
- Blade (UI)
- Eloquent ORM
- Laravel Policies

---

#  Setup Instructions

##  Clone the Repository

```bash
git clone  https://github.com/ARJUNK7107/Machine-Test-Task-Management-System.git

```

---

## 2️ Install Dependencies

```bash
composer install
npm install
```

---

## 3️ Configure Environment

Copy the example environment file:

```bash
cp .env.example .env
```

Update the following values in `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_management_sys
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

---

## 4️ Generate Application Key

```bash
php artisan key:generate
```

---

#  Database Migration Steps

Run the following command to create required tables:

```bash
php artisan migrate
```

If you want a fresh start:

```bash
php artisan migrate:fresh
```

This will create:

- users table
- tasks table (with soft deletes)
- authentication-related tables

---

#  Running the Application

Start the Laravel development server:

```bash
php artisan serve
```


---

#  Testing the Application

1. Register as **Admin**
2. Register as **User**
3. Test the following:
   - Users cannot see other users’ tasks
   - Users cannot delete tasks
   - Admin can view and delete all tasks
   - Business rule prevents early completion
   - Soft delete works (deleted_at column is filled)

---

#  Soft Delete Implementation

Tasks use Laravel’s `SoftDeletes` trait:
- Deleted tasks are not permanently removed
- They are hidden from normal listings
- `deleted_at` column is used

---

#  Project Structure Overview

- `TaskController` → Handles task CRUD logic
- `TaskPolicy` → Handles authorization
- `Task` Model → Relationships & SoftDeletes
- `User` Model → Role management
- Blade Views → UI rendering

---

#  Security

- All task routes are protected using `auth` middleware
- Policies enforce record-level authorization
- Mass assignment protection implemented
- Role-based access handled cleanly via Policy `before()` method

---


