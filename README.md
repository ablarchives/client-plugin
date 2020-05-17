## Client Plugin for OctoberCMS

**Background**

This plugin is used to manage a client list. This plugin isn't much on its own, but it is a useful base for managing accounts in a system without the need to login on the front-end.

**Features**

- Manage clients
- Each client supports first name, last name, company name, email, phone, address, image, and custom fields
- Custom fields can be added via plugin settings
- Clients can be imported and exported as a CSV file

**Install**

There are two options:
- `git clone https://github.com/albrightlabs/albright-plugin-client.git plugins/albrightlabs/client` and run `php artisan october:up` or
- `git submodule add -b master https://github.com/albrightlabs/albright-plugin-client.git plugins/albrightlabs/client` and run `php artisan october:up`

**Update**

- `git pull origin master` or
- `git pull --recursive-submodules`
