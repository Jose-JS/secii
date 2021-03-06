<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../vendor/autoload.php');

use Luecano\NumeroALetras\NumeroALetras;

require_once('../lib/tcpdf/config/lang/spa.php');
require_once('../lib/tcpdf/tcpdf.php');
//require_once('conexion2.php');	
include('../includes/config.php');
setlocale(LC_ALL, "es_ES");
$eid = intval($_GET['empid']);
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF
{

    //Page header
    public function Header()
    {
        //background
        //$img_file2 = K_PATH_IMAGES . 'logof.png';
        //$this->Image($img_file2, 40, 80, 125, 148.5, '', '', '', false, 300, '', false, false, 0);

        // Logo
        //$image_file = K_PATH_IMAGES . 'logo.png';
        //$this->Image($image_file, 10, 10, 30, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        //$this->SetFont('helvetica', 'b', 18);
        // Title
        //$this->Cell(0, 10, 'CONTRATO LABORAL', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
        //$this->Cell(0, 2, '', 0, 2, 'C', 0, '', 0, false, 'M', 'M');
        //$this->Cell(0, 8, 'INFORMACION PERSONAL', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', '', 8);
        // Page number
        // $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');


    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$sql = "SELECT * FROM tblemployees where id='$eid' ";
$query = $dbh->prepare($sql);
$dbh->exec('SET CHARACTER SET utf8');
$query->execute();
$cnt = 1;
if ($query->rowCount() > 0) {
    foreach ($query as $result) {
        $fechadealta = $result['fechini'];
        $fechaEntera = strtotime($fechadealta);
        $anio = date("Y", $fechaEntera);
        $mes = date("m", $fechaEntera);
        $dia = date("d", $fechaEntera);
        $company = $result['company'];
        $puesto = $result['Department'];
        $name = $result['name'];
        $firstname = $result['FirstName'];
        $lastname = $result['LastName'];
        $lugarnacimiento = $result['placebirth'];
        $edad = $result['age'];
        $fechanacimiento = $result['Dob'];
        $rfc = $result['rfc'];
        $curp = $result['curp'];
        $imss = $result['imss'];
        $infonavit = $result['infonavit'];
        $infonavitmon = $result['infonavitmon'];
        $fonacot = $result['fonacot'];
        $fonacotmon = $result['fonacotmon'];
        $sexo = $result['Gender'];
        $estadocivil = $result['marital'];
        $calle = $result['Address'];
        $colonia = $result['suburb'];
        $municipio = $result['City'];
        $estado = $result['Country'];
        $cp = $result['cp'];
        $email = $result['EmailId'];
        $telefono = $result['Phonenumber'];
        $banco = $result['banco'];
        $nocuenta = $result['nocuenta'];
        $clabeint = $result['clabeint'];
        $sueldonet = $result['sueldonet'];
        $services = $result['assignedservice'];
        $sueldodiario = $result['sueldodiario'];
        $vigencia = $_GET['vigencia'];
        if ($sueldodiario == null) {
            $formatter = new NumeroALetras();
            $formatter->conector = 'PESOS';
            $r = $formatter->toInvoice(0, 2, 'M.N.');
        } else {
            $formatter = new NumeroALetras();
            $formatter->conector = 'PESOS';
            $r = $formatter->toInvoice($sueldodiario, 2, 'M.N.');
        }
        if ($company == "ASLO SEGURIDAD PRIVADA S.A. DE C.V.") {
            $company1 = "ASP190426G16";
        }
        if ($company == "OISME S.A. DE C.V.") {
            $company1 = "OIS171025V66";
        }
        if ($company == "OIFSI S.A. DE C.V.") {
            $company1 = "OIF180518724";
        }
        if ($company == "APROSEMEX S.A. DE C.V.") {
            $company1 = "APR1611042KA";
        }
        $content = '';

        $content .= '<body>';

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('JJSH');
        $pdf->SetTitle('CONTRATO LABORAL');
        $pdf->SetSubject('CONTRATO LABORAL');
        $pdf->SetKeywords('TCPDF, PDF, CONTRATO LABORAL');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

        // set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, 1.5, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set font
        $pdf->SetFont('helvetica', '', 11);

        // add a page
        $pdf->addPage();

        // set some text to print

        $content .= '<section>';
        $content .= '<b>';
        $content .= '
        <p align="center">CONTRATO INDIVIDUAL DE TRABAJO        <br></p>
        <p align="justify">CONTRATO INDIVIDUAL DE TRABAJO POR TIEMPO  ' . $vigencia . ' QUE CELEBRAN POR UNA PARTE ' . $company . ' QUIEN EN LO SUCESIVO Y PARA
        LOS EFECTOS DE ESTE CONTRATO SE DESIGNARA COMO EL ???PATRON",
        REPRESENTADA POR EL LIC. KAREN GUTI??RREZ CASTA??EDA Y POR LA
        OTRA EL C. ' . $name . ' ' . $firstname . ' ' . $lastname . ', POR SU PROPIO DERECHO, A
        QUIEN EN LO SUCESIVO SE LE DESIGNARA COMO EL ???TRABAJADOR???, MISMOS
        QUE SE SUJETAN A LAS SIGUIENTES DECLARACIONES Y CL??USULAS:</p>


        <p align="center">D E C L A R A C I O N E S<br>
        <right>I. EL ???PATR??N??? A TRAV??S DE SU REPRESENTANTE LEGAL DECLARA:</b></right></p>
        <p align="justify">a) Ser una sociedad mercantil legalmente constituida y tener principalmente como
        objeto social, entre otras, la prestaci??n de servicios de seguridad, protecci??n y
        custodia de personas, dinero, materiales, materias primas en general, sistemas y
        equipos de c??mputo, bienes e inmuebles en general.</p>
        
        <p align="justify">b) Tener su domicilio en: Calle Piracantos 87, Manzana 109, Colonia San Mateo Xoloc,
        Tepotzotl??n, Estado de M??xico, C.P. 54600, con RFC: ' . $company1 . '.</p>

        <p align="justify">c) Que requiere los servicios del <b>TRABAJADOR</b> para desempe??ar las funciones de <b>' . $puesto . '</b>, las cuales se detallan y describen en el <b>Anexo ???A???</b>, y en
        general todas las que sean similares, conexas y que le sean asignadas por el
        <b>PATR??N</b>, sus filiales, afiliadas o subsidiarias. </p>

        <p align="justify">d) Que de acuerdo al objeto social del <b>PATR??N</b>, la prestaci??n del servicio que ofrece
        a sus clientes, entre otros, es el de Servicios de Seguridad Privada, para lo cual el
        TRABAJADOR para efectos del puesto a contratar y funciones a desempe??ar, ser??
        denominado como ???T??cnico Especialista en Seguridad Integral??? o sus siglas <b>???TESI???</b>.</p>

        <p align="justify">e) Que el servicio que proporciona a sus clientes a trav??s del personal contratado para
        tales efectos, es de diversas modalidades:
        </p>

        <p align="justify">
              i. A proporcionar el Servicio de <B>Seguridad Privada Intramuros</B>
         (Denominaci??n del servicio a nivel Federal) o bien, su denominaci??n de
         servicio de <B>Seguridad Privada y Protecci??n a Inmuebles</B> (denominaci??n
         del servicio para el Distrito Federal, hoy Ciudad de M??xico),
         </p>
         <p align="justify">
         <B>ii. Servicios de monitoreo electr??nico</B>.
        </p>
        <p align="justify"><B>II. POR SU PARTE, ???EL TRABAJADOR??? DECLARA:</B><br>

        a) Llamarse como ha quedado escrito en el proemio del presente Contrato y
ratificado mediante el <B>Anexo ???A???</B>, el cual forma parte integrante del mismo.<BR>
b) Ser de nacionalidad MEXICANA.<BR>
c) Tener <b>' . $edad . '</b> a??os de edad en virtud de haber nacido en la fecha de <b>' . $fechanacimiento . '</b>; 
con RFC: <b>' . $rfc . '</b>; clave CURP: <b>' . $curp . '</b> y n??mero de Seguridad Social: <b>' . $imss . '</b>.<BR>
d) Ser de sexo <b>' . $sexo . '</b>.<BR>
e) Estado civil <b>' . $estadocivil . '</b>.<BR>
f) Que tiene su domicilio en: <b>' . $calle . ' ' . $colonia . ' ' . $municipio . ' ' . $estado . ' ' . $cp . '</b>; domicilio que el
<B>TRABAJADOR</B> proporciona al <b>PATR??N</b> para todos los efectos legales a que
haya lugar y espec??ficamente para lo se??alado en la parte final del art??culo 47 de
la Ley Federal del Trabajo, manifestando que este domicilio es donde habita y <br>se??ala para recibir todo tipo de notificaciones o avisos por parte del <B>PATR??N</B> o
cualquier Autoridad.</p><br>
        <p align="justify">g) Que es su obligaci??n notificar por escrito al <B>PATR??N</B> cualquier cambio de
        domicilio, ya que, de no hacerlo, subsistir?? el que aqu?? se se??ala para todos los
        efectos legales a que haya lugar.</p>

        <p align="justify">h) Que no presta servicios subordinados o independientes en la actualidad para
        ninguna otra negociaci??n, ni recibe percepci??n alguna de otra empresa o
        persona f??sica, ni honorarios, ni por ning??n otro concepto.</p>

        <p align="justify">i) Que posee la experiencia, capacidad f??sica y mental necesarias para realizar las
        actividades y funciones que requiere el <B>PATR??N</B>, sus filiales, afiliadas o
        subsidiarias, para el puesto que es contratado.</p>

        <p align="justify">j) Que no tiene enfermedad o incapacidad que le imposibilite desempe??ar el
        trabajo mencionado, derivadas de un estado patol??gico o de cualquier otra
        ??ndole ya sea permanente, parcial o transitorio, no ser adicto al consumo de
        drogas, sustancias psicotr??picas y/o enervantes o bebidas alcoh??licas.</p>

        <p align="justify">k) Que de acuerdo a la fracci??n X del art??culo 25 de la Ley Federal del Trabajo y
        para efectos del art??culo 501 de la citada Ley, designar?? en el documento
        denominado como <B>Anexo ???B???</B> que, una vez firmado por el <B>TRABAJADOR</B>
        forma parte integrante del presente Contrato, y en ??l designar?? a un beneficiario
        para el pago de las prestaciones y salarios devengados y no cobrados, en caso
        de muerte o desaparici??n derivada de un acto delincuencial.</p>
        ';


        $content .= '
        
        <p align="justify"><B>III. LAS PARTES DECLARAN:</B><BR></p>
        <p align="justify">Que se reconocen expresamente la personalidad jur??dica con que se ostentan, est??n
        conscientes y conformes con las declaraciones que anteceden para todos los efectos
        legales a que haya lugar, en tal virtud, ambas partes convienen las siguientes:</p>
        
        <p align="center"><B>C L ?? U S U L A S:</B></p>
        <p align="justify"><B>PRIMERA. FUNCIONES DEL TRABAJADOR.</B></p>
        <p align="justify">
        El <B>TRABAJADOR</B> se obliga a desempe??ar las labores que han quedado descritas en el
        inciso <B>C)</B> de la declaraci??n primera <B>(I)</B>, y bajo la subordinaci??n del <B>PATR??N</B>,
        desempe????ndolas bajo la direcci??n y dependencia de esta, oblig??ndose a realizar todas
        aquellas labores que est??n relacionadas con dicha actividad, sin perjuicio de otras similares
        que se le encomienden.</p>
        <p align="justify"></p>El <b>TRABAJADOR</b> manifiesta que est?? de acuerdo en que el <b>PATR??N</b> podr??, en cualquier
tiempo, pedir que lleve a cabo trabajos o proyectos espec??ficos, por el tiempo que sea
necesario, para los establecimientos, inmuebles, instituciones financieras, empresas,
sucursales, industrias, comercios y oficinas del <b>PATR??N</b> o de sus Clientes a las que les
preste Servicio, o con las que se tenga relaciones comerciales, pero ser?? siempre por
cuenta y orden del <b>PATR??N</b>, quien ser?? el ??nico responsable de la relaci??n laboral.</p>

<p align="justify">El <b>TRABAJADOR</b> queda obligado a llevar a cabo sus funciones con la mayor intensidad,
cuidado y esmero posible, as?? como a realizar todo esfuerzo material e intelectual necesario
a fin de facilitar las operaciones, procedimientos, pol??ticas o niveles de productividad y
eficiencia, acorde a las necesidades del <b>PATR??N</b>. Estas labores nunca estar??n sujetas a
desempe??arse en una ??rea determinada o actividades en forma restringida, sino al manejo, uso y 
atenci??n de cuantos utensilios, maquinas, labores o funciones que sea posible realizar por el TRABAJADOR.</p>
        </section>
        
        
        ';

        $content .= '<section>
        
        <p align="justify">En el supuesto de que el <b>TRABAJADOR</b> tenga personal a su servicio, estar?? obligado a
        vigilar que el mismo, cumpla con todas las instrucciones, pol??ticas, protocolos, c??digos de
        conducta, reglamentos o manuales que les sean aplicables para sus funciones.</p>

        <p align="justify"><b>SEGUNDA. LUGAR DE PRESTACI??N DE LOS SERVICIOS.</b></p>

        <p align="justify">Los servicios a desarrollar en los t??rminos del presente contrato, los desempe??ar?? el
        <b>TRABAJADOR</b> en el lugar o lugares que le se??ale el <b>PATR??N</b>, o en cualquiera de las
        diversas oficinas, inmuebles, establecimientos, plantas, sucursales y bodegas que le sean
        se??alados dentro de la Rep??blica Mexicana o en donde el <b>PATR??N</b> tenga o pudiera llegar
        a tener filiales, afiliadas o subsidiarias y/o los domicilios de los Clientes.</p>

        <p align="justify">El <b>TRABAJADOR</b> otorga su consentimiento expreso y manifiesta estar de acuerdo para
        ser cambiado de oficinas, inmuebles, establecimientos, plantas, sucursales y bodegas
        dentro de la Rep??blica Mexicana donde se requieran sus servicios, o en donde el PATR??N
        realice actividades o tenga operaciones en sus domicilios o en los domicilios de las
        empresas o entidades a las que se les preste servicio, pero siempre ser??n por orden y
        cuenta del <b>PATR??N</b>, ello sin menoscabo de sus percepciones o dignidad.
       </p>        

       <p align="justify"><b>TERCERA. MONTO DEL SALARIO Y FORMA DE PAGO.</b></p>
        
       <p align="justify">Las partes acuerdan que el <b>TRABAJADOR</b> percibir?? como contraprestaci??n a sus
       servicios, un salario diario de <b> $' . $sueldodiario . ' (' . $r . ')</b> el pago del
       salario se realizar?? quincenalmente, pagaderos los d??as 15 y ??ltimo d??a de cada mes, en
       moneda de curso legal en el domicilio del <b>PATR??N</b> o mediante dep??sito bancario,
       transferencia o cualquier otro medio electr??nico en la cuenta de cheque o tarjeta de d??bito
       que el <b>TRABAJADOR</b> y el <b>PATR??N</b> convengan, en t??rminos del art??culo 101 de la Ley
       Federal del Trabajo, para lo cual el TRABAJADOR en este acto otorga su consentimiento
       expreso respecto a estas formas de pago alternativo.</p>

       <p align="justify">El <b>TRABAJADOR</b> reconoce y acepta que el simple deposito o transferencia ante la
       Instituci??n Bancaria correspondiente har?? las veces de comprobante de pago en t??rminos
       de lo dispuesto por el art??culo 804 de la Ley Federal del Trabajo aun cuando no conste la
       firma del <b>TRABAJADOR</b>.</p>

       <p align="justify">Los pagos por concepto de sueldo que realice el <b>PATR??N</b> al <b>TRABAJADOR</b> incluyen los
       s??ptimos d??as, d??as festivos o descanso obligatorio que transcurran en el periodo cubierto
       y estar??n sujetos a los descuentos correspondientes otorgando el TRABAJADOR su
       autorizaci??n y consentimiento expreso para ello.</p>

       <p align="justify">El <b>TRABAJADOR</b> tendr?? derecho a las prestaciones de previsi??n social que el <b>PATR??N</b>
       establezca, en los t??rminos y condiciones que se pacten por separado, as?? como en las
       pol??ticas del <b>PATR??N</b> de conformidad con las Leyes Fiscales aplicables.</p>

       <p align="justify"><b>CUARTA. RECIBO.</b></p>
       <p align="justify">El <b>PATRON</b> se obliga a emitir los recibos de pagos contenidos en comprobantes fiscales
       digitales por Internet (CFDI), mismos que sustituir??n a los recibos impresos; expresando en
       este acto el <b>TRABAJADOR</b> que el contenido de un CFDI tendr?? valor probatorio si se verifica en el portal de Internet del SAT (Servicio de Administraci??n Tributaria). En el
supuesto de que el <b>TRABAJADOR</b>, requiera los comprobantes impresos deber?? de
solicitarlos por escrito al <b>PATRON</b>.</p><br>
<p align="justify">
El recibo emitido v??a electr??nica (CFDI) o f??sica implicar?? la conformidad del <b>TRABAJADOR</b>
de que la cantidad recibida comprende el salario, prestaciones y dem??s conceptos que en
el mismo se mencione. 
</p></section>

<section>
<p align="justify">Cualquier otra cantidad a la que el <b>TRABAJADOR</b> crea tener
derecho deber?? hacerla del conocimiento por escrito al <b>PATR??N</b> para aclarar el pago
correspondiente, dentro del plazo de 15 d??as naturales posteriores al pago, caso contrario,
se tendr?? conforme con las percepciones y deducciones que se detallen en el recibo.</p>

<p align="justify">Asimismo, las Partes convienen que de conformidad con al art??culo 99, fracci??n III, de la
Ley del Impuesto sobre la Renta, reconocen que los comprobantes fiscales denominados
<b>CFDI</b> podr??n utilizarse como constancia o recibo de pago y tendr??n los efectos establecidos
en los art??culos 132 fracciones VII y VIII, 804 primer p??rrafo, fracciones II y IV de la Ley
Federal del Trabajo. Asimismo, el <b>TRABAJADOR</b> acepta y reconoce plenamente que los
comprobantes denominados <b>CDFI</b> que tiene a su disposici??n, tienen plena validez como
comprobante de pago de salario y prestaciones devengadas ante cualquier Autoridad aun
cuando no conste la firma del <b>TRABAJADOR</b>.</p>

<p align="justify"><b>QUINTA. VIGENCIA.</b></p>

<p align="justify">El presente contrato tendr?? la vigencia de <b>' . $vigencia . '</b>, que correr?? desde el d??a de la
firma del mismo, y se dar?? por terminada la relaci??n laboral, sin responsabilidad para
ninguna de las partes, si el <b>TRABAJADOR</b> no acredita que satisface los requisitos y
conocimientos necesarios para desarrollar las labores encargadas, o bien, no cumple de
manera correcta y responsable las tareas y funciones que el <b>PATR??N</b> le encomiende,
asimismo, si el <b>PATR??N</b> da por terminado de manera anticipada el presente contrato, no
existir?? responsabilidad para el <b>PATR??N</b>.</p>

<p align="justify"><b>SEXTA. PUESTO</b>.</p>

<p align="justify">El <b>TRABAJADOR</b> desempe??ar?? el puesto de <b>' . $puesto . '</b> el cual estar?? bajo la
subordinaci??n del <b>PATR??N</b>, con las obligaciones y responsabilidades que se se??alan en
forma enunciativa, m??s no limitativa en este contrato, as?? como las referidas en el <b>Anexo
???A???</b> y las instrucciones que sobre su trabajo y actividades relacionadas le ordene el
PATR??N.</p>

<p align="justify"><b>SEPTIMA. JORNADA DE TRABAJO</b>.</p>

<p align="justify">La duraci??n de la jornada semanal de trabajo ser?? de 48 horas y ser?? distribuida en cinco
o seis d??as a la semana conforme al horario que tiene establecido el <b>PATR??N</b> de acuerdo
con el lugar de trabajo donde el <b>TRABAJADOR</b> preste sus servicios, asimismo manifiestan
que la jornada de labores podr?? ser repartida de conformidad con el art??culo 59 de la Ley
Federal del Trabajo para permitir al trabajador un mayor reposo del s??bado o domingo, o
cualquier modalidad equivalente.</p>

<p align="justify">El <b>TRABAJADOR</b> deber?? presentarse puntualmente a sus labores en el horario convenido
y est?? obligado a checar personalmente su tarjeta o a firmar personalmente las listas de
asistencias y/o poner su huella digital, a la entrada y salida de sus labores, as?? como</p>
      
        </section>';

        $content .= '<section>
        <p align="justify">
        tambi??n a la entrada y salida de tomar sus alimentos, por lo que el incumplimiento de estos
requisitos indicar?? la falta injustificada a sus labores para todos los efectos legales.</p><br>

<p align="justify">El <b>PATR??N</b>, sus filiales, afiliadas o subsidiarias podr??n modificar en cualquier tiempo el
horario establecido en esta cl??usula de acuerdo a las necesidades del trabajo, condici??n
con la que el <b>TRABAJADOR</b> est?? de acuerdo.</p>

<p align="justify">El <b>TRABAJADOR</b> si por incapacidad o enfermedad dejare de concurrir a su trabajo, deber??
dar aviso y entregar la constancia respectiva expedida por el IMSS al <b>PATR??N</b> en un plazo
no mayor a 3 d??as naturales, a partir de su expedici??n, siendo esta la ??nica justificaci??n
medica aceptable por el <b>PATR??N</b>, caso contrario ser?? considerado como falta injustificada.</p>

<p align="justify"><b><br><br>OCTAVA. TIEMPO EXTRAORDINARIO</b>.</p>

<p align="justify">El <b>TRABAJADOR</b> tiene estrictamente prohibido laborar tiempo extraordinario, a menos que
el PATR??N as?? lo instruya por escrito, sin este requisito, no estar?? autorizado para prestar
sus servicios en jornadas extraordinarias, ni en d??as de descanso semanal y obligatorio.</p>
<p align="justify"><b>NOVENA. D??AS DE DESCANSO</b>.</p>

<p align="justify">El <b>TRABAJADOR</b> gozar?? de un d??a de descanso semanal, y este ser?? se??alado por el
<b>PATR??N</b> conforme a las necesidades del trabajo. El <b>PATR??N</b> podr?? distribuir la jornada
de trabajo de tal forma que se permita al <b>TRABAJADOR</b> disfrutar del descanso en s??bado
o cualquier otra modalidad de distribuci??n de la jornada.</p>

<p align="justify">El <b>TRABAJADOR</b> disfrutar?? de los d??as de descanso obligatorios establecidos en el art??culo
74 de la Ley Federal del Trabajo o los que eventualmente otorgue el <b>PATR??N</b>. El
<b>TRABAJADOR</b> estar?? obligado a laborar en los d??as de descanso se??alados en el p??rrafo
anterior, cuando las necesidades del servicio as?? lo requieran. En estos casos se requerir??
la orden por escrito del <b>PATR??N</b>.</p>

<p align="justify"><b>D??CIMA. VACACIONES, PRIMA VACACIONAL Y AGUINALDO</b>.</p>

<p align="justify">El <b>TRABAJADOR</b> disfrutar?? de vacaciones en t??rminos del art??culo 76 de la Ley Federal
del Trabajo, y de conformidad al programa formulado por el <b>PATR??N</b>.</p>

<p>La prima de vacaciones ser?? del 25% (veinticinco por ciento) sobre el salario que le
corresponda durante el periodo de vacaciones, de acuerdo a lo que dispone el art??culo 80
de la citada Ley Laboral.</p>

<p>El Aguinaldo anual ser?? el equivalente a 15 (quince) d??as de salario, y en su caso, para el
<b>TRABAJADOR</b> que no haya cumplido el a??o de servicios, tendr?? derecho a recibir la parte
proporcional del mismo, conforme al tiempo que hubiere trabajado, de conformidad con lo
que dispone el art??culo 87 de la Ley Laboral.</p>

<p align="justify"><b>D??CIMA PRIMERA. CAPACITACI??N Y ADIESTRAMIENTO</b>.</p>

<p align="justify">El <b>TRABAJADOR</b> ser?? capacitado o adiestrado en los t??rminos de los planes y programas
establecidos o que se establezca el <b>PATR??N</b> y conforme a lo dispuesto en el Cap??tulo III
BIS del T??tulo Cuarto de la Ley Federal del trabajo, de conformidad con lo que para tal efecto
determine la Comisi??n Mixta de Capacitaci??n y Adiestramiento, para ello, se obliga a
        </p>
        
        
        </section>';

        $content .= '<section>
<p align="justify">
participar en todos y cada uno de los programas de capacitaci??n, adiestramiento y
productividad que se establezcan en el centro de trabajo ya sea en forma activa
(impartiendo cursos) o recibi??ndolos. Las Partes convienen que la capacitaci??n podr??
hacerse dentro o fuera de los horarios de trabajo indistintamente.<b>El TRABAJADOR</b> deber??
asistir puntualmente a los cursos, sesiones de grupo y dem??s actividades que forman parte
de la capacitaci??n o adiestramiento; deber?? atender las indicaciones del personal que
imparta la capacitaci??n y cumplir con los programas respectivos; el <b>TRABAJADOR</b> deber??
presentar los ex??menes de conocimientos y aptitud que sean requeridos.</p>

<p align="justify"><b>D??CIMA SEGUNDA. - CONTROL DE CONFIANZA Y BUENA SALUD.</b></p>

<p align="justify">Debido a la naturaleza del trabajo que desempe??ar?? el <b>TRABAJADOR</b> como elemento de
seguridad privada intramuros o a trav??s de monitoreo electr??nico en la cual, por sus
funciones, se le conf??a el cuidado, vigilancia y protecci??n de bienes Inmuebles, protecci??n
de las personas que se encuentren en los mismos y evitar la comisi??n de actos delictivos
en relaci??n con el objeto de su protecci??n; el PATR??N podr?? adoptar las medidas y
procedimientos de evaluaciones permanentes de control de confianza, de desempe??o,
poligraf??a, entorno social y psicol??gico, as?? como ex??menes toxicol??gicos y los dem??s que
determine la Ley, de conformidad con lo que disponen los art??culos 44, fracci??n XX y 48,
fracci??n IX de la Ley de Seguridad Privada del Estado de M??xico y sus correlativos Federal
y de las dem??s Entidades Federativas.</p>

<p align="justify">Para que el <b>TRABAJADOR</b> durante el desempe??o de sus funciones acredite que cuenta y
sigue contando con el perfil f??sico, m??dico, de confianza y buena salud, el <B>PATR??N</B> puede
adoptar las medidas de vigilancia y control que considere oportunas, respetando la dignidad
del <B>TRABAJADOR</B> y sus derechos fundamentales, de conformidad con el procedimiento
siguiente:</p>

<p align="justify">a) De manera aleatoria y en cualquier momento, se practicar??n ex??menes de confianza,
toxicol??gicos, poligr??ficos y de desempe??o, para lo cual el <B>TRABAJADOR</B> est??
consciente de ello y otorga su consentimiento informado para someterse a dichas
evaluaciones de manera voluntaria.</p>

<p align="justify">b) La pr??ctica de los ex??menes a alg??n <b>TRABAJADOR</b> en particular, deber?? estar
justificada cuando exista alg??n indicio que, derivado de alguna conducta de omisi??n o
comisi??n se presuma pongan en riesgo la integridad o vida de las personas y/o bienes
que se encuentran bajo su vigilancia, custodia y protecci??n.</p>

<p align="justify">c) Los resultados de las evaluaciones practicadas estar??n resguardados por el <b>PATRON</b>,
y ??ste deber?? guardar Confidencialidad de dicha informaci??n.</p>


<p align="justify"><b>D??CIMA TERCERA. MATERIALES E INSTRUMENTOS DE TRABAJO</b>.</p>

<p align="justify">Durante el tiempo que subsista la relaci??n laboral, el <b>PATR??N</b> pondr?? a disposici??n del
<b>TRABAJADOR</b> los materiales, herramientas, uniformes e instrumentos necesarios para la
ejecuci??n del trabajo, los cuales se entregar??n en buen estado y ser??n de buena calidad.
<b>El TRABAJADOR</b> estar?? obligado a cuidar dichos materiales, uniformes, instrumentos, y
en su caso, aparato de comunicaci??n (radio o celular asignado al servicio) y deber??
devolverlos cuando el <b>PATR??N</b> se lo requiera, y en todo caso al t??rmino del Contrato o de
la relaci??n de trabajo.<BR>
Para el caso de que el <b>TRABAJADOR</b> extrav??e, venda, empe??e, da??e o deteriore
intencionalmente, por descuido o negligencia los instrumentos de trabajo, en este acto
otorga su consentimiento expreso y solicita al <b>PATR??N</b>, sean descontados de su sueldo,
liquidaci??n o finiquito; la cantidad que resulte para la restituci??n del material, uniforme o
instrumento de trabajo afectado, ello en t??rminos de lo que dispone la fracci??n I del art??culo
110 de la Ley Federal del Trabajo, o bien, previo acuerdo de las partes, restituya el material
o instrumento afectado por otro igual de la misma calidad y especie en un plazo de 3 (tres)
d??as h??biles a la fecha en que se ocurra tal evento.</p>

<p align="justify"><b>El TRABAJADOR</b> reconoce que son propiedad del <b>PATR??N</b> en todo tiempo, los veh??culos,
instrumentos, aparatos de comunicaci??n (radio y/o celular), herramientas, aparatos,
maquinar??a, art??culos, listas de clientes, manuales de operaci??n, y en general todos los
instrumentos de trabajo, datos, dise??os e informaci??n verbal que se le proporcione con
motivo de la relaci??n de trabajo.</p>

<p align="justify"><b>D??CIMA CUARTA. RESCISI??N DEL CONTRATO</b>.</p>

<p align="justify">Ser??n causas de rescisi??n sin responsabilidad para el <b>PATR??N</b>, sin perjuicio de las que al
efecto se??ala el art??culo 47, 135 y 185 de la Ley Federal del Trabajo; quedando a criterio
del <b>PATR??N</b> su aplicaci??n y/o sanci??n y dar??n lugar a su inmediata rescisi??n, las cuales,
de manera enunciativa, m??s no limitativa se mencionan a continuaci??n:</p>

<p align="justify">a) Incurrir el <b>TRABAJADOR</b>, durante sus labores, en faltas de probidad u honradez,
en actos de violencia, amagos, injurias o malos tratamientos en contra del patr??n,
sus familiares o del personal directivo o administrativo de la empresa o
establecimiento, o en contra de clientes y proveedores del patr??n, salvo que medie
provocaci??n o que obre en defensa propia;</p>

<p align="justify">b) Cometer el <b>TRABAJADOR</b> contra alguno de sus compa??eros, cualquiera de los
actos enumerados en la fracci??n anterior, si como consecuencia de ellos se altera
la disciplina del lugar en que se desempe??a el trabajo;
</p>

<p align="justify">c) Ocasionar el <b>TRABAJADOR</b>, intencionalmente, perjuicios materiales durante el
desempe??o de las labores o con motivo de ellas, en los edificios, obras, maquinaria,
instrumentos, materias primas y dem??s objetos relacionados con el trabajo;</p>

<p align="justify">d) Ocasionar el <b>TRABAJADOR</b> los perjuicios de que habla la fracci??n anterior siempre
que sean graves, sin dolo, pero con negligencia tal, que ella sea la causa ??nica del
perjuicio;</p>

<p align="justify">e) Cometer el <b>TRABAJADOR</b> actos inmorales o de hostigamiento y/o acoso sexual
contra cualquier persona en el establecimiento o lugar de trabajo;</p>

<p align="justify">f) Tener el <b>TRABAJADOR</b> m??s de tres faltas de asistencia en un per??odo de treinta
d??as, sin permiso del patr??n o sin causa justificada;</p>

<p align="justify">g) Concurrir el TRABAJADOR a sus labores en estado de embriaguez o bajo la
influencia de alg??n narc??tico o droga enervante y/o consumirlo durante su servicio
y/o jornada laboral en su centro de trabajo; salvo que, en este ??ltimo caso, exista
prescripci??n m??dica. Antes de iniciar su servicio, el trabajador deber?? poner el hecho
en conocimiento del patr??n y presentar la prescripci??n suscrita por el m??dico;</p>

<p align="justify">h) La falta de veracidad de la informaci??n proporcionada por el <b>TRABAJADOR</b> al
<b>PATR??N</b>, previa a la celebraci??n de este contrato y/o durante la vigencia del
contrato por tiempo determinado o periodo ???a prueba???.</p>

<p align="justify">i) Que durante la jornada laboral el <b>TRABAJADOR</b> realice actividades ajenas a las
encomendadas por el <b>PATR??N</b> o a los Clientes de ??ste seg??n se le indique.</p>

<p align="justify">j) La existencia, en cualquier momento, de cualquier conflicto de intereses entre el
<b>TRABAJADOR</b> y el <b>PATR??N</b> o los clientes de ??ste, o cualquier otro tercero
relacionado de forma comercial, t??cnica, financiera, operativamente o de cualquier
otra manera con el <b>PATR??N</b>.</p>

<p align="justify"><b>D??CIMA QUINTA. EXCLUSIVIDAD Y CONFIDENCIALIDAD</b>.</p>

<p align="justify"><b>El TRABAJADOR</b> se obliga a prestar sus servicios exclusivamente al <b>PATR??N</b>,
qued??ndole estrictamente prohibido dedicarse a otras actividades por su propia cuenta o
por cuenta de terceros, as?? como a utilizar su horario de jornada laboral para los mismos
fines. De igual manera se obliga en cualquier tiempo a no usar o revelar a persona,
sociedad, firma, individuo u organizaci??n, secretos comerciales e informaci??n confidencial
(incluyendo listas de clientes o proveedores, socios comerciales, empresas asociadas y
subsidiarias o afiliadas, que el <b>TRABAJADOR</b> haya obtenido durante el tiempo en que
existi?? la relaci??n de trabajo).</p>

<p align="justify"><b>El TRABAJADOR</b> reconoce que toda la documentaci??n, proyectos, listas de clientes,
manuales de operaci??n, datos, dise??os, archivos o informaci??n verbal o escrita de cualquier
naturaleza intercambiada, facilitada o creada en el marco de la relaci??n de trabajo, que
pueda adquirir o a la que pueda tener acceso durante el curso de la relaci??n laboral es
informaci??n Confidencial de la exclusiva propiedad del <b>PATR??N</b> o de sus Clientes a las
que les preste servicio.</p>

<p align="justify"><b>El TRABAJADOR</b> estar?? obligado a guardar estricta reserva de la informaci??n Confidencial,
procedimientos y todos aquellos hechos y actos que con motivo de su trabajo sean de su
conocimiento y por lo tanto se obliga a no utilizar en su beneficio o en beneficio de terceras
personas ya sea directa o indirectamente la informaci??n, actos y dem??s hechos que sean
de su conocimiento en especial toda aquella informaci??n, procedimientos, secretos
comerciales, industriales, contables, financieros, operativos, etc., que se encuentren
protegidos por la Ley, incluso despu??s de concluida la relaci??n de trabajo. el
<b>TRABAJADOR</b> deber?? guardar absoluta confidencialidad sobre los asuntos que le sean </p>


<p align="justify">encomendados o cualquier informaci??n que, debido a sus funciones, llegase a tener en su
poder y a usarla exclusivamente en beneficio del <b>PATR??N</b> debiendo guardar expresa
reserva sobre la informaci??n privilegiada que pudiera tener en su poder.</p>

<p align="justify">En consecuencia, al finalizar la relaci??n laboral, el <b>TRABAJADOR</b> entregar?? al PATR??N
todos los documentos y materiales que contengan informaci??n confidencial.</p>

<p align="justify">El incumplimiento de estas obligaciones dar?? lugar a la rescisi??n de la relaci??n de trabajo,
sin responsabilidad para el <b>PATR??N</b>, y el <b>TRABAJADOR</b> estar?? obligado a responder
tanto civil como penalmente por los da??os que se deriven como consecuencia del
incumplimiento doloso o culposo de su obligaci??n de Confidencialidad.</p>

<p align="justify"><b>D??CIMA SEXTA. SEGURIDAD SOCIAL</b>.<br>
<b>El PATR??N</b> se obliga a inscribir al <b>TRABAJADOR</b> ante el Instituto Mexicano del Seguro
Social, en los t??rminos de la Ley del Seguro Social. El TRABAJADOR queda obligado a
sujetarse a los reconocimientos m??dicos que ordene el PATR??N, de acuerdo con lo
establecido por la Ley Federal del Trabajo, ya sea a trav??s del Instituto Mexicano del Seguro
Social o del m??dico que le se??ale el <b>PATR??N</b>.</p>

<p align="justify"><b>D??CIMA SEPTIMA. OBLIGACIONES Y PROHIBICIONES DEL TRABAJADOR</b>.<br>

1. <b>El TRABAJADOR</b> tendr?? las obligaciones siguientes:</p>

<p align="justify">a) Ejecutar el trabajo con la intensidad, cuidado y esmero apropiados y en la forma,
tiempo y lugar convenidos;</p>

<p align="justify">b) Dar aviso inmediato al patr??n, salvo caso fortuito o de fuerza mayor, de las causas
justificadas que le impidan concurrir a su trabajo;</p>

<p align="justify">c) Restituir al patr??n los materiales no usados, extraviados o da??ados y conservar en
buen estado los instrumentos y ??tiles que les haya dado para el trabajo.</p>

<p align="justify">d) Someterse a los reconocimientos m??dicos previstos en el reglamento interior y
dem??s normas vigentes en la empresa o establecimiento, para comprobar que no
padecen alguna incapacidad o enfermedad de trabajo, contagiosa o incurable;</p>

<p align="justify">e) Poner en conocimiento del patr??n las enfermedades contagiosas que padezcan, tan
pronto como tengan conocimiento de las mismas;</p>

<p align="justify">2. <b>El TRABAJADOR</b> tendr?? las prohibiciones siguientes:</p>

<p align="justify">a) Ejecutar cualquier acto que pueda poner en peligro su propia seguridad, la de sus
compa??eros de trabajo o la de terceras personas, as?? como la de los
establecimientos o lugares en donde desempe??e su trabajo;</p>

<p align="justify">b) Faltar al trabajo sin causa justificada o sin permiso del patr??n;</p>

<p align="justify">c) Substraer de la empresa o establecimiento ??tiles de trabajo o materia prima o
elaborada; y cualquier objeto ajeno a sus herramientas de trabajo dentro de las
instalaciones del lugar donde preste el servicio, incluyendo el de los Clientes del
<b>PATR??N</b>.</p>

<p align="justify">d) Presentarse al trabajo en estado de embriaguez o con aliento alcoh??lico y/o
consumirlo durante su servicio y/o jornada laboral en su centro de trabajo;</p>

<p align="justify">e) Presentarse al trabajo bajo la influencia de alg??n narc??tico o droga enervante y/o
consumirlo durante su servicio y/o jornada laboral en su centro de trabajo, salvo que
exista prescripci??n m??dica. Antes de iniciar su servicio, el trabajador deber?? poner
el hecho en conocimiento del patr??n y presentarle la prescripci??n suscrita por el
m??dico;</p>

<p align="justify">f) Suspender las labores sin autorizaci??n del patr??n;</p>

<p align="justify">g) Usar los ??tiles y herramientas suministrados por el patr??n, para objeto distinto de
aqu??l a que est??n destinados;</p>

<p align="justify">h) Acosar sexualmente a cualquier persona o realizar actos inmorales en los lugares
de trabajo.</p>
<P>El no cumplir con sus obligaciones y/o ejecutar cualesquiera de las prohibiciones descritas
en el presente apartado, es causa justificativa para dar por rescindido el contrato laboral,
sin responsabilidad para el PATRON, con las consecuencias jur??dicas que la Ley Laboral
establece.</P>
<p align="justify"><b>D??CIMA OCTAVA. INTERPRETACI??N Y JURISDICCION</b>.</p>
<p align="justify">Ambas partes convienen en que lo no estipulado en el presente Contrato se regir?? por lo
dispuesto en la Ley Federal de Trabajo. En caso de controversia entre las partes respecto
de la interpretaci??n y cumplimiento del presente Contrato, se someten a lo dispuesto por la
Ley laboral y a la jurisdicci??n de la Junta Federal o Local de Conciliaci??n y Arbitraje,
renunciando a la jurisdicci??n que en raz??n de domicilio o materia pudiera corresponderles.
Le??do que fue por las partes este documento, que deja sin efecto, cancela o substituye
cualquier anterior, y una vez enteradas ??stas de su contenido, obligaciones y alcance, lo
ratifican y firman para la debida constancia legal en Tepotzotl??n, Estado de M??xico, el d??a ' . $dia . ' mes ' . $mes . ' a??o ' . $anio . ' .</p>







            <table>
            <tr>
            <td align="left"> <p align="center">
            ' . $company . '<br><br><br>
            <img src="icons/firmacontrato.png" align="left" width="80" height="50"><br>
            __________________________<br>
            <br>
            LIC. KAREN GUTI??RREZ CASTA??EDA<br>
            REPRESENTANTE LEGAL.
            </p></td>

            <td align="right"> <p align="center">
            EL TRABAJADOR<br><br><br><br><br><br>
            
            
            __________________________<br><br>
            C. ' . $name . ' ' . $firstname . ' ' . $lastname . '
            
            
            </p></td>
            </tr>
          
            </table>
            <br pagebreak="true"/>
        </section>
        ';

        //Datos generales
        $content .= '<section>
        <p align="center"><b>CONTRATO LABORAL</b></p>
        <p align="LEFT">PATR??N: <b>' . $company . '</b></p>
        <p align="LEFT">TRABAJADOR: <b>' . $name . ' ' . $firstname . ' ' . $lastname . '</b></p>
        <p align="center"><b>ANEXO ???A???  DE DECLARACIONES AL CONTRATO INDIVIDUAL DE TRABAJO</b></p>
        <p align="center"><b>DECLARACIONES</b></p>

        <p align="justify"><b>PRIMERA: EL TRABAJADOR DECLARA</b> que es de nacionalidad <b>Mexicana</b>, con fecha de nacimiento <b>' . $fechanacimiento . '</b> as?? mismo a la fecha de firma del presente <b>CONTRATO</b>, manifiesta contar con <b>' . $edad . '</b> a??os de edad, con clave <b>RFC ' . $rfc . '</b>, <b>CURP ' . $curp . '</b>, n??mero de <b>Seguridad Social  ' . $imss . ', Estado Civil ' . $estadocivil . '</b> y con domicilio en <b>' . $calle . ' ' . $colonia . ' ' . $municipio . ' ' . $estado . ' ' . $cp . '</b>. </p>

        <p align="justify"><b>SEGUNDA: EL TRABAJADOR</b> expresa su consentimiento y autoriza al <b>PATR??N</b> para que
        realice el dep??sito y/o transferencia en la cuenta bancaria que proporcione, respecto a la
        cantidad que por concepto de sueldo le corresponda como contraprestaci??n a los servicios
        otorgados, pagaderos los d??as 15 y ??ltimo d??a de cada mes, de conformidad con lo que
        establece el art??culo 101 de la Ley Federal del Trabajo y a la Clausula Tercera del Contrato
        Individual de Trabajo.</p>

        <p align="justify"><b>TERCERA: EL TRABAJADOR</b> manifiesta contar con cr??dito de vivienda con numero <b>INFONAVIT ' . $infonavit . ' FONACOT ' . $fonacot . '</b>, Autorizando los descuentos correspondientes para el pago y amortizaci??n del mismo.</p>

        <p align="justify"><b>CUARTA:</b> Ambas partes est??n de acuerdo de que los trabajos, tareas, labores y actividades
        que desempe??ar?? el <b>TRABAJADOR</b> (de acuerdo a la modalidad contratada), las cuales se
        describen de manera enunciativa y no limitativa, son las siguientes:<br></b>
        <b>1) TESI INTRAMURO.</b></p>
<p align="justify">a) Ejercer la vigilancia y protecci??n de bienes, establecimientos, lugares y eventos,
tanto privados como p??blicos, as?? como la protecci??n de las personas que puedan
encontrarse en los mismos, llevando a cabo las comprobaciones, registros y
prevenciones necesarias para el cumplimiento de su funci??n.</p>

<p align="justify">b) Efectuar controles de identidad, de objetos personales, paqueter??a, mercanc??as o
veh??culos, incluido el interior de ??stos, en el acceso o en el interior de inmuebles o
propiedades donde presten servicio, sin que, en ning??n caso, puedan retener la
documentaci??n personal, pero s?? impedir el acceso a dichos inmuebles o
propiedades. La negativa a exhibir la identificaci??n o a permitir el control de los
objetos personales, de paqueter??a, mercanc??a o del veh??culo facultar?? para impedir
a los particulares el acceso o para ordenarles el abandono del inmueble o propiedad
objeto de su protecci??n.</p>

<p align="justify">c) Evitar la comisi??n de actos delictivos o infracciones administrativas en relaci??n con
el objeto o inmueble de su protecci??n, realizando las acciones necesarias para
prevenirlos o impedir su consumaci??n, debiendo oponerse a los mismos e intervenir
cuando presenciaren la comisi??n de alg??n tipo de infracci??n o fuere precisa su ayuda
por razones humanitarias o de urgencia.</p>        


<p align="justify">d) En relaci??n con el objeto o inmueble de su protecci??n o de su actuaci??n, detener y
poner inmediatamente a disposici??n de las Fuerzas y Cuerpos de Seguridad
competentes a los delincuentes y los instrumentos, efectos y pruebas de los delitos,
as?? como denunciar a quienes cometan infracciones administrativas.</p>

<p align="justify">e) Llevar a cabo, en relaci??n con el funcionamiento de centrales receptoras de alarmas,
la prestaci??n de servicios de verificaci??n personal y respuesta de las se??ales de
alarmas que se produzcan.</p>

<p align="justify"><b>2) TESI MONITORISTA</b>.</p>

<p align="justify">a) Conocer las ??reas de vigilancia monitoreadas por el C.C.T.V.</p>

<p align="justify">b) Permanecer alerta ante las situaciones que se observan a trav??s de la video</p>
vigilancia la actividad de monitoreo y poner mayor atenci??n a las ??reas de mayor
riesgo.
<p align="justify">c) Registrar todas las desviaciones de las normas y procedimientos de seguridad
dentro de las instalaciones.</p>

</p>d) La observaci??n por medio del monitor debe realizarse a todas las ??reas que cuentan
con c??mara de C.C.T.V. El ??rea de cobertura se incrementa observando los detalles
de fondo de las im??genes.</p>

<p align="justify">e) Tener capacidad para identificar problemas cr??ticos de forma r??pida y precisa, as??
como tomar acciones correctivas.</p>

<p align="justify">f) Identificar de inmediato (o en el menor tiempo posible), cualquier situaci??n, anomal??a
o movimiento extra??o que ponga en riesgo la seguridad del inmueble o
establecimiento donde se presta el servicio.</p>

<p align="justify">g) Tomar las medidas necesarias para mitigar el riesgo identificado y salvaguardar el
inmueble o establecimiento donde se preste el servicio.</p>

<p align="justify">h) Ejecutar los protocolos de seguridad en caso de que se presente alguna situaci??n
de riesgo en el inmueble o establecimiento donde se presta el servicio.</p>

<p align="justify">i) Entrega y recepci??n de turno, tomar conocimiento de novedades y notificar
novedades relevantes al Jefe de Servicio o Supervisor Operativo.</p>

<p align="justify">j) Responder a las emergencias de manera oportuna, por lo que debe permanecer
alerta, prestar atenci??n a las alarmas y atender situaciones adversas para aplicar
los procedimientos y protocolos establecidos, mediante el env??o de un equipo de
monitoreo, contactando a las autoridades, o realizando notificaciones al personal
correspondiente o autoridad competente.</p>

<p align="justify">k) Reportar de forma inmediata situaciones como: personas sospechosas que
deambulen por las zonas perimetrales y veh??culos sospechosos estacionados por
largos periodos de tiempo, cerca de las instalaciones del inmueble o establecimiento
donde se presta el servicio.</p>
        <table>
            <tr>
            <td align="left"> <p align="center">
            ' . $company . '<br>
            <img src="icons/firmacontrato.png" align="left" width="80" height="50"><br>

            __________________________<br>
            LIC. KAREN GUTI??RREZ CASTA??EDA
            </p></td>

            <td align="right"> <p align="center">
            EL TRABAJADOR<br><br><br><br>
            
            
            __________________________<br>
            C. ' . $name . ' ' . $firstname . ' ' . $lastname . ' 
            
            
            </p></td>
            </tr>
          
            </table>
            <br pagebreak="true"/>
        
        </section>';

        $content .= '<section>
        <p align="center"><b>CONTRATO LABORAL</b></p>
        <p align="LEFT">PATR??N: <b>' . $company . '</b></p>
        <p align="LEFT">TRABAJADOR: <b>' . $name . ' ' . $firstname . ' ' . $lastname . '</b></p>
        <p align="center"><b>ANEXO ???B??? DE DECLARACIONES AL CONTRATO INDIVIDUAL DE TRABAJO</b></p>
        <p align="center"><b>DECLARACIONES</b></p>

        <p align="justify"><b>PRIMERA: <b>El TRABAJADOR(A)</b> Declara que, en caso de muerte o desaparici??n forzada,
        derivada de un acto delincuencial, es su libre voluntad y designa de la siguiente manera el
        pago de los salarios y prestaciones devengadas y no cobradas:</p>

        <p align="justify">
        Esposa(o):_________________________________ en____% <br>
        Hijo(a): ____________________________________en____% <br>
        Padre: _____________________________________en____% <br>
        Madre: _____________________________________en____% <br>
        Dependiente econ??mico: _________________________Parentesco ____________________ en _____%<br>
        </p>

        <p align="justify"><b>SEGUNDA: EL TRABAJADOR</b> Autoriza para que <b>EL PATR??N</b> pueda entregar a sus beneficiarios si
        les corresponde y si <b>EL TRABAJADOR</b> se encuentra en los supuestos se??alados en el 
        inciso K) de la declaraci??n II, las siguientes prestaciones o cualquier otra que se le adeude:</p>

        <p align="justify">
        ???	Sueldos y salarios pendientes de pago por el patr??n <br>
        ???	Prestaciones que le correspondan al trabajador (aguinaldo,vacaciones, prima vacacional) <br>
        ???	Indemnizaciones si existiera riesgo de trabajo.

        </p>

        <p align="justify">Lo anteriormente se??alado en terminos de lo que disponen los articulos 115, 501 y dem??s relativos y aplicables de la Ley federal del Trabajo.</p>

        <table>
        <tr>
        <td align="left"> <p align="center">
        ' . $company . '<br><br>
        <img src="icons/firmacontrato.png" align="left" width="80" height="50"><br>

        __________________________<br>
        LIC. KAREN GUTI??RREZ CASTA??EDA<br>
        </p></td>

        <td align="right"> <p align="center">
        EL TRABAJADOR<br><br><br><br><br>
        
        
        __________________________<br>
        C. ' . $name . ' ' . $firstname . ' ' . $lastname . '
        
        
        </p></td>
        </tr>
      
        </table>
        
        </section>';
    }
    $cnt++;
}

//$content .= '
//<div class="row padding">
//	<div class="col-md-12" style="text-align:center;">
//  	<span>Pdf Creator </span><a>By sistema sim</a>
$content .= '</body>'; // print a block of text using Write()

$pdf->writeHTML($content, true, 0, true, 0);

$pdf->lastPage();

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print a table

$pdf->lastPage();


$pdf->output('CONTRATO LABORAL.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+