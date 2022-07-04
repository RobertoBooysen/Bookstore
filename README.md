# task-3-RobertoBooysen
task-3-RobertoBooysen created by GitHub Classroom

Group members: 
Nikita Davids (ST10085223) 
Roberto Booysen (ST10085125)
Keely-Ann Maritz (ST10085428)

YouTube video part 3 code: https://youtu.be/6Ura3zsXXXg
YouTube video part 3 display: https://youtu.be/-tAq3zgZ3pQ

The Home page displays the textbooks added by the admin/librarian. If the textbook is fetched from the database, it will be displayed and added to the row on the home
page. We included a navigation bar, allowing the user to access the websites different pages. We included the option for the user/student to add a textbook to their 
shopping cart using the “Add to Cart” button. Once the user has selected to add a textbook a message will be displayed, informing the user the textbook was added to 
the cart successfully. 
The Selling page asks the admin/ librarian to enter the seller details. The seller details contain the name, surname, contact details, and email address. The admin 
can add textbooks by entering the book name, uploading an image, including the price, and rating the textbooks condition. The admin can upload the book information 
by clicking the “upload book “button. Once the book is uploaded, the computer file is stored in the file system. The file system was created to fetch or upload the 
files. The image location is stored into the database. A tblBooks table was created in the database bookstore to store the textbooks name, image, and price. 
On the About Us page we included information about the online second-hand textbook website.  The page contains a small description of the second-hand textbook website. 
We had included subheadings for our mission, our vision, and our goals. Each subheading contains an image relating to it. 
On the Contact Us page we had displayed a section in which allows users to contact us to improve our website. A notice was included to inform users about our 
restrictions. We included an email address and a contact number for users to have a way to contact us if their have any queries. We included a newsletter, allowing 
users to subscribe to keep up with latest books added. An embedded map was included to show users where we are allocated. 
The Register page allows the user to register to the website before they can login. They are only able to register and log in before they can access the home page.
The Index page allows the user to login once they have registered to the website. We included the option for the user to sign up if they are not a member yet. If the 
user is an admin member, they have the option to sign in. We made the login form sticky, displaying the details entered from the user which prevents them from 
re-entering the field that are correctly entered.
In the Logout page we included the option for the user to exit or logout the website.
In the shopping cart page, we ensured the cart keeps track of the orders and the quantity of textbooks added by the user. We display the details based on what the 
user adds to the cart. There is a remove button ,which removes the items in the shopping cart.We then have a clear cart which clears all the items in the shopping cart
.The next button is the contiue to shop button which takes the user back to the home page .Lastly there is a continue to checkout which takes the user to the Checkout page.
In the Checkout page, once the user selects the shopping cart icon, it will then take them to the checkout page where their details will be required to complete the 
process.The user may select the checkout button with will then take them to the Order Place Page.
In the Errors page, deals with error handling throughout the website as it identifies incorrect information being inserted by the user.
In the OrderPlaced page, a message is displayed once the user has placed an order that their order successful,from there they can choose to continue to shop or view 
their purchase history.
In the ViewPurchase page allows the user to view their final purchase order details.
The DBConn page, creates a connection between the database and the website.
In the Loadbookstore page, it creates the tblUser, tblBooks, tblAdmin ,tblOrder tables which stores the information in the bookstore database.
In the stylesheet, we included all our external CSS styling.
In the AdminRegister page, it checks the database to make sure if the user does not exist already. If the user does exist, we included a display message which 
notifies the librarian the information exists. We stored the admins register information is stored in the database, the password is encrypted. The form is designed to 
ask the librarian for their name, number, username which is an email, password, and a confirm password requirement. In the Admin Login page allows the librarian to 
log into the admin part of the website, taking them to the Admin Home page. We included a login form which askes the librarian to enter the following details to login. 
The details are number, username, and password. The AdminHome page, displays the user table, the textbook table, as well as the verification of the user for admins to add,
update, delete, and verify.
In the BookAdd page, we included a form for the admin to upload the textbooks. In the BookAdd2 page, once the button has been selected the textbook is then stored into
the database. A message is displayed if the book has been successfully added. In the BookUpdate page, we included a form for the admin to update the textbook
information. In the BookUpdate2 page, once the button has been selected the textbook information is then updated in the database. A message is displayed if the book 
has been successfully updated.
In the BookDelete page, once the button has been selected the textbook is then deleted from the database. A message is displayed if the
book has been successfully deleted.
In the UserAdd page, we included a form for the admin to add a user. In the UserAdd2 page, it adds the user to the database. A message is displayed if the user has 
been successfully added. In the UserDelete page, once the button has been selected the user is then deleted from the database. A message is displayed if the book has 
been successfully deleted. In the UserUpdate page, we included a form for the admin to update the user information. In the UserUpdate2 page, once the button has been
selected the user information is then updated in the database. A message is displayed if the user has been successfully updated.
The Books.txt includes more than 5 fictitious entries displayed on our home page after the user and admin have uploaded a book. The UserData.txt includes 5 fictitious 
entries which can be entered into the user register and login. The Admin.txt includes 5 fictitious entries which can be entered into the admin register and login
We then created a createTable page.






Reference List
CodeWithAwa, 2022. Complete user registration system using PHP and MySQL database. [Online].
Available at: https://codewithawa.com/posts/complete-user-registration-system-using-php-and-mysql-database [Accessed 30 May 2022].
GeeksforGeeks, 2022. How to Upload Image into Database and Display it using PHP. [Online]. 
Available at: https://www.geeksforgeeks.org/how-to-upload-image-into-database-and-display-it-using-php/ [Accessed 6 June 2022].
How to Approve New User Registration in PHP MySQL,2021. You Tube video, added by Rein.[Online]. Available at: https://www.youtube.com/watch?v=TYkiR_21Y0M[Accessed 09 June 2022]
IT Sourcecode, 2021. CRUD Operation In PHP With Source Code. [Online].
Available at: https://itsourcecode.com/free-projects/php-project/php-crud-using-mysqli-datatables-twitter/ [Accessed June 6 2022].
W3Schools, 2022. W3Schools. [Online] 
Available at: https://www.w3schools.com/ [Accessed 30 May 2022].
Webslesson, 2016. Simple PHP Mysql Shopping Cart. [Online]. 
Available at: https://www.webslesson.info/2016/08/simple-php-mysql-shopping-cart.html
[Accessed 05 May 2022].

