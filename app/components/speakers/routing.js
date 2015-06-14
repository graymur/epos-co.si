/*angular.module('eposApp').config(['$routeProvider', function($routeProvider) {
    self = this;

    $routeProvider
        .when('/speakers', {
            templateUrl: 'app/components/speakers/page.html',
            resolve: {
                speakersData: ['SpeakersService', function(SpeakersService) {
                    return SpeakersService.getList()
                }]
            },
            controller: 'SpeakersController as ctrl'
        })
    ;
}]);*/


angular.module('eposApp').config(['$stateProvider', function($stateProvider) {
    // dynamic pages urls
    $stateProvider.state('app.speakers', {
        url: '/speakers',
        templateUrl: 'app/components/speakers/page.html',
        resolve: {
            speakersData: ['SpeakersService', function(SpeakersService) {
                return SpeakersService.getList()
            }]
        },
        controller: 'SpeakersController as ctrl'
    });
}]);