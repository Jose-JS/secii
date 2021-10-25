function valid() {
                var txttesientrega = document.getElementById('tesientrega').selectedIndex;
                var txttesirecibe = document.getElementById('tesirecibe').selectedIndex;
                var txtlampara = document.getElementById('lampara').selectedIndex;
                var txtfornitura = document.getElementById('fornitura').selectedIndex;
                var txtpr24 = document.getElementById('pr24').selectedIndex;
                var txtbaston = document.getElementById('baston').selectedIndex;
                var txtgas = document.getElementById('gas').selectedIndex;
                var txttaser = document.getElementById('taser').selectedIndex;
                var txtchamarra = document.getElementById('chamarra').selectedIndex;
                var txtabrigo = document.getElementById('abrigo').selectedIndex;
                var txtbotas = document.getElementById('botas').selectedIndex;
                var txtsombrilla = document.getElementById('sombrilla').selectedIndex;
                var txtchaleco = document.getElementById('chaleco').selectedIndex;
                var txtimpermeable = document.getElementById('impermeable').selectedIndex;
                var txtarmacorta = document.getElementById('armacorta').selectedIndex;
                var txtarmalarga = document.getElementById('armalarga').selectedIndex;
                var txtcelular = document.getElementById('celular').selectedIndex;
                var txtcargador1 = document.getElementById('cargador1').selectedIndex;
                var txtgarrafones = document.getElementById('garrafones').selectedIndex;
                var txttrastes = document.getElementById('trastes').selectedIndex;
                var txtservibar = document.getElementById('servibar').selectedIndex;
                var txtparrilla = document.getElementById('parrilla').selectedIndex;
                var txtmicroondas = document.getElementById('microondas').selectedIndex;
                var txtradio = document.getElementById('radio').selectedIndex;
                var txtcargador2 = document.getElementById('cargador2').selectedIndex;
                var txtfocos = document.getElementById('focos').selectedIndex;
                var txtextintores = document.getElementById('extintores').selectedIndex;
                var txtcamaras = document.getElementById('camaras').selectedIndex;
                var txtvidrios = document.getElementById('vidrios').selectedIndex;
                var txtpuertas = document.getElementById('puertas').selectedIndex;
                var txtagua = document.getElementById('agua').selectedIndex;
                var txtluz = document.getElementById('luz').selectedIndex;
				var txtsede = document.getElementById('sede').selectedIndex;
				var txtfecha = document.getElementById('fecha').value;
				var txthora = document.getElementById('hora').value;

				if (txtsede == null || txtsede == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione un Servicio',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }

				else if (!isNaN(txtfecha)) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Debe elegir una fecha',
						icon: 'error',
						confirmButtonText: 'Entiendo'
					})
					return false;
				}

				else if (!isNaN(txthora)) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Debe elegir una Hora',
						icon: 'error',
						confirmButtonText: 'Entiendo'
					})
					return false;
				}

                else if (txttesientrega == null || txttesientrega == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione un tesi que entrega',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }

                else if (txttesirecibe == null || txttesirecibe == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione un tesi que recibe',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }
                
                else if (txtlampara == null || txtlampara == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione una opcion de lampara',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }
                else if (txtfornitura == null || txtfornitura == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione una opcion de Fornitura',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }

                else if (txtpr24 == null || txtpr24 == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione una opcion de Pr-24',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }

                else if (txtbaston == null || txtbaston == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione una opcion de Baston',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }

                else if (txtgas == null || txtgas == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione una opcion de Gas pimienta',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }

                else if (txttaser == null || txttaser == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione una opcion de Taser',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }

                else if (txtchamarra == null || txtchamarra == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione una opcion de Chamarra',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }

                else if (txtabrigo == null || txtabrigo == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione una opcion de Abrigo',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }

                else if (txtbotas == null || txtbotas == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione una opcion de Botas',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }

                else if (txtsombrilla == null || txtsombrilla == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione una opcion de Sombrilla',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }

                else if (txtchaleco == null || txtchaleco == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione una opcion de Chaleco',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }

                else if (txtimpermeable == null || txtimpermeable == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione una opcion de Impermeable',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }

                else if (txtarmacorta == null || txtarmacorta == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione una opcion de Arma corta',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }

                else if (txtarmalarga == null || txtarmalarga == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione una opcion de Arma larga',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }

                else if (txtcelular == null || txtcelular == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione una opcion de Celular',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }

                else if (txtcargador1 == null || txtcargador1 == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione una opcion de Cargador',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }

                else if (txtgarrafones == null || txtgarrafones == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione una opcion de Garrafones',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }

                else if (txttrastes == null || txttrastes == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione una opcion de Trastes',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }

                else if (txtservibar == null || txtservibar == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione una opcion de Servibar',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }

                else if (txtparrilla == null || txtparrilla == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione una opcion de Parrilla',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }

                else if (txtmicroondas == null || txtmicroondas == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione una opcion de Horno de microondas',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }

                else if (txtradio == null || txtradio == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione una opcion de Radio troncal',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }

                else if (txtcargador2 == null || txtcargador2 == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione una opcion de Cargador',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }

                else if (txtfocos == null || txtfocos == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione una opcion de Focos',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }

                else if (txtextintores == null || txtextintores == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione una opcion de Extintores',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }

                else if (txtcamaras == null || txtcamaras == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione una opcion de Camaras',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }

                else if (txtvidrios == null || txtvidrios == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione una opcion de Vidrios',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }

                else if (txtpuertas == null || txtpuertas == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione una opcion de Puertas',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }

                else if (txtagua == null || txtagua == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione una opcion de Agua',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }

                else if (txtluz == null || txtluz == 0) {
					Swal.fire({
						title: 'Campo Obligatorio',
						text: 'Por favor seleccione una opcion de Luz',
						icon: 'error',
						confirmButtonText: 'Entiendo'
                      
					})
                    return false;
                }

                return true;
            }