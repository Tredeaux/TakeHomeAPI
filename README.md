# Take Home Test 
## This is a client data collector API  
### The API is made with minimal functionality to just perform the core task, much could be improved and upgraded but the task asked for a kettie and not a photon cannon. :)  

***Server Setup:*** > To use this you will need to host your own server so XAMPP will be needed: https://www.apachefriends.org/index.html Once installed click on 'Explorer' and then add the code to the HTDOCS folder (Delete whatever is there currently) then launch only the Apache & MySQL server. Then you should be good to go! Do not assign a password to MySQL database for ease of this test and leave username as root.  

***First Time Setup:*** > If you ever need more info or any help go to localhost/help.php for more info, this is recommended for clients to view. If you are running to API for the first time then run localhost/init.php to Setup the database. For ease of testing the Database is using root user with no password, this is unsecure but for testing purposes it's the easiest to set up for a quick view.  

***Use:*** > To add Client Data use localhost/addClient.php? followed by the parameters Some parameteres are required and the info will be provided on /addClient.php on what is missing.  

***For example:*** > http://localhost/addClient.php?id=1&idnumber=8403215800085&name=Johannes%20Petrus&surname=Kerkorrel&telephonenumber1=0823011111&emailaddress=bierder@gmail.com&male=Yes&language=Afrikaans&dead=2020/01/01%200:01:55  

***Required fields:*** > id, name, surname, idNumber, telephoneNumber1, language, male, emailAddress.  The fields will be converted to proper formats and checked, if the data is valid it will be added to the Database. To view the database click here or click on XAMPP Support:  For support or bug reports contact tredeaux.pitout@gmail.com
