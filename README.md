# DreamHome Property Management System

## Project Description

DreamHome is a web-based property rental management system . The system manages property listings, client registrations, staff assignments, lease agreements, and payments for a fictional property rental company called DreamHome. It features role-based access control allowing different levels of access for Admin, Manager, Supervisor, Assistant, Secretary, and Cashier roles.

---

## Team Members

| Name | Role | Module |
|---|---|---|
| Jayson Rey Digang | Project Controler / Developer | Module 2 - Client & Registration |
| Ricky Mark S. Pareja | Developer | Module 1 - Property & Owner Management |
| Chien Maureen M. Enot | Developer | Module 3 - Staff & Branch Management |
| Sirelle Timothy Mayon | Developer | Module 4 - Rental & Viewing Management |


---

## Tech Stack

- Laravel 13.x
- PHP 8.5
- MySQL (Local) / Railway MySQL (Production)
- Railway (Deployment)
- Tailwind CSS
- Vite
- Git & GitHub

---

## Repository Link

```txt
https://github.com/digangjaysonrey123/dreamhome
```

---

## Setup Instructions

### Clone Repository

```bash
git clone https://github.com/digangjaysonrey123/dreamhome.git
cd dreamhome
```

---

### Install Dependencies

```bash
composer install
npm install
```

---

### Configure Environment

```bash
cp .env.example .env
php artisan key:generate
```

Update `.env` with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=DreamHome
DB_USERNAME=root
DB_PASSWORD=
```

---

### Import Database

1. Open MySQL Workbench or phpMyAdmin
2. Create a database called `DreamHome`
3. Run the SQL script provided in the repository
4. The script includes all tables, sample data, and triggers

---

### Run Database Migration

```bash
php artisan migrate
```

---

### Start Development Server

Open two terminals:

```bash
# Terminal 1
npm run dev

# Terminal 2
php artisan serve
```

Then open your browser at:

```txt
http://127.0.0.1:8000
```

---

## Default Login

### Admin Account

```txt
Email:    admin@dreamhome.com
Password: password123
```

---

## Database Information

### Database Platform

```txt
Local:      XAMPP MySQL
Production: Railway MySQL
```

---

### Main Tables

| Table | Purpose |
|---|---|
| Branch | Stores branch office details |
| Staff | Stores staff information and roles |
| NextOfKin | Stores next of kin details for staff |
| PropertyForRent | Stores property listings |
| Renter | Stores client/renter information |
| Lease | Stores lease agreements |
| Inspection | Stores property inspection records |
| Newspaper | Stores newspaper names for adverts |
| Advert | Stores property advertisements |
| Viewing | Stores property viewing records |
| Payment | Stores payment records |
| users | Stores system login accounts and roles |

---

### Database Triggers

| Trigger | Purpose |
|---|---|
| prevent_lease_delete | Prevents deletion of lease records within 3 years of expiry |
| prevent_property_delete | Prevents deletion of property records within 3 years of withdrawal |
| prevent_withdrawn_inspection | Prevents inspection of withdrawn properties |

---

## Role-Based Access Control

| Role | Access Level |
|---|---|
| Admin | Full access to all modules + User Management |
| Manager | Properties, Clients, Staff, Rentals, Payments |
| Supervisor | Properties, Clients, Staff, Rentals |
| Assistant | Properties, Clients, Rentals |
| Secretary | Dashboard only |
| Cashier | Payments & Reports |

---

## Module Assignment

| Module | Description | Assigned Developer |
|---|---|---|
| Module 1 | Property & Owner Management | Ricky Mark S. Pareja |
| Module 2 | Client & Registration | Jayson Rey Digang |
| Module 3 | Staff & Branch Management | Chien Maureen M. Enot |
| Module 4 | Rental & Viewing Management | Sirelle Timothy Mayon |


---

## Deployment Information

### Live URL

```txt
https://dreamhome-production.up.railway.app
```

---

### Hosting Platform

```txt
Railway - https://railway.appi
```

---

## Screenshots

### Login Page

![Login Page](screenshots/login.png)

---

### Dashboard

![Dashboard](screenshots/dashboard.png)

---

### User Management

![User Management](screenshots/users.png)

---

### Add New User

![Add New User](screenshots/users_create.png)

---

### Client & Registration Module

![Clients](screenshots/clients.png)

---

### Add New Client

![Add New Client](screenshots/clients_create.png)

---

### Edit Client

![Edit Client](screenshots/clients_edit.png)

---

### Property Module

![Properties](screenshots/properties.png)

---

### Add New Property

![Add New Property](screenshots/properties_create.png)

---

### Staff & Branch Module

![Staff](screenshots/staff.png)

---

### Rentals & Viewing Module

![Rentals](screenshots/rentals.png)

---

### Payments & Reports Module

![Payments](screenshots/payments.png)

---

### Database Tables

![Database](screenshots/database.png)


---

## Notes

```txt
1. Make sure XAMPP Apache and MySQL are running before starting the app locally.
2. Run 'npm run dev' and 'php artisan serve' in separate terminals.
3. The default admin account is admin@dreamhome.com with password: password123.
4. Each module has its own Git branch. Members should NOT push directly to main.
5. Business Rules:
   - Lease records cannot be deleted until 3 years after expiry.
   - Property records cannot be deleted until 3 years after withdrawal.
   - Withdrawn properties cannot be inspected.
6. When deploying to Railway, make sure all environment variables are set correctly.
7. The SQL script must be run in the correct order due to foreign key constraints.
```
