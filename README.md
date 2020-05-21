# Client Plugin for OctoberCMS

**Background**  
This plugin is used to manage a client list. This plugin isn't much on its own, but it is a useful base for managing accounts in a system without the need to login on the front-end. There are also other plugins that extend this plugin available from Albright Labs.

**Features**  
- Create and manage clients
- Client fields: first name, last name, company name, email, phone, address, image, and custom fields
- Custom client fields can be added via plugin settings
- Ability to import and export clients

**Install**  
There are two options:
- `git clone https://github.com/albrightlabs/client-plugin.git plugins/albrightlabs/client` and run `php artisan october:up` or
- `git submodule add -b master https://github.com/albrightlabs/client-plugin.git plugins/albrightlabs/client` and run `php artisan october:up`

**Update**  
- `git pull origin master` or
- `git pull --recursive-submodules`

**Usage**
Install plugin. Select clients from the navigation. Simply add client information.

**Contribute**
Feel free to fork and contribute to this plugin! Please email support@albrightlabs.com with any and all questions.
