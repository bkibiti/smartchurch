# ⛪ SmartChurch

**SmartChurch** is a modern Church Management System (ChMS) built to help churches of all sizes manage their **membership, services, finances, events**, and **communications** effectively.

---

## ✨ Features

### 🙍 Membership Management
- Register and track members, families, and ministries
- Member status and demographics
- Attendance tracking

### 💸 Tithes & Offerings
- Record and track donations, pledges, and tithes
- Generate contribution statements
- Export financial reports

### 🗓️ Church Events & Services
- Schedule church programs and services
- Volunteer & staff assignment
- Event attendance and follow-up

### 📢 Communication Tools
- Send SMS, emails, or notifications to members
- Segment members by groups, age, or ministry
- Automated birthday/anniversary alerts

### 📊 Reporting & Insights
- Member growth trends
- Donation summaries
- Engagement and activity metrics

### 🔐 Roles & Permissions
- Secure login with role-based access (admin, pastor, finance team, member)
- Audit trails for key actions

---


## 🧪 Installation

### Requirements
- PHP >= 8.1
- Composer
- MySQL or MariaDB
- Node.js & npm
- Laravel CLI

### Setup Steps

```bash
# Clone the repository
git clone https://github.com/your-org/smartchurch.git
cd smartchurch

# Install PHP dependencies
composer install

# Copy and configure .env
cp .env.example .env
php artisan key:generate

# Update .env with database and mail settings

# Run migrations and seeders
php artisan migrate --seed

# Install front-end dependencies
npm install && npm run dev

# Serve the application
php artisan serve
