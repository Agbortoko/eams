# Eschosys Internship Attendance Managment System

This is a system used for the management of the attendance of internship students on a daily basis at Eschosys.

The System is designed to streamline the process of tracking and managing the attendance of students participating in internships at Eschosys. This system can be customized to cater specifically to the structure of the internship, where students are grouped into batches, to simplify and facilitate the internship program.

The Eschosys Internship Attendance Management System is built with PHP as it's core language. PHP is a popular server language and is used world wide. It is well known to facilitate communciation with databases.

## Setup Process

After cloning this repository, you need to install the composer packages and the node packages. Run the following commands below in the terminal.

    composer install
    npm install

When the first command completes, execute the other next.

Before running the commands above, make sure you have composer and node installed on your computer

[Click to Download and Install Composer](https://getcomposer.org/Composer-Setup.exe)

[Click to Download and Install Node](https://nodejs.org/dist/v20.16.0/node-v20.16.0-x64.msi)

## Problem Statement

The manual tracking of student attendance during internship programs, particularly when students are organized into multiple batches, has proven to be inefficient, error-prone, and time-consuming. This traditional approach often results in unexpected errors in attendance records, delays in reporting, and challenges in ensuring compliance with internship requirements. The Attendance Management System has become critical to improve accuracy, efficiency, and real-time monitoring of student participation.

## Proposed Solution

To address the inefficiencies and inaccuracies associated with manual attendance tracking during internships, an automated Attendance Management System will be developed. This system will streamline the process of recording, monitoring, and managing student attendance, particularly when students are organized into batches.

## ScreenShot

![HomePage](/resources/images/sc.png "Homepage Screenshot")

### Project Assets and Description

#### Composer

Composer is a dependency management tool for PHP, used to manage libraries and packages that your PHP project depends on. Composer autoload feature can automatically load classes and other files in your PHP code.

    Basic Commands:
    composer init: Initializes a new composer.json file in your project.
    composer require vendor/package: Adds a package to your project and installs it.
    composer install: Installs all the dependencies listed in the composer.json file.
    composer update: Updates the dependencies to their latest versions as specified in composer.json.

Composer is used to autoload classes by requiring the "vendor/autoload.php" file.

    require __DIR__ ."/../vendor/autoload.php";

The example code above can be seen in the "config/mail.php" file
