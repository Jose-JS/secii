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
        if($sueldodiario==null){
        $formatter = new NumeroALetras();
        $formatter->conector = 'PESOS';
        $r=$formatter->toInvoice(0, 2, 'M.N.');
        }
        else{
            $formatter = new NumeroALetras();
            $formatter->conector = 'PESOS';
            $r=$formatter->toInvoice($sueldodiario, 2, 'M.N.');    
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
        $pdf->SetMargins(PDF_MARGIN_LEFT, 2, PDF_MARGIN_RIGHT);
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
        <p align="center">CONTRATO LABORAL<br></p>
        <p>CONTRATO INDIVIDUAL DE TRABAJO POR TIEMPO  INDETERMINADO QUE CELEBRAN CON FUNDAMENTO EN LOS ARTICULOS 24, 25, 35 Y 37 DE LA LEY FEDERAL DEL TRABAJO ( “ LA LEY “ ); POR UNA PARTE ' . $company . ' REPRESENTADA EN ESTE ACTO POR LIC. JOSE ALFREDO MARQUEZ HERNANDEZ, EN SU CARÁCTER DE APODERADO LEGAL, EN LO SUCESIVO EL “PATRON” Y POR OTRA PARTE EL C. ' . $name . ' ' . $firstname . ' ' . $lastname . ', A QUIEN SE LE DENOMINARA EL “TRABAJADOR”, DE CONFORMIDAD CON LAS SIGUIENTES DECLARACIONES Y CLAUSULAS:</p>


        <p align="center">D E C L A R A C I O N E S<br></p>
        I. DECLARA EL PATRÓN A TRAVÉS DE SU APODERADO QUE:</b>
        <p>1.- Es una sociedad mercantil constituida de conformidad con las leyes de los Estados Unidos Mexicanos <b>(“México”)</b>, y que dentro de sus actividades que realiza según su objeto social, de manera enunciativa más no limitativa, es el de prestar toda clase de
        <b>SERVICIOS ADMINISTRATIVOS, TÉCNICOS, DE CONSULTORÍA, DE INVESTIGACIÓN, DE CARÁCTER FINANCIERO, ASÍ COMO EL CONSTITUIRSE EN COMISIONISTA, AGENTE, REPRESENTANTE, FACTOR O MANDATARIO DE TODA ÍNDOLE DE EMPRESAS COMERCIALES E INDUSTRIALES.</b></p>
        
        <p>2. Que su representante legal cuenta con las facultades legales suficientes para obligarse en términos del presente contrato y declara bajo protesta de decir verdad que dichas facultades no le han sido revocadas ni limitadas en forma alguna a la fecha de firma del presente instrumento.</p>

        <p>3. Que su domicilio fiscal se encuentra ubicado en <b>CERRADA PIRACANTOS S/N MZ 109 LT 87, SAN MATEO XOLOC, TEPOTZOTLAN, ESTADO DE MEXICO C.P. 54600.</b></p>
        <p>4. Que, en virtud de su objeto social, es necesaria la contratación del TRABAJADOR para desempeñar las labores de <b>' . $puesto . '</b> pero cuya descripción específica de actividades y capacidades serán instruidas por <b>EL PATRÓN.</b></p>
        <p><b>II. DECLARA EL TRABAJADOR POR SU PROPIO DERECHO:</b></p>
        <p>1.- Llamarse como ha quedado asentado en el proemio del presente Contrato, y ratificado mediante <b>“EL ANEXO A”</b> del mismo.</p>
        <p>2.- Que posee la experiencia y capacidad necesarias para realizar las actividades y funciones que requiere <b>EL PATRÓN</b> para el puesto para el que es contratado.</p>
        <p>3.- Que no tiene enfermedad o incapacidad alguna derivada de un estado patológico o de cualquier otra índole ya sea permanente, parcial o transitoria que le imposibilite desempeñar el trabajo para el cual es contratado.</p>
        <p>4.- Que no presta servicios subordinados en la actualidad para ninguna negociación, ni recibe percepción alguna de otra empresa por servicios subordinados.</p>
        <p>5.- Que designara en el documento denominado como “ANEXO B” , que forma parte del presente CONTRATO, a un beneficiario , para el pago de los salarios y prestaciones devengadas y no cobradas, en caso de muerte o desaparición derivadas de un acto delincuencial.</p>
        <br pagebreak="true"/>';
        $content .= '</section>';

        $content .= '<section>
        <p><b>III. Ambas partes declaran que:</b><br></p>
        <p>1.- Se reconocen mutuamente la personalidad con que se ostentan y están conscientes y conformes con las declaraciones que anteceden, por lo que expresan su voluntad para celebrar el presente Contrato bajo las siguientes:</p>
        <p align="center"><b>C L A U S U L A S</b></p>
        <p><b>PRIMERA. OBJETO.</b> El <b>TRABAJADOR</b> prestará personalmente a <b>EL PATRÓN</b> los servicios pactados en este contrato, en las labores descritas en la declaración I. 4, y bajo la subordinación de <b>EL PATRÓN</b> y las órdenes que se le impartan durante la relación de trabajo, misma que llevará a cabo con la mayor intensidad, cuidado, y esmero posibles.</p>

        <p>El <b>TRABAJADOR</b> manifiesta que está de acuerdo en que <b>EL PATRÓN</b> podrá, en cualquier tiempo, <b>PEDIR QUE LLEVE A CABO TRABAJOS O PROYECTOS ESPECÍFICOS, POR EL TIEMPO QUE SEA NECESARIO, PARA LOS ESTABLECIMIENTOS, INSTITUCIONES FINANCIERAS, EMPRESAS, SUCURSALES, INDUSTRIAS, COMERCIOS Y  OFICINAS, A LAS QUE LES PRESTE SERVICIOS, O CON LAS QUE SE TENGA RELACIONES COMERCIALES,</b> pero será siempre por cuenta y orden de <b>EL PATRÓN</b>, quien será el <b>ÚNICO RESPONSABLE DE LA RELACIÓN LABORAL</b>.</p>

        <p><b>SEGUNDA. SALARIO.</b>  Las partes acuerdan que el <b>TRABAJADOR</b> percibirá como su contraprestación a sus servicios un salario diario <b>de $'.$sueldodiario.' ('.$r.')</b> el pago del salario se realizará en 2 (dos) exhibiciones, los días 15 y finales  de cada mes, en moneda de curso legal en el domicilio de <b>EL PATRÓN</b> o a través de tarjetas de débito, o transferencia electrónica en términos del artículo 101 de la Ley Federal del Trabajo (la “Ley”) a la cuenta que señale el <b>TRABAJADOR</b> y sin que dicha operación genere costo alguno para el mismo, lo anterior por razones de seguridad, circunstancia con la que el <b>TRABAJADOR</b> está de acuerdo.</p>

        <p>El documento o la forma que acredite el abono de la cantidad a la cuenta de <b>EL TRABAJADOR</b> hará las veces recibo de nómina, como si hubiere sido otorgado por éste, para los efectos legales consiguientes e independientes de cualquier otro recibo que <b>EL TRABAJADOR</b> firme u otorgue.</p>

        <p>Los pagos que haga <b>EL PATRÓN</b> al <b>TRABAJADOR</b> incluyen los séptimos días, días festivos o descanso obligatorio que transcurran en el periodo y estarán sujetos a los descuentos correspondientes otorgando el <b>TRABAJADOR</b> su autorización expresa para ello.</p>
        
        <p><b>El TRABAJADOR</b> tendrá derecho a las prestaciones de previsión social que <b>EL PATRÓN</b> establezca, en los términos y condiciones que se pacten por separado así como en las políticas de <b>EL PATRÓN</b> de conformidad con las Leyes fiscales aplicables.</p>

        <p><b>TERCERA. EROGACIONES ADICIONALES POR ORDEN Y PARTE DE EL PATRÓN</b>, El PATRÓN otorgará al TRABAJADOR, beneficios económicos ( en dinero o moneda de curso legal ) o prestaciones en  especie; Para  satisfacer contingencias presentes o futuras; <b>Así como diversas erogaciones ( gratificaciones, percepciones, primas, comisiones etc. ); Tendientes a su superación personal,</b> </p>
        
        <br pagebreak="true"/>
        </section>';

        $content .= '<section>
        <p><b>física, social, económica o cultural, mismas que les beneficien y permitan, el mejoramiento de su calidad de vida y el de su familia; Lo anterior con fundamento en lo dispuesto en los artículos 84 y 102 de la Ley Federal del Trabajo.</b></p>

        <p><b>EL PATRÓN y EL TRABAJADOR</b>, acuerdan que las erogaciones descritas en el párrafo anterior no forman parte de integración de su salario o remuneración por la prestación de sus servicios o trabajos encomendados por parte del  <b>PATRON</b>.</p>

        <p><b>CUARTA. RECIBO. El PATRON</b> se obliga a emitir los recibos de pagos contenidos en comprobantes fiscales digitales por Internet (CFDI), mismos que sustituirán a los recibos impresos; Haciéndole saber a el <b>TRABAJADOR</b> que el contenido de un CFDI tendrá valor probatorio si se verifica en el portal de Internet del SAT (SERVICIO DE ADMINISTRACION TRIBUTUARIA),  en el supuesto de que  <b>EL TRABAJADOR</b>, requiera los comprobantes impresos deberá de solicitarlos por escrito al <b>PATRON</b>. </p>

        <p><b>QUINTA. VIGENCIA</b>. El presente contrato tendrá una vigencia <b>INDEFINIDO</b>, que correrá desde el día de la firma del presente contrato, y se dará por terminado el presente contrato y la relación laboral, sin responsabilidad para ninguna de las partes si <b>EL TRABAJOR</b> no cumple de manera correcta y responsable las tareas y funciones que <b>EL PATRÓN</b> le encomiende, asimismo, si <b>EL PATRÓN</b> da por terminado de manera anticipada el presente contrato, no existirá responsabilidad para <b>EL PATRÓN</b>.</p>

        <p><b>SEXTA. PUESTO. El TRABAJADOR</b> desempeñará el puesto de <b>' . $puesto . '</b> el cual estará bajo la subordinación de EL PATRÓN y con las obligaciones y responsabilidades que se señalan en forma enunciativa en este contrato, y las instrucciones que sobre su trabajo y actividades relacionadas le ordene <b>EL PATRÓN</b>.</p>

        <p><b>SÉPTIMA. JORNADA LABORAL</b>. La duración de la jornada semanal será de 48 (cuarenta y ocho) horas. La jornada podrá distribuirse en seis o cinco días laborables repartidos en los términos de lo dispuesto por el segundo párrafo del Artículo 59 de la Ley, a fin de permitir al <b>TRABAJADOR</b> el reposo del sábado o domingo o cualquier modalidad equivalente. </p>

        <p><b>EL TRABAJADOR</b> deberá presentarse puntualmente a sus labores en el horario convenido y está obligado a checar personalmente su tarjeta o a firmar personalmente listas de asistencias y/o poner su huella digital, a la entrada y salida de sus labores, así como también a la entrada y salida de tomar sus alimentos, por lo que el incumplimiento de <b>estos requisitos indicará la falta injustificada a sus labores para todos los efectos legales</b>.</p>

        <p><b>EL PATRÓN</b> podrá modificar en cualquier tiempo el horario establecido en esta cláusula de acuerdo a las necesidades del trabajo, condición con la que el <b>TRABAJADOR</b> está de acuerdo, sin embargo, para que tengan validez dichas modificaciones, deberán acordarse por escrito, firmado por ambas partes.</p>

        <p><b>EL TRABAJADOR si por estar incapacitado dejare de concurrir a su trabajo, deberá de entregar la incapacidad expedida por el IMSS, al PATRON en un plazo no mayor a 3 días naturales, a partir de su expedición, siendo esta la única justificación medica aceptable por el PATRON. </b></p>

        <p><b>OCTAVA. DÍAS DE DESCANSO. El TRABAJADOR</b> disfrutará semanalmente de un día de descanso con pago de salario íntegro, conviniéndose en que dicho descanso lo disfrutará el día que se le asigne. <b>El TRABAJADOR</b> no laborará tiempo extra, a </p>
        
        <br pagebreak="true"/>
        </section>';

        $content .= '<section>
        <p>menos que <b>EL PATRÓN</b> así lo instruya por escrito, sin este requisito, no estará autorizado para prestar sus servicios en jornadas extraordinarias, ni en días de descanso semanal y obligatorio. Los días de descanso semanal serán el día que se le asigne. Los días de descanso obligatorio son los señalados en el Artículo 74 de la Ley así como los que <b>EL PATRÓN</b> establezca.</p>

        <p><b>NOVENA. VACACIONES Y AGUINALDO. El TRABAJADOR</b> disfrutará de vacaciones en los términos de la Ley, y de conformidad al programa formulado por <b>EL PATRÓN</b>.</p>

        <p>La prima de vacaciones será del 25% (veinticinco por ciento) del salario. </p>

        <p>El Aguinaldo será de <b>15 (quince)</b> días al año o la proporción del tiempo trabajado en el año por el <b>TRABAJADOR</b></p>

        <p><b>DÉCIMA. TERMINACIÓN</b>. Ambas partes están de acuerdo en que el presente Contrato puede ser modificado, suspendido, rescindido o terminado en los casos y con los requisitos previstos en la Ley.</p>

        <p><b>DÉCIMA PRIMERA. DOMICILIO</b>. El domicilio del <b>TRABAJADOR</b> será el señalado en las Declaraciones del presente Contrato. En caso de cambio de domicilio, el <b>TRABAJADOR</b> deberá de dar aviso por escrito de su nuevo domicilio y hasta entonces, no se substituirá el anteriormente señalado.</p>

        <p><b>DÉCIMA SEGUNDA. LUGAR DE TRABAJO. EL TRABAJADOR</b> prestará sus servicios en el domicilio  en donde <b>EL PATRON</b> le señale, para efectos de este contrato, <b>EL TRABAJADOR</b> prestará sus servicios donde el patrón lo indique, o en el o los lugares de la República Mexicana en donde <b>EL PATRÓN REALICE ACTIVIDADES O TENGA OPERACIONES, EN SUS DOMICILIOS, O EN LOS DOMICILIOS DE LAS EMPRESAS QUE SE LES PRESTEN SERVICIOS, POR ORDEN Y CUENTA DE EL PATRÓN</b>, en la realización de las labores contratadas. <b>EL TRABAJADOR</b>, en el acto de firmar el presente Contrato, da su consentimiento expreso y manifiesta estar de acuerdo, para que <b>EL PATRÓN</b>, en cualquier tiempo, modifique el lugar donde prestará sus servicios dentro de la República Mexicana, quedando enterado del alcance y contenido de este pacto, que es condición de su contratación.</p>

        <p><b>DÉCIMA TERCERA. OBLIGACIONES DEL TRABAJADOR. EL TRABAJADOR</b> tendrá las siguientes obligaciones:</p>

        <p>a) <b>EL TRABAJADOR</b> reconoce que son propiedad exclusiva de <b>EL PATRÓN</b> todos los documentos e información que se le proporcionen con motivo de la relación de trabajo, así como los que <b>EL TRABAJADOR</b> prepare o formule en relación o conexión con sus servicios, por lo que se obliga a conservarlos en buen estado y entregarlos a <b>EL PATRÓN</b> en el momento en que ésta lo requiera, o bien, al terminarse el presente contrato, por el motivo que fuere.</p>

        <p>b) <b>EL TRABAJADOR</b> reconoce que son propiedad de <b>EL PATRÓN</b> en todo tiempo, los vehículos, instrumentos, herramientas, aparatos, maquinaría, artículos, listas de clientes, manuales de operación, y en general todos los instrumentos de trabajo, datos, diseños e información verbal que se le proporcione con motivo de la relación de trabajo</p>

        <p>c) <b>EL TRABAJADOR</b> se obliga a no divulgar ninguno de los aspectos de los negocios de <b>EL PATRÓN</b>, de las empresas con el relacionadas o de sus clientes, y a no proporcionar a terceras personas, verbalmente o por escrito, directa o indirectamente, </p>
        <br pagebreak="true"/>
        </section>';

        $content .= '<section>
        <p>información alguna sobre los sistemas o actividades de cualquier clase que observe en el desempeño de sus labores con <b>EL PATRÓN</b>, o en la relación de éste con las empresas con quienes tenga relaciones o con sus clientes, en cualquier tipo de actividad como recopilación de datos, información, lista de clientes, guías de comerciantes, formatos de mercado, información de precios y registros y especificaciones de liberación, procesos, marcas, patentes y demás documentos de la propiedad industrial, o todos los llamados secretos comerciales, de conformidad con el Convenio de Confidencialidad adjunto al presente contrato que forma parte integrante del mismo, en donde se detallan de manera más puntual a lo que se encuentra obligado <b>EL TRABAJADOR</b> en materia de propiedad intelectual.  </p>

        <p>d) Si <b>EL TRABAJADOR</b> dejare de cumplir las obligaciones a que se refiere el inciso anterior así como este apartado, independientemente de su responsabilidad laboral y civil por daños y perjuicios que causaré a <b>EL PATRÓN</b>, está se reserva sus derechos para denunciar el o los delitos que se pudieran configurar</p>

        <p>e) <b>EL TRABAJADOR</b> acepta y está de acuerdo en que la propiedad y explotación de las invenciones, programas o sistemas, o mejoras a los mismos realizadas en el desempeño de las labores para <b>EL PATRÓN</b>, corresponderán, en todo caso a ésta, así como el derecho a la explotación de la patente o a los derechos correspondientes, ya que dichas actividades están incluidas en el salario y demás prestaciones que las partes han pactado como remuneración por los servicios que deriven de este contrato. En todo caso, <b>EL PATRÓN</b> tendrá derecho, en primer término, a que se le ofrezcan por escrito dichos derechos.</p>

        <p>f) <b>EL PATRÓN</b> se obliga a capacitar o adiestrar a <b>EL TRABAJADOR</b> de acuerdo a los planes y programas que existan o se establezcan conforme a lo dispuesto en el Capítulo III BIS del Título Cuarto de la Ley, de conformidad con lo que para tal efecto determine la Comisión Mixta de Capacitación y Adiestramiento. <b>El TRABAJADOR</b>, por su parte, se obliga a cumplir con todos los programas, cursos, sesiones de grupo o actividades que formen parte de los mismos y a presentar los exámenes de evaluación de conocimientos y aptitudes que le sean requeridos, así como obedecer las indicaciones de las personas que impartan la capacitación y adiestramiento. Igualmente, <b>EL TRABAJADOR</b> tendrá la obligación de capacitar a sus compañeros de trabajo, o a los trabajadores de las empresas a las que se les presten servicios, cuando así lo solicite <b>EL PATRÓN</b>.</p>

        <p>g) <b>EL TRABAJADOR</b> acuerda a no contactar de manera directa o indirecta a los clientes y/o proveedores para fines comerciales, de negocio o cualquier otro fin similar o conexo por un periodo de 3 (tres) años posteriores a la fecha de terminación del presente contrato y, a no competir con el negocio de <b>EL PATRÓN</b> o de ninguna otra empresa relacionada con ésta, subsidiaria, afiliada, asociada, rama o departamento de ésta por un periodo de 3 (tres) años posteriores a la fecha de terminación del presente Contrato.</p>

        <p>h) <b>EL TRABAJADOR</b> está conforme y se obliga a cumplir con las disposiciones del Reglamento Interior de Trabajo.</p>

        <p><b>I) EL PATRON no se obliga, ni se hace responsable de los actos o conductas ilícitas que realice el TRABAJADOR, dentro o fuera de su centro de trabajo; cualquier situación relacionada a un delito, acto o hecho delictuoso que realice el TRABAJADOR y sea motivo de iniciar denuncia y/o querella en su contra, ante las autoridades correspondientes, o en su caso de que sea parte de algún juicio Civil, Penal o de cualquier otra índole, será única y exclusivamente </b></p>
        <br pagebreak="true"/>
        
        </section>';

        $content .= '<section>
        <p><b>responsabilidad del TRABAJADOR; por lo que el PATRON, quedara exento de todo tipo de responsabilidad, ya sea Civil, Penal, Administrativa, Laboral etc.</b></p>

        <p><b>DÉCIMA CUARTA. RESICIÓN</b>.  Serán causas de rescisión sin responsabilidad para <b>EL PATRÓN</b>, sin perjuicio de las que al efecto señala el artículo 47 y 135 de la Ley, quedando a criterio de <b>EL PATRÓN</b> su aplicación y sanción y darán lugar a su inmediata rescisión, las cuales de manera enunciativa, más no limitativa se mencionan a continuación: </p>

        <p>a) Las causas que afecten patrimonialmente a <b>EL PATRÓN</b>, como lo son la sustracción de numerario, información, la alteración de documentos de comprobación de asistencias, o de cualquiera otro documento, la utilización de material, papelería, insumos o vehículos de la empresa para actividades distintas a las encomendadas; y el daño causado a los mismos objetos propiedad de la empresa para actividades que antecede; </p>

        <p>b) La falta de cumplimiento adecuado por parte de <b>EL TRABAJADOR</b>, de las instrucciones que, en forma verbal o por escrito, se hayan dado por <b>EL PATRÓN</b> a través de sus representantes autorizados, y que se relacionen directa o indirectamente con las labores contratadas;</p>

        <p>c) La falta de veracidad de la información proporcionada por <b>EL TRABAJADOR</b> a <b>EL PATRÓN</b>, previa a la celebración de este contrato</p>

        <p>d) Que <b>EL TRABAJADOR</b> realice actividades ajenas a <b>EL PATRÓN</b> o a los Clientes de ésta según se le ordene, durante todo o parte del tiempo que por razón de este contrato se obliga a trabajar para <b>EL PATRÓN</b>.</p>

        <p>e) La existencia, en cualquier momento, de cualquier conflicto de intereses entre <b>EL TRABAJADOR</b> y <b>EL PATRÓN</b> o los clientes de ésta o cualquier otro tercero relacionado comercial, técnica, financiera, operativamente o de cualquier otra forma con <b>EL PATRÓN</b>.</p>

        <p><b>DÉCIMA QUINTA</b>. Ambas partes convienen en que lo no estipulado en el presente Contrato se regirá por lo dispuesto en la Ley Federal de Trabajo. En caso de controversia entre las partes respecto de la interpretación y cumplimiento del presente Contrato, se someten a lo dispuesto por la Ley y a la jurisdicción de la Junta Federal o Local de Conciliación y Arbitraje, renunciando a la jurisdicción que en razón de domicilio o materia pudiera corresponderles.</p>
        
    
        <p>Leído que fue por las partes este documento, que deja sin efecto, cancela o substituye cualquier anterior, y una vez enteradas éstas de su contenido, obligaciones y alcance, se firma el presente Contrato en Tepotzotlán Edo. de México, el día '.$dia.' mes '.$mes.' año '.$anio.'.</p>

            <table>
            <tr>
            <td align="left"> <p align="center">
            EL PATRÓN<br><br><br>
            
            __________________________<br>
            ' . $company . '<br>
            LIC. JOSE ALFREDO MARQUEZ HERNANDEZ<br>
            REPRESENTANTE LEGAL.
            </p></td>

            <td align="right"> <p align="center">
            EL TRABAJADOR<br><br><br>
            
            
            __________________________<br>
            C. ' . $name . ' ' . $firstname . ' ' . $lastname . '
            
            
            </p></td>
            </tr>
          
            </table>
            <br pagebreak="true"/>
        </section>';

        //Datos generales
        $content .= '<section>
        <p align="center"><b>CONTRATO LABORAL</b></p>
        <p align="center"><b>' . $company . '</b></p>
        <p align="center"><b>ANEXO “A”  DE DECLARACIONES AL CONTRATO INDIVIDUAL DE TRABAJO</b></p>
        <p align="center"><b>DECLARACIONES</b></p>

        <p><b>PRIMERA: EL TRABAJADOR DECLARA</b> que es de nacionalidad <b>Mexicana</b>, con fecha de nacimiento <b>' . $fechanacimiento . '</b> así mismo a la fecha de firma del presente <b>CONTRATO</b>, manifiesta contar con <b>' . $edad . '</b> años de edad, con clave <b>RFC ' . $rfc . '</b>, <b>CURP ' . $curp . '</b>, número de <b>Seguridad Social  ' . $imss . ', Estado Civil ' . $estadocivil . '</b> y con domicilio en <b>' . $calle . ' ' . $colonia . ' ' . $municipio . ' ' . $estado . ' ' . $cp . '</b>. </p>

        <p><b>SEGUNDA: EL TRABAJADOR</b> Autoriza para que <b>EL PATRON</b>, tenga la libertad de depositarme la cantidad que me corresponda como contraprestación a mis servicios los 15 y finales de cada mes, de conformidad a la <b>CLAUSULA SEGUNDA DEL CONTRATO INDIVIDUAL DE TRABAJO</b> en la cuenta bancaria a mi nombre, misma que me comprometo a proporcionar a la mayor brevedad posible.</p>

        <p><b>TERCERA: EL TRABAJADOR</b> manifiesta contar con crédito de vivienda con numero <b>INFONAVIT '.$infonavit.' FONACOT '.$fonacot.'</b>, Autorizando los descuentos correspondientes para el pago y amortización del mismo.</p>

        <p><b>CUARTA: EL PATRON</b> pone de manifiesto que los trabajos, tareas, labores y actividades que <b>EL TRABAJADOR</b> desempeñara son tendientes y concernientes a <br>
        •	Ser el punto de contacto entre la planta y la sucursal.<br>
        •	Supervisar al personal de la sucursal y las actividades realizadas en el establecimiento.<br>
        •	Anticipar las necesidades de los clientes.<br>
        •	Realizar el inventario e inspeccionar las áreas de servicio<br>
        •	Asegurar la mejor calidad de servicio, limpieza y rentabilidad posibles.<br>
        •	Reportar al encargado de sucursal.<br>
        , definiendo <b>EL PATRON</b> como nombre del puesto de las responsabilidades encomendadas el de <b>' . $puesto . '</b>
        </p>
        <table>
            <tr>
            <td align="left"> <p align="center">
            EL PATRÓN<br><br><br>
            
            __________________________<br>
            ' . $company . '<br>
            LIC. JOSE ALFREDO MARQUEZ HERNANDEZ<br>
            REPRESENTANTE LEGAL.
            </p></td>

            <td align="right"> <p align="center">
            EL TRABAJADOR<br><br><br>
            
            
            __________________________<br>
            C. ' . $name . ' ' . $firstname . ' ' . $lastname . ' 
            
            
            </p></td>
            </tr>
          
            </table>
            <br pagebreak="true"/>
        
        </section>';

        $content .= '<section>
        <p align="center"><b>CONTRATO LABORAL</b></p>
        <p align="center"><b>' . $company . '</b></p>
        <p align="center"><b>ANEXO “B” DE DECLARACIONES AL CONTRATO INDIVIDUAL DE TRABAJO</b></p>
        <p align="center"><b>DECLARACIONES</b></p>

        <p><b>PRIMERA: EL TRABAJADOR ( A )  DECLARA</b> que, en caso de muerte o desaparición  forzada, derivada de un acto delincuencial, designa de la siguiente manera el pago de los salarios y prestaciones devengadas y no cobradas:</p>

        <p>
        Esposa(o):_________________________________ en____% <br>
        Hijo(a): ____________________________________en____% <br>
        Padre: _____________________________________en____% <br>
        Madre: _____________________________________en____% <br>
        Dependiente económico: _________________________ <br>
        Parentesco ____________________ en _____%<br>
        </p>

        <p><b>SEGUNDA: EL TRABAJADOR</b> Autoriza para que <b>EL PATRÓN</b> pueda entregar a sus beneficiarios si les corresponde y si <b>EL TRABAJADOR</b> se encuentra en los supuestos señalados en la declaración primera, las siguientes prestaciones o cualquier otra que se le adeude: </p>

        <p>
        •	Sueldos y salarios pendientes de pago por el patrón <br>
        •	Prestaciones del trabajador (fondo de ahorro, aguinaldo, prima vacacional) <br>
        •	Indemnizaciones si existiera riesgo de trabajo.

        </p>

        <p><b>Lo anteriormente debidamente fundamentado en los numerales 115, 501 y demás relativos de la Ley federal del Trabajo</b>.</p>

        <table>
        <tr>
        <td align="left"> <p align="center">
        EL PATRÓN<br><br><br>
        
        __________________________<br>
        ' . $company . '<br>
        LIC. JOSE ALFREDO MARQUEZ HERNANDEZ<br>
        REPRESENTANTE LEGAL.
        </p></td>

        <td align="right"> <p align="center">
        EL TRABAJADOR<br><br><br>
        
        
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