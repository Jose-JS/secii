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
        LOS EFECTOS DE ESTE CONTRATO SE DESIGNARA COMO EL “PATRON",
        REPRESENTADA POR EL LIC. KAREN GUTIÉRREZ CASTAÑEDA Y POR LA
        OTRA EL C. ' . $name . ' ' . $firstname . ' ' . $lastname . ', POR SU PROPIO DERECHO, A
        QUIEN EN LO SUCESIVO SE LE DESIGNARA COMO EL “TRABAJADOR”, MISMOS
        QUE SE SUJETAN A LAS SIGUIENTES DECLARACIONES Y CLÁUSULAS:</p>


        <p align="center">D E C L A R A C I O N E S<br>
        <right>I. EL “PATRÒN” A TRAVÉS DE SU REPRESENTANTE LEGAL DECLARA:</b></right></p>
        <p align="justify">a) Ser una sociedad mercantil legalmente constituida y tener principalmente como
        objeto social, entre otras, la prestación de servicios de seguridad, protección y
        custodia de personas, dinero, materiales, materias primas en general, sistemas y
        equipos de cómputo, bienes e inmuebles en general.</p>
        
        <p align="justify">b) Tener su domicilio en: Calle Piracantos 87, Manzana 109, Colonia San Mateo Xoloc,
        Tepotzotlán, Estado de México, C.P. 54600, con RFC: ' . $company1 . '.</p>

        <p align="justify">c) Que requiere los servicios del <b>TRABAJADOR</b> para desempeñar las funciones de <b>' . $puesto . '</b>, las cuales se detallan y describen en el <b>Anexo “A”</b>, y en
        general todas las que sean similares, conexas y que le sean asignadas por el
        <b>PATRÓN</b>, sus filiales, afiliadas o subsidiarias. </p>

        <p align="justify">d) Que de acuerdo al objeto social del <b>PATRÓN</b>, la prestación del servicio que ofrece
        a sus clientes, entre otros, es el de Servicios de Seguridad Privada, para lo cual el
        TRABAJADOR para efectos del puesto a contratar y funciones a desempeñar, será
        denominado como “Técnico Especialista en Seguridad Integral” o sus siglas <b>“TESI”</b>.</p>

        <p align="justify">e) Que el servicio que proporciona a sus clientes a través del personal contratado para
        tales efectos, es de diversas modalidades:
        </p>

        <p align="justify">
              i. A proporcionar el Servicio de <B>Seguridad Privada Intramuros</B>
         (Denominación del servicio a nivel Federal) o bien, su denominación de
         servicio de <B>Seguridad Privada y Protección a Inmuebles</B> (denominación
         del servicio para el Distrito Federal, hoy Ciudad de México),
         </p>
         <p align="justify">
         <B>ii. Servicios de monitoreo electrónico</B>.
        </p>
        <p align="justify"><B>II. POR SU PARTE, “EL TRABAJADOR” DECLARA:</B><br>

        a) Llamarse como ha quedado escrito en el proemio del presente Contrato y
ratificado mediante el <B>Anexo “A”</B>, el cual forma parte integrante del mismo.<BR>
b) Ser de nacionalidad MEXICANA.<BR>
c) Tener <b>' . $edad . '</b> años de edad en virtud de haber nacido en la fecha de <b>' . $fechanacimiento . '</b>; 
con RFC: <b>' . $rfc . '</b>; clave CURP: <b>' . $curp . '</b> y número de Seguridad Social: <b>' . $imss . '</b>.<BR>
d) Ser de sexo <b>' . $sexo . '</b>.<BR>
e) Estado civil <b>' . $estadocivil . '</b>.<BR>
f) Que tiene su domicilio en: <b>' . $calle . ' ' . $colonia . ' ' . $municipio . ' ' . $estado . ' ' . $cp . '</b>; domicilio que el
<B>TRABAJADOR</B> proporciona al <b>PATRÓN</b> para todos los efectos legales a que
haya lugar y específicamente para lo señalado en la parte final del artículo 47 de
la Ley Federal del Trabajo, manifestando que este domicilio es donde habita y <br>señala para recibir todo tipo de notificaciones o avisos por parte del <B>PATRÓN</B> o
cualquier Autoridad.</p><br>
        <p align="justify">g) Que es su obligación notificar por escrito al <B>PATRÓN</B> cualquier cambio de
        domicilio, ya que, de no hacerlo, subsistirá el que aquí se señala para todos los
        efectos legales a que haya lugar.</p>

        <p align="justify">h) Que no presta servicios subordinados o independientes en la actualidad para
        ninguna otra negociación, ni recibe percepción alguna de otra empresa o
        persona física, ni honorarios, ni por ningún otro concepto.</p>

        <p align="justify">i) Que posee la experiencia, capacidad física y mental necesarias para realizar las
        actividades y funciones que requiere el <B>PATRÓN</B>, sus filiales, afiliadas o
        subsidiarias, para el puesto que es contratado.</p>

        <p align="justify">j) Que no tiene enfermedad o incapacidad que le imposibilite desempeñar el
        trabajo mencionado, derivadas de un estado patológico o de cualquier otra
        índole ya sea permanente, parcial o transitorio, no ser adicto al consumo de
        drogas, sustancias psicotrópicas y/o enervantes o bebidas alcohólicas.</p>

        <p align="justify">k) Que de acuerdo a la fracción X del artículo 25 de la Ley Federal del Trabajo y
        para efectos del artículo 501 de la citada Ley, designará en el documento
        denominado como <B>Anexo “B”</B> que, una vez firmado por el <B>TRABAJADOR</B>
        forma parte integrante del presente Contrato, y en él designará a un beneficiario
        para el pago de las prestaciones y salarios devengados y no cobrados, en caso
        de muerte o desaparición derivada de un acto delincuencial.</p>
        ';


        $content .= '
        
        <p align="justify"><B>III. LAS PARTES DECLARAN:</B><BR></p>
        <p align="justify">Que se reconocen expresamente la personalidad jurídica con que se ostentan, están
        conscientes y conformes con las declaraciones que anteceden para todos los efectos
        legales a que haya lugar, en tal virtud, ambas partes convienen las siguientes:</p>
        
        <p align="center"><B>C L Á U S U L A S:</B></p>
        <p align="justify"><B>PRIMERA. FUNCIONES DEL TRABAJADOR.</B></p>
        <p align="justify">
        El <B>TRABAJADOR</B> se obliga a desempeñar las labores que han quedado descritas en el
        inciso <B>C)</B> de la declaración primera <B>(I)</B>, y bajo la subordinación del <B>PATRÓN</B>,
        desempeñándolas bajo la dirección y dependencia de esta, obligándose a realizar todas
        aquellas labores que estén relacionadas con dicha actividad, sin perjuicio de otras similares
        que se le encomienden.</p>
        <p align="justify"></p>El <b>TRABAJADOR</b> manifiesta que está de acuerdo en que el <b>PATRÓN</b> podrá, en cualquier
tiempo, pedir que lleve a cabo trabajos o proyectos específicos, por el tiempo que sea
necesario, para los establecimientos, inmuebles, instituciones financieras, empresas,
sucursales, industrias, comercios y oficinas del <b>PATRÓN</b> o de sus Clientes a las que les
preste Servicio, o con las que se tenga relaciones comerciales, pero será siempre por
cuenta y orden del <b>PATRÓN</b>, quien será el único responsable de la relación laboral.</p>

<p align="justify">El <b>TRABAJADOR</b> queda obligado a llevar a cabo sus funciones con la mayor intensidad,
cuidado y esmero posible, así como a realizar todo esfuerzo material e intelectual necesario
a fin de facilitar las operaciones, procedimientos, políticas o niveles de productividad y
eficiencia, acorde a las necesidades del <b>PATRÓN</b>. Estas labores nunca estarán sujetas a
desempeñarse en una área determinada o actividades en forma restringida, sino al manejo, uso y 
atención de cuantos utensilios, maquinas, labores o funciones que sea posible realizar por el TRABAJADOR.</p>
        </section>
        
        
        ';

        $content .= '<section>
        
        <p align="justify">En el supuesto de que el <b>TRABAJADOR</b> tenga personal a su servicio, estará obligado a
        vigilar que el mismo, cumpla con todas las instrucciones, políticas, protocolos, códigos de
        conducta, reglamentos o manuales que les sean aplicables para sus funciones.</p>

        <p align="justify"><b>SEGUNDA. LUGAR DE PRESTACIÓN DE LOS SERVICIOS.</b></p>

        <p align="justify">Los servicios a desarrollar en los términos del presente contrato, los desempeñará el
        <b>TRABAJADOR</b> en el lugar o lugares que le señale el <b>PATRÓN</b>, o en cualquiera de las
        diversas oficinas, inmuebles, establecimientos, plantas, sucursales y bodegas que le sean
        señalados dentro de la República Mexicana o en donde el <b>PATRÓN</b> tenga o pudiera llegar
        a tener filiales, afiliadas o subsidiarias y/o los domicilios de los Clientes.</p>

        <p align="justify">El <b>TRABAJADOR</b> otorga su consentimiento expreso y manifiesta estar de acuerdo para
        ser cambiado de oficinas, inmuebles, establecimientos, plantas, sucursales y bodegas
        dentro de la República Mexicana donde se requieran sus servicios, o en donde el PATRÓN
        realice actividades o tenga operaciones en sus domicilios o en los domicilios de las
        empresas o entidades a las que se les preste servicio, pero siempre serán por orden y
        cuenta del <b>PATRÓN</b>, ello sin menoscabo de sus percepciones o dignidad.
       </p>        

       <p align="justify"><b>TERCERA. MONTO DEL SALARIO Y FORMA DE PAGO.</b></p>
        
       <p align="justify">Las partes acuerdan que el <b>TRABAJADOR</b> percibirá como contraprestación a sus
       servicios, un salario diario de <b> $' . $sueldodiario . ' (' . $r . ')</b> el pago del
       salario se realizará quincenalmente, pagaderos los días 15 y último día de cada mes, en
       moneda de curso legal en el domicilio del <b>PATRÓN</b> o mediante depósito bancario,
       transferencia o cualquier otro medio electrónico en la cuenta de cheque o tarjeta de débito
       que el <b>TRABAJADOR</b> y el <b>PATRÓN</b> convengan, en términos del artículo 101 de la Ley
       Federal del Trabajo, para lo cual el TRABAJADOR en este acto otorga su consentimiento
       expreso respecto a estas formas de pago alternativo.</p>

       <p align="justify">El <b>TRABAJADOR</b> reconoce y acepta que el simple deposito o transferencia ante la
       Institución Bancaria correspondiente hará las veces de comprobante de pago en términos
       de lo dispuesto por el artículo 804 de la Ley Federal del Trabajo aun cuando no conste la
       firma del <b>TRABAJADOR</b>.</p>

       <p align="justify">Los pagos por concepto de sueldo que realice el <b>PATRÓN</b> al <b>TRABAJADOR</b> incluyen los
       séptimos días, días festivos o descanso obligatorio que transcurran en el periodo cubierto
       y estarán sujetos a los descuentos correspondientes otorgando el TRABAJADOR su
       autorización y consentimiento expreso para ello.</p>

       <p align="justify">El <b>TRABAJADOR</b> tendrá derecho a las prestaciones de previsión social que el <b>PATRÓN</b>
       establezca, en los términos y condiciones que se pacten por separado, así como en las
       políticas del <b>PATRÓN</b> de conformidad con las Leyes Fiscales aplicables.</p>

       <p align="justify"><b>CUARTA. RECIBO.</b></p>
       <p align="justify">El <b>PATRON</b> se obliga a emitir los recibos de pagos contenidos en comprobantes fiscales
       digitales por Internet (CFDI), mismos que sustituirán a los recibos impresos; expresando en
       este acto el <b>TRABAJADOR</b> que el contenido de un CFDI tendrá valor probatorio si se verifica en el portal de Internet del SAT (Servicio de Administración Tributaria). En el
supuesto de que el <b>TRABAJADOR</b>, requiera los comprobantes impresos deberá de
solicitarlos por escrito al <b>PATRON</b>.</p><br>
<p align="justify">
El recibo emitido vía electrónica (CFDI) o física implicará la conformidad del <b>TRABAJADOR</b>
de que la cantidad recibida comprende el salario, prestaciones y demás conceptos que en
el mismo se mencione. 
</p></section>

<section>
<p align="justify">Cualquier otra cantidad a la que el <b>TRABAJADOR</b> crea tener
derecho deberá hacerla del conocimiento por escrito al <b>PATRÓN</b> para aclarar el pago
correspondiente, dentro del plazo de 15 días naturales posteriores al pago, caso contrario,
se tendrá conforme con las percepciones y deducciones que se detallen en el recibo.</p>

<p align="justify">Asimismo, las Partes convienen que de conformidad con al artículo 99, fracción III, de la
Ley del Impuesto sobre la Renta, reconocen que los comprobantes fiscales denominados
<b>CFDI</b> podrán utilizarse como constancia o recibo de pago y tendrán los efectos establecidos
en los artículos 132 fracciones VII y VIII, 804 primer párrafo, fracciones II y IV de la Ley
Federal del Trabajo. Asimismo, el <b>TRABAJADOR</b> acepta y reconoce plenamente que los
comprobantes denominados <b>CDFI</b> que tiene a su disposición, tienen plena validez como
comprobante de pago de salario y prestaciones devengadas ante cualquier Autoridad aun
cuando no conste la firma del <b>TRABAJADOR</b>.</p>

<p align="justify"><b>QUINTA. VIGENCIA.</b></p>

<p align="justify">El presente contrato tendrá la vigencia de <b>' . $vigencia . '</b>, que correrá desde el día de la
firma del mismo, y se dará por terminada la relación laboral, sin responsabilidad para
ninguna de las partes, si el <b>TRABAJADOR</b> no acredita que satisface los requisitos y
conocimientos necesarios para desarrollar las labores encargadas, o bien, no cumple de
manera correcta y responsable las tareas y funciones que el <b>PATRÓN</b> le encomiende,
asimismo, si el <b>PATRÓN</b> da por terminado de manera anticipada el presente contrato, no
existirá responsabilidad para el <b>PATRÓN</b>.</p>

<p align="justify"><b>SEXTA. PUESTO</b>.</p>

<p align="justify">El <b>TRABAJADOR</b> desempeñará el puesto de <b>' . $puesto . '</b> el cual estará bajo la
subordinación del <b>PATRÓN</b>, con las obligaciones y responsabilidades que se señalan en
forma enunciativa, más no limitativa en este contrato, así como las referidas en el <b>Anexo
“A”</b> y las instrucciones que sobre su trabajo y actividades relacionadas le ordene el
PATRÓN.</p>

<p align="justify"><b>SEPTIMA. JORNADA DE TRABAJO</b>.</p>

<p align="justify">La duración de la jornada semanal de trabajo será de 48 horas y será distribuida en cinco
o seis días a la semana conforme al horario que tiene establecido el <b>PATRÓN</b> de acuerdo
con el lugar de trabajo donde el <b>TRABAJADOR</b> preste sus servicios, asimismo manifiestan
que la jornada de labores podrá ser repartida de conformidad con el artículo 59 de la Ley
Federal del Trabajo para permitir al trabajador un mayor reposo del sábado o domingo, o
cualquier modalidad equivalente.</p>

<p align="justify">El <b>TRABAJADOR</b> deberá presentarse puntualmente a sus labores en el horario convenido
y está obligado a checar personalmente su tarjeta o a firmar personalmente las listas de
asistencias y/o poner su huella digital, a la entrada y salida de sus labores, así como</p>
      
        </section>';

        $content .= '<section>
        <p align="justify">
        también a la entrada y salida de tomar sus alimentos, por lo que el incumplimiento de estos
requisitos indicará la falta injustificada a sus labores para todos los efectos legales.</p><br>

<p align="justify">El <b>PATRÓN</b>, sus filiales, afiliadas o subsidiarias podrán modificar en cualquier tiempo el
horario establecido en esta cláusula de acuerdo a las necesidades del trabajo, condición
con la que el <b>TRABAJADOR</b> está de acuerdo.</p>

<p align="justify">El <b>TRABAJADOR</b> si por incapacidad o enfermedad dejare de concurrir a su trabajo, deberá
dar aviso y entregar la constancia respectiva expedida por el IMSS al <b>PATRÓN</b> en un plazo
no mayor a 3 días naturales, a partir de su expedición, siendo esta la única justificación
medica aceptable por el <b>PATRÓN</b>, caso contrario será considerado como falta injustificada.</p>

<p align="justify"><b><br><br>OCTAVA. TIEMPO EXTRAORDINARIO</b>.</p>

<p align="justify">El <b>TRABAJADOR</b> tiene estrictamente prohibido laborar tiempo extraordinario, a menos que
el PATRÓN así lo instruya por escrito, sin este requisito, no estará autorizado para prestar
sus servicios en jornadas extraordinarias, ni en días de descanso semanal y obligatorio.</p>
<p align="justify"><b>NOVENA. DÍAS DE DESCANSO</b>.</p>

<p align="justify">El <b>TRABAJADOR</b> gozará de un día de descanso semanal, y este será señalado por el
<b>PATRÓN</b> conforme a las necesidades del trabajo. El <b>PATRÓN</b> podrá distribuir la jornada
de trabajo de tal forma que se permita al <b>TRABAJADOR</b> disfrutar del descanso en sábado
o cualquier otra modalidad de distribución de la jornada.</p>

<p align="justify">El <b>TRABAJADOR</b> disfrutará de los días de descanso obligatorios establecidos en el artículo
74 de la Ley Federal del Trabajo o los que eventualmente otorgue el <b>PATRÓN</b>. El
<b>TRABAJADOR</b> estará obligado a laborar en los días de descanso señalados en el párrafo
anterior, cuando las necesidades del servicio así lo requieran. En estos casos se requerirá
la orden por escrito del <b>PATRÓN</b>.</p>

<p align="justify"><b>DÉCIMA. VACACIONES, PRIMA VACACIONAL Y AGUINALDO</b>.</p>

<p align="justify">El <b>TRABAJADOR</b> disfrutará de vacaciones en términos del artículo 76 de la Ley Federal
del Trabajo, y de conformidad al programa formulado por el <b>PATRÓN</b>.</p>

<p>La prima de vacaciones será del 25% (veinticinco por ciento) sobre el salario que le
corresponda durante el periodo de vacaciones, de acuerdo a lo que dispone el artículo 80
de la citada Ley Laboral.</p>

<p>El Aguinaldo anual será el equivalente a 15 (quince) días de salario, y en su caso, para el
<b>TRABAJADOR</b> que no haya cumplido el año de servicios, tendrá derecho a recibir la parte
proporcional del mismo, conforme al tiempo que hubiere trabajado, de conformidad con lo
que dispone el artículo 87 de la Ley Laboral.</p>

<p align="justify"><b>DÉCIMA PRIMERA. CAPACITACIÓN Y ADIESTRAMIENTO</b>.</p>

<p align="justify">El <b>TRABAJADOR</b> será capacitado o adiestrado en los términos de los planes y programas
establecidos o que se establezca el <b>PATRÓN</b> y conforme a lo dispuesto en el Capítulo III
BIS del Título Cuarto de la Ley Federal del trabajo, de conformidad con lo que para tal efecto
determine la Comisión Mixta de Capacitación y Adiestramiento, para ello, se obliga a
        </p>
        
        
        </section>';

        $content .= '<section>
<p align="justify">
participar en todos y cada uno de los programas de capacitación, adiestramiento y
productividad que se establezcan en el centro de trabajo ya sea en forma activa
(impartiendo cursos) o recibiéndolos. Las Partes convienen que la capacitación podrá
hacerse dentro o fuera de los horarios de trabajo indistintamente.<b>El TRABAJADOR</b> deberá
asistir puntualmente a los cursos, sesiones de grupo y demás actividades que forman parte
de la capacitación o adiestramiento; deberá atender las indicaciones del personal que
imparta la capacitación y cumplir con los programas respectivos; el <b>TRABAJADOR</b> deberá
presentar los exámenes de conocimientos y aptitud que sean requeridos.</p>

<p align="justify"><b>DÉCIMA SEGUNDA. - CONTROL DE CONFIANZA Y BUENA SALUD.</b></p>

<p align="justify">Debido a la naturaleza del trabajo que desempeñará el <b>TRABAJADOR</b> como elemento de
seguridad privada intramuros o a través de monitoreo electrónico en la cual, por sus
funciones, se le confía el cuidado, vigilancia y protección de bienes Inmuebles, protección
de las personas que se encuentren en los mismos y evitar la comisión de actos delictivos
en relación con el objeto de su protección; el PATRÓN podrá adoptar las medidas y
procedimientos de evaluaciones permanentes de control de confianza, de desempeño,
poligrafía, entorno social y psicológico, así como exámenes toxicológicos y los demás que
determine la Ley, de conformidad con lo que disponen los artículos 44, fracción XX y 48,
fracción IX de la Ley de Seguridad Privada del Estado de México y sus correlativos Federal
y de las demás Entidades Federativas.</p>

<p align="justify">Para que el <b>TRABAJADOR</b> durante el desempeño de sus funciones acredite que cuenta y
sigue contando con el perfil físico, médico, de confianza y buena salud, el <B>PATRÓN</B> puede
adoptar las medidas de vigilancia y control que considere oportunas, respetando la dignidad
del <B>TRABAJADOR</B> y sus derechos fundamentales, de conformidad con el procedimiento
siguiente:</p>

<p align="justify">a) De manera aleatoria y en cualquier momento, se practicarán exámenes de confianza,
toxicológicos, poligráficos y de desempeño, para lo cual el <B>TRABAJADOR</B> está
consciente de ello y otorga su consentimiento informado para someterse a dichas
evaluaciones de manera voluntaria.</p>

<p align="justify">b) La práctica de los exámenes a algún <b>TRABAJADOR</b> en particular, deberá estar
justificada cuando exista algún indicio que, derivado de alguna conducta de omisión o
comisión se presuma pongan en riesgo la integridad o vida de las personas y/o bienes
que se encuentran bajo su vigilancia, custodia y protección.</p>

<p align="justify">c) Los resultados de las evaluaciones practicadas estarán resguardados por el <b>PATRON</b>,
y éste deberá guardar Confidencialidad de dicha información.</p>


<p align="justify"><b>DÉCIMA TERCERA. MATERIALES E INSTRUMENTOS DE TRABAJO</b>.</p>

<p align="justify">Durante el tiempo que subsista la relación laboral, el <b>PATRÓN</b> pondrá a disposición del
<b>TRABAJADOR</b> los materiales, herramientas, uniformes e instrumentos necesarios para la
ejecución del trabajo, los cuales se entregarán en buen estado y serán de buena calidad.
<b>El TRABAJADOR</b> estará obligado a cuidar dichos materiales, uniformes, instrumentos, y
en su caso, aparato de comunicación (radio o celular asignado al servicio) y deberá
devolverlos cuando el <b>PATRÓN</b> se lo requiera, y en todo caso al término del Contrato o de
la relación de trabajo.<BR>
Para el caso de que el <b>TRABAJADOR</b> extravíe, venda, empeñe, dañe o deteriore
intencionalmente, por descuido o negligencia los instrumentos de trabajo, en este acto
otorga su consentimiento expreso y solicita al <b>PATRÓN</b>, sean descontados de su sueldo,
liquidación o finiquito; la cantidad que resulte para la restitución del material, uniforme o
instrumento de trabajo afectado, ello en términos de lo que dispone la fracción I del artículo
110 de la Ley Federal del Trabajo, o bien, previo acuerdo de las partes, restituya el material
o instrumento afectado por otro igual de la misma calidad y especie en un plazo de 3 (tres)
días hábiles a la fecha en que se ocurra tal evento.</p>

<p align="justify"><b>El TRABAJADOR</b> reconoce que son propiedad del <b>PATRÓN</b> en todo tiempo, los vehículos,
instrumentos, aparatos de comunicación (radio y/o celular), herramientas, aparatos,
maquinaría, artículos, listas de clientes, manuales de operación, y en general todos los
instrumentos de trabajo, datos, diseños e información verbal que se le proporcione con
motivo de la relación de trabajo.</p>

<p align="justify"><b>DÉCIMA CUARTA. RESCISIÓN DEL CONTRATO</b>.</p>

<p align="justify">Serán causas de rescisión sin responsabilidad para el <b>PATRÓN</b>, sin perjuicio de las que al
efecto señala el artículo 47, 135 y 185 de la Ley Federal del Trabajo; quedando a criterio
del <b>PATRÓN</b> su aplicación y/o sanción y darán lugar a su inmediata rescisión, las cuales,
de manera enunciativa, más no limitativa se mencionan a continuación:</p>

<p align="justify">a) Incurrir el <b>TRABAJADOR</b>, durante sus labores, en faltas de probidad u honradez,
en actos de violencia, amagos, injurias o malos tratamientos en contra del patrón,
sus familiares o del personal directivo o administrativo de la empresa o
establecimiento, o en contra de clientes y proveedores del patrón, salvo que medie
provocación o que obre en defensa propia;</p>

<p align="justify">b) Cometer el <b>TRABAJADOR</b> contra alguno de sus compañeros, cualquiera de los
actos enumerados en la fracción anterior, si como consecuencia de ellos se altera
la disciplina del lugar en que se desempeña el trabajo;
</p>

<p align="justify">c) Ocasionar el <b>TRABAJADOR</b>, intencionalmente, perjuicios materiales durante el
desempeño de las labores o con motivo de ellas, en los edificios, obras, maquinaria,
instrumentos, materias primas y demás objetos relacionados con el trabajo;</p>

<p align="justify">d) Ocasionar el <b>TRABAJADOR</b> los perjuicios de que habla la fracción anterior siempre
que sean graves, sin dolo, pero con negligencia tal, que ella sea la causa única del
perjuicio;</p>

<p align="justify">e) Cometer el <b>TRABAJADOR</b> actos inmorales o de hostigamiento y/o acoso sexual
contra cualquier persona en el establecimiento o lugar de trabajo;</p>

<p align="justify">f) Tener el <b>TRABAJADOR</b> más de tres faltas de asistencia en un período de treinta
días, sin permiso del patrón o sin causa justificada;</p>

<p align="justify">g) Concurrir el TRABAJADOR a sus labores en estado de embriaguez o bajo la
influencia de algún narcótico o droga enervante y/o consumirlo durante su servicio
y/o jornada laboral en su centro de trabajo; salvo que, en este último caso, exista
prescripción médica. Antes de iniciar su servicio, el trabajador deberá poner el hecho
en conocimiento del patrón y presentar la prescripción suscrita por el médico;</p>

<p align="justify">h) La falta de veracidad de la información proporcionada por el <b>TRABAJADOR</b> al
<b>PATRÓN</b>, previa a la celebración de este contrato y/o durante la vigencia del
contrato por tiempo determinado o periodo “a prueba”.</p>

<p align="justify">i) Que durante la jornada laboral el <b>TRABAJADOR</b> realice actividades ajenas a las
encomendadas por el <b>PATRÓN</b> o a los Clientes de éste según se le indique.</p>

<p align="justify">j) La existencia, en cualquier momento, de cualquier conflicto de intereses entre el
<b>TRABAJADOR</b> y el <b>PATRÓN</b> o los clientes de éste, o cualquier otro tercero
relacionado de forma comercial, técnica, financiera, operativamente o de cualquier
otra manera con el <b>PATRÓN</b>.</p>

<p align="justify"><b>DÉCIMA QUINTA. EXCLUSIVIDAD Y CONFIDENCIALIDAD</b>.</p>

<p align="justify"><b>El TRABAJADOR</b> se obliga a prestar sus servicios exclusivamente al <b>PATRÓN</b>,
quedándole estrictamente prohibido dedicarse a otras actividades por su propia cuenta o
por cuenta de terceros, así como a utilizar su horario de jornada laboral para los mismos
fines. De igual manera se obliga en cualquier tiempo a no usar o revelar a persona,
sociedad, firma, individuo u organización, secretos comerciales e información confidencial
(incluyendo listas de clientes o proveedores, socios comerciales, empresas asociadas y
subsidiarias o afiliadas, que el <b>TRABAJADOR</b> haya obtenido durante el tiempo en que
existió la relación de trabajo).</p>

<p align="justify"><b>El TRABAJADOR</b> reconoce que toda la documentación, proyectos, listas de clientes,
manuales de operación, datos, diseños, archivos o información verbal o escrita de cualquier
naturaleza intercambiada, facilitada o creada en el marco de la relación de trabajo, que
pueda adquirir o a la que pueda tener acceso durante el curso de la relación laboral es
información Confidencial de la exclusiva propiedad del <b>PATRÓN</b> o de sus Clientes a las
que les preste servicio.</p>

<p align="justify"><b>El TRABAJADOR</b> estará obligado a guardar estricta reserva de la información Confidencial,
procedimientos y todos aquellos hechos y actos que con motivo de su trabajo sean de su
conocimiento y por lo tanto se obliga a no utilizar en su beneficio o en beneficio de terceras
personas ya sea directa o indirectamente la información, actos y demás hechos que sean
de su conocimiento en especial toda aquella información, procedimientos, secretos
comerciales, industriales, contables, financieros, operativos, etc., que se encuentren
protegidos por la Ley, incluso después de concluida la relación de trabajo. el
<b>TRABAJADOR</b> deberá guardar absoluta confidencialidad sobre los asuntos que le sean </p>


<p align="justify">encomendados o cualquier información que, debido a sus funciones, llegase a tener en su
poder y a usarla exclusivamente en beneficio del <b>PATRÓN</b> debiendo guardar expresa
reserva sobre la información privilegiada que pudiera tener en su poder.</p>

<p align="justify">En consecuencia, al finalizar la relación laboral, el <b>TRABAJADOR</b> entregará al PATRÒN
todos los documentos y materiales que contengan información confidencial.</p>

<p align="justify">El incumplimiento de estas obligaciones dará lugar a la rescisión de la relación de trabajo,
sin responsabilidad para el <b>PATRÓN</b>, y el <b>TRABAJADOR</b> estará obligado a responder
tanto civil como penalmente por los daños que se deriven como consecuencia del
incumplimiento doloso o culposo de su obligación de Confidencialidad.</p>

<p align="justify"><b>DÉCIMA SEXTA. SEGURIDAD SOCIAL</b>.<br>
<b>El PATRÓN</b> se obliga a inscribir al <b>TRABAJADOR</b> ante el Instituto Mexicano del Seguro
Social, en los términos de la Ley del Seguro Social. El TRABAJADOR queda obligado a
sujetarse a los reconocimientos médicos que ordene el PATRÒN, de acuerdo con lo
establecido por la Ley Federal del Trabajo, ya sea a través del Instituto Mexicano del Seguro
Social o del médico que le señale el <b>PATRÓN</b>.</p>

<p align="justify"><b>DÉCIMA SEPTIMA. OBLIGACIONES Y PROHIBICIONES DEL TRABAJADOR</b>.<br>

1. <b>El TRABAJADOR</b> tendrá las obligaciones siguientes:</p>

<p align="justify">a) Ejecutar el trabajo con la intensidad, cuidado y esmero apropiados y en la forma,
tiempo y lugar convenidos;</p>

<p align="justify">b) Dar aviso inmediato al patrón, salvo caso fortuito o de fuerza mayor, de las causas
justificadas que le impidan concurrir a su trabajo;</p>

<p align="justify">c) Restituir al patrón los materiales no usados, extraviados o dañados y conservar en
buen estado los instrumentos y útiles que les haya dado para el trabajo.</p>

<p align="justify">d) Someterse a los reconocimientos médicos previstos en el reglamento interior y
demás normas vigentes en la empresa o establecimiento, para comprobar que no
padecen alguna incapacidad o enfermedad de trabajo, contagiosa o incurable;</p>

<p align="justify">e) Poner en conocimiento del patrón las enfermedades contagiosas que padezcan, tan
pronto como tengan conocimiento de las mismas;</p>

<p align="justify">2. <b>El TRABAJADOR</b> tendrá las prohibiciones siguientes:</p>

<p align="justify">a) Ejecutar cualquier acto que pueda poner en peligro su propia seguridad, la de sus
compañeros de trabajo o la de terceras personas, así como la de los
establecimientos o lugares en donde desempeñe su trabajo;</p>

<p align="justify">b) Faltar al trabajo sin causa justificada o sin permiso del patrón;</p>

<p align="justify">c) Substraer de la empresa o establecimiento útiles de trabajo o materia prima o
elaborada; y cualquier objeto ajeno a sus herramientas de trabajo dentro de las
instalaciones del lugar donde preste el servicio, incluyendo el de los Clientes del
<b>PATRÓN</b>.</p>

<p align="justify">d) Presentarse al trabajo en estado de embriaguez o con aliento alcohólico y/o
consumirlo durante su servicio y/o jornada laboral en su centro de trabajo;</p>

<p align="justify">e) Presentarse al trabajo bajo la influencia de algún narcótico o droga enervante y/o
consumirlo durante su servicio y/o jornada laboral en su centro de trabajo, salvo que
exista prescripción médica. Antes de iniciar su servicio, el trabajador deberá poner
el hecho en conocimiento del patrón y presentarle la prescripción suscrita por el
médico;</p>

<p align="justify">f) Suspender las labores sin autorización del patrón;</p>

<p align="justify">g) Usar los útiles y herramientas suministrados por el patrón, para objeto distinto de
aquél a que están destinados;</p>

<p align="justify">h) Acosar sexualmente a cualquier persona o realizar actos inmorales en los lugares
de trabajo.</p>
<P>El no cumplir con sus obligaciones y/o ejecutar cualesquiera de las prohibiciones descritas
en el presente apartado, es causa justificativa para dar por rescindido el contrato laboral,
sin responsabilidad para el PATRON, con las consecuencias jurídicas que la Ley Laboral
establece.</P>
<p align="justify"><b>DÉCIMA OCTAVA. INTERPRETACIÒN Y JURISDICCION</b>.</p>
<p align="justify">Ambas partes convienen en que lo no estipulado en el presente Contrato se regirá por lo
dispuesto en la Ley Federal de Trabajo. En caso de controversia entre las partes respecto
de la interpretación y cumplimiento del presente Contrato, se someten a lo dispuesto por la
Ley laboral y a la jurisdicción de la Junta Federal o Local de Conciliación y Arbitraje,
renunciando a la jurisdicción que en razón de domicilio o materia pudiera corresponderles.
Leído que fue por las partes este documento, que deja sin efecto, cancela o substituye
cualquier anterior, y una vez enteradas éstas de su contenido, obligaciones y alcance, lo
ratifican y firman para la debida constancia legal en Tepotzotlán, Estado de México, el día ' . $dia . ' mes ' . $mes . ' año ' . $anio . ' .</p>







            <table>
            <tr>
            <td align="left"> <p align="center">
            ' . $company . '<br><br><br>
            <img src="icons/firmacontrato.png" align="left" width="80" height="50"><br>
            __________________________<br>
            <br>
            LIC. KAREN GUTIÉRREZ CASTAÑEDA<br>
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
        <p align="LEFT">PATRÓN: <b>' . $company . '</b></p>
        <p align="LEFT">TRABAJADOR: <b>' . $name . ' ' . $firstname . ' ' . $lastname . '</b></p>
        <p align="center"><b>ANEXO “A”  DE DECLARACIONES AL CONTRATO INDIVIDUAL DE TRABAJO</b></p>
        <p align="center"><b>DECLARACIONES</b></p>

        <p align="justify"><b>PRIMERA: EL TRABAJADOR DECLARA</b> que es de nacionalidad <b>Mexicana</b>, con fecha de nacimiento <b>' . $fechanacimiento . '</b> así mismo a la fecha de firma del presente <b>CONTRATO</b>, manifiesta contar con <b>' . $edad . '</b> años de edad, con clave <b>RFC ' . $rfc . '</b>, <b>CURP ' . $curp . '</b>, número de <b>Seguridad Social  ' . $imss . ', Estado Civil ' . $estadocivil . '</b> y con domicilio en <b>' . $calle . ' ' . $colonia . ' ' . $municipio . ' ' . $estado . ' ' . $cp . '</b>. </p>

        <p align="justify"><b>SEGUNDA: EL TRABAJADOR</b> expresa su consentimiento y autoriza al <b>PATRÓN</b> para que
        realice el depósito y/o transferencia en la cuenta bancaria que proporcione, respecto a la
        cantidad que por concepto de sueldo le corresponda como contraprestación a los servicios
        otorgados, pagaderos los días 15 y último día de cada mes, de conformidad con lo que
        establece el artículo 101 de la Ley Federal del Trabajo y a la Clausula Tercera del Contrato
        Individual de Trabajo.</p>

        <p align="justify"><b>TERCERA: EL TRABAJADOR</b> manifiesta contar con crédito de vivienda con numero <b>INFONAVIT ' . $infonavit . ' FONACOT ' . $fonacot . '</b>, Autorizando los descuentos correspondientes para el pago y amortización del mismo.</p>

        <p align="justify"><b>CUARTA:</b> Ambas partes están de acuerdo de que los trabajos, tareas, labores y actividades
        que desempeñará el <b>TRABAJADOR</b> (de acuerdo a la modalidad contratada), las cuales se
        describen de manera enunciativa y no limitativa, son las siguientes:<br></b>
        <b>1) TESI INTRAMURO.</b></p>
<p align="justify">a) Ejercer la vigilancia y protección de bienes, establecimientos, lugares y eventos,
tanto privados como públicos, así como la protección de las personas que puedan
encontrarse en los mismos, llevando a cabo las comprobaciones, registros y
prevenciones necesarias para el cumplimiento de su función.</p>

<p align="justify">b) Efectuar controles de identidad, de objetos personales, paquetería, mercancías o
vehículos, incluido el interior de éstos, en el acceso o en el interior de inmuebles o
propiedades donde presten servicio, sin que, en ningún caso, puedan retener la
documentación personal, pero sí impedir el acceso a dichos inmuebles o
propiedades. La negativa a exhibir la identificación o a permitir el control de los
objetos personales, de paquetería, mercancía o del vehículo facultará para impedir
a los particulares el acceso o para ordenarles el abandono del inmueble o propiedad
objeto de su protección.</p>

<p align="justify">c) Evitar la comisión de actos delictivos o infracciones administrativas en relación con
el objeto o inmueble de su protección, realizando las acciones necesarias para
prevenirlos o impedir su consumación, debiendo oponerse a los mismos e intervenir
cuando presenciaren la comisión de algún tipo de infracción o fuere precisa su ayuda
por razones humanitarias o de urgencia.</p>        


<p align="justify">d) En relación con el objeto o inmueble de su protección o de su actuación, detener y
poner inmediatamente a disposición de las Fuerzas y Cuerpos de Seguridad
competentes a los delincuentes y los instrumentos, efectos y pruebas de los delitos,
así como denunciar a quienes cometan infracciones administrativas.</p>

<p align="justify">e) Llevar a cabo, en relación con el funcionamiento de centrales receptoras de alarmas,
la prestación de servicios de verificación personal y respuesta de las señales de
alarmas que se produzcan.</p>

<p align="justify"><b>2) TESI MONITORISTA</b>.</p>

<p align="justify">a) Conocer las áreas de vigilancia monitoreadas por el C.C.T.V.</p>

<p align="justify">b) Permanecer alerta ante las situaciones que se observan a través de la video</p>
vigilancia la actividad de monitoreo y poner mayor atención a las áreas de mayor
riesgo.
<p align="justify">c) Registrar todas las desviaciones de las normas y procedimientos de seguridad
dentro de las instalaciones.</p>

</p>d) La observación por medio del monitor debe realizarse a todas las áreas que cuentan
con cámara de C.C.T.V. El área de cobertura se incrementa observando los detalles
de fondo de las imágenes.</p>

<p align="justify">e) Tener capacidad para identificar problemas críticos de forma rápida y precisa, así
como tomar acciones correctivas.</p>

<p align="justify">f) Identificar de inmediato (o en el menor tiempo posible), cualquier situación, anomalía
o movimiento extraño que ponga en riesgo la seguridad del inmueble o
establecimiento donde se presta el servicio.</p>

<p align="justify">g) Tomar las medidas necesarias para mitigar el riesgo identificado y salvaguardar el
inmueble o establecimiento donde se preste el servicio.</p>

<p align="justify">h) Ejecutar los protocolos de seguridad en caso de que se presente alguna situación
de riesgo en el inmueble o establecimiento donde se presta el servicio.</p>

<p align="justify">i) Entrega y recepción de turno, tomar conocimiento de novedades y notificar
novedades relevantes al Jefe de Servicio o Supervisor Operativo.</p>

<p align="justify">j) Responder a las emergencias de manera oportuna, por lo que debe permanecer
alerta, prestar atención a las alarmas y atender situaciones adversas para aplicar
los procedimientos y protocolos establecidos, mediante el envío de un equipo de
monitoreo, contactando a las autoridades, o realizando notificaciones al personal
correspondiente o autoridad competente.</p>

<p align="justify">k) Reportar de forma inmediata situaciones como: personas sospechosas que
deambulen por las zonas perimetrales y vehículos sospechosos estacionados por
largos periodos de tiempo, cerca de las instalaciones del inmueble o establecimiento
donde se presta el servicio.</p>
        <table>
            <tr>
            <td align="left"> <p align="center">
            ' . $company . '<br>
            <img src="icons/firmacontrato.png" align="left" width="80" height="50"><br>

            __________________________<br>
            LIC. KAREN GUTIÉRREZ CASTAÑEDA
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
        <p align="LEFT">PATRÓN: <b>' . $company . '</b></p>
        <p align="LEFT">TRABAJADOR: <b>' . $name . ' ' . $firstname . ' ' . $lastname . '</b></p>
        <p align="center"><b>ANEXO “B” DE DECLARACIONES AL CONTRATO INDIVIDUAL DE TRABAJO</b></p>
        <p align="center"><b>DECLARACIONES</b></p>

        <p align="justify"><b>PRIMERA: <b>El TRABAJADOR(A)</b> Declara que, en caso de muerte o desaparición forzada,
        derivada de un acto delincuencial, es su libre voluntad y designa de la siguiente manera el
        pago de los salarios y prestaciones devengadas y no cobradas:</p>

        <p align="justify">
        Esposa(o):_________________________________ en____% <br>
        Hijo(a): ____________________________________en____% <br>
        Padre: _____________________________________en____% <br>
        Madre: _____________________________________en____% <br>
        Dependiente económico: _________________________Parentesco ____________________ en _____%<br>
        </p>

        <p align="justify"><b>SEGUNDA: EL TRABAJADOR</b> Autoriza para que <b>EL PATRÓN</b> pueda entregar a sus beneficiarios si
        les corresponde y si <b>EL TRABAJADOR</b> se encuentra en los supuestos señalados en el 
        inciso K) de la declaración II, las siguientes prestaciones o cualquier otra que se le adeude:</p>

        <p align="justify">
        •	Sueldos y salarios pendientes de pago por el patrón <br>
        •	Prestaciones que le correspondan al trabajador (aguinaldo,vacaciones, prima vacacional) <br>
        •	Indemnizaciones si existiera riesgo de trabajo.

        </p>

        <p align="justify">Lo anteriormente señalado en terminos de lo que disponen los articulos 115, 501 y demás relativos y aplicables de la Ley federal del Trabajo.</p>

        <table>
        <tr>
        <td align="left"> <p align="center">
        ' . $company . '<br><br>
        <img src="icons/firmacontrato.png" align="left" width="80" height="50"><br>

        __________________________<br>
        LIC. KAREN GUTIÉRREZ CASTAÑEDA<br>
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