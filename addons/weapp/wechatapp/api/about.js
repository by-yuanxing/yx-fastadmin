var api = require("../utils/request.js")
const about = re => {
  return api.$http.get("about/index", re)
}

const contact = re => {
  return api.$http.get("about/contact", re)
}

module.exports = {
  about: about,
  contact: contact
};