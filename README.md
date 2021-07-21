# laravel-billingo-v3

## Usage

```php
<?php
    use Alphaws\BillingoApiV3\BillingoApi;

    $billingoApi = new BillingoApi('xxxxx-xxx...');
    $partners = $billingoApi->getPartners(1);
    dump($partners);
```
Result:
```php
array:7 [▼
  "total" => 245
  "per_page" => 25
  "current_page" => 1
  "last_page" => 10
  "prev_page_url" => null
  "next_page_url" => "https://api.billingo.hu/v3/partners?per_page=25&page=2"
  "data" => array:25 [▶]
]
```
