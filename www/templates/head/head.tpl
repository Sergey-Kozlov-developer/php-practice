<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="<?=HOST?>assets/css/main.css">
    <style>
        /* Общие стили для уведомлений */
        .notifications {
            margin-bottom: 1.5rem;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            animation: fadeIn 0.3s ease-out;
            border-left: 4px solid;
        }

        .notifications__title {
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
        }

        .notifications__title:before {
            content: '';
            display: inline-block;
            width: 20px;
            height: 20px;
            margin-right: 10px;
            background-size: contain;
            background-repeat: no-repeat;
        }

        .notifications__message {
            font-size: 0.9rem;
            line-height: 1.5;
            color: #4a5568;
        }

        /* Стили для ошибок */
        .notifications__title--error {
            color: #dc3545;
            border-color: #dc3545;
            background-color: #fff5f5;
        }

        .notifications__title--error:before {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23dc3545'%3E%3Cpath d='M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z'/%3E%3C/svg%3E");
        }

        /* Стили для успешных уведомлений */
        .notifications__title--success {
            color: #28a745;
            border-color: #28a745;
            background-color: #f0fff4;
        }

        .notifications__title--success:before {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%2328a745'%3E%3Cpath d='M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z'/%3E%3C/svg%3E");
        }

        /* Стили для уведомлений с дополнительным сообщением */
        .notifications__title--with-message {
            padding: 1.25rem;
        }
        .completed {
            text-decoration: line-through;
            color: #888;
        }

        .actions a {
            margin-left: 10px;
            text-decoration: none;
            color: #333;
        }

        .actions a:hover {
            color: #f00;
        }

        .container_task {

            /*width: 100%;*/
            /*max-width: 1200px;*/
            /*margin: 0 auto;*/
            padding: 10rem 0 4rem;
            /*padding-top: 180px;*/
        }

        /* Анимация появления */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Адаптивные стили */
        @media (max-width: 768px) {
            .notifications {
                padding: 0.75rem;
            }

            .notifications__title {
                font-size: 0.9rem;
            }

            .notifications__message {
                font-size: 0.85rem;
            }
        }
    </style>


    <title>Главная</title>
</head>
<body>

