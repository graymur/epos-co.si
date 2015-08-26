angular.module('eposApp').config(['$stateProvider', '$urlMatcherFactoryProvider', function($stateProvider, $urlMatcherFactoryProvider) {
    function valToString(val) {
        return val !== null ? val.toString() : val;
    }

    // do not encode slashes in URL
    $urlMatcherFactoryProvider.type('nonURIEncoded', {
        encode: valToString,
        decode: valToString,
        is: function () { return true; }
    });

    // dynamic pages urls
    $stateProvider.state('app.page', {
        url: '/{slug:nonURIEncoded}',
        controller: 'PagesController as ctrl',
        resolve: {
            pageData: ['PagesService', '$stateParams', function(PagesService, $stateParams) {
                return PagesService.getByUrl($stateParams.slug);
            }]
        },
        templateUrl: 'app/components/pages/page.html'
    });
}]);