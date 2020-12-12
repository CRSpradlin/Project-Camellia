let ajaxRequest = (url, method, formData) => {
  let promise = new Promise(function(resolve, reject){
    let xhr = new XMLHttpRequest();
    xhr.open(method, url);
    xhr.send(formData);
    xhr.onreadystatechange = () => {
      if(xhr.readyState === 4){
        if(xhr.status === 200){
          //console.log("xhr done successfully");
          let resp = xhr.responseText;
          resolve(resp);
        } else {
          //console.log("xhr failed");
          reject(xhr.status);
        }
      }
    }
    //console.log("request sent");
  });
  return promise;
}

let getPlantnet = async (imageId, organ, domain, apiKey) => {

  const service = 'https://my-api.plantnet.org/v2/identify/all'

  let url = service + '?api-key=' + apiKey

  url += '&images=' + "https://"+domain+"/modules/custom/camellia_module/uploads/"+imageId;

  url += '&organs=' + organ

  console.log(url)

  const proxyurl = "https://cors-anywhere.herokuapp.com/";

  let response = await fetch(proxyurl + url);
  console.log(response);
  return response;
}