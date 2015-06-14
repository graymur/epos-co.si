angular.module('eposApp').config(['$routeProvider', '$locationProvider', function($routeProvider, $locationProvider) {
    $routeProvider
        .when('/', {
            templateUrl: 'app/components/main/main.html',
            controller: 'MainController as ctrl'
        })
        .otherwise( { redirectTo: '/' } );

    $locationProvider.html5Mode(true);
}]);