# twitter-like-web-app

Twitter-Like Web Application
This is a Twitter-like web application that allows users to register, log in, post tweets, follow other users, and more.

## Features
+ User registration and login
+ Posting tweets
+ Following and unfollowing users
+ Viewing user profiles
+ Responsive design
+ User authentication
+ Password reset functionality
+ Real-time notifications
+ Like and retweet functionality
+ Comment on tweets
+ Direct messaging between users
+ Search functionality for users and tweets
+ Trending topics display
+ User settings and profile customization
+ Image and video upload support
+ Hashtag support
+ Mention other users in tweets
+ Bookmark tweets
+ View tweet analytics (likes, retweets, comments)
+ Admin panel for managing users and content

## Project Structure
- .htaccess
- .well-known/
- assets/
- + css/
- + + main.css
- + + style.css
- + images/
- + + entry/
- + js/
- + + index.js
- + sass/
-   + style.scss
- cgi-bin/
- error_log
- index.php
- mvc/
- + controller/
- + + user.php
- + model/
- + + user.php
- + view/
-   + hy/
-   + user/
-   + + entry.php
-   + + home.php
-   + + username.php
- README.md
- system/
- + autoload.php
- + db.php
- + functions.php
- + loader.php
- + view.php

## MVC Explanation
- Model: Contains the business logic and data handling. For example, user.php handles user data interactions with the database.
- View: Responsible for the presentation layer. For example, entry.php displays the user entry page.
- Controller: Manages the application logic and acts as an intermediary between the Model and the View. For example, user.php handles user-related actions and updates the View accordingly.
## Installation
1. Clone the repository:
2. Navigate to the project directory:
3. Set up your web server to serve the project directory.

## Usage
1. Open your web browser and navigate to the application URL.
2. Register a new user account or log in with an existing account.
3. Start posting tweets and following other users.

## Demo
A demo of this repository is available at https://twitter.arashghsz.com/user/entry.