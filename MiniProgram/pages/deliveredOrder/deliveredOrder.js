// pages/deliveredOrder/deliveredOrder.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
  
  },
  /*
    Called when user click 地图
  */
  goMap: function (e) {
    wx.navigateTo({
      url: '../map/map'
    });
  },
  /*
    Called when user click 电话
  */
  goDial: function (e) {

  }
})