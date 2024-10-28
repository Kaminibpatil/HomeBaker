# Home Baker Hub

Home Baker Hub is a dynamic online platform dedicated to empowering home bakers by providing them with the tools and visibility needed to reach potential customers. The platform simplifies the process of product listings, ordering, and secure transactions for home bakers while providing customers with easy access to high-quality homemade bakery products.

## Features

- **User Registration & Login**: Create accounts, log in, and manage user profiles.
- **Product Listing & Management**: Bakers can add, update, and manage their products.
- **Search & Filtering**: Customers can search and filter products by name, category, price, etc.
- **Shopping Cart & Checkout**: Customers can add items to the cart and place orders.
- **Secure Payment Gateway**: Safe and secure transactions for all users.
- **Profile Management**: Users can manage their profiles and customize interactions.
- **Community Features**: Ratings, reviews, and interaction spaces for bakers and customers.

## Technology Stack

- **Frontend**: HTML, CSS, JavaScript (with jQuery for interactivity)
- **Backend**: PHP (no framework)
- **Database**: MySQL
- **UI Framework**: Bootstrap (for frontend design)
- **Email Notifications**: PHPMailer used for sending automated emails (e.g., account verification, password recovery, order confirmation)


## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/kaminibpatil/HomeBakerHub.git
   
2. Set up the database:
Import the SQL file into your MySQL database.
Update database credentials in the PHP configuration file.

3. Configure email authentication:
Open the mail configuration file or PHP script where PHPMailer is configured.
Replace the placeholder values with your own email and password for sending email notifications.
$mail->Username = 'your-email@example.com';   // Your email
$mail->Password = 'your-email-password';      // Your email password

4. Run the project:
Use a local server like XAMPP or deploy to a web hosting service to view and use the application.
