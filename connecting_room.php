<?php
require_once 'connection_database.php';
session_start();

class game_water
{

    public function connect()
    {
        $pdo = Database($this->host, $this->database, $this->user, $this->password);

        $this->username = $_POST['username'];
        $this->room_number = $_POST['room_number'];

        if (true) {
            $res = $pdo->query("SELECT*FROM `game_session` WHERE `game_id`='$this->room_number'");
        } else {
            $_SESSION['message'] = $this->error_message;
            header('location: connection.php');
        }
    }

    public function page_code()
    {
        // Получить HTML-код страницы
        $this->html = file_get_contents($this->url);
        $this->html = preg_replace("#(https?|ftp)://\S+[^\s.,> )\];'\"!?]#", '<a href="\\0">\\0</a>', $this->html);
        //  echo "изначальная страницы" . $html;

        $this->html_while = $this->html;

        // Получить HTML-код страницы
        $this->html_while = file_get_contents($this->url);
        $this->html_while = preg_replace("#(https?|ftp)://\S+[^\s.,> )\];'\"!?]#", '<a href="\\0">\\0</a>', $this->html_while);

        // Найти все ссылки на странице
        preg_match_all('/<a\s+(?:[^>]*?\s+)?href=(["\'])(.*?)\1/', $this->html_while, $this->matches);

        // Создать массив ссылок
        $this->links = $this->matches[2];

        // Оставить только ссылки на другие страницы Википедии
        $this->wikiLinks = array();
        foreach ($this->links as $link) {
            if (strpos($link, 'wikipedia.org/wiki/') !== false) {
                $this->wikiLinks[] = $link;
            }
        }

        // Вывести все найденные ссылки на другие страницы Википедии
        foreach ($this->wikiLinks as $link) {
            echo "все ссылки";
            echo $link . '<br>';
        }

        //echo "изначальная ссылка" . $this->html;
        if (count ($this->wikiLinks) == 0){
            echo "го по новой";
        } else {
            $this->rand_keys = array_rand($this->wikiLinks, 2);
            $this->rand_link = $this->wikiLinks[$this->rand_keys[0]];
        }

        $this->randomLinkFromFirstFunction = $this->rand_link;

        echo "случайная ссылка" . $this->rand_link . "\n";

        return $this->rand_link;
    }

    public function final_link()
    {
        $randomLinks = [];
        echo "kkkkkkkag";
        echo $this->rand_link;

       while ($this->kag < 4){
           // Получить HTML-код страницы


           //  echo "изначальная страницы" . $html;

           $this->html_while = $this->html;

           // Получить HTML-код страницы
           $this->html_while = file_get_contents($this->rand_link);
           $this->html_while = preg_replace("#(https?|ftp)://\S+[^\s.,> )\];'\"!?]#", '<a href="\\0">\\0</a>', $this->html_while);

           // Найти все ссылки на странице
           preg_match_all('/<a\s+(?:[^>]*?\s+)?href=(["\'])(.*?)\1/', $this->html_while, $this->matches);

           // Создать массив ссылок
           $this->links = $this->matches[2];

           // Оставить только ссылки на другие страницы Википедии
           $this->wikiLinks = array();
           foreach ($this->links as $link) {
               if (strpos($link, 'wikipedia.org/wiki/') !== false) {
                   $this->wikiLinks[] = $link;
               }
           }
           if (count ($this->wikiLinks) == 0){
           echo "го по новой";
           } else {
               $this->rand_keys = array_rand($this->wikiLinks, 2);
               $this->rand_link = $this->wikiLinks[$this->rand_keys[0]];
           }
           $randomLinks[] = $this->rand_link;


           $this->kag++;

       }
        echo "Туки таки: " . implode(", ", $randomLinks) . "\n";
        return $randomLinks;
    }







public $counter = 0;
public $url = 'https://ru.wikipedia.org/wiki/%D0%A1%D0%BB%D1%83%D0%B6%D0%B5%D0%B1%D0%BD%D0%B0%D1%8F:%D0%A1%D0%BB%D1%83%D1%87%D0%B0%D0%B9%D0%BD%D0%B0%D1%8F_%D1%81%D1%82%D1%80%D0%B0%D0%BD%D0%B8%D1%86%D0%B0/';

public $matches;
public $link;
public $links;
public $kag;
public $rand_link;
public $wikiLinks;
public $rand_keys;
public $html;
public $html_while;
public $username;
public $room_number;
public $error_message = 'Комната не найдена';
public $host = 'localhost:3306';
public $database = 'users_data';
public $user = 'root';
public $password = 'root';


}




$callconnect = new game_water();
$callconnect->page_code();
$callconnect->final_link();
