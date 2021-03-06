# Scheduler Module

## Installation

`composer require boehsermoe/luya-module-scheduler:"~1.0.0"`

In order to add the modules to your project go into the modules section of your config:

```php
return [
    'modules' => [
        // ...
        'scheduler' => [
            'class' => 'luya\scheduler\Module',
        ],
        // ...
    ],
];
```
```shell
docker-compose exec luya_php luya migrate
docker-compose exec luya_php luya import
```

![screen](scheduler-screen.png)

## Start jobs

Start all expired jobs manual:
```shell
./luya scheduler/run
```

Execute one job:
```shell
./luya scheduler/run/now
```

## Cron

Start all expired jobs every minute via cron:
```shell
* * * * * ./luya scheduler/run
```


## Custom Jobs

Create a class in the path "{appBasePath}/schedulers" or "{moduleBasePath}/schedulers"

Example:
```php
class FileJob extends BaseJob
{
	public $path;

	public function rules()
	{
		return array_merge(parent::rules(), [
			[['path'], 'required']
		]);
	}


	public function extraFields()
	{
		return [
			'path'
		];
	}

	public function ngrestExtraAttributeTypes()
	{
		return [
			'path' => 'text',
		];
	}

	public function run()
	{
		// Do your job
	}
}
```
