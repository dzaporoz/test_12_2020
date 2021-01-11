# Test task

## Subject

### Task
1. You need to make a simple click handler.
1. Create table “click” and “bad_domains”
1.1. "click" structure: id | ua | ip | ref | param1 | param2 | error | bad_domain
1.2. “bad_domains” structure: id | name
2. Implement a scenario to handle a click on the tracking link. Example of tracking link: http://local.dev/click/?
2.1. When following the tracking link, write the user-agent, ip, referrer + param1, param2 to the database with the generation of a unique ID. param2 is not counted in the unique click data binding.
2.2. If there is no unique click data link in the database, display the click data in any form and redirect to http://local.dev/succes/ID_CLICK.
2.3. If the click has an existing data link in the database, we increase the “error” counter and redirect to http://local.dev/error/ID_CLICK, where we display an error message in any form.
3. On http://local.dev/, display a list of all logged clicks by a table with search and sorting by it.
4. Make output and add bad referrals to bad_domains.
4.1. Add additional check of the referrer against the list of domains in the “bad_domains” table. If a domain is found, then the steps of paragraph 2.3 are repeated and the value “bad_domain” becomes equal to 1, and after a redirect to http://local.dev/error/ID_CLICK with an error, make a redirect to http://google.com in 5 seconds. 

### Requirements
1. Implement the task on the Laravel framework.
2. Use mySQL.
3. You can use js, php libraries to display the table.
4. The application should be designed to be extensible as it would be in a large project (SOLID, DRY).
5. The application should work as a REST service.
6. Application deployment should be automated.
7. Commit all steps to git
8. First you need to give an estimate Task: You need to make a simple click handler.
9. http://local.dev/ example domain.
10. Do not use autoincrement to generate a unique ID click.
11. ID_CLICK needs to be replaced with the generated click ID.
12. The use of templates is allowed in places where lists are displayed and edited.

## Installation
Clone project and run deploy.sh script
```
git clone https://github.com/dzaporoz/test_12_2020.git
cd test_12_2020
./deploy.sh
