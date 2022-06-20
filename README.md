# Goblin-Shop
Our PrestaShop installation guide: 

 

1. Download the xampp package that we've delivered. Then extract it to a new folder using 7ZIP or Winrar. 

2. Create a username "Joku vaan" to your Windows machine. 

3. To the username "Joku vaan", create a folder "PrestaShopAndWoo". Your Windows file path should now look like this: 

C:\Users\Joku vaan\PrestaShopAndWoo 

4. Copy or cut the xammp package that you extracted earlier to the PrestaShopAndWoo folder. Your file path should now look like this:  

C:\Users\Joku vaan\PrestaShopAndWoo\xampp 

5. Next step is to configure the settings for xammp webserver. This step might not be necessary if you don't have any servers running on the ports that we've used as default ones. If you know you don't have anything running, you can skip to the next step.  

For those who have something running on port number 8080, go to the xammp folder and click on "xammp-control". Then click on "config" from the Apache module. You need to change the end of “listen” to a different port number than 8080:  

 

Remember: The port number can’t be lower than 1024. 

Do the same thing for the next file. Change the 8443 number to a different one (but over 1024): 

 

 

6. To complete the installation, you can press "setup_xampp" in the xammp folder to make sure everything works fine. But this step is most likely not necessary. 

 

 

General PrestaShop installation guide: 

Prestashop is an online store solution based on a system called PHP. PHP is a popular general purpose programming language that powers website and blogs. PHP runs inside a web server called apache, this combination of PHP and apache is going to be our web server. Prestashop also requires a database to store all its info, and mysql will be use here.  

Requirements 

System: Unix, Linux or Windows. 

Web server: Apache Web Server 2.2 or any later version. 

PHP: We recommend PHP 7.1 or later.  

MySQL: 5.6 minimum, a recent version is recommended. 

Server RAM: We recommend setting the memory allocation per script (memory_limit) to a minimum of 256M. 

Prestashop can be downloaded from www.prestasshop.com/en/download. Prestashop version 1.7.6.7 and above is recommended because its compatible with Apache xampp and PHP 7.1 or 7.2. PrestaShop can be downloaded as a zip file and it’s not necessary to give your email to the site. 

Apache xampp can be downloaded from www.apachefriends.org/download.html. Its not downloaded as an installer. From more downloads, you can download the windows version of xampp(7.4.9.0) as a zip file. 

After the zip files have been downloaded, the folders are extracted completely without interruption to prevent errors or problems during installation.  

A suitable folder location can be chosen under the C-drive and name as PrestaShop such that it will carry all info related to the web shop.  

The extracted Xampp folder is then cut and place under this location.  

The original htdocs folder located within the Xampp folder is deleted and a new empty one created.  

The extracted PrestaShop folder is then pasted in the new htdocs folder from which the webshop contents and pages are visible. 

The setup.xampp.bat file located within the Xampp folder is run, this enables it to bind the PrestaShop folder with the Xampp folder. Afterwards, we start the graphical control for xampp and configure the setups.  

First, we configure Apache to listen to our own laptop and a free port above 1024. EG (127.0.0.1:8080) 

Next, we configure the httpd.ssl.conf folder to listen to our computer address and an alternative port above 1024 but different from the previous.  

Otherwise, if we want to make our web shop visible on the internet by everyone, then we need to configure a firewall. 

Next, we configure the php.ini folder which actually generates the web pages of the web shop. First, we set the max_execution time to 1200, this gives the laptop more time to load the web pages for slow connections.  

Next, we set the upload_max_filesize size to 80M this increases the capacity of images and videos that can go through the site, also we increase the  post_max to 80M this increases the amount of data storage space for files. Next, we enable and increase the realpath_cache_size to 5M, the default value required by PrestaShop. Next, we enable the essential libraries required by PrestaShop such as extension=intl and others as need may be. 

Next, we configure MySQL database by binding the local host to be visible only to our own computer.  

After configuring, we now start MySQL followed by Apache. we go to our browser and enter the local host address and port we configured earlier (127.0.0.1:8080).  

PrestaShop starts installing, and next we set to create a database for our web shop by navigating to the following address 127.0.0.1:8080/phpMyAdmin/. Here we follow the steps and process to create a new database for our shop with all privileges. 

Next, we go back to our PrestaShop window and complete the setup installation process about our shop and connect it to the created database. Follow the steps till prompt to login to the admin dashboard. This completes the installation process.  
