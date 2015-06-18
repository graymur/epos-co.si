angular.module('eposApp').directive('menu', ['PagesService', 'Util', '$state', function(PagesService, Util, $state) {
    return {
        restrict: 'E',
        templateUrl: '/app/components/menu/menu.html',
        scope: {},
        controller: ['$scope', function($scope) {
            $scope.lang = Util.getLanguage();

            PagesService.getList().then(function (pages) {
                $scope.items = pages.data;
            }, function () {
                $state.go('404');
            });
        }]
    };
}]);