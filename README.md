# Client Plugin for OctoberCMS

**Background**  
This plugin is used to manage a client list. This plugin isn't much on its own, but it is a useful base for managing accounts in a system without the need to login on the front-end. There are also other plugins that extend this plugin available from Albright Labs.

**Features**  
- Create and manage clients
- Client fields: first name, last name, company name, email, phone, address, image, referral, and custom fields
- Custom client fields can be added via plugin settings
- Referral options can be added via plugin settings
- Ability to import and export clients

**Functionality**
- Custom fields are supplied to the client model by the clients controller.
- Referral options are supplied to the client model by itself.

**Install**  
There are two options:
1. `git clone https://github.com/albrightlabs/client-plugin.git plugins/albrightlabs/client` and run `php artisan october:up`
2. `git submodule add -b master https://github.com/albrightlabs/client-plugin.git plugins/albrightlabs/client` and run `php artisan october:up`

**Contribute**  
Feel free to fork and contribute to this plugin! Please email support@albrightlabs.com with any and all questions.
