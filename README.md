# Title: User Management System with age Search bar and Pagination

# Project Description:
This project is a User Management System that allows users to register, log in, edit their profiles, and search for other users based on specified criteria. The system provides secure authentication and authorization functionalities to ensure data privacy and restrict access to certain features.Also it have search bar functionality for filter data.

# Working Demo:
-Click Here :- (http://dev.pixlogixservice.com/Age_Search_Bar/login.php)

# Features:
1. Register Page:
- Collects user details such as Name, Birth Date, Age, Gender, Photo, Hobbies, Email and Password during the registration process.
- Implements proper validation and sanitization to ensure data integrity.
  
2. Login Page:
- Provides a secure login mechanism with Email and Password fields.
- Validates login credentials against the database to grant access to authenticated users.
  
3. Edit Profile Page:
- Allows users to update their profile information, including Name, Birth Date, Age, Gender, Photo, Hobbies, Email, and Password.
- Pre-populates existing data from the database for easy editing.
  
4. Search Functionality:
- Users can search for other users based on specified criteria, including age range.
- Implements a search bar to provide a seamless searching experience.
- Applies conditions to filter results based on gender (male users can only see female users and vice versa) and hobbies matching.
  
5. Pagination and AJAX:
- Implements pagination for search results to efficiently manage large datasets.
- Utilizes AJAX to perform asynchronous searches, enhancing user experience and reducing page reloads.

# Functionality Details:

1. User Registration:
- Users can register on the platform by providing their details, including personal information, email, and password.

2. Secure Login:
- Provides a secure login system to authenticate users based on their registered email and password.

3. Profile Editing:
- Allows users to edit their profile information after logging in, including updating personal details, hobbies, and profile photo.

4. Search Users:
- Users can search for other users based on specified criteria, including age range and matching hobbies.

5. Pagination for Search Results:
- Implements pagination to manage search results efficiently and display results in smaller, manageable chunks.

6. Gender-based Restrictions:
- Applies restrictions on user visibility based on gender, allowing only male users to see female users and vice versa.

7. AJAX for Asynchronous Searching:
- Utilizes AJAX to perform asynchronous searches, improving user experience by providing instant search results without page reloads.

8. Age filter using bar:
- From that you can select age range and it will showcase data according to that.

# Technologies Used:

Front-end: HTML, CSS, JavaScript, AJAX
Back-end: PHP
Database: MySQL (or any other suitable database system)

# Setup and Usage:

1. Clone the repository to your local machine using `git clone <repository_url>`.
2. Set up a web server (e.g., Apache) and a PHP runtime environment.
3. Import the provided database schema into your MySQL database.
4. Update the database connection credentials in the PHP files to match your database settings.
5. Navigate to the project directory in your web server's root directory.
6. Access the application through your web browser and start using the User Management System.

# Note:

- First register user after that you can loging using that credentials and view the data in that you can filter data according age. 
- Ensure to protect sensitive data, such as database credentials and API keys, by using environment variables or secure configuration management.
- This project can be further extended with additional features, such as user roles, email verification, and profile image uploads.
- Feel free to explore, use, and contribute to this open-source User Management System.
- We welcome your feedback and contributions to enhance its functionalities and usability.
