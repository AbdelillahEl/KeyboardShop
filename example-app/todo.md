# TODO

## Features

### Minimum

- [x] Login system
    - [x] Users can log in
    - [x] Visitors can create a new account
    - [x] Users may or may not be an administrator
    - [x] Only an administrator can promote another user to administrator status (or create a new user that is an admin)
- [x] Profile pagina
    - [x] Each user has their own publicly available profile page
    - [x] A user can edit their own user data
    - [x] The information shown is at least
        - [x] Username
        - [x] Birthday
        - [x] Avatar (that can be uploaded and saved on the webserver)
        - [x] Short 'about me' biography 
- [x] Latest news
    - [x] Admins can add, edit, and delete news items
    - [x] Every visitor of the website can view the news posts
    - [x] These news items have at least the following:
        - [x] Title
        - [x] Cover image
        - [x] Content
        - [x] Publishing date
- [ ] FAQ page
    - [ ] There is a list of questions and answers, grouped by categories
    - [ ] Admins can add, edit, and delete FAQ categories
    - [x] Admins can add, edit, and delete FAQ question and answer pairs
    - [x] Every visitor of the website can view the FAQ page(s)
- [x] Contact page
    - [x] Visitors can fill out a contact form
    - [x] The content of submitted forms will be sent to the administrators

### Extra 

- [x] Admins can reply to the submitted contact forms through the admin panel, the replies will be mailed to the original sender
- [ ] Users can leave comments on news posts
- [ ] Users can pose questions that might be added to the FAQ
- [ ] Admins can add answers to the posed FAQ questions through the admin panel
- [ ] Basic forum: Users can create threads, other users can leave replies
- [ ] Online ordering: A customer can (with or without being logged in) place an order for the products available on the website

## Technical

### Minimum

- [x] Views
    - [x] You will at least have an "about" page. This is a static view that will serve as your Readme/list of sources. Cite any resources that you've used in this page, as well as a link to those pages. This page is mandatory, if your about page does not exist, you will not be able to pass for this project.
    - [x] Use at least 2 layouts (think about maybe splitting up the 'public' website and the admin panel)
    - [x] Use partials where logical
    - [x] Use the techniques we've seen during the exercises:
        - [x] Control structures
        - [x] XSS protection
        - [x] CSRF protection
        - [x] Client-side validation
- [x] Routes
    - [x] All routes use controller methods
    - [x] All routes use logical middleware
    - [x] If possible, group the routes where needed
- [x] Controller
    - [x] Use several controllers to split your logic
    - [x] Think back to resource controllers for CRUD operations
- [x] Models
    - [x] Use Eloquent models
    - [x] Add relationships where needed
        - [x] At least 1 one-to-many
        - [x] At least 1 many-to-many 
- [x] Database
    - [x] Your database needs to be created using migration files 
    - [x] Add seeders to have some "dummy" data
    - [x] I will run "php artisan migrate:fresh --seed" on every project. After running this your website should be usable for me
- [x] Authentication
    - [x] Default functionality for authentication
        - [x] Log in/out
        - [x] 'Remember me'
        - [x] Register
        - [x] Forgot password
        - [x] Change password
    - [x] Add 1 default admin with a seeder
        - [x] Username: admin
        - [x] Email: admin@ehb.be
        - [x] Password: Password!321
- [x] Theming/styles
    - [x] Provide some default styling for your website. Even though design is not a core competence of this course, I expect a minimum. If you are not good at design, use something like Bootstrap and pick a free theme from a website such as https://startbootstrap.com/Links to an external site.