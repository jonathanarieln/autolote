//MIS JAVASCRIPR SOLO PARA EL FORM CON VARIOS PASOS

  //variable para el radio button
  var person = document.getElementById('radioPerson');

  // Declaramos las variables de los circulos que indican el paso actual...
  var step1 = document.getElementById('step1');
  var step2 = document.getElementById('step2');
  var step3 = document.getElementById('step3');


  //declaramos las variables para cada tab
  var tab1 = document.getElementById('tab1');
  var tab2 = document.getElementById('tab2');
  var tab3 = document.getElementById('tab3');

  //declaramos todos los labels
  var label_first_name = document.getElementById('label_first_name');
  var label_surname = document.getElementById('label_surname');
  var label_birthdate = document.getElementById('label_birtdate');
  var label_phone_number = document.getElementById('label_phone_number');
  var label_gender = document.getElementById('label_gender');
  var label_identification_number = document.getElementById('label_identification_number');
  var label_RTN_natural = document.getElementById('label_RTN_natural');
  var label_legal_name = document.getElementById('label_legal_name');
  var label_contact_number = document.getElementById('label_contact_number');
  var label_contact_phone_number = document.getElementById('label_contact_phone_number');
  var label_RTN_juridico = document.getElementById('label_RTN_juridico');

  //Ponemos la opacity del step1 activa
  if(step1!=null){
    step1.className+=" active";
  }

function siguienteTab1() {

    if(person.checked){
        tab1.style.display = "none";
        tab2.style.display = "inline";
        step2.className+=" active";
    }else{
        tab1.style.display = "none";
        tab3.style.display = "inline";
        step2.className+=" active";
    };
 }

 function siguienteTab2() {
     if(person.checked){
         label_legal_name.innerHTML='';
         label_contact_number.innerHTML='';
         label_contact_phone_number.innerHTML='';
         label_RTN_juridico.innerHTML='';
         label_first_name.innerHTML='Nombres: '+document.getElementById('first_name').value;
         label_surname.innerHTML='Apellidos: '+document.getElementById('surname').value;
         label_birthdate.innerHTML='Fecha de Nacimiento: '+document.getElementById('birthdate').value;
         label_phone_number.innerHTML='Numero Telefonico: '+document.getElementById('phone_number').value;
         var gender = document.querySelector('input[name="gender_id"]:checked').value;
         if(gender==1){
           gender="Masculino";
         }
         if(gender==2){
           gender="Femenino";
         }
         if(gender==1){
           gender="Otro";
         }
         label_gender.innerHTML='Genero: '+gender;
         label_identification_number.innerHTML='Numero de Identidad: '+document.getElementById('identification_number').value;
         label_RTN_natural.innerHTML='RTN: '+document.getElementById('RTN_natural').value;

         tab1.style.display = "none";
         tab2.style.display = "none";
         tab4.style.display = "inline";
         step3.className+=" active";
     }else{
         label_legal_name.innerHTML='Nombre Empresa:'+document.getElementById("legal_name").value;
         label_contact_number.innerHTML='Nombre Contacto:'+document.getElementById("contact_name").value;
         label_contact_phone_number.innerHTML='Numero Contacto:'+document.getElementById("contact_phone_number").value;
         label_RTN_juridico.innerHTML='RTN:'+document.getElementById("RTN_juridico").value;
         tab1.style.display = "none";
         tab3.style.display = "none";
         tab4.style.display = "inline";
         step3.className+=" active";
     };
  }

function tab2natural(){
  person.checked = true;
  tab1.style.display = "none";
  tab2.style.display = "inline";
  tab4.style.display = "none";
  step1.className="step";
  step2.className="step active";
  step3.className="step";
}

function tab2legal(){
  person.checked = false;
  tab1.style.display = "none";
  tab3.style.display = "inline";
  tab4.style.display = "none";
  step1.className="step";
  step2.className="step active";
  step3.className="step";
}

 function volverTab1() {
   tab1.style.display = "inline";
   tab2.style.display = "none";
   tab3.style.display = "none";
   step2.className="step";
 }

 function volverTab2() {
   if(person.checked){
       tab1.style.display = "none";
       tab2.style.display = "inline";
       tab4.style.display = "none";
       step3.className+="step";
   }else{
       tab1.style.display = "none";
       tab3.style.display = "inline";
       tab4.style.display = "none";
       step3.className+="step";
   };
 }


 //GENERACION DE PDF

 function generateCarsPdf() {
  var doc = new jsPDF('landscape');
  doc.autoTable({html: '#idTableCars'});
  doc.save("reporteVehiculos.pdf");
}

//GENERACION DE PDF

function generateSalesPdf() {
 var doc = new jsPDF('landscape');
 doc.autoTable({html: '#idSalesTable'});
 doc.save("reporteVentas.pdf");
}