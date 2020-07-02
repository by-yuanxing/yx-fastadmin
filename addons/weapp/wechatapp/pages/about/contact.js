// pages/about/contact.js
var WxParse = require('../../wxParse/wxParse.js');
var api = require('../../api/about.js');
Page({
  data: {

  },
  onLoad: function (options) {
    var that = this;
    api.contact().then(re => {
      WxParse.wxParse('article', 'html', re.contact_content, that, 5);
    })
  },
  onShow: function () {

  }
})