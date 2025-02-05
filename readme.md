
# LaraFeed

LaraFeed is a simple Laravel package that allows users to select any element on the page in web applications and send feedback. It takes a screenshot of the selected element, stores it in the database and allows you to view it on the dashboard.

## Features

- **Element Selection**: The user activates the feedback mode by pressing the Z key on the page, highlighting the element they clicked in red.
- **Screenshot**: Takes a screenshot of the selected element and saves it to the database.
- **Feedback**: The user can enter their comment about the element and send their feedback by pressing the send button.
- **Dashboard**: You can easily view the feedback sent via Laravel.

  
## Install
1. Install Package with Composer:

```bash
composer require exampleproject/larafeed
```
2. Publish Public and Migrations files

```bash
php artisan vendor:publish --tag=public
php artisan vendor:publish --tag=migrations
```  
3. Run Migration

```bash
php artisan migrate
```  
## Usage
1. Add Css and Js files to your page:

```html
<link rel="stylesheet" href="{{ asset('larafeed/css/feedback.css') }}">
<script src="{{ asset('larafeed/js/feedback.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
```
