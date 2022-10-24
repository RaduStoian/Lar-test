## Basic info

Started from a barebones Laravel project with most stuff left as default.
Feel free to change the details below for your particular env, if you wanna run it locally.

db_name = laravel\
APP_URL=http://localhost


## Files worked on 
Ticket model - app\Models\Ticket.php\
Ticket seeder - database\seeders\TicketSeeder.php\
Ticket factory - database\factories\TicketFactory.php\
Ticket migration - database\migrations\2022_10_24_095042_create_tickets_table.php

First command - app\Console\Commands\CreateTickets.php\
Second command - app\Console\Commands\ProcessTickets.php

API config - routes\api.php\
API Controller - app\Http\Controllers\API\TicketController.php

## Commands
`php artisan ticket:create` - will make a ticket with dummy data every 1 minute with info in terminal\
`php artisan ticket:process` - will process a ticket with dummy data every 5 minutes with info in terminal

## APIs
`processed-tickets/`\
`unprocessed-tickets/`\
`user-tickets/{email}`\
`ticket-stats`

For urls with pagination, you can add `?page=x`\
Example: `http://127.0.0.1:8000/api/unprocessed-tickets?page=2`


## Things that would be done for production app
Console commands would probably be scheduled, or done at once instead of being timed like I did.
Security for the api and it's inputs. Especially some email validation.
Better pagination where user can specify page size
Speed of the ticketing controller by using collections better. Or better, switching to GraphQL.
I would assume User and Ticket models would be in a relationship. Here they are separate.

## Testing
No time left to write rigorous tests.
I added some basic check response code in - tests\Feature\TicketTest.php
