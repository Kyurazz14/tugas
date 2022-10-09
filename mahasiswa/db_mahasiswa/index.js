const http = require ('http');

   http.createServer(funcion (request , response){
response.end('Hello world')
   }).listen(3001)