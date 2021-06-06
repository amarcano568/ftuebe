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

	
	/**	Alumnos */	
	Route::group(['middleware' => ['permission:gestion_alumnos']], function () {
		Route::get('gestionar-estudiantes', 'AlumnosController@gestionarEstudiantes')->name('gestion-estudiantes.gestionarEstudiantes');
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
	Route::group(['middleware' => ['permission:gestion_grupos_familiares']], function () {
		Route::get('gestionar-grupos-familiares', 'GruposFamiliaresController@gestionarGrupoFamiliar')->name('gestion-grupos-familiares.gestionarGrupoFamiliar');
	});
	Route::post('/listar-grupos-familiares', 'GruposFamiliaresController@listarGruposFamiliares');
	Route::post('/eliminar-grupo-familiar', 'GruposFamiliaresController@eliminarGrupoFamiliar');
	Route::post('/editar-grupo-familiar', 'GruposFamiliaresController@editarGrupoFamiliar');
	Route::post('/eliminar-hijo', 'GruposFamiliaresController@eliminarHijo');
	Route::post('/actualizar-hijo', 'GruposFamiliaresController@actualizarHijo');
	Route::post('/guardar-grupo-familiar', 'GruposFamiliaresController@guardarGrupoFamiliar');

	/**	Residencia */
	Route::group(['middleware' => ['permission:gestion_residencia']], function () {
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
		
	/**	Usuarios */
	// Route::group(['middleware' => ['permission:mantenimiento_usuarios']], function () {
	// 	Route::get('gestion-usuarios', 'MantenimientoUsuariosController@gestionUsuarios')->name('gestion-usuarios.gestionUsuarios');
	// });
	// Route::get('/listar-usuarios', 'MantenimientoUsuariosController@listarUsuarios');
	// Route::get('/editar-usuario', 'MantenimientoUsuariosController@editarUsuario');
	// Route::get('/bloquear-usuario', 'MantenimientoUsuariosController@bloquearUsuario');
	
	/** Información de la Empresa */
	// Route::group(['middleware' => ['permission:mantenimiento_empresa']], function () {
	// 	Route::get('informacion-empresa', 'MantenimientoEmpresaController@informacionEmpresa')->name('informacion-empresa.informacionEmpresa');
	// });
	// Route::get('buscar-empresa', 'MantenimientoEmpresaController@buscarempresa');
	// Route::post('actualizar-empresa', 'MantenimientoEmpresaController@actualizarEmpresa');
	// Route::post('subir-logo', 'MantenimientoEmpresaController@subirLogo');
	// Route::post('delete-logo', 'MantenimientoEmpresaController@deleteLogo');

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
