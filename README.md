# bCMS

Сайт "Новоозерновская основная общеобразовательная школа"  \
bCMS 4 - Простая, адаптированная под нужды образовательных учреждений: школ, лицеев и детских садов.

Разработана для лёгкого ведения новостей, публикаций, обратной связи и модульного расширения — без сложных настроек.
---

## Установка и запуск

Для разворачивания проекта выполните скрипт:

```bash
./setup.sh

```

---

## Доступ в админ-панель

По умолчанию логин и пароль для входа в админку:

- Логин: `bcms`
- Пароль: `secret`

Админка доступна по адресу:  
[https://localhost/bcms/index.php](https://localhost/bcms/index.php)  
(или соответствующий путь вашего сервера)

---

## Особенности

    ✅ Совместима с PHP 8.x
    🎨 Современный адаптивный интерфейс на Bootstrap 5
    ✍️ Редактор контента TinyMCE 7.9.1
    🧠 Встроенный статический анализ кода через PHPStan
    🚀 Быстрый сервер Caddy + FrankenPHP (в Docker)
    🔢 Простая математическая капча без Google
    ⚙️ Архитектура с автозагрузкой через Composer
    📁 Поддержка модулей: новости, гостевая книга, обратная связь
    🛠 Установка через веб-интерфейс за 1 минуту

---

## Структура проекта

- `bcms/` — основной код CMS
- `bcms/templates/` — шаблоны и стили
- `public/` — публичная директория с точкой входа и публичными ресурсами
- `vendor/` — зависимости Composer
- `setup.sh` — скрипт для разворачивания и настройки проекта

---

## Лицензия

```text
MIT License

Copyright (c) 2025 Ivan Bazhenov

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:
```