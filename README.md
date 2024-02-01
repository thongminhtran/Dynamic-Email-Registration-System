# Dynamic Email Registration System with PHP

## Overview
This project, assigned in SOEN287 for Fall 2020, is designed to deepen understanding of server-side scripting with PHP to create dynamic web content. By building a dynamic email registration system similar to Gmail's sign-up process, students will demonstrate their ability to work with PHP, HTML, and implement validation and file handling in real-world applications.

## Assignment Details

### Due Date
- **December 3rd, 2020, by 11:59 PM**

### Evaluation
- **Worth 15% of the final grade**
- **No late submissions accepted**

### Objectives
- Gain proficiency in server-side scripting with PHP.
- Implement dynamic content generation.
- Understand practical applications of PHP and HTML in form validation and data handling.

### General Guidelines
- **Source Code Comments**: Include assignment number, authors' names, student IDs, and section details at the top of all source files.
- Provide a general explanation and key step comments within your program.
- Use clear prompts for user inputs and display outputs in an easy-to-read format.

### Tasks

#### Question #1: Gmail Sign-up Page Replica
- Create a PHP page to mimic the Gmail sign-up process.
- Ensure all fields are validated as per the specified criteria.
- Use the `POST` method for form submission to `process.php`.
- **Validation Checks**:
  - Non-empty fields, valid userID, password complexity, and matching passwords.

#### Question #2: UserID Availability Check
- Implement the "Check ID" button functionality.
- Validate userID against `users.txt` to ensure uniqueness.
- Provide appropriate feedback based on the availability check.

#### Question #3: Data Collection and Processing
- Create `process.php` to collect user data and request additional information.
- Upon submission, transfer data to `outcome.php` for processing and user account creation.

#### Question #4: Account Creation Confirmation
- Use `outcome.php` to append user information to `users.txt` and send an email confirmation.
- Integrate PHPMailer for email functionalities.
- Customize the email message and attach a welcome image.

