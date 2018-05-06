### Requirements
| Requirement | Status |
|---|---|
| Accessible via http://p4.yourdomain.com | Complete |
| Built with Laravel | Complete |
| Appropriate placement of code in routes, controllers, views, models ||
| Debugging enabled on local, disabled on production ||
| At least 1 pivot table used to connect 2 other primary tables.  The connection is somehow used/demonstrated in the interface | Connecting Users to Characters and NPCs will fulfill this. |
| At least 2 primary tables, both of which are used/demonstrated in the interface | There will be a Users table, an Active Characters table, and a Stock Character table|
| Interface provides a way for the visitor to Create data in at least one of the tables | Users will be able to create data in the Characters table |
| Interface provides a way for the visitor to Read data in at least one of the tables | Users will be able to read data in both the Active Characters table and the Stock Characters table |
| Interface provides a way for the visitor to Update data in at least one of the tables | Users will be able to update data in the Active Characters table |
| Interface provides a way for the visitor to Delete data in at least on of the tables | Users will be able to delete data in the Active Characters table |
| Migrations are present, complete, and functioning for all tables ||
| Seeders are present, complete, and functioning for all tables ||
| If implementing user authorization, users table seeder includes the seed users provided in the notes (Jill/Jamal) ||
| Data should be checked and problems should be reported via Laravel's validation features |
| Upon validation failure, the form fields should be pre-filled with problematic data ||
| Visitor-entered data should be sanitized on output (using Blade's {{}} statements) ||
| Use Blade ||
| Use template inheritance ||
| Separation of Concerns: No non-display-specific logic in view files ||
| barryvdh/laravel-debugbar should be installed in require-dev |
| start with the Project 4 README.md template ||
| All the same requirements for the P3 README.md apply to P4 ||
| Follow the course code style ||
| Running your site's production URL through the w3 validator should not produce any errors or warnings ||
| Do not copy the style/layout used in Foobooks -- create your own CSS ||
| Follow the course guidelines on interface ||
| Follow the requirements from previous projects, such as having a public repo, production and repo version of the code should be in sync, etc ||

### Features List
| Features |
|----------|
| Users table |
| Active Characters table |
| Stock Characters table |
| Pivot table connecting Users with Active Characters |
| Ability to read the Stock Characters table |
| Ability to read relevant sections of the Active Characters table |
| Ability to update relevant sections of the Active Characters table |
| Ability to delete relevant characters from the Active Characters table |



### Author Information
*Name: Joel Turnblade*  
*Contact: joel.turnblade@gmail.com*


### Development Notes
- May 4, 2018
  - Copied the list of requirements. Started on the features list.
  - Built conceptual layout for combat page.
