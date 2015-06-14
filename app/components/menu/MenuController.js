angular.module('eposApp').controller('MenuController', ['$scope', 'PagesService', function ($scope, PagesService) {
    var self = this;

    PagesService.getList().then(function(resp) {
        $scope.items = resp.data;
    });
}]);
