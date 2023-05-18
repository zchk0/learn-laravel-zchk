# ВсеКолёса.ру Admin

## Установка

1. Загрузить backend-зависимости, чтобы был Laravel и Sail, входящий в него

```bash
composer install
```

2. Установить [Sail](https://laravel.com/docs/10.x/sail)

```bash
echo "alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'" >>~/.bash_profile
source ~/.bash_profile
```

3. Создать первоначальный файл конфигурации среды

```bash
cp .env.example .env
```

4. Запустить backend в docker в первый раз

```bash
sail up -d
```

5. Сгенерировать стартовые данные для Базы Данных

```bash
sail artisan migrate:fresh --seed
```

Добавился пользователь: **admin@vsekolesa.ru** / **admin** , залогиниться можно будет после завершения установки.

6. Загрузить frontend-зависимости

```bash
sail npm install
```

7. Запустить frontend в первый раз

```bash
sail npm run dev
```

8. Открыть в браузере http://0.0.0.0/

### Supervisor

TODO Понять: нужно ли

```bash
# Открываем консоль из под рута в контейнере
docker-compose exec cms bash

# Обновляем supervisor
supervisorctl reread

# Проверяем запущенные процессы
supervisorctl status

# Перезагружаем все процессы
supervisorctl restart all

# Перезагружаем конкретный процесс
supervisorctl restart rpc-worker1

# Так же работает запуск и остановка
supervisorctl start all
supervisorctl stop all
```

## Запуск

```bash
# Back
sail up -d

# Первоначальная миграция
sail artisan migrate

# Front (vite compiler)
sail npm run dev
```

Открыть в браузере: http://0.0.0.0/

## Завершение работы

```bash
# Прервать процесc npm run dev
Ctrl+C 

# Завершить docker
sail down
```

## Контроль качества кода

PHP_CodeSniffer:

`./vendor/bin/phpcs `- анализ кода

`./vendor/bin/phpcbf` - исправление

PHPStan:

`./vendor/bin/phpstan analyse`

ESLint:

`yarn lint:js` - анализ кода

`yarn lint:fix` - исправление

Deptrac:

`vendor/bin/deptrac analyse --config-file=depfile-layers.yaml` - проверка зависимостей между слоями

`vendor/bin/deptrac analyse --config-file=depfile-modules.yaml` - проверка зависимостей между модулями
