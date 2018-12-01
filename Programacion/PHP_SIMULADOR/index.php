
<html>
    <head>
        <title>SIMULADOR DE PRÉSTAMOS</title>
        <h1 style="text-align: center">SIMULADOR DE PRÉSTAMOS</h1>
        <script>  
            function validar(e,punto) {
                tecla=(document.all) ? e.keyCode : e.which;
                 if(tecla<48 || tecla>57){
                  if(punto && (tecla==46 || tecla==44)){
                return true;
                }
            return false
            }
        }     
                    function calcula(){
             
            f=document.forms[0];
            plazo = 12;
            /*plazo=(f.plazo[0].checked)?f.plazo[0].value:f.plazo[1].value; */
             
            interesMensual=parseFloat(f.intereses.value)/parseInt(plazo);
             
            pagoTotal=parseFloat(f.capital.value)+parseFloat(f.capital.value*f.cuotas.value*interesMensual/100);
             
            codigo="<table>";
            codigo+="<tr>";
            codigo+="<td colspan=5>CRONOGRAMA DE PRÉSTAMOS</td>"
            codigo+="</tr>"
            codigo+="<tr>"
            codigo+="<td>Cuota nº</td>";
            codigo+="<td>Cuota</td>";
            codigo+="<td>Amortización</td>";
            codigo+="<td>Interes</td>";
            codigo+="<td>Falta por pagar</td>";
             
            falta=pagoTotal;
            cuotaTotal=0;
            amortizacionTotal=0;
            interesesTotal=0;
             
            for(a=1;a<=f.cuotas.value;a++){
             
            cuota=Math.ceil(pagoTotal/f.cuotas.value*100)/100;
            cuotaTotal+=cuota;
            amortizacion=parseInt(f.capital.value/f.cuotas.value*100)/100;
            amortizacionTotal+=amortizacion;
            interes=parseInt(100*(cuota-amortizacion))/100;
            interesesTotal+=interes;
            falta=parseInt(100*(falta-cuota))/100;
             
            codigo+="<tr>";
            codigo+="<td>"+a+"</td>";
            codigo+="<td>";
            if(a==f.cuotas.value){cuota=parseInt(100*(cuota+falta))/100;falta=0}
            codigo+=cuota
            codigo+="</td>";
            codigo+="<td>";
            codigo+=amortizacion
            codigo+="</td>";
            codigo+="<td>";
            codigo+=interes;
            codigo+="</td>";
            codigo+="<td>";
            codigo+=falta;
            codigo+="</td>";
            codigo+="</tr>";


            }
            codigo+="<tr>";
            codigo+="<td> Su Total es:";            
            codigo+="</td>";
            codigo+="<td>";
            codigo+=cuotaTotal
            codigo+="</td>";
            codigo+="<td>";
            codigo+=amortizacionTotal
            codigo+="</td>";
            codigo+="<td>";
            codigo+=interesesTotal
            codigo+="</td>";
            codigo+="<td> ----";            
            codigo+="</td>";
            codigo+="</tr>";

            codigo+="</table>";
            pepe.innerHTML=codigo;
            }
            function desenfoque(esto){
            esto.value=esto.value.split(',').join('.');
            if(isNaN(esto.value)||esto.value<0){
            esto.value=''
            }
        }
    </script>
     
        <style>
        input.texto{font:normal 10px/10px verdana;
        border:solid 3px lightblue;
        text-align:right;
        /*position:absolute;*/
        /*left:100px;*/
        padding:2px 2px 2px 2px;
        }
        table, td{
        font-size:24px; 
        border:solid 4px lightblue;
        text-align:center;
        left:auto;
        padding:5px 30px;
        margin-left:200px;
        margin-top:50px;
        }

        table{
            padding: 5px;
        }
        input#calcular{
            font-size: 24px;
            padding: 3px 12px;
            background-color: lightgreen; 
        border:solid 1px black;
        border-radius: 5px;
        margin-top: 25px;
        margin-left:600px;
        text-align:center;
        }
        .date{
            font-size: 20px;
            text-align: center;
        }
        form{
            font:normal 10px/20px verdana;            
        }
        </style>
    </head>
 
<body>
<div id="tablero">
        <label class="date" style="font-size: 24px;color:#31597D; font-weight: 600;margin-left:33%;
margin-top:25px">
            <?php 
            date_default_timezone_set("America/Lima");
                echo " Fecha : ".date("d/m/Y")."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"."&nbsp;"." Hora : ".date("H:i a");
             ?>
        </label>
        
<form action="javascript:calcula(this.form)">
<label id="capital" style="font-size: 18px;color:#31597D; font-weight: 600;margin-left: 500px;
margin-top:100px">CAPITAL:</label>
<input class="texto" style="font-size:16px;padding:2px 8px;margin-bottom: 8px;margin-left: 25px;margin-top:30px" type="text" name="capital" value="0" size="10" maxlength="6" 
onkeypress="return validar(event,true)" onBlur="desenfoque(this)"
onFocus="if(this.value==0){this.value=''}"><br>
 
<label id="intereses" style="font-size: 18px;color:#31597D; font-weight: 600;margin-left: 500px;
margin-top:25px">INTERES:</label>
<select name="intereses" id="intereses" style="padding: 2px 5px;font-size:16px;padding:2px 8px;margin-bottom: 8px;margin-left: 25px">
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
    <option value="11">11</option>
  </select> %<br>

<label id="cuotas" style="font-size: 18px;
color:#31597D; 
font-weight: 600;
margin-left: 500px;
margin-top:25px">Nª CUOTAS:</label>
<input class="texto" style="padding:2px 8px;font-size:16px;margin-bottom: 8px" onkeypress="return validar(event)" type="text" id="cuotas" name="cuotas" value="0" size="5"
maxlength="2" onBlur="desenfoque(this)" onFocus="if(this.value==0){this.value=''}"><br>
 
 
<input type="submit" name="calcular" id="calcular" value="Calcular">
</form>
</div>
<div id="pepe">
    
</div>
    
</body>
</html>