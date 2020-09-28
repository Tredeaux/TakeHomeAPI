# Take Home Test 
## This is a client data collector API  
### The API is made with minimal functionality to just perform the core task, much could be improved and upgraded but the task asked for a kettie and not a photon cannon. :)  

***Server Setup:*** 
> To use this you will need to host your own server so XAMPP will be needed: https://www.apachefriends.org/index.html Once installed click on 'Explorer' and then add the code to the HTDOCS folder (Delete whatever is there currently) then launch only the Apache & MySQL server. Then you should be good to go! Do not assign a password to MySQL database for ease of this test and leave username as root.  

***First Time Setup:*** 
> It is recommended to use POSTMAN. To initiate the API run http://localhost/api/post/init.php .  Then for more help run http://localhost/api/post/help.php
> If you want to read the data from the database run http://localhost/api/post/read.php

***Use:*** 
> To add client records to the API run http://localhost/api/post/insert.php with the POST method and a JSON body structured with following parameters: idNumber, name, surname, emailAddress, contactPrimary, contactSecondary (optional), gender, organisation, dead (optional). ##

## There are quite a few areas that need improvements and upgrades:
* the Parsing of data needs to be more secure and needs to double-check the format of the data.
* For extra security tokens and authorization as well as IP whitelisting could be added.
* More detailed error messages could be added.
* Response time and recording of time is not added.
* Docker could be used for ease of use.
* In real world use the Database will have a password and many more security features that is not active in this test API.
* And a much better, stronger database structure and setup
