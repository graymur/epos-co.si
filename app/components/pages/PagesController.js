angular.module('eposApp').controller('PagesController', ['check', function (check) {
    var self = this;
    this.page = check.data;
}]);