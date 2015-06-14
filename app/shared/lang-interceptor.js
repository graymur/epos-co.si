angular.module('eposApp').factory('langRequestInterceptor',['$stateParams', '$location', function($stateParams, $location){
    return {
        request: function (config) {
            var lang = $stateParams.lang;

            if (!lang) {
                lang = $location.path().split('/')[1];
            }

            if (lang.length == 2) {
                config.url += (config.url.split('?')[1] ? '&':'?') + 'lang=' + lang;
            }

            return config;
        }
    }
}]);

angular.module('eposApp').config(['$httpProvider',function($httpProvider) {
    $httpProvider.interceptors.push('langRequestInterceptor');
}]);
