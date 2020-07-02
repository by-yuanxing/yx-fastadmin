// pages/detail/index.js
var WxParse = require('../../wxParse/wxParse.js');
var api = require('../../api/product.js');
Page({
  /**
   * 页面的初始数据
   */
  data: {
     
  },
  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (e) {
     var id=e.id;
     var cat=e.cat;
if(!id || !cat){
  wx.navigateBack({
  })
  return false;
}
api.detail({id:id,cat:cat}).then(re=>{
  WxParse.wxParse('article', 'html', re.content, this, 5);
})
}
})