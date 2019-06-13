const http = require('http');
const url = require("url");
const port = 8000;
var obj = {'name': 'Burton', 'class': 'cs313'};

function onRequest(request, response){
    //If the requested path is "/home" 
    //have the response write an html page with
    //an h1 tag that renders, "Welcome to the Home Page".
    if (request.url == '/home.html' || request.url == '/home') {
        response.writeHead(200,{"Content-Type": "text/html"});     
        response.end("<h1>Welcome to the Home Page</h1>");
        console.log("Now Displaying home.html");
        }

    //If the requested path is "/getData"
    //have the response write a JSON document
    //that returns your name and class,
    //(e.g., {"name":"Br. Burton","class":"cs313"}
    else if (request.url == '/getData.html' || request.url == '/getData') {
        response.writeHead(200, {"Content-Type": "application/json"});
        response.end(JSON.stringify(obj));        
        console.log("Now Displaying getData.html");       
        }
    //If the requested path is anything else, 
    //have the response render an html page with
    //a status code of 404, and on the page, render,
    //"Page Not Found".
else{
    response.writeHead(404,{"Content-Type": "text/plain"});
    response.end("Page Not Found");
    console.log("Page Not Found");
    }
}
http.createServer(onRequest).listen(port);
console.log("Now listening on http://localhost:8000/");