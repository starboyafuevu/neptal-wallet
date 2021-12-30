<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <input type="text" id="myInput" >
    <button id="btn" onblur="myFun()">test</button>
</body>
<style>
input{ 
    width: 300px;
    height: auto;
}
#btn{
    display: none;;
}

</style>
<script>
function myFun(){
var myInput  = document.getElementById("myInput");
var btn = document.getElementById("btn");

if(myInput <= 4 ){
    document.getElementById("btn").style.display = "block";
}else {document.getElementById("btn").style.display = "none";}}
</script>
</html>