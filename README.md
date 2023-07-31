# Backpack-articles

[![Build Status](https://travis-ci.org/parabellumKoval/backpack-vercel.svg?branch=master)](https://travis-ci.org/parabellumKoval/backpack-vercel)
[![Coverage Status](https://coveralls.io/repos/github/parabellumKoval/backpack-vercel/badge.svg?branch=master)](https://coveralls.io/github/parabellumKoval/backpack-vercel?branch=master)

[![Packagist](https://img.shields.io/packagist/v/parabellumKoval/backpack-vercel.svg)](https://packagist.org/packages/parabellumKoval/backpack-vercel)
[![Packagist](https://poser.pugx.org/parabellumKoval/backpack-vercel/d/total.svg)](https://packagist.org/packages/parabellumKoval/backpack-vercel)
[![Packagist](https://img.shields.io/packagist/l/parabellumKoval/backpack-vercel.svg)](https://packagist.org/packages/parabellumKoval/backpack-vercel)

This package provides a quick starter kit for implementing pages for Laravel Backpack. Provides a database, CRUD interface, API routes and more.

## Installation

Install via composer
```bash
composer require parabellumKoval/backpack-vercel
```

Migrate
```bash
php artisan migrate
```

### Publish

#### Configuration File
```bash
php artisan vendor:publish --provider="Backpack\Vercel\ServiceProvider" --tag="config"
```

#### Translation Files
```bash
php artisan vendor:publish --provider="Backpack\Vercel\ServiceProvider" --tag="trans"
```

#### Views File
```bash
php artisan vendor:publish --provider="Backpack\Vercel\ServiceProvider" --tag="views"
```

#### Routes File
```bash
php artisan vendor:publish --provider="Backpack\Vercel\ServiceProvider" --tag="routes"
```

#### Page templates Files
```bash
php artisan vendor:publish --provider="Backpack\Vercel\ServiceProvider" --tag="temps"
```

#### Stub File
```bash
php artisan vendor:publish --provider="Backpack\Vercel\ServiceProvider" --tag="stub"
```

## Usage

## Security

If you discover any security related issues, please email 
instead of using the issue tracker.

## Credits

- [parabellumKoval](https://github.com/parabellumKoval/backpack-vercel)
- [All contributors](https://github.com/parabellumKoval/backpack-vercel/graphs/contributors)
