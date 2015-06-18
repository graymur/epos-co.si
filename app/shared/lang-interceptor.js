angular.module('eposApp').factory('langRequestInterceptor', ['$location', 'Util', function($location, Util) {
    return {
        request: function (config) {
            var lang = Util.getLanguage();

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
