<?php

/**
 * Это эмуляция сервера для заметок
 * Возвращает список заметок
 */

$notes = array(
    array(
        'id' => 1,
        'title' => 'Что такое Lorem Ipsum?',
        'text' => 'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.',
        'datetime' => mktime(12, 00, 00, 01, 01, 2001),
    ),
    array(
        'id' => 2,
        'title' => 'Почему он используется?',
        'text' => 'Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).',
        'datetime' => mktime(12, 00, 00, 01, 02, 2001),
    ),
    array(
        'id' => 3,
        'title' => 'Откуда он появился?',
        'text' => 'Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов, но это не совсем так. Его корни уходят в один фрагмент классической латыни 45 года н.э., то есть более двух тысячелетий назад. Ричард МакКлинток, профессор латыни из колледжа Hampden-Sydney, штат Вирджиния, взял одно из самых странных слов в Lorem Ipsum, "consectetur", и занялся его поисками в классической латинской литературе. В результате он нашёл неоспоримый первоисточник Lorem Ipsum в разделах 1.10.32 и 1.10.33 книги "de Finibus Bonorum et Malorum" ("О пределах добра и зла"), написанной Цицероном в 45 году н.э. Этот трактат по теории этики был очень популярен в эпоху Возрождения. Первая строка Lorem Ipsum, "Lorem ipsum dolor sit amet..", происходит от одной из строк в разделе 1.10.32
            Классический текст Lorem Ipsum, используемый с XVI века, приведён ниже. Также даны разделы 1.10.32 и 1.10.33 "de Finibus Bonorum et Malorum" Цицерона и их английский перевод, сделанный H. Rackham, 1914 год.',
        'datetime' => mktime(12, 00, 00, 01, 03, 2001),
    ),
    array(
        'id' => 4,
        'title' => 'Где его взять?',
        'text' => 'Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь. Если вам нужен Lorem Ipsum для серьёзного проекта, вы наверняка не хотите какой-нибудь шутки, скрытой в середине абзаца. Также все другие известные генераторы Lorem Ipsum используют один и тот же текст, который они просто повторяют, пока не достигнут нужный объём. Это делает предлагаемый здесь генератор единственным настоящим Lorem Ipsum генератором. Он использует словарь из более чем 200 латинских слов, а также набор моделей предложений. В результате сгенерированный Lorem Ipsum выглядит правдоподобно, не имеет повторяющихся абзацей или "невозможных" слов.',
        'datetime' => mktime(12, 00, 00, 01, 04, 2001),
    ),
);


// Данные у нас будут в формате JSON, так что сразу укажем заголовок для браузера
header('Content-type: application/json');


// Простенький REST
switch ($_SERVER['REQUEST_METHOD']) {
    // Получение данных
    case 'GET':

        if (isset($_GET['id'])) {
            // Возвращает конкретную заметку
            $return = reset(array_filter($notes, function($note){
                return $note['id'] == $_GET['id'];
            }));

            // Если нет такой заметки, возвращается ошибка Not Found
            if (empty($return)) {
                header('HTTP/1.1 404 Not Found');
                exit();
            }
        } else {
            // Возвращает все заметки
            $return = $notes;
        }

        // Выводит данные в JSON
        echo json_encode($return);
        break;

    // Сохранение данных
    // Пока не делаем
    //case 'POST':

    // Удаление данных
    // Пока не делаем
    //case 'DELETE':

    default :
        // Возвращает ошибку Method Not Allowed
        header('HTTP/1.1 405 Method Not Allowed');
        exit();

}