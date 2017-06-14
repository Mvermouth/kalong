/**
 * Created by Administrator on 2017/6/10.
 */
import axios from "axios";
var api2;
axios.get('http://localhost/all')
  .then(function (res) {
    api2=res;
    console.log("3+")
    console.log(api2)
  })
  .catch(function (error) {
    console.log(error);
  });

export {api2};
