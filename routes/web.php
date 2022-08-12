<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use Carbon\Carbon;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function () {

	Route::get('/', function () {
		return view('home');
	});
	Route::get('/home', function () {
		return view('home');
	});
	Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
	Route::post('get-actualizacion', 'PerfilController@getActualizacion');

	/** Perfil de Usuario */
	Route::get('ver-perfil', 'PerfilController@verPerfil');
	Route::get('buscar-perfil', 'PerfilController@buscarPerfil');
	Route::post('actualizar-perfil', 'PerfilController@actualizarPerfil');
	Route::get('cambiar-contrasena', 'PerfilController@cambiarContrasena');
	Route::post('actualiza-password', 'PerfilController@actualizaPassword');

	/**	Importar nuevos alumnos */
	Route::post('subir-fichero-nuevos-alumnos', 'AlumnosController@subirFicheroNuevosAlumnos');
	Route::post('delete-fichero-importar-alumno', 'AlumnosController@deleteFicheroImportarAlumno');

	/** Importar Fichas de los alumnos */
	Route::post('subir-fichero-fichas-alumnos', 'AlumnosController@subirFicheroFichasAlumnos');

	/**	Importar grupos */
	Route::post('subir-fichero-grupos', 'AlumnosController@subirFicheroGrupos');

	/** Importar matrículas grupos */
	Route::post('subir-fichero-matriculas-grupos', 'AlumnosController@subirFicheroMatriculasGrupos');

	/** Importar matrículas */
	Route::post('subir-fichero-matriculas', 'AlumnosController@subirFicheroMatriculas');
	
	/**	Alumnos */	
	Route::group(['middleware' => ['permission:gestionar-estudiantes']], function () {
		Route::get('gestionar-estudiantes', 'AlumnosController@gestionarEstudiantes')->name('gestionar-estudiantes.gestionarEstudiantes');
	});
	Route::post('/listar-estudiantes', 'AlumnosController@listarEstudiantes');
	Route::post('/ver-grupo-familiar-alumno', 'AlumnosController@verGrupoFamiliarAlumno');
	Route::post('/listar-trabajos-realizados', 'AlumnosController@listarTrabajosRealizados');
	Route::post('/eliminar-trabajo', 'AlumnosController@eliminarTrabajo');
	Route::post('guardar-imputado', 'AlumnosController@guardarTrabajoImputado');
	Route::post('/ver-hospedaje-alumno', 'AlumnosController@verHospedajeAlumno');
	Route::post('/actualizar-hospedaje', 'AlumnosController@actualizarHospedaje');	
	Route::group(['middleware' => ['permission:imputar_trabajo']], function () {
		Route::get('imputar-trabajo', 'AlumnosController@imputarTrabajo')->name('imputar-trabajo.imputarTrabajo');
	});		
	Route::group(['middleware' => ['permission:informe_trabajo_imputado']], function () {
		Route::get('informe-trabajo-imputado', 'AlumnosController@informeTrabajoImputado')->name('informe-trabajo-imputado.informeTrabajoImputado');
	});
	Route::post('/ver-pdf-imputar-trabajo', 'PdfsController@verPdfImputarTrabajo');	
	
	Route::group(['middleware' => ['permission:asignar_tarea']], function () {
		Route::get('asignar-tarea', 'AlumnosController@asignarTarea')->name('asignar-tarea.asignarTarea');
	});
	Route::post('/buscar-tareas-asignadas', 'AlumnosController@buscarTareasAsignadas');	
	Route::post('/guardar-tareas-asignadas', 'AlumnosController@guardarTareasAsignadas');	
	Route::group(['middleware' => ['permission:informe_tareas_asignadas']], function () {
		Route::get('informe-tareas-asignadas', 'AlumnosController@informeTareasAsignadas')->name('informe-tareas-asignadas.informeTareasAsignadas');
	});	
	Route::post('/ver-pdf-tareas-asignadas', 'PdfsController@verPdfTareasAsignadas');

	/**	
	 * Expediente academico
	 */
	Route::get('expediente-academico/{estudio}/{idAlumno}/{language}', 'ExpedienteAcademicoController@expedienteAcademico');


	/**	
	 *  Módulo de informes
	 */
	Route::group(['middleware' => ['permission:modulo_informes']], function () {
		Route::get('modulo-informes', 'PdfsController@moduloInformes')->name('modulo-informes.moduloInformes');
	});
	Route::post('/certificados-pdf', 'PdfsController@certificadosPdf');	

	/**	Grupos familiares */
	Route::group(['middleware' => ['permission:grupos_familiares']], function () {
		Route::get('gestionar-grupos-familiares', 'GruposFamiliaresController@gestionarGrupoFamiliar')->name('gestion-grupos-familiares.gestionarGrupoFamiliar');
	});
	Route::post('/listar-grupos-familiares', 'GruposFamiliaresController@listarGruposFamiliares');
	Route::post('/eliminar-grupo-familiar', 'GruposFamiliaresController@eliminarGrupoFamiliar');
	Route::post('/editar-grupo-familiar', 'GruposFamiliaresController@editarGrupoFamiliar');
	Route::post('/eliminar-hijo', 'GruposFamiliaresController@eliminarHijo');
	Route::post('/actualizar-hijo', 'GruposFamiliaresController@actualizarHijo');
	Route::post('/guardar-grupo-familiar', 'GruposFamiliaresController@guardarGrupoFamiliar');

	/**	Residencia */
	Route::group(['middleware' => ['permission:gestionar-residencia']], function () {
		Route::get('gestion-residencia', 'ResidenciaController@gestionResidencia')->name('gestion-residencia.gestionResidencia');
	});
	Route::post('/listar-habitaciones', 'ResidenciaController@listarHabitaciones');
	Route::post('/editar-habitacion', 'ResidenciaController@getDataHabitacion');
	Route::post('/actualizar-habitaciones', 'ResidenciaController@actualizarHabitaciones');
	Route::post('/eliminar-habitacion', 'ResidenciaController@eliminarHabitacion');
	Route::post('/listar-huespedes', 'ResidenciaController@listarHuespedes');
	Route::post('/listar-mobiliarios', 'ResidenciaController@listarMobiliarios');
	Route::post('/editar-mobiliario', 'ResidenciaController@editarMobiliario');
	Route::post('/actualizar-mobiliarios', 'ResidenciaController@actualizarMobiliarios');
	Route::post('eliminar-mobiliario', 'ResidenciaController@eliminarMobiliario');
	Route::post('/verificar-alojamiento-alumno', 'ResidenciaController@verificarAlojamientoAlumno');

	/** Tasas indicadores */
	Route::group(['middleware' => ['permission:tasas-indicadores']], function () {
		Route::get('indicadores-tasas', 'TasasIndicadoresController@indicadoresTasas')->name('indicadores-tasas.indicadoresTasas');
	});
	Route::post('ver-indicadores-tasas', 'TasasIndicadoresController@veIndicadoresTasas');
	Route::post('imprimir-pdf-indicadores-resumen', 'TasasIndicadoresController@imprimirPdfIndicadoresResumen');

	/** Grado de Satisfacción */
	Route::group(['middleware' => ['permission:grado-sastifaccion']], function () {
		Route::get('grado-sastifaccion', 'TasasIndicadoresController@gradoSatisfaccion')->name('grado-sastifaccion.gradoSatisfaccion');
	});

	/** Informe final */
	Route::group(['middleware' => ['permission:informe-final']], function () {
		Route::get('informe-final', 'TasasIndicadoresController@informeFinal')->name('informe-final.informeFinal');
	});

	Route::post('/guardar-indicadores-principales', 'TasasIndicadoresController@guardarIndicadoresPrincipales');

	Route::post('/generar-informe-final', 'TasasIndicadoresController@generarInformeFinal');

	Route::post('subir-fichero-grado-satisfaccion', 'TasasIndicadoresController@subirFicheroGradoSatisfaccion');
	//Route::post('delete-fichero-importar-alumno', 'AlumnosController@deleteFicheroImportarAlumno');
		
	/**	Usuarios */
	Route::group(['middleware' => ['permission:mantenimiento_usuarios']], function () {
		Route::get('gestion-usuarios', 'MantenimientoUsuariosController@gestionUsuarios')->name('gestion-usuarios.gestionUsuarios');
	});
	Route::post('/listar-usuarios', 'MantenimientoUsuariosController@listarUsuarios');
	Route::get('/editar-usuario', 'MantenimientoUsuariosController@editarUsuario');
	Route::get('/bloquear-usuario', 'MantenimientoUsuariosController@bloquearUsuario');
	
	/** Información de la Empresa */
	Route::group(['middleware' => ['permission:mantenimiento_empresa']], function () {
		Route::get('informacion-empresa', 'MantenimientoEmpresaController@informacionEmpresa')->name('informacion-empresa.informacionEmpresa');
	});
	Route::get('buscar-empresa', 'MantenimientoEmpresaController@buscarempresa');
	Route::post('actualizar-empresa', 'MantenimientoEmpresaController@actualizarEmpresa');
	Route::post('subir-logo', 'MantenimientoEmpresaController@subirLogo');
	Route::post('delete-logo', 'MantenimientoEmpresaController@deleteLogo');

	/** Gestión de roles */
	Route::group(['middleware' => ['permission:gestion_roles']], function () {
		Route::get('gestion-roles', 'MantenimientoRolesController@gestionRoles')->name('gestion-roles.gestionRoles');
	});
	Route::get('change-role', 'MantenimientoRolesController@changeRole');
	Route::get('revocar-permiso', 'MantenimientoRolesController@revocarPermiso');
	Route::get('dar-permiso-a', 'MantenimientoRolesController@darPermisoA');
	Route::post('nuevo-role', 'MantenimientoRolesController@nuevoRole');

	
	Route::get('delete-file-pdf', 'PdfsController@deleteFilePdf');

});
