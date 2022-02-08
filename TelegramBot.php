<?php
//Telegram token
define('tokenTelegram', 'YOUR_TOKEN_TELEGRAM');
//Openweathermap token
define('tokenWeather', 'YOUR_TOKEN_OPENWEATHERMAP');

//Получаем и записываем в переменную полученное сообщение
$data = json_decode(file_get_contents('php://input'));

//Получаем нужные значения из $data и записываем в переменные
$chat_id = $data->message->chat->id;
$text = $data->message->text;

//Назначаем комманды
switch ($text) {
    case '/start':
        message_to_telegram(tokenTelegram, $chat_id, 'Текст для команды /start');
        break;
    case '/help':
        message_to_telegram(tokenTelegram, $chat_id, 'Текст для команды /help');
        break;
}

//Проверяем отправлена ли локация
if (isset($data->message->location)) { //Если да, получаем погоду
    //Определяем параметры для отправки запроса
    $params = [
        'lat' => $data->message->location->latitude,
        'lon' => $data->message->location->longitude,
        'appid' => tokenWeather,
        'units' => 'metric',
        'lang' => 'ru'
    ];

    //Создаем url для запроса
    $urlWeather = 'https://api.openweathermap.org/data/2.5/weather?' . http_build_query($params);

    //Инициализация запроса
    $crequest = curl_init();

    //Параметры запроса
    curl_setopt($crequest, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($crequest, CURLOPT_URL, $urlWeather);

    //Выполняем запрос и получаем ответ от сервиса погоды и записываем в переменную
    $responseWeather = curl_exec($crequest);

    //Закрываем запрос
    curl_close($crequest);

    //Записываем данные в файл для просмотра полученных данных 
    file_put_contents('responseWeather.txt', $responseWeather);

    //Принимаем закодированную в JSON строку и преобразуем её в переменную PHP
    $dataWeather = json_decode($responseWeather);

    //Формируем ответ на сообщение в Телеграм
    $textToSend = 'Здесь выводим все нужные данные из $dataWeather для отправки пользователю бота';

    //Отправляем ответ
    message_to_telegram(tokenTelegram, $chat_id, $textToSend);
} elseif (mb_substr($text, 0, 1) !== '/') { //Если нет, просим отправить локацию
    message_to_telegram(tokenTelegram, $chat_id, 'Здесь ответ на любое сообщение, кроме установленных комманд');
}

//Функция отправки сообщений в Телеграм
function message_to_telegram($bot_token, $chat_id, $text, $reply_markup = '')
{
    $ch = curl_init();
    $ch_post = [
        CURLOPT_URL => 'https://api.telegram.org/bot' . $bot_token . '/sendMessage',
        CURLOPT_POST => TRUE,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_POSTFIELDS => [
            'chat_id' => $chat_id,
            'parse_mode' => 'HTML',
            'text' => $text,
            'reply_markup' => $reply_markup,
        ]
    ];

    curl_setopt_array($ch, $ch_post);
    $responseTelegram = curl_exec($ch);
    curl_close($ch);
    return $responseTelegram;
}
