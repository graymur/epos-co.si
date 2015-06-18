angular.module('eposApp').factory('Util', ['$stateParams', '$location', '$rootScope',
    function($stateParams, $location, $rootScope) {
        return {
            getLanguage: function() {
                var languages = ['en', 'si'];
                $rootScope.lang = $stateParams.lang;

                if (!$rootScope.lang) {
                    $rootScope.lang = $location.path().split('/')[1];
                }

                if (languages.indexOf($rootScope.lang) === -1) {
                    $rootScope.lang = languages[0];
                }

                return $rootScope.lang;
            }
        }
    }
]);
