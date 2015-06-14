angular.module('eposApp').config(['$routeProvider', function($routeProvider) {
    self = this;

    $routeProvider
        .when('/:page*', {
            templateUrl: 'app/components/pages/page.html',
            resolve: {
                check: ['$location', 'PagesService', function($location, PagesService) {
                    return PagesService.getByUrl($location.path())
                }]
            },
            controller: 'PagesController as ctrl'
        })
    ;
}]);