# BuddyDesktop Canary

## Warning: This software is extremly experimental and unstable.
### USE AT YOUR OWN RISK. NO WARRANTY. REVIEW LICENSE.

## About

@todo Add a description of the application.

## Installation

### Build from source (Windows)

1. Clone the repository
   1. As the repository contains files we need, you first need to clone the repository
		- For this document, we will refer to the extracted location as `repository/`

2. Install the PHP Desktop application
	1. Download the latest PHP Desktop release
        - Link: https://github.com/cztomczak/phpdesktop/releases/download/chrome-v57.0-rc/phpdesktop-chrome-57.0-rc-php-7.1.3.zip
	2. Unzip the archive contents to `build/`
	3. If you want you can open the `build/phpdesktop-chrome.exe` to verify the installation

3. Update the PHP version
	4. Delete the `build/php` directory
    1. Download PHP 8.1 
   		- You want the NTS x86 version
        - Link: https://windows.php.net/downloads/releases/php-8.1.6-nts-Win32-vs16-x86.zip
	5. Extract the PHP binaries to `build/php/`
	6. If you want you can reopen the `build/phpdesktop-chrome.exe` to verify that the PHP version has been updated and works

4. Replace the Buddy executable files
    1. Remove the following files in the `build/` directory:
        1. `phpdesktop-chrome.exe`
        2. `settings.json`
        3. `php/php.ini`
    2. Copy the Buddy files found in the `desktop` directory (the one in the repository). These files are:
        1. `desktop/buddy.ico` -> `build/buddy.ico`
        2. `desktop/HydeBuddy Canary.exe` -> `build/HydeBuddy Canary.exe` 
        3. `desktop/settings.json` -> `build/settings.json`
        4. `desktop/php/php.ini` -> `build/php/php.ini`
    3. If you want you can open the `build/HydeBuddy Canary.exe` to verify the installation
		- Note that you will get an error 404, this is expected as the settings.json points to a file that we haven't installed yet.

5. Install the Buddy Laravel application
	1. Delete the contents of the `build/www` directory
	2. Copy the contents of the `repository/application` directory to `build/www`
	3. Open a terminal and navigate into the `build/www` directory
	4. Run `composer install` to install the Laravel dependencies
	5. Next, we need to generate the application key.
      	1. Run `cp .env.example .env`
		2. Run `php artisan key:generate`

6. You're done!
	- You can now open the `build/HydeBuddy Canary.exe` to start the application.



