<!-- PROJECT LOGO -->
<br />
<p align="center">
  <a href="https://github.com/dombidav/laravel_tutorial">
   <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400">
  </a>

<h3 align="center">Laravel Crash Course Boilerplate</h3>

  <p align="center">
    Repository of the boilerplate of my Laravel Crash Course
  </p>

- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
    - [2. Clone this project](#2-clone-this-project)
    - [3. Create your local environment](#3-create-your-local-environment)
    - [4. Create your database](#4-create-your-database)
    - [5. Create your virtual host:](#5-create-your-virtual-host)
    - [6. Add your app to your DNS](#6-add-your-app-to-your-dns)
    - [7. Set up your laravel app:](#7-set-up-your-laravel-app)
    - [Done](#done)
- [License](#license)


<!-- GETTING STARTED -->
# Getting Started

To get a local copy up and running follow these simple steps:

## Prerequisites
- [(XAMPP recommended)](https://www.apachefriends.org/index.html)
- php 8.0+ with xdebug extension
- [composer](https://getcomposer.org/)
- [node.js](https://nodejs.org/en/)
- [yarn](https://yarnpkg.com/getting-started/install)
- [Visual Studio Code](https://code.visualstudio.com/)

## Installation

### 1. Install XDebug (optional)
On Windows, open a new powershell, and execute this code:
```powershell
php -i | clip ; Start-Process https://xdebug.org/wizard
```
This command already copied php info to your clipboard. Now paste it in the textbox, click "analyse" and follow the instructions.

On Linux or mac go to https://xdebug.org/ and follow the instructions there.

### 2. Clone this project
* Clone this repository to your server directory (ex: `C:/xampp/htdocs/`).
```sh
git clone https://github.com/dombidav/laravel_tutorial.git
```
* Open a powershell terminal here (On Windows: shift+right click > Open new Powershell terminal here).

### 3. Create your local environment
* In the source folder (ex. `C:/xampp/htdocs/laravel_tutorial/`) copy the `.env.example` file and rename it to `.env`
> Note: On Windows this can be problematic depending on your folder settings. To quickly rename it in Powershell you can use the command:
> ```powershell
> Copy-Item .env.example .env
> ```
* Now configure your `.env` accordingly to your project needs. Do not forget to set your Database name, username and password. 
> Important: the `APP_URL` variable MUST end with `.test`

### 4. Create your database
* Create a database with the name configured in `.env`.
> <small>With xampp: Start XAMPP and on the control panel start both Apache and MySQL</small>

### 5. Create your virtual host:
> If you're not using XAMPP consult the documentation of your server on how to create VHost.

* Open `xampp/apache/conf/extra/httpd-vhosts.conf` file and paste the following to the end of the file:
```apacheconf
<VirtualHost *:80>
    ServerName local.test
    DocumentRoot C:\xampp\htdocs
    SetEnv APPLICATION_ENV "development"
    <Directory C:\xampp\htdocs>
        DirectoryIndex index.php
        AllowOverride All
        Order allow,deny
        Allow from all
    </Directory>
</VirtualHost>

<VirtualHost *:80>
    ServerName myapp.test
    DocumentRoot C:\xampp\htdocs\afp4\src\public
    SetEnv APPLICATION_ENV "development"
    <Directory C:\xampp\htdocs\afp4\src\>
        DirectoryIndex index.php
        AllowOverride All
        Order allow,deny
        Allow from all
    </Directory>
</VirtualHost>
```

### 6. Add your app to your DNS
* Open your HOSTS file
#### Windows:
```powershell
code C:/Windows/System32/drivers/etc/hosts
```

#### Linux:
```bash
sudo code '/etc/hosts'
# or
sudo nano '/etc/hosts'
```
* At the end of the file add the following line <small>(Obviously replace 'myapp' with your app name)</small>:
```
127.0.0.1        myapp.test
```
* Save it. You will need Administrator rights to do this.
* Restart your (Apache) server now

### 7. Set up your laravel app:
* In your source folder run the following:
```powershell
composer install
php artisan migrate:fresh --seed
yarn
yarn run development
```
  
### Done
* You can access your app at the url you have set (ex. `myapp.test`)
* You can run tests with `php artisan test` or with PS-Mod: `lumen test`

# License

Distributed under the MIT License. See `LICENSE` for more information.
