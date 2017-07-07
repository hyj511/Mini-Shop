//index.js
//获取应用实例
var util = require('../../utils/util.js')
var app = getApp()
Page({
  data: {
    swiper: {
      images: [//TODO get data from server
        {
          id: '0',
          src: '../../images/home.png'
        },
        {
          id: '1',
          src: '../../images/home.png'
        },
        {
          id: '2',
          src: '../../images/home.png'
        },
        {
          id: '3',
          src: '../../images/home.png'
        },
        {
          id: '4',
          src: '../../images/home.png'
        },
        {
          id: '5',
          src: '../../images/home.png'
        },
      ]
    },
    buttons: [],
    productImgs: [],
    products: [],
    beforeproductImgs: [],
  },
  /**
 * 生命周期函数--监听页面加载
 */
  onLoad: function () {
    console.log('onLoad')
    this.getCategory();
    // get the categorylist from backend-server
 

    
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

  getCategory: function () {//read the category list
    var that = this;   // 这个地方非常重要，重置data{}里数据时候setData方法的this应为以及函数的this, 如果在下方的sucess直接写this就变成了wx.request()的this了
    wx.request({
      url: 'https://hly.weifengkeji.top/index.php/product/get_category',//请求地址
      data: {
      },
      header: {//请求头
        "Content-Type": "applciation/json"
      },
      method: "GET",//get为默认方法/POST
      success: function (res) {
        console.log('submit success');
        console.log(res.data);//res.data相当于ajax里面的data,为后台返回的数据
　　　　  that.setData({//如果在sucess直接写this就变成了wx.request()的this了.必须为getdata函数的this,不然无法重置调用函数
　　　　　　buttons: res.data
　　　　　　　　　　})

      },
      fail: function (err) { },//请求失败
      complete: function () { }//请求完成后执行的函数
    })
  },
  makeImageUrls: function (i,imgUrl) {
    console.log(imgUrl);
    for (let i=0;i<this.data.products.length;i++) {
      this.data.products[i].imageUrl = imgUrl;  
      console.log(this.data.products);
    }
    
  },
  clickCategory: function (e) { // get the prodcut's detail information
    console.log(e.target.dataset.id);
    var that = this;
    var categoryID = e.target.dataset.id;
    var imagePath;
    var app = getApp();
    wx.request({
      url: 'https://hly.weifengkeji.top/index.php/product/getall',//请求地址
      data: {
        category : categoryID    
      },
      header: {//请求头
        'content-type': 'application/x-www-form-urlencoded'
      },
      method: "POST",//get为默认方法/POST
      success: function (res) {
        console.log('submit success');
        console.log(res.data);//res.data相当于ajax里面的data,为后台返回的数据
        //console.log(res.data.imageUrl);//res.data相当于ajax里面的data,为后台返回的数据
        app.globalData.cnt = 0;
        for (let i=0;i<res.data.length;i++){
          console.log('detail image urls');
           console.log(res.data[i].imageUrl); 
           
            wx.downloadFile({
              url: res.data[i].imageUrl, //仅为示例，并非真实的资源
              type: 'image',
              success: function (res) {
                that.makeImageUrls(app.globalData.cnt,res.tempFilePath);
                app.globalData.cnt++;
              }
            })
        }
        that.setData({//如果在sucess直接写this就变成了wx.request()的this了.必须为getdata函数的this,不然无法重置调用函数
          products : res.data
                    
        })
        console.log('submit success11111');

      },
      fail: function (err) { },//请求失败
      complete: function () { }//请求完成后执行的函数
    })
   
    
    /*wx.downloadFile({
      url: 'http://example.com/audio/123', //仅为示例，并非真实的资源
      success: function (res) {
        wx.playVoice({
          filePath: res.tempFilePath
        })
      }
    })*/
  },

  makeBeforeImageUrls: function (i, imgUrl) {
    console.log(imgUrl);

    this.data.beforeproductImgs[i].imgUrl = imgUrl;
    console.log("each product images");
    console.log(this.data.beforeproductImgs[i].imgUrl);


  },
  
  detailClick: function (e) {
    var that = this;
    util.productId = e.target.dataset.id;
    console.log(util.productId);
    wx.navigateTo({
      url: '../productDetail/productDetail'

    });

 
  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {

  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function () {

  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide: function () {

  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload: function () {

  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh: function () {

  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: function () {

  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {

  }
})