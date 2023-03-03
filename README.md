
# Open-weather Api

Latest Laravel Project with Open Weather API.


## Installation

Install bellow commands.

```bash
  git clone https://github.com/hupptechnologies/open-weather-api.git
  cd open-weather-api
  cp .env.example .env
  Set OPENWEATHER_API_URL, OPENWEATHER_API_KEY and GOOGLE_MAPS_API_KEY parameters in .env file
  docker compose up -d
  docker-compose exec app composer install
  docker-compose exec app php artisan key:generate

  check Application on http://localhost
```
## Screenshots

Screenshots are added under `screenshots` folder.