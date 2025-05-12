# Laravel URL Scheduler


## How It Works

This application uses Laravel's built-in scheduler to make an HTTP request to your specified URL every day at midnight.

### Testing the Command

You can manually test the command by running:

php artisan url:trigger

### Setting Up the Scheduler

To ensure the scheduler runs automatically, add the following Cron entry to your server:


* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1


This Cron job will run every minute and execute any scheduled tasks that are due.


If you need to change the schedule time or add additional options, modify the `app/Console/Kernel.php` file.