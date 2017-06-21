angular.module('shop.controllers')

.controller('commodityDetailCtrl', function ($state, $scope, $ionicSlideBoxDelegate, $ionicPopover, $ionicHistory, $ionicPopup, $ionicModal, slideImages, groupUsers, $rootScope) {
    $rootScope.modalHidden = false;//show or hide backdrop area in accordance with modal
    $scope.images = slideImages.getAllCommodityImages();//get slide images
    $scope.users = groupUsers.getAllUsers();// get wechat users
    $scope.commodityCount = 1;// initialize commodity count
    /*
        Show An alert dialog
        @parameter
            _title:string(dialog's title)
            _content:string(dialog's content)
    */
    $scope.showAlert = function (_title, _content) {
        var alertPopup = $ionicPopup.alert({
            title: _title,
            template: _content,
            okText: '确定'
        });
        alertPopup.then(function (res) {
            console.log('Thank you!');
        });
    };
    /*
        Initialize popover component
    */
    $ionicPopover.fromTemplateUrl('templates/component/popover.html', {
        scope: $scope,
    }).then(function (popover) {
        $scope.popover = popover;
    });
    /*
        Initialize modal view
    */
    $ionicModal.fromTemplateUrl('templates/component/commodityModal.html', {
        scope: $scope,
        viewType: 'bottom-sheet',
        animation: 'slide-in-up'
    }).then(function (modal) {
        $scope.modal = modal;
    });
    /*
        Called when user click “去参团”、“发起拼团”、“立即购买”
    */
    $scope.showModal = function () {
        $rootScope.modalHidden = true;
        $scope.modal.show();
    }
    /*
        Called when user click 'close' button in modal
    */
    $scope.hideModal = function () {
        $rootScope.modalHidden = false;
        $scope.modal.hide();
    };
    /*
        Called when user click pager icon in slide box
        @parameter 
            index:number(slide index)
    */
    $scope.navSlide = function (index) {
        $ionicSlideBoxDelegate.slide(index, 500);
    };
    /*
        Called when user click 'back' arrow button
    */
    $scope.goBack = function () {
        $ionicHistory.goBack();
    };
    /*
        Called when user click '七天包退, 十四天包换' question mark
    */
    $scope.showRetreat = function () {
        $scope.showAlert('七天包退, 十四天包换', '本次团购落地活动在宣传上延续多渠开, 在願客来源上, 从小区...');
    };
    /*
        Called when user click '火热拼团' question mark
    */
    $scope.showFire = function () {
        $scope.showAlert('火热拼团', '本次团购落地活动在宣传上延续多渠开, 在願客来源上, 从小区...');
    };
    /*
        Calle when user click '-' button in modal
    */
    $scope.minusAction = function () {
        if ($scope.commodityCount != 1) {
            $scope.commodityCount--;
        }
    };
    /*
        Called when user click '+' button in modal
    */
    $scope.plusAction = function () {
        $scope.commodityCount++;
    };
    /*
        Called when user click '下一步' button
    */
    $scope.goNext = function () {
        $scope.hideModal();
        $state.go('pendingOrder');
    };
})