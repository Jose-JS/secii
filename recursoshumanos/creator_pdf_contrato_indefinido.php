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
        <p>CONTRATO INDIVIDUAL DE TRABAJO POR TIEMPO  INDETERMINADO QUE CELEBRAN CON FUNDAMENTO EN LOS ARTICULOS 24, 25, 35 Y 37 DE LA LEY FEDERAL DEL TRABAJO ( ??? LA LEY ??? ); POR UNA PARTE ' . $company . ' REPRESENTADA EN ESTE ACTO POR LIC. JOSE ALFREDO MARQUEZ HERNANDEZ, EN SU CAR??CTER DE APODERADO LEGAL, EN LO SUCESIVO EL ???PATRON??? Y POR OTRA PARTE EL C. ' . $name . ' ' . $firstname . ' ' . $lastname . ', A QUIEN SE LE DENOMINARA EL ???TRABAJADOR???, DE CONFORMIDAD CON LAS SIGUIENTES DECLARACIONES Y CLAUSULAS:</p>


        <p align="center">D E C L A R A C I O N E S<br></p>
        I. DECLARA EL PATR??N A TRAV??S DE SU APODERADO QUE:</b>
        <p>1.- Es una sociedad mercantil constituida de conformidad con las leyes de los Estados Unidos Mexicanos <b>(???M??xico???)</b>, y que dentro de sus actividades que realiza seg??n su objeto social, de manera enunciativa m??s no limitativa, es el de prestar toda clase de
        <b>SERVICIOS ADMINISTRATIVOS, T??CNICOS, DE CONSULTOR??A, DE INVESTIGACI??N, DE CAR??CTER FINANCIERO, AS?? COMO EL CONSTITUIRSE EN COMISIONISTA, AGENTE, REPRESENTANTE, FACTOR O MANDATARIO DE TODA ??NDOLE DE EMPRESAS COMERCIALES E INDUSTRIALES.</b></p>
        
        <p>2. Que su representante legal cuenta con las facultades legales suficientes para obligarse en t??rminos del presente contrato y declara bajo protesta de decir verdad que dichas facultades no le han sido revocadas ni limitadas en forma alguna a la fecha de firma del presente instrumento.</p>

        <p>3. Que su domicilio fiscal se encuentra ubicado en <b>CERRADA PIRACANTOS S/N MZ 109 LT 87, SAN MATEO XOLOC, TEPOTZOTLAN, ESTADO DE MEXICO C.P. 54600.</b></p>
        <p>4. Que, en virtud de su objeto social, es necesaria la contrataci??n del TRABAJADOR para desempe??ar las labores de <b>' . $puesto . '</b> pero cuya descripci??n espec??fica de actividades y capacidades ser??n instruidas por <b>EL PATR??N.</b></p>
        <p><b>II. DECLARA EL TRABAJADOR POR SU PROPIO DERECHO:</b></p>
        <p>1.- Llamarse como ha quedado asentado en el proemio del presente Contrato, y ratificado mediante <b>???EL ANEXO A???</b> del mismo.</p>
        <p>2.- Que posee la experiencia y capacidad necesarias para realizar las actividades y funciones que requiere <b>EL PATR??N</b> para el puesto para el que es contratado.</p>
        <p>3.- Que no tiene enfermedad o incapacidad alguna derivada de un estado patol??gico o de cualquier otra ??ndole ya sea permanente, parcial o transitoria que le imposibilite desempe??ar el trabajo para el cual es contratado.</p>
        <p>4.- Que no presta servicios subordinados en la actualidad para ninguna negociaci??n, ni recibe percepci??n alguna de otra empresa por servicios subordinados.</p>
        <p>5.- Que designara en el documento denominado como ???ANEXO B??? , que forma parte del presente CONTRATO, a un beneficiario , para el pago de los salarios y prestaciones devengadas y no cobradas, en caso de muerte o desaparici??n derivadas de un acto delincuencial.</p>
        <br pagebreak="true"/>';
        $content .= '</section>';

        $content .= '<section>
        <p><b>III. Ambas partes declaran que:</b><br></p>
        <p>1.- Se reconocen mutuamente la personalidad con que se ostentan y est??n conscientes y conformes con las declaraciones que anteceden, por lo que expresan su voluntad para celebrar el presente Contrato bajo las siguientes:</p>
        <p align="center"><b>C L A U S U L A S</b></p>
        <p><b>PRIMERA. OBJETO.</b> El <b>TRABAJADOR</b> prestar?? personalmente a <b>EL PATR??N</b> los servicios pactados en este contrato, en las labores descritas en la declaraci??n I. 4, y bajo la subordinaci??n de <b>EL PATR??N</b> y las ??rdenes que se le impartan durante la relaci??n de trabajo, misma que llevar?? a cabo con la mayor intensidad, cuidado, y esmero posibles.</p>

        <p>El <b>TRABAJADOR</b> manifiesta que est?? de acuerdo en que <b>EL PATR??N</b> podr??, en cualquier tiempo, <b>PEDIR QUE LLEVE A CABO TRABAJOS O PROYECTOS ESPEC??FICOS, POR EL TIEMPO QUE SEA NECESARIO, PARA LOS ESTABLECIMIENTOS, INSTITUCIONES FINANCIERAS, EMPRESAS, SUCURSALES, INDUSTRIAS, COMERCIOS Y  OFICINAS, A LAS QUE LES PRESTE SERVICIOS, O CON LAS QUE SE TENGA RELACIONES COMERCIALES,</b> pero ser?? siempre por cuenta y orden de <b>EL PATR??N</b>, quien ser?? el <b>??NICO RESPONSABLE DE LA RELACI??N LABORAL</b>.</p>

        <p><b>SEGUNDA. SALARIO.</b>  Las partes acuerdan que el <b>TRABAJADOR</b> percibir?? como su contraprestaci??n a sus servicios un salario diario <b>de $'.$sueldodiario.' ('.$r.')</b> el pago del salario se realizar?? en 2 (dos) exhibiciones, los d??as 15 y finales  de cada mes, en moneda de curso legal en el domicilio de <b>EL PATR??N</b> o a trav??s de tarjetas de d??bito, o transferencia electr??nica en t??rminos del art??culo 101 de la Ley Federal del Trabajo (la ???Ley???) a la cuenta que se??ale el <b>TRABAJADOR</b> y sin que dicha operaci??n genere costo alguno para el mismo, lo anterior por razones de seguridad, circunstancia con la que el <b>TRABAJADOR</b> est?? de acuerdo.</p>

        <p>El documento o la forma que acredite el abono de la cantidad a la cuenta de <b>EL TRABAJADOR</b> har?? las veces recibo de n??mina, como si hubiere sido otorgado por ??ste, para los efectos legales consiguientes e independientes de cualquier otro recibo que <b>EL TRABAJADOR</b> firme u otorgue.</p>

        <p>Los pagos que haga <b>EL PATR??N</b> al <b>TRABAJADOR</b> incluyen los s??ptimos d??as, d??as festivos o descanso obligatorio que transcurran en el periodo y estar??n sujetos a los descuentos correspondientes otorgando el <b>TRABAJADOR</b> su autorizaci??n expresa para ello.</p>
        
        <p><b>El TRABAJADOR</b> tendr?? derecho a las prestaciones de previsi??n social que <b>EL PATR??N</b> establezca, en los t??rminos y condiciones que se pacten por separado as?? como en las pol??ticas de <b>EL PATR??N</b> de conformidad con las Leyes fiscales aplicables.</p>

        <p><b>TERCERA. EROGACIONES ADICIONALES POR ORDEN Y PARTE DE EL PATR??N</b>, El PATR??N otorgar?? al TRABAJADOR, beneficios econ??micos ( en dinero o moneda de curso legal ) o prestaciones en  especie; Para  satisfacer contingencias presentes o futuras; <b>As?? como diversas erogaciones ( gratificaciones, percepciones, primas, comisiones etc. ); Tendientes a su superaci??n personal,</b> </p>
        
        <br pagebreak="true"/>
        </section>';

        $content .= '<section>
        <p><b>f??sica, social, econ??mica o cultural, mismas que les beneficien y permitan, el mejoramiento de su calidad de vida y el de su familia; Lo anterior con fundamento en lo dispuesto en los art??culos 84 y 102 de la Ley Federal del Trabajo.</b></p>

        <p><b>EL PATR??N y EL TRABAJADOR</b>, acuerdan que las erogaciones descritas en el p??rrafo anterior no forman parte de integraci??n de su salario o remuneraci??n por la prestaci??n de sus servicios o trabajos encomendados por parte del  <b>PATRON</b>.</p>

        <p><b>CUARTA. RECIBO. El PATRON</b> se obliga a emitir los recibos de pagos contenidos en comprobantes fiscales digitales por Internet (CFDI), mismos que sustituir??n a los recibos impresos; Haci??ndole saber a el <b>TRABAJADOR</b> que el contenido de un CFDI tendr?? valor probatorio si se verifica en el portal de Internet del SAT (SERVICIO DE ADMINISTRACION TRIBUTUARIA),  en el supuesto de que  <b>EL TRABAJADOR</b>, requiera los comprobantes impresos deber?? de solicitarlos por escrito al <b>PATRON</b>. </p>

        <p><b>QUINTA. VIGENCIA</b>. El presente contrato tendr?? una vigencia <b>INDEFINIDO</b>, que correr?? desde el d??a de la firma del presente contrato, y se dar?? por terminado el presente contrato y la relaci??n laboral, sin responsabilidad para ninguna de las partes si <b>EL TRABAJOR</b> no cumple de manera correcta y responsable las tareas y funciones que <b>EL PATR??N</b> le encomiende, asimismo, si <b>EL PATR??N</b> da por terminado de manera anticipada el presente contrato, no existir?? responsabilidad para <b>EL PATR??N</b>.</p>

        <p><b>SEXTA. PUESTO. El TRABAJADOR</b> desempe??ar?? el puesto de <b>' . $puesto . '</b> el cual estar?? bajo la subordinaci??n de EL PATR??N y con las obligaciones y responsabilidades que se se??alan en forma enunciativa en este contrato, y las instrucciones que sobre su trabajo y actividades relacionadas le ordene <b>EL PATR??N</b>.</p>

        <p><b>S??PTIMA. JORNADA LABORAL</b>. La duraci??n de la jornada semanal ser?? de 48 (cuarenta y ocho) horas. La jornada podr?? distribuirse en seis o cinco d??as laborables repartidos en los t??rminos de lo dispuesto por el segundo p??rrafo del Art??culo 59 de la Ley, a fin de permitir al <b>TRABAJADOR</b> el reposo del s??bado o domingo o cualquier modalidad equivalente. </p>

        <p><b>EL TRABAJADOR</b> deber?? presentarse puntualmente a sus labores en el horario convenido y est?? obligado a checar personalmente su tarjeta o a firmar personalmente listas de asistencias y/o poner su huella digital, a la entrada y salida de sus labores, as?? como tambi??n a la entrada y salida de tomar sus alimentos, por lo que el incumplimiento de <b>estos requisitos indicar?? la falta injustificada a sus labores para todos los efectos legales</b>.</p>

        <p><b>EL PATR??N</b> podr?? modificar en cualquier tiempo el horario establecido en esta cl??usula de acuerdo a las necesidades del trabajo, condici??n con la que el <b>TRABAJADOR</b> est?? de acuerdo, sin embargo, para que tengan validez dichas modificaciones, deber??n acordarse por escrito, firmado por ambas partes.</p>

        <p><b>EL TRABAJADOR si por estar incapacitado dejare de concurrir a su trabajo, deber?? de entregar la incapacidad expedida por el IMSS, al PATRON en un plazo no mayor a 3 d??as naturales, a partir de su expedici??n, siendo esta la ??nica justificaci??n medica aceptable por el PATRON. </b></p>

        <p><b>OCTAVA. D??AS DE DESCANSO. El TRABAJADOR</b> disfrutar?? semanalmente de un d??a de descanso con pago de salario ??ntegro, convini??ndose en que dicho descanso lo disfrutar?? el d??a que se le asigne. <b>El TRABAJADOR</b> no laborar?? tiempo extra, a </p>
        
        <br pagebreak="true"/>
        </section>';

        $content .= '<section>
        <p>menos que <b>EL PATR??N</b> as?? lo instruya por escrito, sin este requisito, no estar?? autorizado para prestar sus servicios en jornadas extraordinarias, ni en d??as de descanso semanal y obligatorio. Los d??as de descanso semanal ser??n el d??a que se le asigne. Los d??as de descanso obligatorio son los se??alados en el Art??culo 74 de la Ley as?? como los que <b>EL PATR??N</b> establezca.</p>

        <p><b>NOVENA. VACACIONES Y AGUINALDO. El TRABAJADOR</b> disfrutar?? de vacaciones en los t??rminos de la Ley, y de conformidad al programa formulado por <b>EL PATR??N</b>.</p>

        <p>La prima de vacaciones ser?? del 25% (veinticinco por ciento) del salario. </p>

        <p>El Aguinaldo ser?? de <b>15 (quince)</b> d??as al a??o o la proporci??n del tiempo trabajado en el a??o por el <b>TRABAJADOR</b></p>

        <p><b>D??CIMA. TERMINACI??N</b>. Ambas partes est??n de acuerdo en que el presente Contrato puede ser modificado, suspendido, rescindido o terminado en los casos y con los requisitos previstos en la Ley.</p>

        <p><b>D??CIMA PRIMERA. DOMICILIO</b>. El domicilio del <b>TRABAJADOR</b> ser?? el se??alado en las Declaraciones del presente Contrato. En caso de cambio de domicilio, el <b>TRABAJADOR</b> deber?? de dar aviso por escrito de su nuevo domicilio y hasta entonces, no se substituir?? el anteriormente se??alado.</p>

        <p><b>D??CIMA SEGUNDA. LUGAR DE TRABAJO. EL TRABAJADOR</b> prestar?? sus servicios en el domicilio  en donde <b>EL PATRON</b> le se??ale, para efectos de este contrato, <b>EL TRABAJADOR</b> prestar?? sus servicios donde el patr??n lo indique, o en el o los lugares de la Rep??blica Mexicana en donde <b>EL PATR??N REALICE ACTIVIDADES O TENGA OPERACIONES, EN SUS DOMICILIOS, O EN LOS DOMICILIOS DE LAS EMPRESAS QUE SE LES PRESTEN SERVICIOS, POR ORDEN Y CUENTA DE EL PATR??N</b>, en la realizaci??n de las labores contratadas. <b>EL TRABAJADOR</b>, en el acto de firmar el presente Contrato, da su consentimiento expreso y manifiesta estar de acuerdo, para que <b>EL PATR??N</b>, en cualquier tiempo, modifique el lugar donde prestar?? sus servicios dentro de la Rep??blica Mexicana, quedando enterado del alcance y contenido de este pacto, que es condici??n de su contrataci??n.</p>

        <p><b>D??CIMA TERCERA. OBLIGACIONES DEL TRABAJADOR. EL TRABAJADOR</b> tendr?? las siguientes obligaciones:</p>

        <p>a) <b>EL TRABAJADOR</b> reconoce que son propiedad exclusiva de <b>EL PATR??N</b> todos los documentos e informaci??n que se le proporcionen con motivo de la relaci??n de trabajo, as?? como los que <b>EL TRABAJADOR</b> prepare o formule en relaci??n o conexi??n con sus servicios, por lo que se obliga a conservarlos en buen estado y entregarlos a <b>EL PATR??N</b> en el momento en que ??sta lo requiera, o bien, al terminarse el presente contrato, por el motivo que fuere.</p>

        <p>b) <b>EL TRABAJADOR</b> reconoce que son propiedad de <b>EL PATR??N</b> en todo tiempo, los veh??culos, instrumentos, herramientas, aparatos, maquinar??a, art??culos, listas de clientes, manuales de operaci??n, y en general todos los instrumentos de trabajo, datos, dise??os e informaci??n verbal que se le proporcione con motivo de la relaci??n de trabajo</p>

        <p>c) <b>EL TRABAJADOR</b> se obliga a no divulgar ninguno de los aspectos de los negocios de <b>EL PATR??N</b>, de las empresas con el relacionadas o de sus clientes, y a no proporcionar a terceras personas, verbalmente o por escrito, directa o indirectamente, </p>
        <br pagebreak="true"/>
        </section>';

        $content .= '<section>
        <p>informaci??n alguna sobre los sistemas o actividades de cualquier clase que observe en el desempe??o de sus labores con <b>EL PATR??N</b>, o en la relaci??n de ??ste con las empresas con quienes tenga relaciones o con sus clientes, en cualquier tipo de actividad como recopilaci??n de datos, informaci??n, lista de clientes, gu??as de comerciantes, formatos de mercado, informaci??n de precios y registros y especificaciones de liberaci??n, procesos, marcas, patentes y dem??s documentos de la propiedad industrial, o todos los llamados secretos comerciales, de conformidad con el Convenio de Confidencialidad adjunto al presente contrato que forma parte integrante del mismo, en donde se detallan de manera m??s puntual a lo que se encuentra obligado <b>EL TRABAJADOR</b> en materia de propiedad intelectual.  </p>

        <p>d) Si <b>EL TRABAJADOR</b> dejare de cumplir las obligaciones a que se refiere el inciso anterior as?? como este apartado, independientemente de su responsabilidad laboral y civil por da??os y perjuicios que causar?? a <b>EL PATR??N</b>, est?? se reserva sus derechos para denunciar el o los delitos que se pudieran configurar</p>

        <p>e) <b>EL TRABAJADOR</b> acepta y est?? de acuerdo en que la propiedad y explotaci??n de las invenciones, programas o sistemas, o mejoras a los mismos realizadas en el desempe??o de las labores para <b>EL PATR??N</b>, corresponder??n, en todo caso a ??sta, as?? como el derecho a la explotaci??n de la patente o a los derechos correspondientes, ya que dichas actividades est??n incluidas en el salario y dem??s prestaciones que las partes han pactado como remuneraci??n por los servicios que deriven de este contrato. En todo caso, <b>EL PATR??N</b> tendr?? derecho, en primer t??rmino, a que se le ofrezcan por escrito dichos derechos.</p>

        <p>f) <b>EL PATR??N</b> se obliga a capacitar o adiestrar a <b>EL TRABAJADOR</b> de acuerdo a los planes y programas que existan o se establezcan conforme a lo dispuesto en el Cap??tulo III BIS del T??tulo Cuarto de la Ley, de conformidad con lo que para tal efecto determine la Comisi??n Mixta de Capacitaci??n y Adiestramiento. <b>El TRABAJADOR</b>, por su parte, se obliga a cumplir con todos los programas, cursos, sesiones de grupo o actividades que formen parte de los mismos y a presentar los ex??menes de evaluaci??n de conocimientos y aptitudes que le sean requeridos, as?? como obedecer las indicaciones de las personas que impartan la capacitaci??n y adiestramiento. Igualmente, <b>EL TRABAJADOR</b> tendr?? la obligaci??n de capacitar a sus compa??eros de trabajo, o a los trabajadores de las empresas a las que se les presten servicios, cuando as?? lo solicite <b>EL PATR??N</b>.</p>

        <p>g) <b>EL TRABAJADOR</b> acuerda a no contactar de manera directa o indirecta a los clientes y/o proveedores para fines comerciales, de negocio o cualquier otro fin similar o conexo por un periodo de 3 (tres) a??os posteriores a la fecha de terminaci??n del presente contrato y, a no competir con el negocio de <b>EL PATR??N</b> o de ninguna otra empresa relacionada con ??sta, subsidiaria, afiliada, asociada, rama o departamento de ??sta por un periodo de 3 (tres) a??os posteriores a la fecha de terminaci??n del presente Contrato.</p>

        <p>h) <b>EL TRABAJADOR</b> est?? conforme y se obliga a cumplir con las disposiciones del Reglamento Interior de Trabajo.</p>

        <p><b>I) EL PATRON no se obliga, ni se hace responsable de los actos o conductas il??citas que realice el TRABAJADOR, dentro o fuera de su centro de trabajo; cualquier situaci??n relacionada a un delito, acto o hecho delictuoso que realice el TRABAJADOR y sea motivo de iniciar denuncia y/o querella en su contra, ante las autoridades correspondientes, o en su caso de que sea parte de alg??n juicio Civil, Penal o de cualquier otra ??ndole, ser?? ??nica y exclusivamente </b></p>
        <br pagebreak="true"/>
        
        </section>';

        $content .= '<section>
        <p><b>responsabilidad del TRABAJADOR; por lo que el PATRON, quedara exento de todo tipo de responsabilidad, ya sea Civil, Penal, Administrativa, Laboral etc.</b></p>

        <p><b>D??CIMA CUARTA. RESICI??N</b>.  Ser??n causas de rescisi??n sin responsabilidad para <b>EL PATR??N</b>, sin perjuicio de las que al efecto se??ala el art??culo 47 y 135 de la Ley, quedando a criterio de <b>EL PATR??N</b> su aplicaci??n y sanci??n y dar??n lugar a su inmediata rescisi??n, las cuales de manera enunciativa, m??s no limitativa se mencionan a continuaci??n: </p>

        <p>a) Las causas que afecten patrimonialmente a <b>EL PATR??N</b>, como lo son la sustracci??n de numerario, informaci??n, la alteraci??n de documentos de comprobaci??n de asistencias, o de cualquiera otro documento, la utilizaci??n de material, papeler??a, insumos o veh??culos de la empresa para actividades distintas a las encomendadas; y el da??o causado a los mismos objetos propiedad de la empresa para actividades que antecede; </p>

        <p>b) La falta de cumplimiento adecuado por parte de <b>EL TRABAJADOR</b>, de las instrucciones que, en forma verbal o por escrito, se hayan dado por <b>EL PATR??N</b> a trav??s de sus representantes autorizados, y que se relacionen directa o indirectamente con las labores contratadas;</p>

        <p>c) La falta de veracidad de la informaci??n proporcionada por <b>EL TRABAJADOR</b> a <b>EL PATR??N</b>, previa a la celebraci??n de este contrato</p>

        <p>d) Que <b>EL TRABAJADOR</b> realice actividades ajenas a <b>EL PATR??N</b> o a los Clientes de ??sta seg??n se le ordene, durante todo o parte del tiempo que por raz??n de este contrato se obliga a trabajar para <b>EL PATR??N</b>.</p>

        <p>e) La existencia, en cualquier momento, de cualquier conflicto de intereses entre <b>EL TRABAJADOR</b> y <b>EL PATR??N</b> o los clientes de ??sta o cualquier otro tercero relacionado comercial, t??cnica, financiera, operativamente o de cualquier otra forma con <b>EL PATR??N</b>.</p>

        <p><b>D??CIMA QUINTA</b>. Ambas partes convienen en que lo no estipulado en el presente Contrato se regir?? por lo dispuesto en la Ley Federal de Trabajo. En caso de controversia entre las partes respecto de la interpretaci??n y cumplimiento del presente Contrato, se someten a lo dispuesto por la Ley y a la jurisdicci??n de la Junta Federal o Local de Conciliaci??n y Arbitraje, renunciando a la jurisdicci??n que en raz??n de domicilio o materia pudiera corresponderles.</p>
        
    
        <p>Le??do que fue por las partes este documento, que deja sin efecto, cancela o substituye cualquier anterior, y una vez enteradas ??stas de su contenido, obligaciones y alcance, se firma el presente Contrato en Tepotzotl??n Edo. de M??xico, el d??a '.$dia.' mes '.$mes.' a??o '.$anio.'.</p>

            <table>
            <tr>
            <td align="left"> <p align="center">
            EL PATR??N<br><br><br>
            
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
        <p align="center"><b>ANEXO ???A???  DE DECLARACIONES AL CONTRATO INDIVIDUAL DE TRABAJO</b></p>
        <p align="center"><b>DECLARACIONES</b></p>

        <p><b>PRIMERA: EL TRABAJADOR DECLARA</b> que es de nacionalidad <b>Mexicana</b>, con fecha de nacimiento <b>' . $fechanacimiento . '</b> as?? mismo a la fecha de firma del presente <b>CONTRATO</b>, manifiesta contar con <b>' . $edad . '</b> a??os de edad, con clave <b>RFC ' . $rfc . '</b>, <b>CURP ' . $curp . '</b>, n??mero de <b>Seguridad Social  ' . $imss . ', Estado Civil ' . $estadocivil . '</b> y con domicilio en <b>' . $calle . ' ' . $colonia . ' ' . $municipio . ' ' . $estado . ' ' . $cp . '</b>. </p>

        <p><b>SEGUNDA: EL TRABAJADOR</b> Autoriza para que <b>EL PATRON</b>, tenga la libertad de depositarme la cantidad que me corresponda como contraprestaci??n a mis servicios los 15 y finales de cada mes, de conformidad a la <b>CLAUSULA SEGUNDA DEL CONTRATO INDIVIDUAL DE TRABAJO</b> en la cuenta bancaria a mi nombre, misma que me comprometo a proporcionar a la mayor brevedad posible.</p>

        <p><b>TERCERA: EL TRABAJADOR</b> manifiesta contar con cr??dito de vivienda con numero <b>INFONAVIT '.$infonavit.' FONACOT '.$fonacot.'</b>, Autorizando los descuentos correspondientes para el pago y amortizaci??n del mismo.</p>

        <p><b>CUARTA: EL PATRON</b> pone de manifiesto que los trabajos, tareas, labores y actividades que <b>EL TRABAJADOR</b> desempe??ara son tendientes y concernientes a <br>
        ???	Ser el punto de contacto entre la planta y la sucursal.<br>
        ???	Supervisar al personal de la sucursal y las actividades realizadas en el establecimiento.<br>
        ???	Anticipar las necesidades de los clientes.<br>
        ???	Realizar el inventario e inspeccionar las ??reas de servicio<br>
        ???	Asegurar la mejor calidad de servicio, limpieza y rentabilidad posibles.<br>
        ???	Reportar al encargado de sucursal.<br>
        , definiendo <b>EL PATRON</b> como nombre del puesto de las responsabilidades encomendadas el de <b>' . $puesto . '</b>
        </p>
        <table>
            <tr>
            <td align="left"> <p align="center">
            EL PATR??N<br><br><br>
            
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
        <p align="center"><b>ANEXO ???B??? DE DECLARACIONES AL CONTRATO INDIVIDUAL DE TRABAJO</b></p>
        <p align="center"><b>DECLARACIONES</b></p>

        <p><b>PRIMERA: EL TRABAJADOR ( A )  DECLARA</b> que, en caso de muerte o desaparici??n  forzada, derivada de un acto delincuencial, designa de la siguiente manera el pago de los salarios y prestaciones devengadas y no cobradas:</p>

        <p>
        Esposa(o):_________________________________ en____% <br>
        Hijo(a): ____________________________________en____% <br>
        Padre: _____________________________________en____% <br>
        Madre: _____________________________________en____% <br>
        Dependiente econ??mico: _________________________ <br>
        Parentesco ____________________ en _____%<br>
        </p>

        <p><b>SEGUNDA: EL TRABAJADOR</b> Autoriza para que <b>EL PATR??N</b> pueda entregar a sus beneficiarios si les corresponde y si <b>EL TRABAJADOR</b> se encuentra en los supuestos se??alados en la declaraci??n primera, las siguientes prestaciones o cualquier otra que se le adeude: </p>

        <p>
        ???	Sueldos y salarios pendientes de pago por el patr??n <br>
        ???	Prestaciones del trabajador (fondo de ahorro, aguinaldo, prima vacacional) <br>
        ???	Indemnizaciones si existiera riesgo de trabajo.

        </p>

        <p><b>Lo anteriormente debidamente fundamentado en los numerales 115, 501 y dem??s relativos de la Ley federal del Trabajo</b>.</p>

        <table>
        <tr>
        <td align="left"> <p align="center">
        EL PATR??N<br><br><br>
        
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