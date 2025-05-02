# 🏥 Pharmacy Supply System (website)

This is a web-based Pharmacy Management System designed to simplify the process of purchasing medicine and managing pharmacy operations. Built with PHP and MySQL, this system allows users to browse medicines, manage their cart, and place orders, while administrators can manage inventory and orders.

## 📁 Project Structure

```
Pharmacy Supply System/
├── db_pharma.sql              # SQL file to set up the database
└── pharma-master/             # PHP web application
    ├── index.php              # Homepage
    ├── shop.php               # List of medicines
    ├── shop-single.php        # Medicine details
    ├── cart.php               # Shopping cart
    ├── checkout.php           # Order checkout
    ├── login.php              # User login
    ├── register.php           # User registration
    ├── your_orders.php        # User's past orders
    ├── admin/form.php         # Admin inventory management
    └── ...                    # Other pages like contact, about, thank you, etc.
```

## 💡 Features

- **User Module:**
  - Register/Login
  - Browse and search medicines
  - Add items to cart
  - Place orders
  - View past orders

- **Admin Module:**
  - Manage medicine inventory
  - View orders

## 🛠️ Technologies Used

- **Frontend:** HTML, CSS (Bootstrap)
- **Backend:** PHP
- **Database:** MySQL

## 🚀 How to Run

1. Import `db_pharma.sql` into your MySQL database.
2. Place the `pharma-master` folder in your web server's root (e.g., `htdocs` in XAMPP).
3. Start Apache and MySQL servers.
4. Access the project in your browser at:  
   `http://localhost/pharma-master/`

## 📬 Contact

For any issues or queries, feel free to reach out!
