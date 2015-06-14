angular.module('eposApp').controller('SpeakersController', ['speakersData', 'PagesService', function (speakersData, PagesService) {
    var self = this;
    self.speakers = speakersData.data;

    PagesService.getByUrl('speakers').then(function(resp) {
        self.page = resp.data;
    });
}]);