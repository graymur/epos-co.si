angular.module('eposApp').factory('PagesService', ['$http',
    function($http) {
        return {
            getByUrl: function(url) {
                return $http.get('/api/pages?url=' + url, { cache: true });
            },
            getList: function() {
                return $http.get('/api/pages', { cache: true });
            }
        }
    }
]);