var api = require("../utils/request.js")
const banner = re => {
  return api.$http.get("index/banner", re)
}


const brand = re => {
  return api.$http.get("index/brand", re)
}

const product = re => {
  return api.$http.get("index/product", re)
}

const about = re => {
  return api.$http.get("index/about", re)
}

const cases = re => {
  return api.$http.get("index/cases", re)
}
const app = re => {
  return api.$http.get("index/app", re)
}
const guest = re => {
    return api.$http.post("index/guest", re)
}

module.exports = {
  banner: banner,
  brand: brand,
  product: product,
  about: about,
  cases: cases,
  app:app,
  guest:guest
};