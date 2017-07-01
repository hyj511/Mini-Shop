// pages/editUserAddress/editUserAddress.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    user: {
      name: '王小萌',
      phone: '13041096933',
      area: '北京市 朝阳区',
      address: '北京工业大学东门',
      zipcode: '100124'
    }
  },
  /*
    Called when user click 保存
  */
  saveAction: function(e) {
    wx.navigateBack({
      delta: 1
    })
  },
  /*
    Called when user click 取消
  */
  cancelAction: function(e) {
    wx.navigateBack({
      delta: 1
    })
  },
  /*
    Called when user click 定位
  */
  goMap: function (e) {
    wx.navigateTo({
      url: '../map/map'
    });
  }
})