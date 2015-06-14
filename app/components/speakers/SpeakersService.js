angular.module('eposApp').factory('SpeakersService', ['$http',
    function($http) {
        return {
            getList: function() {
                return $http.get('/api/speakers', { cache: true });
            }
        }
    }
]);