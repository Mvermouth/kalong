/**
 * Created by Administrator on 2017/6/10.
 */
//var api;
 import axios from "axios";
var api=1;
//api=3;
console.log("1+")
// export default {
//   art:[{
//     title:"1",
//     content:"1con"
//   },{
//     title:"2",
//     content:"2con"
//   }]
//
// getall:"http://localhost/all"
// }

  axios.get('http://localhost/all')
  .then(function (res) {
      api=res;
    console.log("3+")
    console.log(api)
  })
  .catch(function (error) {
    console.log(error);
  });
api=2;
console.log("2+")
export {api};
// var promise = new Promise(function(resolve, reject) {
//   // ... some code
//   if (true){
//     resolve(1);
//     return 1;
//   } else {
//     reject(error);
//   }
// });
// export {promise}
