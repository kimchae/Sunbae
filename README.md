# Sunbae
Sunbae is a streaming website made specifically for Korean Shows.

## Set Up
1. Rename `.env.example` -> `.env` & edit the config
2. Run `composer install`
3. Run `php artisan generate:key`

When submitting show entries into the database, there will be a type column.

##### Types -
* 1 - Drama
* 2 - Variety
* 3 - Movie

### On-Going Update
This app makes use of Laravel's command scheduling to check if a series is on-going (via TVDB).

Add an entry to your crontab file:

`* * * * * php /path/to/artisan schedule:run 1>> /dev/null 2>&1`

A .bat file is also included for Windows users. You will need to check this out to add it to the task scheduler: https://laracasts.com/discuss/channels/general-discussion/running-schedulerun-on-windows
