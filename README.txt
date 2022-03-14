This is the source code for our final year project, 
we would update this website so this is not the latest version. 
Please visit this link for (https://www.cwtxyz.tk/) our website, 
if you wish to set up in your localhost please follow the following steps.
1. You need to have an administration tools for database,
   for example if you are use Xampp move the entire folder to xampp -> htdocs (the place that your Xampp install, normally at local disk C)
2. After that, locate the connection.php & config.php files inside the FYP folder,
   then open these files change the username, password (by default the username is root and no password for local host) and database name. 
   exp:(localhost", "root", "", "database name")
3. Make sure inside the sources code of the function document.location that the php file must write the php extension at the back. 
  (we don't write the extension as we had rewrite the url in the htaccess file at hosting server in Internet, but in this case you are set up in localhost)
4. Locate the sql files folder inside the FYP folder, import these files to your database.
5. You are done, go to browser then type localhost click the FYP folder to view our website.