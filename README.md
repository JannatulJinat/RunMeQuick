# RunMeQuick

## About RunMeQuick
A cloud hosted code runner for better ease and faster velocity during prototyping. The product will allow users to enter a piece of code, allow them to choose a runtime(at least 4), and show the execution results.

## Tech used
Laravel, Blade, Tailwind CSS, Ubuntu

## How to run
1. Install Dependencies: `composer install`<br>
2. Configure Environment: Change the file name `.env.example` to `.env` <br>
3. Generate Application Key: `php artisan key:generate` <br>
4. Configure Database: Update the following database configurations in the `.env` file <br>
`DB_DATABASE=your_database_name` <br>
`DB_PASSWORD=your_database_password`
5. Set Python and Go Paths: Update the following paths in the `.env` file according to your system. In my system:<br>
`PYTHON_PATH=/usr/bin/python3` <br>
`GO_PATH=/usr/bin/go` <br>
`GOCACHE_PATH=/home/jinat/.cache/go-build` <br>
6. Run Database Migration: `php artisan migrate` <br>
7. Start Development Server: `php artisan serve`

## Caution
Some security concerns may exist. All that's happening here is the execution of whatever the browser sends.
So, unless you take the appropriate security precautions, DO NOT RUN THIS ON YOUR PRODUCTION SERVER!

## Contributing
Your feedback is highly appreciated!

## Preview
[RunMeQuick.webm](https://github.com/JannatulJinat/RunMeQuick/assets/26893357/61088574-dafa-4f6b-8f51-542f4b3f723e)
