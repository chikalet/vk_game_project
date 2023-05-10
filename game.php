<?php

class Game {
private $players = [];
private $startPage;
private $endPage;
private $wikiPages = [];

public function __construct($startPage, $endPage) {
$this->startPage = $startPage;
$this->endPage = $endPage;
}

public function addPlayer($name) {
$player = new Player($name);
$this->players[] = $player;
}

public function start() {
$this->getRandomWikiPages();
$this->play();
$this->showResults();
}

private function getRandomWikiPages() {
// Здесь можно реализовать логику получения случайных страниц из Википедии
// и сохранить их в $this->wikiPages
}

private function play() {
$finishedPlayers = [];

while (count($finishedPlayers) < count($this->players)) {
foreach ($this->players as $player) {
if (in_array($player, $finishedPlayers)) {
continue;
}

$currentWikiPage = $player->getCurrentWikiPage();
$availablePages = $this->getAvailablePages($currentWikiPage);

if (count($availablePages) === 0) {
$finishedPlayers[] = $player;
continue;
}

$selectedPage = $player->selectPage($availablePages);
$player->moveToPage($selectedPage);
}
}
}

private function getAvailablePages($wikiPage) {
// Здесь можно реализовать логику получения списка страниц,
// на которые можно перейти из текущей страницы $wikiPage
}

private function showResults() {
usort($this->players, function($a, $b) {
return $a->getStepsCount() - $b->getStepsCount();
});

$optimalStepsCount = $this->calculateOptimalStepsCount();
$results = [];

foreach ($this->players as $player) {
$playerSteps = $player->getStepsCount();
$closeness = $optimalStepsCount - $playerSteps;

$results[] = [
'name' => $player->getName(),
'steps' => $playerSteps,
'closeness' => $closeness
];
}

// Здесь можно вывести результаты игры
echo json_encode($results);
}

private function calculateOptimalStepsCount() {
// Здесь можно реализовать логику расчета оптимального числа переходов
}
}

