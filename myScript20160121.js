telkH = 6;
karH = 11;
kamH = 15;


telkV1 = 0;
karV1 = 0;
kamV1 = 0;

kokku1 = 0;
teenList1 = " ";

var kurssSek = 1.455;
var kokku1Sek = 0;
var kokku1SekYm = 0;

var tekst = "";
var tekst1 = "t";


document.getElementById("telkH1").innerHTML = telkH;
document.getElementById("karH1").innerHTML = karH;

/*Sündmuste päevad*/
var viimsiPaev = new Date();
viimsiPaev.setFullYear(2015, 09, 11);
document.getElementById("viimsiPaev").innerHTML = viimsiPaev;
var vanamoisaPaev = new Date();
vanamoisaPaev.setFullYear(2016, 07, 11);
document.getElementById("vanamoisaPaev").innerHTML = vanamoisaPaev;
var sakuPaev = new Date();
sakuPaev.setFullYear(2016, 00, 16);
document.getElementById("sakuPaev").innerHTML = sakuPaev;

function myFunction(lisatav) {    
  
    var kogus = Number( document.getElementById('telKogus').value );
    kokku1 = kokku1 + (lisatav*kogus);
    
    document.getElementById("kokku").innerHTML = kokku1;
    
    telkV1 = kogus;
    document.getElementById("telkV").innerHTML = telkV1;

    teenList1 = "Telkimine (" + telkV1 + "),";
    document.getElementById("teenList").innerHTML = teenList1;

    document.getElementById("kokku2").innerHTML = kokku1;
    kokku1Sek = kokku1 * kurssSek;
    kokku1SekYm = kokku1Sek.toFixed(2); //väljastab ümard
    document.getElementById("kokku2SekYm").innerHTML = Math.floor(kokku1SekYm);//ümardab kliendi kasuks
//uue rea lisamine
	var rida = document.createElement('tr');
	
	var tdNimetus = document.createElement('td');
	var tdKogus = document.createElement('td');
	var tdTegevused = document.createElement('td');
	
	tdNimetus.textContent = "Telkimine";
	tdKogus.textContent = kogus;
	
	var kustutaNupp = document.createElement('input');
	kustutaNupp.setAttribute('type', 'button');
	kustutaNupp.value='Kustuta rida';
	tdTegevused.appendChild(kustutaNupp);	
	// <tr><td>Külmkapp</td>
	rida.appendChild(tdNimetus);
	rida.appendChild(tdKogus);
	rida.appendChild(tdTegevused);
	
	// <tbody><tr><td>Külmkapp</td></tr></tbody>
	document.querySelector('#ladu tbody').appendChild(rida);

	kustutaNupp.addEventListener('click', function(event){
		if (confirm('Kas oled kindel') ) {
			rida.parentNode.removeChild(rida);	
		}
		//var tekst = prompt('Sisesta tekst', 'Vaikimisi tekst');		
	});

    

}
function karFunction(lisatav) {    
  
 
    kokku1 = kokku1 + lisatav;
    
    document.getElementById("kokku").innerHTML = kokku1;
    
    karV1 = karV1 + 1;
    document.getElementById("karV").innerHTML = karV1;
    teenList1 = teenList1 + "Karavan, ";
    document.getElementById("teenList").innerHTML = teenList1;
    document.getElementById("kokku2").innerHTML = kokku1;
    kokku1Sek = kokku1 * kurssSek;
    kokku1SekYm = kokku1Sek.toFixed(2); //väljastab ümard
    document.getElementById("kokku2SekYm").innerHTML = Math.floor(kokku1SekYm);

}
function kamFunction() {    
 
    var nimetus;
    var sel_user;
    var user_input;
    user_input = document.example.nimetus.options[document.example.nimetus.selectedIndex].value
    
    
 
   

    sel_user = user_input;
    /*document.getElementById("sel1").innerHTML = sel; */
    document.getElementById("sel1").innerHTML = sel_user;
    /*sel = document.getElementById("sel").length;*/
    /*var selection;*/
    /*selection = 2;*/
    if (sel_user == "Telkimine, hind 6 eur") {
	    lisatav = 6;
    } else if (sel_user == "tei") {
            lisatav = 20;
    } else if (sel_user == "kol") {
            lisatav = 30;
    } else if (sel_user == "nel") {
            lisatav = 40;
    } else if (sel_user == "vii") {
            lisatav = 50;  
    } else if (sel_user == "kuu") {
            lisatav = 60;   
    } else  {
	    lisatav = 70;
    }
    document.getElementById("sel1").innerHTML = sel;    
    kokku1 = kokku1 + lisatav;
    
    document.getElementById("kokku").innerHTML = kokku1;
    
    kamV1 = kamV1 + 1;
    document.getElementById("kamV").innerHTML = kamV1;
    teenList1 = teenList1 + "Kämping ";
    document.getElementById("teenList").innerHTML = teenList1;
    document.getElementById("kokku2").innerHTML = kokku1;
    kokku1Sek = kokku1 * kurssSek;
    kokku1SekYm = kokku1Sek.toFixed(2); //väljastab ümard
    document.getElementById("kokku2SekYm").innerHTML = Math.floor(kokku1SekYm);
    

}
function tyhistaFunction(tyhistatav) {    
  
 
    kokku1 = kokku1 - (tyhistatav*telkV1);
    document.getElementById("kokku").innerHTML = kokku1;
    telkV1 = 0;
    document.getElementById("telkV").innerHTML = telkV1
    document.getElementById("kokku2").innerHTML = kokku1;
    kokku1Sek = kokku1 * kurssSek;
    kokku1SekYm = kokku1Sek.toFixed(2); //väljastab ümard
    document.getElementById("kokku2SekYm").innerHTML = Math.floor(kokku1SekYm);
    
    
    teenList1 = teenList1.replace(/Telkimine/g, "");
    document.getElementById("teenList").innerHTML = teenList1;

}
function tyhistaKarFunction(tyhistatav) {    
  
 
    kokku1 = kokku1 - (tyhistatav*karV1);
    document.getElementById("kokku").innerHTML = kokku1;
    karV1 = 0;
    document.getElementById("karV").innerHTML = karV1
    document.getElementById("kokku2").innerHTML = kokku1;
    kokku1Sek = kokku1 * kurssSek;
    kokku1SekYm = kokku1Sek.toFixed(2); //väljastab ümard
    document.getElementById("kokku2SekYm").innerHTML = Math.floor(kokku1SekYm);

    teenList1 = teenList1.replace(/Karavan, /g, "");
    document.getElementById("teenList").innerHTML = teenList1;

}
function tyhistaKamFunction(tyhistatav) {    
  
 
    kokku1 = kokku1 - (tyhistatav*kamV1);
    document.getElementById("kokku").innerHTML = kokku1;
    kamV1 = 0;
    document.getElementById("kamV").innerHTML = kamV1
    document.getElementById("kokku2").innerHTML = kokku1;
    kokku1Sek = kokku1 * kurssSek;
    kokku1SekYm = kokku1Sek.toFixed(2); //väljastab ümard
    document.getElementById("kokku2SekYm").innerHTML = Math.floor(kokku1SekYm);

    teenList1 = teenList1.replace(/Kämping, /g, "");
    document.getElementById("teenList").innerHTML = teenList1;

}

function displayDate() {
    var d = Date();
    var d1 = new Date();
    var months = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Okt","Nov","Dec"];
    document.getElementById("kuupaev").innerHTML = d1.getDate() +
    "-" + months[d1.getMonth()] + "-" + d1.getFullYear();
    d1.setDate(d1.getDate() + 10);
    document.getElementById("kuup3").innerHTML = d1.getDate() +
    "-" + months[d1.getMonth()] + "-" + d1.getFullYear();   
}
function vordleDate() {
    
    var today, text;
    today = new Date();


    if (viimsiPaev > today) {
       text = "Uus";
    } else {
       text = "Vana";
    }
    document.getElementById("staatusViimsi").innerHTML = text;

    if (vanamoisaPaev > today) {
       text = "Uus";
    } else {
       text = "Vana";
    }
    document.getElementById("staatusVanamoisa").innerHTML = text;
    
    if (sakuPaev > today) {
       text = "Uus";
    } else {
       text = "Vana";
    }
    document.getElementById("staatusSaku").innerHTML = text;
}