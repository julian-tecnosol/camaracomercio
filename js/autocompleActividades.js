/**
 * Created by julian on 27/07/15.
 */
function iniciarAutocomplete(){
    var arrIndustrial = [
        {
            value : 1,
            text :"ELABORACION DE PRODUCTOS ALIMENTICIOS"},
        {
            value : 2,
            text :"ELABORACION DE BEBIDAS"},
        {
            value : 3,
            text :"FABRICACION DE PRODUCTOS DE PLASTICO Y CAUCHO"},
        {
            value : 4,
            text :"PRODUCTOS DERIVADOS DEL CUERO"},
        {
            value : 5,
            text :"ELECTRICIDAD Y GAS"},
        {
            value : 6,
            text :"FABRICACION DE PRODUCTOS DE MADERA"},
        {
            value : 7,
            text :"Fabricación de productos refractarios."},
        {
            value : 8,
            text :"Fabricación de materiales de arcilla para la construcción."},
        {
            value : 9,
            text :"Fabricación de otros productos de cerámica y porcelana."},
        {
            value : 10,
            text :"Fabricación de cemento, cal y yeso."},
        {
            value : 11,
            text :"Fabricación de artículos de hormigón, cemento y yeso."},
        {
            value : 12,
            text :"Corte, tallado y acabado de la piedra."},
        {
            value : 13,
            text :"Fabricación de bicicletas y de sillas de ruedas para personas con discapacidad"},
        {
            value : 14,
            text :"Fabricación de muebles, colchones y somieres"},
        {
            value : 15,
            text :"Fabricación de joyas, bisutería y artículos conexos"},
        {
            value : 16,
            text :"Fabricación de instrumentos musicales."},
        {
            value : 17,
            text :"Fabricación de instrumentos, aparatos y materiales médicos y odontológicos (incluido mobiliario)."},
        {
            value : 18,
            text :"FABRICACION DE PRODUCTOS QUIMICOS"},
        {
            value : 19,
            text :"FABRICACION DE PRODUCTOS TEXTILES"},
        {
            value : 20,
            text :"FABRICACION DE PRENDAS DE VESTIR, PREPARADO Y TEÑIDO DE PIELES"},
        {
            value : 21,
            text :"FABRICACION DE PRODUCTOS DE TABACO"},
        {
            value : 22,
            text :"INDUSTRIAS DE FUNDICION"},
        {
            value : 23,
            text :"FABRICACION DE PRODUCTOS ELABORADOS DE METAL, EXCEPTO MAQUINARIA Y EQUIPO"},
        {
            value : 24,
            text :"FABRICACION DE MAQUINARIA Y EQUIPO NCP"},
        {
            value : 25,
            text :"FABRICACION DE MAQUINARIA DE OFICINA, CONTABILIDAD E INFORMATICA"},
        {
            value : 26,
            text :"FABRICACION DE ELEMENTOS ELECTRICOS"},
        {
            value : 27,
            text :"FABRICACION DE EQUIPO Y APARATOS DE RADIO, TELEVISION Y COMUNICACIONES"},
        {
            value : 28,
            text :"FABRICACION DE INSTRUMENTOS MEDICOS, OPTICOS Y DE PRECISION Y FABRICACION DE RELOJES Y JOYAS"},
        {
            value : 29,
            text :"FABRICACION DE VEHICULOS AUTOMOTORES, REMOLQUES Y SEMIRREMOLQUES"},
        {
            value : 30,
            text :"FABRICACION DE OTROS TIPOS DE EQUIPO DE TRANSPORTE"},
        {
            value : 31,
            text :"Fabricación de muebles"},
        {
            value : 32,
            text :"industrias manufactureras ncp"},
        {
            value : 33,
            text :"Fabricación de muebles"},
    ];

    var arrComercial = [
        {
            value :34,
            text : "COMERCIALIZACION DE PRODCUTOS AGROPECUARIOS"},
        {
            value :35,
            text : "COMERCIO AL mayor"},
        {
            value :36,
            text : "COMERCIO AL POR MENOR"},
        {
            value :37,
            text : "COMERCIALZIACION DE MAQUINARIA Y EQUIPO"},
        {
            value :38,
            text : "MATERIALES DE CONSTRUCCION Y OTROS"},
        {
            value :39,
            text : "PRODUCTOS DE USO DOMESTICO"},
        {
            value :40,
            text : "PRODUCTOS INTRMEDIOS NO AGROPECUARIOS"},
        {
            value :41,
            text : "COMERCIALZIACION DE QUIMICOS"},
        {
            value :42,
            text : "TEXTILES(comercio al por mayor de fibras textiles)"},
        {
            value :43,
            text : "COMERCIO, MANTENIMIENTO Y REPARACIÓN DE VEHÍCULOS AUTOMOTORES Y MOTOCICLETAS, SUS PARTES, PIEZAS Y ACCESORIOS"},
        {
            value :45,
            text : "Comercio  de desperdicios, desechos y chatarra"},
        {
            value :46,
            text : "Comercio de combustibles sólidos, líquidos, gaseosos y productos conexos"},
        {
            value :47,
            text : "Comercio al por menor de leche, productos lácteos y huevos, en establecimientos especializados"},
        {
            value :48,
            text : "Comercio al por menor de carnes (incluye aves de corral), productos cárnicos, pescados y productos de mar, en establecimientos especializados"},
        {
            value :49,
            text : "Comercio al por menor de bebidas y productos del tabaco, en establecimientos especializados"},
        {
            value :50,
            text : "Comercio al por menor de computadores, equipos periféricos, programas de informática y equipos de telecomunicaciones en establecimientos especializados"},
        {
            value :51,
            text : "Comercio al por menor de equipos y aparatos de sonido y de video, en establecimientos especializados"},
        {
            value :52,
            text : "Comercio al por menor de artículos de ferretería, pinturas y productos de vidrio en establecimientos especializados"},
        {
            value :53,
            text : "Comercio al por menor de tapices, alfombras y recubrimientos para paredes y pisos en establecimientos especializados"},
        {
            value :54,
            text : "Comercio al por menor de artículos deportivos, en establecimientos especializados"},
        {
            value :55,
            text : "Comercio al por menor de todo tipo de calzado y artículos de cuero y sucedáneos del cuero en establecimientos especializados"},
        {
            value :56,
            text : "Comercio al por menor de productos farmacéuticos y medicinales, cosméticos y artículos de tocador en establecimientos especializados"},
        {
            value :57,
            text : "Comercio al por menor de artículos de segunda mano"},
        { 
            value : 58,
            text : "tiendas"},
        { 
            value : 59,
            text : "revuelterias"}, 
        { 
            value : 60,
            text : "almacenes"}, 
        { 
            value : 61,
            text : "panaderías"},
        { 
            value : 62,
            text : "compraventas"},
        { 
            value : 63,
            text : "misceláneas"},
        { 
            value : 64,
            text : "farmacias"},
        { 
            value : 65,
            text : "restaurantes"},
        { 
            value : 66,
            text : "distribuidores"},
        { 
            value : 67,
            text : "estanquillos"},
        { 
            value : 68,
            text : "billares"},
        { 
            value : 69,
            text : "queseras"}
    ];

    var arrServicios = [
        {
            value :70,
            text : "CONSTRUCCION DE OBRAS DE INGENIERIA CIVIL"},
        {
            value :71,
            text : "ALQUILER DE MAQUINARIA Y EQUIPO"},
        {
            value :72,
            text : "ACTIVIDADES JURIDICAS Y DE CONTABILIDAD, TENEDURIA DE LIBROS Y AUDITORIA"},
        {
            value :73,
            text : "ASESORAMIENTO EN MATERIA DE IMPUESTOS"},
        {
            value :74,
            text : "ESTUDIO DE MERCADOS Y REALIZACION DE ENCUESTAS DE OPINION PUBLICA"},
        {
            value :75,
            text : "ASESORAMIENTO EMPRESARIAL Y EN MATERIA DE GESTION"},
        {
            value :76,
            text : "SERVICIOS DE PUBLICIDAD"},
        {
            value :77,
            text : "ACTIVIDADES EMPRESARIALES NCP"},
        {
            value :78,
            text : "ACTIVIDADES DE ARQUITECTURA E INGENIERIA Y OTRAS ACTIVIDADES TÉCNICAS"},
        {
            value :79,
            text : "ACTIVIDADES DE EDICIÓN"},
        {
            value :80,
            text : "ACTIVIDADES DE IMPRESIÓN"},
        {
            value :81,
            text : "REPRODUCCIÓN DE MATERIALES GRABADOS"},
        {
            value :82,
            text : "SERVICIOS DE CONSTRUCCION"},
        {
            value :83,
            text : "SERVICIOS DE MANTENIMIENTO Y REPARACION DE VEHICULOS Y MAQUINARIA"},
        {
            value :84,
            text : "ALMACENAMIENTO Y DEPOSITO"},
        {
            value :85,
            text : "ACTIVIDADES INMOBILIARIAS REALIZADAS CON BIENES PROPIOS O ARRENDADOS"},
        {
            value :86,
            text : "ACTIVIDADES INMOBILIARIAS REALIZADAS A CAMBIO DE UNA RETRIBUCION O POR CONTRATA"},
        {
            value :87,
            text : "SERVICIOS DE CORREO Y COMUNICACIONES"},
        {
            value :88,
            text : "ACTIVIDADES DE AGENCIAS DE VIAJES Y ORGANIZADORES DE VIAJES;"},
        {
            value :89,
            text : "ACTIVIDADES DE ASISTENCIA A TURISTAS NCP"},
        {
            value :90,
            text : "ACTIVIDADES DE TRANSPORTE"},
        {
            value :91,
            text : "ACTIVIDADES DE SEGURIDAD SOCIAL DE AFILIACION OBLIGATORIA"},
        {
            value :92,
            text : "ACTIVIDADES VETERINARIAS"},
        {
            value :93,
            text : "ACTIVIDADES DE AGENCIAS DE NOTICIAS"},
        {
            value :94,
            text : "ACTIVIDAD FINANCIERA"},
        {
            value :95,
            text : "Servicios de electricidad, gas, vapor y aire acondicionado"},
        {
            value :96,
            text : "Actividades de estaciones, vías y servicios complementarios para el transporte terrestre"},
        {
            value :97,
            text : "Alojamiento rural"},
        {
            value :98,
            text : "Moteles, residencias o amoblados"},
        {
            value :99,
            text : "Expendio de comidas preparadas en cafeterías"},
        {
            value :100,
            text : "casas de banquetes"},
        {
            value :101,
            text : "Expendio de bebidas alcohólicas para el consumo dentro del establecimiento"},
        {
            value :102,
            text : "Actividades de las cooperativas financieras"},
        {
            value :103,
            text : "Seguros generales"},
        {
            value :104,
            text : "Actividades de fotografía"},
        {
            value :105,
            text : "ACTIVIDADES DE ALQUILER Y ARRENDAMIENTO"},
        {
            value :106,
            text : "ACTIVIDADES DE SERVICIOS A EDIFICIOS Y PAISAJISMO (JARDINES, ZONAS VERDES"},
        {
            value :107,
            text : "Actividades de envase y empaque"},
        {
            value :108,
            text : "Orden público y actividades de seguridad"},
        {
            value :109,
            text : "Educación de la primera infancia, preescolar y básica primaria"},
        {
            value :110,
            text : "Educación básica secundaria"},
        {
            value :111,
            text : "Educación media académica"},
        {
            value :112,
            text : "Educación media técnica y de formación laboral"},
        {
            value :113,
            text : "Establecimientos que combinan diferentes niveles de educación"},
        {
            value :114,
            text : "Educación técnica profesional"},
        {
            value :115,
            text : "Educación tecnológica"},
        {
            value :116,
            text : "Educación de universidades"},
        {
            value :117,
            text : "Enseñanza cultural"},
        {
            value :118,
            text : "ACTIVIDADES DE ATENCIÓN DE LA SALUD HUMANA"},
        {
            value :119,
            text : "Actividades de práctica médica y odontológica, sin internación"},
        {
            value :120,
            text : "Actividades de atención en instituciones para el cuidado de personas mayores y/o discapacitadas"},
        {
            value :121,
            text : "ACTIVIDADES DE JUEGOS DE AZAR Y APUESTAS"},
        {
            value :122,
            text : "ACTIVIDADES DEPORTIVAS Y ACTIVIDADES RECREATIVAS Y DE ESPARCIMIENTO"},
        {
            value :123,
            text : "Actividades de clubes deportivos"},
        {
            value :124,
            text : "Actividades de sindicatos de empleados"},
        {
            value :125,
            text : "MANTENIMIENTO Y REPARACIÓN DE COMPUTADORES, EFECTOS PERSONALES Y ENSERES DOMÉSTICOS"},
        {   
            value : 126,
            text : "peluquerías"},
        { 
            value : 127,
            text : "reparaciones"},
        { 
            value : 128,
            text : "laboratorios"},
        { 
            value : 129,
            text : "correspondencia"},
        { 
            value : 130,
            text : "hoteles"},
    ];


    $("#tipoDeActividad").change(function (event) {
        var valueChange = $(this).find("option:selected").val();
        var segundoSelect = $("#nameActividad");
        var codeHTML = '<option value=""></option>';
        var i = 0;

        if(valueChange == 3){
            for(i; i < arrIndustrial.length; i++){
                codeHTML += '<option value='+arrIndustrial[i].value+'>';
                codeHTML += arrIndustrial[i].text;
                codeHTML += '</option>';
            }
        }else if(valueChange == 2){
            for(i ; i < arrComercial.length; i++){
                codeHTML += '<option value='+arrComercial[i].value+'>';
                codeHTML += arrComercial[i].text;
                codeHTML += '</option>';
            }
        }else if(valueChange == 1){
            for(i ; i < arrServicios.length; i++){
                codeHTML += '<option value='+arrServicios[i].value+'>';
                codeHTML += arrServicios[i].text;
                codeHTML += '</option>';
            }
        }
        segundoSelect.html(codeHTML);
    });
}

$(document).ready(iniciarAutocomplete);