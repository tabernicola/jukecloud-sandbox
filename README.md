Jukecloud sandbox for symfony JukeCloud bundle
==============================================

Welcome to the Jukecloud sandbox - a fully-functional Symfony2
application that you can use for the installation of JukeCloud bundle

This document contains information on how to download, install, and start
using JukeCloud bundle

1) Installing JukeCloud sandbox
----------------------------------
Clone this repository  into your htdocs directory (generally /var/www/)

    git clone https://github.com/tabernicola/jukecloud-sandbox.git

If you don't have composer installed, follow the instructions on https://getcomposer.org/download/.

Run the composer install command

    composer install
    
You will be asked for the database connections details and some other parameters

Create the database structure

    php  app/console doctrine:schema:create
    

2) Browsing the Demo Application
--------------------------------
Configure Apache

Congratulations! You're now ready to use Jukecloud.


