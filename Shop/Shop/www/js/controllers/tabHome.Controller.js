angular.module('shop.controllers')

.controller('tabHomeCtrl', function ($state, $scope, $ionicPopover, $ionicSlideBoxDelegate, slideImages, commodities) {
    $scope.images = slideImages.getAllHomeImages();
    $scope.commodities = commodities.getAll();
    /*
        Called when user click pager icon in slide box
        @parameter 
            index:number(slide index)
    */
    $scope.navSlide = function (index) {
        $ionicSlideBoxDelegate.slide(index, 500);
    };
    /*
        Called when user click '详情'(detail)
    */
    $scope.goDetail = function () {
        $state.go('commodityDetail');
    };
})