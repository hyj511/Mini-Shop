// pages/receivedOrder/receivedOrder.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
  
  },

  /*
    Called when user click 确认收货
  */
  confirmReceipt: function (e) {
    wx.navigateTo({
      url: '../index/index'
    });
  }
})