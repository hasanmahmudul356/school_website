#Dynamc School Website

##This Package Will Create Automatic Website For School Managment Software

# Composer Installation
### composer require tmss/school_website

## Integration in Laravel
Tmss\School_website  has optional support for Laravel and comes with a Service Providers for easy integration. The vendor/autoload.php is included by Laravel, so you don't have to require or autoload manually. Just see the instructions below.

In the $providers array add the service providers for this package.

### Tmss\School_website\SchoolWebsiteServiceProvider::class,

## Publish your Vendor

```bash
#### php artisan vendor:publish
```

## Run Seeder For Web site Configuration

#### php artisan db:seed --class=Tmss\School_website\Database\Seeds\WebsiteConfigSeeder


