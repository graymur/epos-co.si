angular.module('eposApp').controller('PagesController', ['pageData', '$stateParams', function (pageData, $stateParams) {
    var self = this;
    this.page = pageData.data;
}]);