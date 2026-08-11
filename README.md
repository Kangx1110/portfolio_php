# My portfolio
This is a personal portfolio website built with PHP and MySQL. 
It is designed to showcase my background, skills, and projects that I have completed.

## Technologies
- PHP
- MySQL
- HTML
- CSS
- XAMPP
- Git
- GitHub

## Features
- Personal introduction
- Skills
- Projects
- Contact form
- Store contact messages in MySQL

## Database
Database:
```text
portfolio
```
Tables:
- `skills`
- `projects`
- `messages`
### skills
Stores technical skills.
### projects
Stores portfolio projects.
### messages
Stores messages submitted through the Contact form.

## File Description
| File | Description |
|---|---|
| `index.php` | Main portfolio page |
| `config.php` | MySQL database connection |
| `contact_handler.php` | Handles contact form |
| `portfolio.sql` | Database structure and sample data |
| `style.css` | Website styling |
| `.gitignore` | Files ignored by Git |

## How to run
### 1. Install XAMPP
Install XAMPP and start:

- Apache
- MySQL

### 2. Copy project
Copy the project into:
```text
C:\xampp\htdocs\
```
For example: 
```text
C:\xampp\htdocs\portfolio_php
```

### 3. Create database
Open: 
```text
http://localhost/phpmyadmin
```
Import:
```text
database/portfolio.sql
```

### 4. Configure database
```text
config.php
```
Default XAMPP configuration:
```php
$host = "localhost";
$username = "root";
$password = "";
$database = "portfolio";
```

### 5. Run the website
Open:
```text
http://localhost/portfolio_php/portfolio
```

## Screenshots
Add screenshots of the website here.
```markdown
![portfolio](assets/images/avatar.jpg)
```

## Contact
**Name:** Dũng

**Email:** duqtruoq1110@gmail.com

**GitHub:** https://github.com/Kangx1110

### License

This project is created for personal and educational purposes.






