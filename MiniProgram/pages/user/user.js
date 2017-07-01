// pages/user/user.js
Page({
  goStorePage: function (e) {
    wx.navigateTo({
      url: '../storeOrder/storeOrder'
    });
  },
  goDeliveryPage: function (e) {
    wx.navigateTo({
      url: '../deliveryOrder/deliveryOrder'
    });
  },
  goWePage: function (e) {
    wx.navigateTo({
      url: '../userGroup/userGroup'
    });
  },
})