angular.module('shop.controllers')

.controller('shippingAddressCtrl', function ($scope, $state, $ionicHistory) {
    /*
        Called when user click 'back' arrow
    */
    $scope.goBack = function () {
        $ionicHistory.goBack();
    };
    /*
        Called when user click '完成' button
    */
    $scope.goFinish = function () {
        $ionicHistory.goBack();
    };
    /*
        Called when user click '保存' button
    */
    $scope.goSave = function () {
        $ionicHistory.goBack();
    };
    /*
        Called when user click '取消' button
    */
    $scope.goCancel = function () {
        $ionicHistory.goBack();
    };
})