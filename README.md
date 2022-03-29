# Parrosales project

This small project deploys a crud architecture for customer, orders and products 
management

To install:

1. Make sure ports 85 and 3306 are available in your system and not running any service on them
2. Clone or download the repository
3. Run the following commands in your command line

```
cd <path to parrosales> 
docker-compose up -d
docker-compose exec uamoreno php artisan migrate
```


