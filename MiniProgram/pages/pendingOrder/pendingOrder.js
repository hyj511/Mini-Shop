// pages/pendingOrder/pendingOrder.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    deliveryActive: 'active',
    storeActive: '',
    storeHidden: false
  },
  /*
    Called when user click 快递配送
  */
  selectDelivery: function (e) {
    this.setData({
      deliveryActive: 'active',
      storeActive: '',
      storeHidden: false
    })
  },
  /*
    Called when user click 门店自提
  */
  selectStore: function (e) {
    this.setData({
      deliveryActive: '',
      storeActive: 'active',
      storeHidden: true
    })
  },
  /*
    Called when user click 编辑
  */
  editAddress: function (e) {
    if(this.data.deliveryActive == 'active'){
      wx.navigateTo({
        url: '../editUserAddress/editUserAddress'
      });
    }else if(this.data.storeActive == 'active'){
      wx.navigateTo({
        url: '../editStoreAddress/editStoreAddress'
      });
    }
  },
  /*
    Called when user click 提交订单
  */
  submitOrder: function (e) {
    if(this.data.deliveryActive == 'active') {
      wx.navigateTo({
        url: '../receivedOrder/receivedOrder'
      });
    }else if(this.data.storeActive == 'active') {
      wx.navigateTo({
        url: '../deliveredOrder/deliveredOrder'
      });
    }
  }
})