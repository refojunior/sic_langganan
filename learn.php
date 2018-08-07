

<h1>Javascript Eventlistener</h1>
<button id="myButton">Try It!</button> <br>
<button id="events">Try It!</button> <br>
<p id="val-event"></p>
<p id="listener1">Cursor Here</p>

<b id="ah">apabila ada parameter gunakan anonimous function untuk memanggil function dan parameter, click for result</b>
<p ></p>

<div id="div-big">
	<div id="div-small">
		<p>MOUSE OVER HERE</p>
		<button onclick="stopIt()">Stop it</button>
	</div>
	<p id="mathRandom"></p>
</div>

<script>
	document.getElementById("myButton").addEventListener('click', function() {
		alert('Hello world!');
	});

	document.getElementById("events").addEventListener('click', event1);
	document.getElementById("events").addEventListener('click', event2);
	var valElement = document.getElementById("val-event");
	function event1(){
		valElement.innerHTML += "event 1 s	" ;
	}
	function event2(){
		valElement.innerHTML += "event 2";
	}

	document.getElementById("listener1").addEventListener('mouseover', function(){
		document.getElementById("listener1").innerHTML="click me";
	});
	document.getElementById("listener1").addEventListener('click', function(){
		document.getElementById("listener1").innerHTML = "cursor out please";
		document.getElementById("listener1").style.color = "red";
	});
	document.getElementById('listener1').addEventListener('mouseout', function(){
		document.getElementById("listener1").innerHTML = "Thanks!";
		document.getElementById("listener1").style.color = "blue";
		document.getElementById("listener1").addEventListener('click', function(){
			document.getElementById('listener1').style.display = "none";
		});
	});

	function iniFunction(a, b){
		result = a + b;
		document.getElementById("ah").innerHTML = result
	}

	document.getElementById("ah").addEventListener('click', function() {
		iniFunction(2, 5);
	});
	function mathFunc() {
		document.getElementById('mathRandom').innerHTML = Math.random();
	}

	document.getElementById("div-big").addEventListener('mousemove', mathFunc);

	function stopIt(){
		document.getElementById("div-big").removeEventListener('mousemove', mathFunc);
	}
	
</script>


<h1>Javascript DOM Event</h1>
<div class="boxes">
	<p id="yy" onmouseout="mOut(this)" onmousedown="mDown()" onmouseup="mUp()">Click Me</p>
</div>

<script>
	
	function mDown(){
		document.getElementById("yy").innerHTML = "CLick tahan";
		document.getElementsByClassName("boxes")[0].style.backgroundColor = "black";
	}

	function mUp(){
		document.getElementById("yy").innerHTML = "Thankyou";
		document.getElementsByClassName("boxes")[0].style.backgroundColor = "grey";
	}

	function mOut(object){
		object.innerHTML = "Click Me";
		document.getElementsByClassName("boxes")[0].style.backgroundColor = "purple";
	}
</script>

<style>

	#div-big{
		background:orange;
		padding:50px;
	}

	#div-small{
		padding:20px;
		background:white;
	}
	.boxes {
		width:150px;
		height:70px;
		background-color:purple;
		text-align:center;
		line-height:50px;
		color:white;
	}
	#container {
		width:400px;
		height:400px;
		background:yellow;
		position:relative;
	}
	#animate {
		width:50px;
		height:50px;
		background:red;
		position:absolute;
	}
</style>
<h1>DOM Animation</h1>
<div id="container">
	<div id="animate"></div>
</div>
<button onclick="return move()">Move me</button>
<p id="bigs" onmouseover="return bigger()">Mouse over here and make me bigger</p>

<br>
<script>
function bigger(){
	var text = document.getElementById("bigs");
	var size = 15;
	setInterval(function() {
		if(size==50){
			clearInterval();
		} else {
			size++;
			text.style.fontSize= size + "px";
		}
	}, 15);
}

function move(){
	var element = document.getElementById("animate");
	var pos = 0;
	var id = setInterval(movement, 5);
	function movement(){
		if(pos==351){
			clearInterval(id);
		} else {
			pos++;
			element.style.top = pos + "px";
			element.style.left = pos + 'px';
		}
	}
}
</script>


<h1>DOM Programming interface</h1>
<b>Finding HTML Element by id</b>
<p id="intro">Hello World</p>
<p id="dom"></p>


<b>finding HTML element by tag name</b>
<p>tiap tag akan di jadikan array sesuai urutan tag. contoh :</p>
<i>Tag pertama</i><br>
<i>Tag kedua</i><br>
<i>Tag ketiga</i>
<p id="returnTag"></p>

<br>
<b>find HTML element by tag name inside of other tag</b>
<div id="main">
	<p>Main 1</p>
	<p>Main 2</p>
</div>
<p id="tags"></p>

<br>
<b>Get element by class </b>
<div class="class">DOM is very useful</div>
<div class="class">i try to learn a DOM</div>
<p id="classResult"></p>
<br>

<b>Finding element by css selector</b>
<div class="selector">Awesome!</div>
<div class="selector">Great!</div>
<p id="selectorResult"></p>
<br>

<b>Finding HTML element by HTML object collection</b>
<form action="" id="thisForm">
	nama : <input type="text" name="nama" value="refo"> <br>
	umur : <input type="text" name="umur" value="20"> <br>
	<input type="submit" value="simpan">
</form>
<button onclick="return tryThisForm()">Try it!</button>
<p id="valueForm"></p>
<br>

<b>Changing the value of an attribute</b>
<br>
<img id="pic" src="myfoto.jpg" alt="myfoto.jpg">
<br><br>

<b id="styles">Changing html style</b>

<script>
document.getElementById("styles").style.color = "red";
document.getElementById("styles").style.fontSize = "50px";

//Changing the value of an attribute
//document.getElementsByTagName('img')[0].alt = "Foto tidak ada";
document.getElementById('pic').alt = "Oi gan gaada foto";

//finding html element by html object collection
function tryThisForm(){
	var form = document.forms['thisForm'];
	//catatan : cara get value dari form = form['nama'].value  atau form.elements[0].value
	//bisa pake index array atau nama fieldnya
	var value = "";

	for(var i=0; i<form.length; i++){
		//value += form[i].value + "<br>";
		value += form.elements[i].value + "<br>";
	}
	document.getElementById("valueForm").innerHTML = value;

}


//finding element by css selector
var selector = document.querySelectorAll("div.selector");
document.getElementById('selectorResult').innerHTML = "Isi dari selector 1 adalah "+selector[0].innerHTML;

//get element by class
var cls1 = document.getElementsByClassName('class');
document.getElementById("classResult").innerHTML= "nama classnya yg ke 1 "+ cls1[0].innerHTML;



//find tag inside the tag
var mainTag = document.getElementById('main');
var secondTag = mainTag.getElementsByTagName("p");
document.getElementById("tags").innerHTML = "cara mengakses tag tersebut adalah "+secondTag[0].innerHTML;


//find by tag
var tag = document.getElementsByTagName('i');
//cara ganti tagnya, urutan berdasarkan array, dari atas(0), bawahnya (1) dan seterusnya;
//document.getElementsByTagName('i')[0].innerHTML = "I change the context";
document.getElementById('returnTag').innerHTML = "Hasil dari tag i kedua adalah "+ tag[1].innerHTML;

//find by id
var element1 = document.getElementById("intro");
var element2 = document.getElementById("dom").innerHTML = "ini adalah element ke 2, element ke 1 nya adalah "+element1.innerHTML;

var url = document.documentURI;
segment = url.split('/');

console.log(segment[3]);
</script>


<h1>JavaScript form validation.</h1>
<form action="" onsubmit="return formValidation()" name="reg" method="post">
	<input type="text" name="name" id="name">
	<input type="submit">
</form>


<script>
	function formValidation(){
		var name = document.forms['reg']['name'].value;
		//var name = document.getElementById('name').value;
		if(name==''){
			alert('Tidak boleh kosong!');
			return false;
		} else {
			if(!isNaN(name)){
				alert('Masukan Huruf bukan Angka!');
				return false
			} else {
				alert("Hello "+name);
				return true;
			}
		}
	}
</script>
<?php echo (!isset($_POST['name']) ? '' : "Hai ".$_POST['name']. " from php"); ?>


<hr>
<h1>JSON (JavaScript Object Notaion)</h1>

<p>Ini data dari json </p>
<p id="jeson"></p>
<b>Looping data json</b>
<p id="loopjson"></p>
<script>
	var data = '{ "employees" : [' +
				'{ "firstName":"John" , "lastName":"Doe" },' +
				'{ "firstName":"Anna" , "lastName":"Smith" },' +
				'{ "firstName":"Peter" , "lastName":"Jones" } ]}';
	var obj = JSON.parse(data);
	document.getElementById('jeson').innerHTML = obj.employees[0].firstName + " "+ obj.employees[0].lastName;
	var loopjson; 
	loopjson = "";
	jmlJson = obj.employees.length;
	for(i=0; i<jmlJson; i++){
		loopjson += obj.employees[i].firstName + " " + obj.employees[i].lastName +" <br>";
	}
	document.getElementById('loopjson').innerHTML = loopjson;


</script>



<hr>
<h1>What is "this"</h1>
<p>dalam definisi fungsi "this" mengarahkan pada "pemilik" dari fungsi tersebut</p>
<p>pada contoh dibawah "this" mengarah pada "person" yang ditulis dalam fungsi tesb</p>
<p>this juga dapat digunakan untuk mengakses global variabel</p>
<p>contoh  : </p>
<p id="fullName"></p>
<script>
	var person = {
		firstName : "Refo",
		lastName : "Junior",
		fullName : function(){
			return this.firstName + " " + this.lastName;
		}
	};
	document.getElementById("fullName").innerHTML = person.fullName();

</script>
<hr>

<h1>Throw (try and catch)</h1>
<input type="text" id="message"> <button onclick="thrown()">Try!</button>
<p id="throw"></p>
<script>
	function thrown(){
		var text, message;
		message = document.getElementById('throw');
		text = document.getElementById('message').value;
		try{
			text = Number(text);
			if(text == '') throw "Empty";
			if(text > 10 ) throw "Too High";
			if(text < 5) throw "Too small";
			if(isNaN(text)) throw "its not a number";
			alert("number is " + text);
		} catch(err) {
			message = message.innerHTML= err;
		}
	}

</script>


<hr>
<h1>Try Catch</h1>
<p id="try"></p>
<script>
	// function addalert(message){
	// 	alert(message);
	// }
	try {
		addalert("Welcome");
		//alert('welcome');
	} catch(err){
		document.getElementById("try").innerHTML = err.message;
	}
</script>


<h1>Test</h1>
<input type="text" id="test"> <button  onclick="test()">Test</button>

<script>
	function test(){
		test=document.getElementById('test').value;
		console.log(test);
	}
	
</script>
<p id="demo"></p>
The result of 5 + 7 is <div id="number"></div>

<p id="combine"></p>

<p id="looping"></p>

<p id="cari"></p>
<p id="ketemu"></p>

<a href="#" onclick="myfunction()">click me</a>
<p id="click">c</p>



<p id="buah"></p>

catatan array cek di comment dan inspek elemen
<p>element array diakses dari index nomornya</p>

<p id="hero"></p>
<button onclick="addArray()">Tambah</button>

<br>
splice dapat digunakan untuk menambah dan menghapus element array
ini array nya : <p id="cars"></p>
<button onclick="spliceAdd()">Add</button>
<button onclick="spliceRemove()">Remove</button>


<br>
<p>concate array (menggabungkan array)</p>
ini array pertama :
<p id="array1"></p>
ini array ke 2
<p id="array2"></p>
<button onclick="concateArray()">Concate those array!</button>
<p id="gabungArray"></p>


<p id="loopArray"></p>


<hr>
<h2>Pertambahan</h2>
<input type="text" id="bil1"> + <input type="text" id="bil2"> <button onclick="pertambahan()">Hasil</button>
<p id="hasil"></p>
<hr>

<input type="text" id="buahJs" placeholder="masukan nama buah"> <button onclick="buahJs()">Submit</button>
<p id="HasilBuah"></p>

<p id="loops1"></p>
<p id="loops2"></p>
<script>
loops1 = "";

for(i=5; i>0; i--){
	for(j=1; j<i; j++){
		loops1 += i;
	}
	loops1 += i + "<br>";
}

document.getElementById("loops1").innerHTML = loops1 ;

loops2 = "";
for(i=1; i<=5; i++){
	for(j=1; j<i; j++){
		loops2 += "*";
	}
	loops2 += "* <br>";
}

document.getElementById('loops2').innerHTML=loops2;

i=1;
while(i<10){
	console.log(i);
	i++;
}


function buahJs(){
	buahJs = document.getElementById("buahJs").value;
	switch (buahJs){
		case "apel" :
			document.getElementById("HasilBuah").innerHTML = "Aku suka buah Apel!";
		break;
		case "mangga" :
			document.getElementById("HasilBuah").innerHTML = "Aku suka buah mangga!";
		break;
		default :
			document.getElementById("HasilBuah").innerHTML = "gw gatau itu buah apaan!";
		break;
	}
}

function pertambahan(){
	bil1 = document.getElementById('bil1').value;
	bil2 = document.getElementById('bil2').value;
	hasil = parseInt(bil1)+parseInt(bil2);
	document.getElementById('hasil').innerHTML = hasil;
}
var dream;
dream = "i want to be a software engineer";
console.log(dream);

var text1, text2;
text1 = "i want to be ";
text2 = "a software engineer";
document.getElementById("combine").innerHTML = text1 + text2;

document.getElementById("demo").innerHTML = "Hello World!";

document.getElementById('number').innerHTML = 5+7;

var panjang = "berapa panjangnya";

panjangnya = panjang.length;
loop = "";

for(i=1; i<=panjangnya; i++){
	loop += "Ini angka ke " + i + "<br>";
}

document.getElementById("looping").innerHTML = loop;


cari = "Coba cari aku berada di nomor berapa dimana ";

document.getElementById("cari").innerHTML = cari;

document.getElementById("ketemu").innerHTML = cari.indexOf("aku") + " Ya benar sekali~~";


jadiArray = "Coba jadikan aku sebagai array";
sudah = jadiArray.split(" ");
console.log(sudah);

console.log(cari.indexOf("aku"));




function myfunction(){
	document.getElementById('click').innerHTML="Hello its called from function!";
}


var fruits = ['Mangga', 'Apel', 'Jeruk'];



document.getElementById("buah").innerHTML = fruits;
console.log(fruits);

x = fruits.pop(); // delete last array value

console.log(fruits);
console.log(x); //value of array was deleted in the last

y = fruits.push("Duren"); //add new array in the last 
console.log(fruits);
console.log(y); // return jumlah array

var hero = ['Superman', 'Wonder Woman', 'Joker', 'Batman'];

 z = hero.shift(); // sama kaya pop tapi yg dihapus value pertama yaitu superman
console.log(hero);
console.log(z); // return array pertama yg dihapus

xx = hero.unshift("Flash"); // add new array in the begining
console.log(hero);
console.log(xx); // return jumlah array

//array dapat diakses dari index nomornya, contoh
console.log(hero[0]) // return flash

document.getElementById("hero").innerHTML = hero;
function addArray(){
	hero[hero.length] = "Godfall";
	document.getElementById('hero').innerHTML = hero;
}

var cars = ['kijang', 'avanza', 'terios', 'pajero'];
document.getElementById("cars").innerHTML = cars;

function spliceAdd(){
	cars.splice(2,0, 'MOBILIO');
	//splice add mempunya 2 parameter
	//paramater pertama mendefinisikan ditaruh dimana array yg mau ditambahkan
	//parameter kedua menghitung berapa jumlah array yg dihapus
	document.getElementById('cars'). innerHTML=cars;
}

function spliceRemove(){
	/*
	The first parameter (0) defines the position where new elements should be added (spliced in).
	The second parameter (1) defines how many elements should be removed.
	*/
	cars.splice(0, 1);
	document.getElementById("cars").innerHTML = cars;
}

var framework = ['laravel', 'codeigniter', 'symfony', 'yii'];
var frameworkJs = ['Vue', 'react', 'jquery'];
document.getElementById('array1').innerHTML = "<b>"+ framework + "</b>";
document.getElementById('array2').innerHTML = "<b>" + frameworkJs + "</b>";

function concateArray(){
	var gabungArray = framework.concat(frameworkJs);
	document.getElementById("gabungArray").innerHTML = gabungArray;
}
loopArray = "";

for(d=0; d<framework.length; d++){
	loopArray += "ini framework : " + framework[d] + "<br>";
}

document.getElementById('loopArray').innerHTML = loopArray;



</script>

