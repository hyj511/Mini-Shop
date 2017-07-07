// pages/productDetail/productDetail.js
var util = require('../../utils/util.js');
var app = getApp();
Page({

  /**
   * 页面的初始数据
   */
  data: {
    swiperImages: [],
    users: [
      {
        id: '0',
        src: '../../images/user.png'
      },
      {
        id: '1',
        src: '../../images/user.png'
      },
    ],
    productArray: [], // each product info array
    modalRetreatHidden: true,
    modalFireHidden: true,
    actionSheetHidden: true,
    commodityCount: 0,
    groupBuyingHidden: true,
    showLoading: false,

    // loading提示语
    loadingMessage: '',
    productDetailPrices: [],
    
  },
  /*
    Called when user click question mark in 七天包退, 十四天包换 to show modal
  */
  modalRetreat: function (e) {
    this.setData({
      modalRetreatHidden: false
    })
  },
  /*
    Called when user click 确定 to hide modal
  */
  modalRetreatChange: function (e) {
    this.setData({
      modalRetreatHidden: true
    })
  },
  /*
    Called when user click question mark in 火热拼团 to show modal
  */
  modalFire: function (e) {
    this.setData({
      modalFireHidden: false
    })
  },
  /*
    Called when user click 确定 to hide modal
  */
  modalFireChange: function (e) {
    this.setData({
      modalFireHidden: true
    })
  },
  /*
    Called when user click 立即购买, 发起拼团, 去参团
  */
  actionSheetTap: function (e) {
    this.setData({
      actionSheetHidden: !this.data.actionSheetHidden,
      commodityCount: 0
    })
  },
  /*
    Called when user click close button in actionsheet
  */
  actionSheetChange: function (e) {
    this.setData({
      actionSheetHidden: !this.data.actionSheetHidden
    })
  },
  /*
    Called when user click + in actionsheet
  */
  increaseCount: function (e) {
    this.setData({
      commodityCount: this.data.commodityCount + 1
    })
  },
  /*
    Called when user click - in actionsheet
  */
  decreaseCount: function (e) {
    if (this.data.commodityCount > 0) {
      this.setData({
        commodityCount: this.data.commodityCount - 1
      })
    }
  },
  /*
    Called when user click 立即购买
  */
  goBuyNow: function() {
    this.setData({
      groupBuyingHidden: true,
      actionSheetHidden: !this.data.actionSheetHidden,
      commodityCount: 0,
    });
    util.groupBuyMode = false;
  },
  /*
    Called when user click 发起拼团
  */
  goGroupBuy: function() {
    this.setData({
      groupBuyingHidden: false,
      actionSheetHidden: !this.data.actionSheetHidden,
      commodityCount: 0,
    })
    util.groupBuyMode = true;
  },
  /*
    Called when user click '下一步' button
  */
  goPending: function (e) {
    if (this.data.commodityCount == 0) {
      var that = this;
      wx.showModal({
        title: '提示',
        content: '请插入购买数量!',
        success: function (res) {
          if (res.confirm) {
            console.log('confirm')
          } else if (res.cancel) {
            that.setData({
              actionSheetHidden: !that.data.actionSheetHidden
            })
            console.log('cancel')
          }
        }
      })
    } else {
      this.setData({
        actionSheetHidden: !this.data.actionSheetHidden
      })
      wx.navigateTo({
        url: '../pendingOrder/pendingOrder'
      });
    }
  },
  hideLoading() {
    this.setData({ showLoading: false, loadingMessage: '' });
  },
/*
* load function
*/
  onLoad: function () {
    console.log('onLoad')
    // send the product id to backend
    /*this.setData({
      swiperImages: util.beforeProductImgs
    })*/
    // get the categorylist from backend-server
    this.getProductbeforImages();
    this.getProductInfo();
    
    /*var that = this
    //调用应用实例的方法获取全局数据
    app.getUserInfo(function (userInfo) {
      //更新数据
      that.setData({
        //userInfo:userInfo
      })
    })
    */
  },
    getProductInfo: function () {//read the category list
      var that = this;   // 这个地方非常重要，重置data{}里数据时候setData方法的this应为以及函数的this, 如果在下方的sucess直接写this就变成了wx.request()的this了
      wx.request({
        url: 'https://hly.weifengkeji.top/index.php/product/detail',//请求地址
        data: {
          product_id: util.productId
        },
        header: {//请求头
          'content-type': 'application/x-www-form-urlencoded'
        },
        method: "POST",//get为默认方法/POST
        success: function (res) {
          console.log('product prices');
          console.log(res.data);//res.data相当于ajax里面的data,为后台返回的数据
          that.setData({//如果在sucess直接写this就变成了wx.request()的this了.必须为getdata函数的this,不然无法重置调用函数
            productDetailPrices: res.data
          })

        },
        fail: function (err) { },//请求失败
        complete: function () { }//请求完成后执行的函数
      })
    },
 
    makeImageUrls: function (i, imgUrl) {
      console.log(imgUrl);
      
        this.data.swiperImages[i].imgUrl = imgUrl;
        console.log("each product images");
        console.log(this.data.swiperImages[i].imgUrl);
      

    },
    getProductbeforImages: function () {//read the category list
      var that = this;   // 这个地方非常重要，重置data{}里数据时候setData方法的this应为以及函数的this, 如果在下方的sucess直接写this就变成了wx.request()的this了
      wx.request({
        url: 'https://hly.weifengkeji.top/index.php/product/getimgs',//请求地址
        data: {
          product_id: util.productId
      
        },
        header: {//请求头
          'content-type': 'application/x-www-form-urlencoded'
        },
        method: "POST",//get为默认方法/POST
        success: function (res) {
          console.log('image urls');
          console.log(res.data);//res.data相当于ajax里面的data,为后台返回的数据

          app.globalData.cnt = 0;
          for (let i = 0; i < res.data.length; i++) {
            console.log(res.data[i].imgUrl);

            wx.downloadFile({
              url: res.data[i].imgUrl, //仅为示例，并非真实的资源
              type: 'image',
              success: function (res) {
                that.makeImageUrls(app.globalData.cnt, res.tempFilePath);
                
                app.globalData.cnt++;
              }
            });
          }
          that.setData({//如果在sucess直接写this就变成了wx.request()的this了.必须为getdata函数的this,不然无法重置调用函数
            swiperImages: res.data
          })
          console.log("swiper 111");
          console.log(that.data.swiperImages)
        },
        fail: function (err) { },//请求失败
        complete: function () { 
          
        }//请求完成后执行的函数
      })
      console.log("swiper 3333");
      console.log(that.data.swiperImages)
    },

})