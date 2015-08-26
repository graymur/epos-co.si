angular.module('eposApp').config(['$stateProvider', '$locationProvider', '$urlMatcherFactoryProvider',
    function($stateProvider, $locationProvider, $urlMatcherFactoryProvider) {
        $urlMatcherFactoryProvider.strictMode(false);

        $stateProvider
            .state('app', {
                abstract: true,
                url: '/{lang:(?:si|en)}',
                template: '<ui-view/>'
            })
            .state('app.home', {
                url: '',
                templateUrl: 'app/components/main/main.html',
                //templateUrl: '/main.html',
                controller: 'MainController as ctrl'
            })
            .state('404', {
                templateUrl: 'app/components/error/404.html'
            })
            .state('500', {
                templateUrl: 'app/components/error/500.html'

            })
        ;

        $stateProvider.state('otherwise', {
            url: '*path',
            templateUrl: 'app/components/error/404.html'
        });

        $locationProvider.html5Mode(true);
}]);

angular.module('eposApp').run([
    '$rootScope', '$state',
    function($rootScope, $state) {
        $rootScope.$on('$stateChangeError', function(event, toState, toParams, fromState, fromParams, error) {
            event.preventDefault();

            if (error.status === 404) {
                $state.go('404', null, { location: true, relative: toState });
            } else {
                $state.go('500', null, { location: true, relative: toState });
            }
        });
    }
]);