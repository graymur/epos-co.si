<?php
if ($_SERVER['REQUEST_URI'] === '/')
{
    header('Location: /en');
    die;
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <base href="/">
    <meta charset="UTF-8">
    <title>Epos Slovenia</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" media="screen" href="/css/main.css?<?=substr(filemtime(__DIR__ . '/css/main.css'), -4)?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <base href="/">
</head>
<body ng-app="eposApp">

<div class="container-fluid">
    <h1 class="site-title">Epos</h1>
    <menu></menu>
    <div class="content" ui-view></div>
</div>

<?/*
<script src="vendor/angular/angular.min.js"></script>
<script src="vendor/angular-ui-router/release/angular-ui-router.js"></script>

<script src="app/app.module.js?<?=uniqid()?>"></script>
<script src="app/shared/filter-unsafe.js"></script>
<script src="app/shared/lang-interceptor.js"></script>
<script src="app/shared/util.js"></script>

<!--<script src="app/components/menu/MenuController.js"></script>-->
<script src="app/components/menu/MenuDirective.js"></script>
<script src="app/components/main/MainController.js"></script>

<script src="app/components/speakers/routing.js?<?=uniqid()?>"></script>
<script src="app/components/speakers/SpeakersController.js"></script>
<script src="app/components/speakers/SpeakersService.js"></script>

<script src="app/components/pages/routing.js?<?=uniqid()?>"></script>
<script src="app/components/pages/PagesController.js"></script>
<script src="app/components/pages/PagesService.js"></script>

<script src="app/app.routes.js?<?=uniqid()?>"></script>
*/?>
<script src="/js/compiled.js?<?=substr(filemtime(__DIR__ . '/js/compiled.js'), -4)?>"></script>
</body>
</html>