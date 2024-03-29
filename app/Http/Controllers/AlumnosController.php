<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Alumnos;
use App\Alumnos_tmp;
use App\GruposFamiliares;
use Carbon\Carbon;
use \DataTables;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Imports\AlumnosImport;
use App\Imports\FichasImport;
use App\Imports\GruposImport;
use App\Imports\MatriculasImport;
use App\Imports\MatriculasGruposImport;
use App\Trabajos_realizados;
use App\Trabajos;
use App\Habitaciones;
use App\Hospedajes;
use Webpatser\Uuid\Uuid;
use App\Fichas_alumnos_tmp;
use App\Fichas_alumnos;
use App\Actualizaciones;
use App\Grupos_tmp;
use App\Grupos;
use App\Matriculas_grupos;
use App\Matriculas_grupos_tmp;
use App\Matriculas;
use App\Matriculas_tmp;

class AlumnosController extends Controller
{
    public function subirFicheroNuevosAlumnos(Request $request)
    {
      
        $file   = $request->file('file');
        $nombre = $file->getClientOriginalName();
			
        \Storage::disk('local')->put($nombre,  \File::get($file));
        
        //Alumnos::truncate();
        Alumnos_tmp::truncate();
        Excel::import(new AlumnosImport, $nombre);

        $count = 0;
        $data = [];

        $alumnos = Alumnos_tmp::get();
        foreach ($alumnos as $alumno) {
            $data = [];
            $data['numIdAlumno'] = $alumno->numIdAlumno;
            $data['strNombre'] = $alumno->strNombre;
            $data['strApellidos'] = $alumno->strApellidos;
            $data['strCodigoExpediente'] = $alumno->strCodigoExpediente;
            $data['strDomicilio'] = $alumno->strDomicilio;
            $data['strPais'] = $alumno->strPais;
            $data['strPoblacion'] = $alumno->strPoblacion;
            $data['strProvincia'] = $alumno->strProvincia;
            $data['strTelefono1'] = $alumno->strTelefono1;
            $data['strNif'] = $alumno->strNif;
            $data['blnVigente'] = $alumno->blnVigente;
            $data['blnBaja'] = $alumno->blnBaja;
            $data['fecFechaAlta'] = $alumno->fecFechaAlta;
            $data['fecFechaNacimiento'] = $alumno->fecFechaNacimiento;
            $data['strCodigoPostal'] = $alumno->strCodigoPostal;
            $data['strEMail'] = $alumno->strEMail;
            $data['strFoto'] = $alumno->strFoto;
            $data['numIdTipoAlumno'] = $alumno->numIdTipoAlumno;
            $data['blnEmagister'] = $alumno->blnEmagister;
            $data['strNumeroSeguridadSocial'] = $alumno->strNumeroSeguridadSocial;
            $data['strSexo'] = $alumno->strSexo;
            $data['strTelefono2'] = $alumno->strTelefono2;
            $data['fecFechaAltaCentro'] = $alumno->fecFechaAltaCentro;
            $data['numNivelEstudios'] = $alumno->numNivelEstudios;
            $data['numIdOrigen'] = $alumno->numIdOrigen;
            $data['numIdProvincia'] = $alumno->numIdProvincia;
            $data['numIdPais'] = $alumno->numIdPais;
            $data['blnMatriculado'] = $alumno->blnMatriculado;
            $data['strRutaNotas'] = $alumno->strRutaNotas;
            $data['numTipoNif'] = $alumno->numTipoNif;
            $data['strTelefonoMovil'] = $alumno->strTelefonoMovil;
            $data['strPaisNacimiento'] = $alumno->strPaisNacimiento;
            $data['numIdPaisNacimiento'] = $alumno->numIdPaisNacimiento;
            $data['strProvinciaNacimiento'] = $alumno->strProvinciaNacimiento;
            $data['numIdProvinciaNacimiento'] = $alumno->numIdProvinciaNacimiento;

            $exists = Alumnos::updateOrCreate([
                'numIdAlumno' => $alumno->numIdAlumno
            ], $data);
            
           // $exists = Alumnos::create($data);           
   
        }

        $actualizacion = Actualizaciones::find(1);
        $actualizacion->tabla = 'Alumnos';
        $actualizacion->save();


    }

    public function deleteFicheroImportarAlumno(Request $request){
       $archivo =  $request->filename;
       
        //verificamos si el archivo existe y lo retornamos
        if (Storage::exists($archivo))
        {
            Storage::delete($archivo);
            return response()->json(array('success' => true, 'message' => '<i class="far fa-thumbs-up"></i> El fichero fue borrado correctamente.', 'data' => '', ''));
        }

        return response()->json(array('success' => false, 'message' => '<i class="far fa-sad-tear"></i> Hubo un problema intentando borrar el fichero.', 'data' => '', ''));
    }

    public function subirFicheroFichasAlumnos(Request $request)
    {
        $file   = $request->file('file');
        $nombre = $file->getClientOriginalName();
        \Storage::disk('local')->put($nombre,  \File::get($file));
        Fichas_alumnos_tmp::truncate();
        Excel::import(new FichasImport, $nombre);

        $count = 0;
        $data = [];
        
        $fichas = Fichas_alumnos_tmp::get();
        foreach ($fichas as $ficha) {
            $data = [];
            $data['numIdFichaAlumno'] = $ficha->numIdFichaAlumno;
            $data['strResumenInforme'] = $ficha->strResumenInforme;
            $data['fecFecha'] = $ficha->fecFecha;
            $data['memComentarios'] = $ficha->memComentarios;
            $data['numNota'] = $ficha->numNota;
            $data['numIdCursoAcademico'] = $ficha->numIdCursoAcademico;
            $data['numIdConvocatoria'] = $ficha->numIdConvocatoria;
            $data['blnDefinitivo'] = $ficha->blnDefinitivo;
            $data['numIdAlumno'] = $ficha->numIdAlumno;
            $data['numIdCalificacion'] = $ficha->numIdCalificacion;
            $data['numIdClase'] = $ficha->numIdClase;
            $data['numIdGrupo'] = $ficha->numIdGrupo;
            $data['blnVisibleConnect'] = $ficha->blnVisibleConnect;
            $data['blnNoMostrarNumericoConnect'] = $ficha->blnNoMostrarNumericoConnect;
            $data['numIdAsignatura'] = $ficha->numIdAsignatura;
            $data['blnBoletinPublicadoConnect'] = $ficha->blnBoletinPublicadoConnect;
            $data['numIdCliente'] = $ficha->numIdCliente;
            $data['numEstadoComunicacion'] = $ficha->numEstadoComunicacion;
            $data['numIdPersonal'] = $ficha->numIdPersonal;
            $data['fecCambioEstadoComunicacion'] = $ficha->fecCambioEstadoComunicacion;
            $data['strEstadoComunicacion'] = $ficha->strEstadoComunicacion;
            $data['blnFirmada'] = $ficha->blnFirmada;
            $data['fecFirma'] = $ficha->fecFirma;
            
            $exists = Fichas_alumnos::updateOrCreate([
                'numIdFichaAlumno' => $ficha->numIdFichaAlumno
            ], $data);            
        }

        $actualizacion = Actualizaciones::find(2);
        $actualizacion->tabla = 'Fichas_alumnos';
        $actualizacion->save();


    }

    public function subirFicheroGrupos(Request $request)
    {
        $file   = $request->file('file');
        $nombre = $file->getClientOriginalName();
        \Storage::disk('local')->put($nombre,  \File::get($file));
        Grupos_tmp::truncate();
        Excel::import(new GruposImport, $nombre);

        $count = 0;
        $data = [];
        
        $grupos = Grupos_tmp::get();
        foreach ($grupos as $grupo) {
            $data = [];           
            $data['numIdGrupo'] = $grupo->numIdGrupo;
            $data['strCodigoExpediente'] = $grupo->strCodigoExpediente; 
            $data['strNombreGrupo'] = $grupo->strNombreGrupo;
            $data['bolDefinitivo'] = $grupo->bolDefinitivo; 
            $data['bolFinalizado'] = $grupo->bolFinalizado;
            $data['fecFechaInicio'] = $grupo->fecFechaInicio;
            $data['fecFechaFinalizacion'] = $grupo->fecFechaFinalizacion;
            $data['id_curso'] = $grupo->id_curso; 
            $data['id_convocatoria'] = $grupo->id_convocatoria;
            $data['bolIndefinido'] = $grupo->bolIndefinido;
            $data['numMinimoAlumnos'] = $grupo->numMinimoAlumnos;
            $data['numMaximoAlumnos'] = $grupo->numMaximoAlumnos;
            $data['blnSimplificado'] = $grupo->blnSimplificado;
            $data['blnRentable'] = $grupo->blnRentable;
            $data['numAccionformativa'] = $grupo->numAccionformativa;
            $data['numAlumnos'] = $grupo->numAlumnos;
            $data['numDiferencia'] = $grupo->numDiferencia;
            $data['numGrupoForcem'] = $grupo->numGrupoForcem;
            $data['numPorcentaje'] = $grupo->numPorcentaje;
            $data['strModalidadForcem'] = $grupo->strModalidadForcem;
            $data['strTituloModulo'] = $grupo->strTituloModulo;
            $data['numIdTipoGrupo'] = $grupo->numIdTipoGrupo;
            $data['blnEmagister'] = $grupo->blnEmagister;
            $data['numIdCursoAcademico'] = $grupo->numIdCursoAcademico;
            $data['numColor'] = $grupo->numColor;
            $data['numIdIva'] = $grupo->numIdIva;
            $data['numIdIdiomaMerit'] = $grupo->numIdIdiomaMerit;
            $data['blnServicio'] = $grupo->blnServicio;
            $data['numIdNivelMerit'] = $grupo->numIdNivelMerit;
            $data['numIdProfesorEncargado'] = $grupo->numIdProfesorEncargado;
            $data['numModeloBoletin'] = $grupo->numModeloBoletin;
            $data['numTotalHoras'] = $grupo->numTotalHoras;
            $data['numIdPersonal'] = $grupo->numIdPersonal;
            $data['numIdTipoGrupo2'] = $grupo->numIdTipoGrupo2;
            $data['blnDistanciaJornadaLaboral'] = $grupo->blnDistanciaJornadaLaboral;
            $data['strRepresentanteLegal'] = $grupo->strRepresentanteLegal;
            $data['strNifRepresentanteLegal'] = $grupo->strNifRepresentanteLegal;
            $data['numTipoNifRepresentanteLegal'] = $grupo->numTipoNifRepresentanteLegal;
            $data['strEstado'] = $grupo->strEstado;
            $data['numPrecioGrupo'] = $grupo->numPrecioGrupo;
            $data['numPrecioPeriodicoGrupo'] = $grupo->numPrecioPeriodicoGrupo;
            $data['numPrecioHoraGrupo'] = $grupo->numPrecioHoraGrupo;
            $data['numIdRetencion'] = $grupo->numIdRetencion;
            $data['strCuentaBeneficios'] = $grupo->strCuentaBeneficios;
            $data['strNombreCuentaBeneficios'] = $grupo->strNombreCuentaBeneficios;
            $data['numCursoMoodle'] = $grupo->numCursoMoodle;
            $data['numGrupoMoodle'] = $grupo->numGrupoMoodle;
            $data['blnGrupoMoodleEliminado'] = $grupo->blnGrupoMoodleEliminado;
            $data['strNombreCortoCursoMoodle'] = $grupo->strNombreCortoCursoMoodle;
            $data['blnPublicarEnMoodle'] = $grupo->blnPublicarEnMoodle;
            $data['strNombreGrupoMoodle'] = $grupo->strNombreGrupoMoodle;
            $data['numIdCategoriaMoodle'] = $grupo->numIdCategoriaMoodle;
            $data['strUrl'] = $grupo->strUrl;
            $data['memComentarios'] = $grupo->memComentarios;

            $exists = Grupos::updateOrCreate([
                'numIdGrupo' => $grupo->numIdGrupo
            ], $data);            
        }

        $actualizacion = Actualizaciones::find(3);
        $actualizacion->tabla = 'Grupos';
        $actualizacion->save();

    }

    public function subirFicheroMatriculasGrupos(Request $request)
    {
        $file   = $request->file('file');
        $nombre = $file->getClientOriginalName();
        \Storage::disk('local')->put($nombre,  \File::get($file));
        Matriculas_grupos_tmp::truncate();
        Excel::import(new MatriculasGruposImport, $nombre);

        $count = 0;
        $data = [];
        
        $grupos = Matriculas_grupos_tmp::get();
        foreach ($grupos as $grupo) {
            $data = [];           
            
            $data['numIdMatriculaGrupo']                        = $grupo->numIdMatriculaGrupo;
            $data['blnFinalizada']                              = $grupo->blnFinalizada;
            $data['bolDefinitiva']                              = $grupo->bolDefinitiva;
            $data['fecFechaInicio']                             = $grupo->fecFechaInicio;
            $data['fecBajaDefinitiva']                          = $grupo->fecBajaDefinitiva;
            $data['fecUltimaLiquidacion']                       = $grupo->fecUltimaLiquidacion;
            $data['fecProximaLiquidacion']                      = $grupo->fecProximaLiquidacion;
            $data['fecFinBajaTemporal']                         = $grupo->fecFinBajaTemporal;
            $data['strCausaBaja']                               = $grupo->strCausaBaja;
            $data['fecInicioBajaTemporal']                      = $grupo->fecInicioBajaTemporal;
            $data['numImporteBaseMatriculaGrupo']               = $grupo->numImporteBaseMatriculaGrupo;
            $data['bolBajaDefinitiva']                          = $grupo->bolBajaDefinitiva;
            $data['bolBajaTemporal']                            = $grupo->bolBajaTemporal;
            $data['numIdCausaBaja']                             = $grupo->numIdCausaBaja;
            $data['numIdGrupo']                                 = $grupo->numIdGrupo;
            $data['numIdMatricula']                             = $grupo->numIdMatricula;
            $data['numPeriodicidadImporte']                     = $grupo->numPeriodicidadImporte;
            $data['numPeriodicidadLiquidacion']                 = $grupo->numPeriodicidadLiquidacion;
            $data['blnFinalizacionAPriori']                     = $grupo->blnFinalizacionAPriori;
            $data['blnSinDerechoCalificacion']                  = $grupo->blnSinDerechoCalificacion;
            $data['numIdRecargoPredefinido']                    = $grupo->numIdRecargoPredefinido;
            $data['fecFinalizacionPrevista']                    = $grupo->fecFinalizacionPrevista;
            $data['numLicencias']                               = $grupo->numLicencias;
            $data['numHorasContratadas']                        = $grupo->numHorasContratadas;
            $data['numHorasConsumidas']                         = $grupo->numHorasConsumidas;
            $data['numImporteTotalMatriculaGrupo']              = $grupo->numImporteTotalMatriculaGrupo;
            $data['numIdDescuentoGrupo']                        = $grupo->numIdDescuentoGrupo;
            $data['numImporteDescuentoMatriculaGrupo']          = $grupo->numImporteDescuentoMatriculaGrupo;
            $data['numPorcentajeDescuentoMatriculaGrupo']       = $grupo->numPorcentajeDescuentoMatriculaGrupo;
            $data['blnDescuentoGrupoConPorcentaje']             = $grupo->blnDescuentoGrupoConPorcentaje;
            $data['strConceptoRecargoGrupo']                    = $grupo->strConceptoRecargoGrupo;
            $data['strConceptoDescuentoGrupo']                  = $grupo->strConceptoDescuentoGrupo;
            $data['numImporteBaseImponibleMatriculaGrupo']      = $grupo->numImporteBaseImponibleMatriculaGrupo;
            $data['numImporteIVAMatriculaGrupo']                = $grupo->numImporteIVAMatriculaGrupo;
            $data['numImporteRetencionMatriculaGrupo']          = $grupo->numImporteRetencionMatriculaGrupo;
            $data['numPorcentajeIVAMatriculaGrupo']             = $grupo->numPorcentajeIVAMatriculaGrupo;
            $data['numPorcentajeRetencionMatriculaGrupo']       = $grupo->numPorcentajeRetencionMatriculaGrupo;
            $data['numIdCuentaIVA']                             = $grupo->numIdCuentaIVA;
            $data['numIdCuentaRetencion']                       = $grupo->numIdCuentaRetencion;
            $data['strCuentaIva']                               = $grupo->strCuentaIva;
            $data['strCuentaRetencion']                         = $grupo->strCuentaRetencion;
            $data['numImporteRecargoMatriculaGrupo']            = $grupo->numImporteRecargoMatriculaGrupo;
            $data['numPorcentajeRecargoMatriculaGrupo']         = $grupo->numPorcentajeRecargoMatriculaGrupo;
            $data['blnRecargoGrupoConPorcentaje']               = $grupo->blnRecargoGrupoConPorcentaje;
            $data['strCuentaBeneficios']                        = $grupo->strCuentaBeneficios;
            $data['strNombreCuentaBeneficios']                  = $grupo->strNombreCuentaBeneficios;
            $data['blnEnrolMoodle']                             = $grupo->blnEnrolMoodle;
            $data['blnSuspendida']                              = $grupo->blnSuspendida;
            $data['numIdGrupoFundae']                           = $grupo->numIdGrupoFundae;
            $data['blnEntregadoDiplomaFundae']                  = $grupo->blnEntregadoDiplomaFundae;
            $data['blnJornadaLaboralFundae']                    = $grupo->blnJornadaLaboralFundae;

            $exists = Matriculas_grupos::updateOrCreate([
                'numIdMatriculaGrupo' => $grupo->numIdMatriculaGrupo
            ], $data);            
        }

        $actualizacion = Actualizaciones::find(4);
        $actualizacion->tabla = 'Matriculas Grupos';
        $actualizacion->save();

    }

    public function subirFicheroMatriculas(Request $request)
    {
        $file   = $request->file('file');
        $nombre = $file->getClientOriginalName();
        \Storage::disk('local')->put($nombre,  \File::get($file));
        Matriculas_tmp::truncate();
        Excel::import(new MatriculasImport, $nombre);

        $count = 0;
        $data = [];
        
        $matriculas = Matriculas_tmp::get();
        foreach ($matriculas as $matricula) {
            $data = [];           
            
            $data['numIdMatricula']                     = $matricula->numIdMatricula;
            $data['numIdSerie']                         = $matricula->numIdSerie;                      
            $data['numIdAlumno']                        = $matricula->numIdAlumno;                      
            $data['strAlumnoMatricula']                 = $matricula->strAlumnoMatricula;
            $data['numIdCliente']                       = $matricula->numIdCliente;               
            $data['strClienteMatricula']                = $matricula->strClienteMatricula;
            $data['numTipoRecibo']                      = $matricula->numTipoRecibo;             
            $data['fecFechaMatricula']                  = $matricula->fecFechaMatricula;
            $data['blnEmagister']                       = $matricula->blnEmagister;
            $data['fecFechaFin']                        = $matricula->fecFechaFin;
            $data['numTipoTarifaEstudios']              = $matricula->numTipoTarifaEstudios;
            $data['numIdPersonal']                      = $matricula->numIdPersonal;
            $data['numIdCursoAcademico']                = $matricula->numIdCursoAcademico;
            $data['strCodigoExpediente']                = $matricula->strCodigoExpediente;
            $data['numIdTipoMatricula']                 = $matricula->numIdTipoMatricula;
            $data['numIdPlanVencimiento']               = $matricula->numIdPlanVencimiento;
            $data['fecPrimerVencimiento']               = $matricula->fecPrimerVencimiento;
            $data['numImporteTotalGlobal']              = $matricula->numImporteTotalGlobal;
            $data['strNomenclaturaRecibo']              = $matricula->strNomenclaturaRecibo;
            $data['blnTarjeta']                         = $matricula->blnTarjeta;           
            $data['blnFinalizada']                      = $matricula->blnFinalizada;
            $data['blnAnulada']                         = $matricula->blnAnulada;
            $data['numCobrado']                         = $matricula->numCobrado;
            $data['blnLiquidada']                       = $matricula->blnLiquidada;
            $data['numImporteMatricula']                = $matricula->numImporteMatricula;
            $data['bolPagadoMatricula']                 = $matricula->bolPagadoMatricula;
            $data['bolDomiciliacionBancaria']           = $matricula->bolDomiciliacionBancaria;
            $data['numImporteDescuento']                = $matricula->numImporteDescuento;
            $data['numPorcentajeDescuento']             = $matricula->numPorcentajeDescuento;
            $data['numPendiente']                       = $matricula->numPendiente;
            $data['numImporteGruposGlobal']             = $matricula->numImporteGruposGlobal;
            $data['strConceptoDescuentoGlobal']         = $matricula->strConceptoDescuentoGlobal;
            $data['blnDescuentoGlobalConPorcentaje']    = $matricula->blnDescuentoGlobalConPorcentaje;
            $data['numPorcentajeDescuentoGlobal']       = $matricula->numPorcentajeDescuentoGlobal;
            $data['numImporteDescuentoGlobal']          = $matricula->numImporteDescuentoGlobal;
            $data['numIdDescuentoGlobal']               = $matricula->numIdDescuentoGlobal;
            $data['strConceptoRecargoGlobal']           = $matricula->strConceptoRecargoGlobal;
            $data['blnRecargoGlobalConPorcentaje']      = $matricula->blnRecargoGlobalConPorcentaje;
            $data['numPorcentajeRecargoGlobal']         = $matricula->numPorcentajeRecargoGlobal;
            $data['numImporteRecargoGlobal']            = $matricula->numImporteRecargoGlobal;
            $data['numIdRecargoGlobal']                 = $matricula->numIdRecargoGlobal;
            $data['numPeriodicidadLiquidacion']         = $matricula->numPeriodicidadLiquidacion;
            $data['blnPresencial']                      = $matricula->blnPresencial;
            $data['blnSeguroEscolar']                   = $matricula->blnSeguroEscolar;
            $data['numTotalAdeudos']                    = $matricula->numTotalAdeudos;
            $data['blnExcluirFicheroAsnef']             = $matricula->blnExcluirFicheroAsnef;
            $data['numImporteIVAGlobal']                = $matricula->numImporteIVAGlobal;
            $data['numImporteRetencionGlobal']          = $matricula->numImporteRetencionGlobal;
            $data['blnVariosAdeudos']                   = $matricula->blnVariosAdeudos;
            $data['numImporteBaseGlobal']               = $matricula->numImporteBaseGlobal;
            $data['numIdUsuario']                       = $matricula->numIdUsuario;
            $data['strMaquina']                         = $matricula->strMaquina;
            $data['blnEnviadoMail']                     = $matricula->blnEnviadoMail;
            $data['numImporteBaseMatricula']            = $matricula->numImporteBaseMatricula;
            $data['blnFundae']                          = $matricula->blnFundae;
            $data['numIdMatriculaFundae']               = $matricula->numIdMatriculaFundae;
            $data['numOrdenInscripcion']                = $matricula->numOrdenInscripcion;
            $data['blnExcluirAlumnoFicheroAsnef']       = $matricula->blnExcluirAlumnoFicheroAsnef;
            $data['blnCobrosOnline']                    = $matricula->blnCobrosOnline;
            $data['blnSuperadoFundae']                  = $matricula->blnSuperadoFundae;
            $data['strComentarios']                     = $matricula->strComentarios;
            $data['updated_at']                         = $matricula->updated_at;
            $data['created_at']                         = $matricula->created_at;

            $exists = Matriculas::updateOrCreate([
                'numIdMatricula' => $matricula->numIdMatricula
            ], $data);            
        }

        $actualizacion = Actualizaciones::find(5);
        $actualizacion->tabla = 'Matriculas';
        $actualizacion->save();

    }
    
    public function gestionarEstudiantes()
    {
        $trabajos = Trabajos::get();
        $habitaciones = Habitaciones::get();
        $data = [
            'trabajos' => $trabajos,
            'habitaciones' => $habitaciones
        ];
        return view('alumnos.gestion',$data);
    }

    
    /**
     *      Lista de estudiantes.
     */
    public function listarEstudiantes(Request $request)
    {
        $alumnos = Alumnos::
        select('alumnos.numIdAlumno','alumnos.strNombre','alumnos.strApellidos','alumnos.strTelefono1','alumnos.strEMail','alumnos.strCodigoExpediente','alumnos.blnVigente','alumnos.uuid_habitacion')
        ->Status($request->filtro)
        ->get();

        return Datatables::of($alumnos)
            ->setRowId('numIdAlumno')
            ->addIndexColumn()
            ->addColumn('detalle', function ($row) {
                return $this->detalleAlumno($row);
            })
            ->addColumn('action', function ($row) {
                $btn =  '<div class="icono-action">                                    
                                    <a href="" data-accion="asignar-habitacion" data-uuid-habitacion="'.$row->uuid_habitacion.'" data-id-alumno="'. $row->numIdAlumno .'" data-nombre="'. $row->strNombre .'">
                                        <i data-trigger="hover" data-html="true" data-toggle="popover" data-placement="top" data-content="Residencia del alumno (<strong>' . $row->strNombre . '</strong>)." class="text-info fas fa-hotel"></i>
                                    </a>
                                </div>';
                return $btn;
            })
            ->rawColumns(['detalle', 'action'])
            ->make(true);

    }

    public function detalleAlumno($row){
        $data = Alumnos::find($row->numIdAlumno);
        $habitacion = Hospedajes::where('uuid',$data->uuid_habitacion)->first();
        $fec_nac = $data->fecFechaNacimiento == "" ? '' : Carbon::parse($data->fecFechaNacimiento);
        $fec_alta = $data->fecFechaAlta == "" ? '' : Carbon::parse($data->fecFechaAlta);
        $fec_entrada =  $habitacion['desde'] == '' ? '' : Carbon::parse($habitacion['desde'])->format('d-m-Y');
        $fec_salida =  $habitacion['hasta'] == '' ? '' : Carbon::parse($habitacion['hasta'])->format('d-m-Y');
        $residencia = 'No tiene hospedaje en la universidad';
        if ($habitacion['num_habitacion'] != ''){
            $residencia = '<h6>Habitación asignada: <strong><span class="badge badge-pill badge-success">'.$habitacion['num_habitacion'].'</span></strong></h6>
            <h6 class="card-subtitle mb-2 text-muted">Fecha de entrada: <strong>'.$fec_entrada.'</strong></h6>
            <h6 class="card-subtitle mb-2 text-muted">Fecha de salida: <strong>'.$fec_salida.'</strong></h6>
            <button class="btn btn-warning btn-xs">Check out <i class="fas fa-sign-out-alt"></i></button>';
        }

        $foto = $data->strSexo == 'H' ? '<img src="img/man.png" class="img-responsive">' : '<img src="img/woman.png" class="img-responsive">';
        $sexo = $data->strSexo == 'H' ? '<i class="fas fa-male"></i> Hombre' : '<i class="fas fa-female"></i> Mujer';
        $salida = '<div class="card" style="width: 54rem;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h5 class="card-title">'.trim($data->strNombre).' '.trim($data->strApellidos).'</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Sexo: '.$sexo.'</h6>
                                    <h6 class="card-subtitle mb-2 text-muted"><i class="text-info far fa-id-card"></i> Nif: '.$data->strNif.'</h6>
                                    <h6 class="card-subtitle mb-2 text-muted"><i class="text-success far fa-envelope"></i> '.$data->strEMail.'</h6>
                                    <h6 class="card-subtitle mb-2 text-muted"><i class="text-primary far fa-calendar-alt"></i> Nac. '.$fec_nac->format('d-m-Y').' <i class="text-warning fas fa-birthday-cake"></i> '.$fec_nac->age.'</h6>
                                    <h6 class="card-subtitle mb-2 text-muted"><i class="text-success fas fa-phone"></i> '.$data->strTelefono1.'  <i class="text-warning fas fa-phone"></i> '.$data->strTelefono2.'</h6>
                                    <hr>
                                    <h6 class="card-subtitle mb-2 text-muted">Código de expediente: <strong>'.$data->strCodigoExpediente.'</strong></h6>
                                    <h6 class="card-subtitle mb-2 text-muted">Fecha de alta: <strong>'.$fec_alta->format('d-m-Y').'</strong></h6>
                                    <hr>
                                    <h6 class="card-subtitle mb-2 text-muted"><i class="fas fa-hotel"></i> <strong>Residencia en la facultad</strong>: </h6>
                                    '.$residencia.'
                                    <hr>
                                    <h6 class="card-subtitle mb-2 text-muted"><i class="fas fa-map-marker-alt"></i> <strong>Dirección</strong>: </h6>
                                    <h6 class="card-text">'.$data->strDomicilio.'</h6>
                                    <h6 class="card-text">'.$data->strPais.', '.$data->strProvincia.', '.$data->strPoblacion.'</h6>                                    
                                </div>
                                <div class="col-sm4">
                                    <div class="card float-right">
                                        <div class="card-body">
                                            <center>
                                            '.$foto.'
                                            <br><a href="">Click para cambiar</a>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <a href="#" data-tipo-estudio="'.$data->numIdTipoAlumno.'" data-id-alumno="'.$data->numIdAlumno.'" class="expediente-academico card-link btn btn-xs btn-outline-success">Ir al expediente académico</a>
                            <button data-uuid="'.$data->uuid_grupo_familiar.'" class="btn btn-xs btn-outline-primary ver-grupo-familiar">Ver grupo familiar</button>
                        </div>
                    </div>';
        return $salida;
    }

    public function verGrupoFamiliarAlumno(Request $request){
        $grupo = GruposFamiliares::where('uuid',$request->uuid)->first();
        $vista = app(GruposFamiliaresController::class)->drawGroupFamily($grupo,12,$request->botones);
        return response()->json(array('success' => true, 'message' => 'Grupo familiar obtenido correctamente', 'data' => $vista, ''));
    }

    public function listarTrabajosRealizados(Request $request){
        $trabajos = Trabajos_realizados::select('trabajo','fecha','observaciones','trabajos_realizados.id as id')->join('trabajos', 'trabajos.id', 'trabajos_realizados.id_trabajo')
        ->where('id_alumno',$request->idAlumno)
        ->get();

        return Datatables::of($trabajos)
        ->setRowId('id')
        ->addIndexColumn()  
        ->addColumn('mes_ano', function ($row) {
            return Carbon::parse($row->fecha)->format('F-Y');
        })                
        ->addColumn('action', function ($row) {
            $btn =  '<div class="icono-action">
                                <a href="" data-accion="eliminar-trabajo" data-id-trabajo-imputado="'.$row->id.'">
                                    <i data-trigger="hover" data-html="true" data-toggle="popover" data-placement="top" data-content="" class="icono-action text-danger far fa-trash-alt">
                                    </i>
                                </a>                                
                            </div>';
            return $btn;
        })
        ->rawColumns(['action','mes_Ano'])
        ->make(true);
    }

    public function guardarTrabajoImputado(Request $request){
        $imputar = Trabajos_realizados::create(
                                                    [
                                                        'id_trabajo' => $request->trabajo_id,
                                                        'fecha' => $request->fecha_trabajo,
                                                        'id_alumno' => $request->id_alumno_trabajo, 
                                                        'observaciones' => $request->observaciones_trabajo,
                                                        'hora_inicio' => $request->hora_inicio,
                                                        'hora_fin' => $request->hora_fin,
                                                    ]
                                                );       
        if($imputar->wasRecentlyCreated){
            return response()->json(array('success' => true, 'message' => 'Trabajo imputado correctamente.', 'data' =>  ''));
        }
        return response()->json(array('success' => false, 'message' => 'El Trabajo no pudo ser imputado.', 'data' =>  ''));
    }

    public function eliminarTrabajo(Request $request){
        $deletedRows = Trabajos_realizados::where('id',$request->idTrabajo)->delete();
        return response()->json(array('success' => true, 'message' => 'El Trabajo fue eliminado correctamente.', 'data' => '' , ''));
    }

    public function verHospedajeAlumno(Request $request){
        $hospedaje = Hospedajes::where('uuid',$request->uuid)->first();
        if ($hospedaje !== null){            
            return response()->json(array('success' => true, 'message' => 'El Alumno tiene hospedaje asignado.', 'data' => $hospedaje , ''));
        }
        return response()->json(array('success' => false, 'message' => 'El Alumno no tiene hospedaje asignado.', 'data' => '' , ''));
    }

    public function actualizarHospedaje(Request $request){
        if ( is_null($request->uuid_habitacion) ){     
            $hospedaje  = new Hospedajes();
            $uuid = Uuid::generate();
            $hospedaje->uuid = $uuid;            
            $sw = true;
        }else{
            $hospedaje  = Hospedajes::where('uuid',$request->uuid_habitacion)->first(); 
            $sw = false;        
        }

		$hospedaje->num_habitacion  = $request->numero_habitacion;
        $hospedaje->id_alumno       = $request->id_habitacion_alumno;
        $hospedaje->desde           = $request->fecha_entrada;
        $hospedaje->hasta           = $request->fecha_salida;
        $hospedaje->observaciones   = $request->observaciones_entrega_hab;
        $hospedaje->fianza          = $request->entrego_fianza;
        $hospedaje->fianza_monto    = $request->monto_fianza;
        $hospedaje->fianza_fecha    = $request->fecha_entrega_fianza;
        $hospedaje->check           = 'checkin';
        $hospedaje->save();

        if ($sw){
            $alumno = Alumnos::find($request->id_habitacion_alumno);
            $alumno->uuid_habitacion = $uuid;
            $alumno->save();
            return response()->json(array('success' => true, 'message' => 'La habitación fue asignada correctamente.', 'data' =>  ''));
        }

        return response()->json(array('success' => true, 'message' => 'La habitación del alumno se actualizo correctamente.', 'data' =>  ''));
    }

    
    public function imputarTrabajo()
    {        
        $trabajos = Trabajos::get();
        $alumnos = Alumnos::select('numIdAlumno','strNombre','strApellidos')->where('blnVigente',1)->get();
        $data = [
            'trabajos' => $trabajos,
            'alumnos' => $alumnos,
        ];
        return view('alumnos.imputar-trabajo',$data);
    }

    
    public function informeTrabajoImputado()
    {        
        $alumnos = Alumnos::select('numIdAlumno','strNombre','strApellidos')->where('blnVigente',1)->get();
        $data = [
            'alumnos' => $alumnos,
        ];
        return view('pdf.informe-imputar-trabajo',$data);
    }

    
    public function asignarTarea()
    {        
        $trabajos = Trabajos::get();
        $alumnos = Alumnos::select('numIdAlumno','strNombre','strApellidos')->where('blnVigente',1)->get();
        $data = [
            'trabajos' => $trabajos,
            'alumnos' => $alumnos,
        ];
        return view('alumnos.asignar-tarea',$data);
    }

    public function buscarTareasAsignadas(Request $request){
        $tareas = Alumnos::select('tareas')->find($request->id_alumno);
        if ($tareas->tareas === null or $tareas->tareas === '' ){
            return response()->json(array('success' => false, 'message' => 'Este alumno no tiene tareas asignadas.', 'data' =>  $tareas->tareas));
        }
        return response()->json(array('success' => true, 'message' => 'Tareas del alumno obtenidas exitosamente.', 'data' =>  $tareas->tareas));
    }

    public function guardarTareasAsignadas(Request $request){
        $tareas = Alumnos::find($request->id_alumno);
        $tareas->tareas = \implode('|', $request->tareas_asignadas);
        if ($tareas->save()){            
            return response()->json(array('success' => true, 'message' => 'Tareas asignadas exitosamente.', 'data' =>  ''));
        }        
        return response()->json(array('success' => false, 'message' => 'Las Tareas del alumno no se pudieron asignar. .', 'data' =>  ''));
    }

    public function informeTareasAsignadas()
    {        
        $alumnos = Alumnos::select('numIdAlumno','strNombre','strApellidos')->where('blnVigente',1)->get();
        $data = [
            'alumnos' => $alumnos,
        ];
        return view('pdf.informe-tareas-asignadas',$data);
    }

}
