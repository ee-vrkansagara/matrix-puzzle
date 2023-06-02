# Puzzle 

A small command-line utility to solve path finding problem for the given input string.

For more information, check ```requirement/info.txt```

## Prerequisites

- PHP >= 8.2
- Composer

## How to install

- Do the git clone of the project

```
git clone https://github.com/ee-vrkansagara/matrix-puzzle.git
```


- Navigate inside project directory

```
cd internal-mediaartist-test-vallabh
```

- Install composer dependencies

```
composer install
```

## How to run application

- Run below command from the project root directory

```
php public/index.php "RDDD?RRR?"
```

## How to execute tests

- Run the below command from the project root directory

```
./vendor/bin/phpunit
```

## About code insight

- Matrix class 
  - `$doNotOverrideCell = true`
    - `$doNotOverrideCell` expect boolean value which check if cell is allowed to override or not.

`$doNotOverrideCell` is already adjusted to fulfil project requirement

- Composer has few script which help into development of code
  - `php composer.phar run permission` This will set proper permission for vendor directory
  - `php composer.phar run cs-check` This script will check coding standard for the `phpcs.xml` file 
  - `php composer.phar run cs-fix` This script will auto fix coding standard problem found using `cs-check` composer script 
  - `php composer.phar run check` This script will check two script `cs-check` and `test` 
  - `php composer.phar run test` This script will run phpunit run  test case in interactive mode 

- While you execute this script using `php public/index.php`, You will get one additional message which show that how much time taken in milliseconds by this script to execute whole logic. 

## Linux's user can run all in one script

- The given command `bash init.sh` will foloowing things, So kindy read once before execute.
  - This script will look for the `composer.phar` in current directory if not available then it will download
  - Next it will do `composer update` and `composer dumpautoload` to re-generate class file
  - Next it will set `vendor` folder permission 
  - Next it will run composer script `test` which execute phpunit test case(s)
  - Next it will clear the command line output if any and run one demo code using `php public/index.php `
  
```
chmod +x init.sh
bash init.sh
```
