//angular.module('eposApp').config(['$routeProvider', '$locationProvider', function($routeProvider, $locationProvider) {
//    $routeProvider
//        .when('/', {
//            templateUrl: 'app/components/main/main.html',
//            controller: 'MainController as ctrl'
//        })
//        .otherwise( { redirectTo: '/' } );
//
//    $locationProvider.html5Mode(true);
//}]);

angular.module('eposApp').config(['$stateProvider', '$locationProvider', '$urlMatcherFactoryProvider', function($stateProvider, $locationProvider, $urlMatcherFactoryProvider) {
    $urlMatcherFactoryProvider.strictMode(false);

    $stateProvider
        .state('app', {
            abstract: true,
            url: '/{lang:(?:si|en)?}',
            template: '<ui-view/>'
        })
        .state('app.home', {
            url: '',
            templateUrl: 'app/components/main/main.html',
            controller: 'MainController as ctrl'
        })
    ;

    $locationProvider.html5Mode(true);
}]);