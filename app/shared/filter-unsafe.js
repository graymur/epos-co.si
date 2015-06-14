angular.module('eposApp').filter('unsafe', ['$sce',
    function($sce) {
        return $sce.trustAsHtml;
    }
]);