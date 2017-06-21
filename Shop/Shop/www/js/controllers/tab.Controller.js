angular.module('shop.controllers')

.controller('tabCtrl', function ($scope, $state) {
    /*
        Called when user click '首页' icon
    */
    $scope.goHome = function () {
        $state.go('tab.home');
    };
    /*
        Called when user click '个人中心' icon
    */
    $scope.goUser = function () {
        $state.go('tab.user');
    };
})