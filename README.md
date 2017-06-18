## Requirements

PHP 5.4 and later.

## Composer

You can install the library via [Composer](http://getcomposer.org/). Add this to your `composer.json`:
```json
{
  "require": {
    "jgodish/mblox-mms-xml-client": "1.*"
  }
}
```

Then install via:

    composer install

To use the library, use Composer's [autoload](https://getcomposer.org/doc/00-intro.md#autoloading):
```php
require_once('vendor/autoload.php');
```

## Getting Started

Usage example:
```php
$mblox = \Mblox\Mms\Xml\Client('your_api_key', 'short_code');
$slide = (new \Mblox\Mms\Xml\Slide)->setImage('http://www.yoursite.com/images/1.jpg')->setText('This is some text for your slide');
$response = $mblox->mms()->send('mytestmms', '15555555555', [$slide], 'This is some fallback text');
```
## Handling API Response's
```php
$mblox = \Mblox\Mms\Xml\Client('your_api_key', 'short_code');
$slide = (new \Mblox\Mms\Xml\Slide)->setImage('http://www.yoursite.com/images/1.jpg')->setText('This is some text for your slide');

$response = $mblox->mms()->send('mytestmms', '15555555555', [$slide], 'This is some fallback text');

// Check for successful response
$response->isSuccessful();

// Convert response to an array
$response->toArray();

// Get string representation of the response
$response->toString();
```

## Available Methods
### Save MMS
```php
$mblox = \Mblox\Mms\Xml\Client('your_api_key', 'short_code');
$slide = (new \Mblox\Mms\Xml\Slide)->setImage('http://www.yoursite.com/images/1.jpg')->setText('This is some text for your slide');
$mblox->mms()->save('mytestmms', 'Message Subject', [$slide]);
```
### Send Saved MMS
```php
$mblox = \Mblox\Mms\Xml\Client('your_api_key', 'short_code');
$ddm = new \Mblox\Mms\Xml\DeviceDiscovery('This message is free of charge and will allow us to deliver your content nice and smooth');
$mblox->mms()->sendSaved('mms_id', '15555555555', 'This is some fallback text', $ddm);
```
### Send MMS
```php
$mblox = \Mblox\Mms\Xml\Client('your_api_key', 'short_code');
$slide = (new \Mblox\Mms\Xml\Slide)->setImage('http://www.yoursite.com/images/1.jpg')->setText('This is some text for your slide');
$mblox->mms()->send('mytestmms', '15555555555', [$slide], 'This is some fallback text');
```
### Delete MMS
```php
$mblox = \Mblox\Mms\Xml\Client('your_api_key', 'short_code');
$mblox->mms()->delete('mms_id');
```
### Get MMS Templates
```php
$mblox = \Mblox\Mms\Xml\Client('your_api_key', 'short_code');
$mblox->mms()->getTemplates();
```

### Slides
The following methods can be used when creating slides

* setMessageText($text)
* setDuration($duration)
* setImage($url)
* setAudio($url)
* setVideo($url)
* setVcard($url)
* setIcal($url)
* setPdf($url)
* setPassbook($url)
* toArray()
