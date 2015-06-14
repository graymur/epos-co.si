<!DOCTYPE html>
<html>
<head lang="en">
    <base href="/">
    <meta charset="UTF-8">
    <title>Epos Slovenia</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" media="screen" href="/css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>
<body ng-app="eposApp">

<div class="container-fluid">

    <h1 class="site-title">Epos d.o.o.</h1>

    <nav class="main-menu" ng-controller="MenuController" >
        <a href="{{item.url}}" class="main-menu-item" ng-repeat="item in items">{{item.title}}</a>
    </nav>

    <div class="content" ng-view></div>

</div>
<?/*
<script src="vendor/angular/angular.min.js"></script>
<script src="vendor/angular-route/angular-route.min.js"></script>
<script src="vendor/jquery/dist/jquery.min.js"></script>
<script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="app/app.module.js"></script>
<script src="app/app.routes.js"></script>
<script src="app/shared/filter-unsafe.js"></script>

<script src="app/components/menu/MenuController.js"></script>
<script src="app/components/main/MainController.js"></script>

<script src="app/components/pages/routing.js"></script>
<script src="app/components/pages/PagesController.js"></script>
<script src="app/components/pages/PagesService.js"></script>

<script>
    function dv(v) {
        console.log(v);
    }
</script>*/?>
<script src="/js/compiled.js"></script>
</body>
</html>