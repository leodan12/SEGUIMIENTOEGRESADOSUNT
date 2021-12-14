<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PaReportes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $reporteTitulados="CREATE FUNCTION reporteTitulados(a1 integer,a2 integer) returns table (carrera varchar, cantidadTitulados bigint)
        AS
        $$
        BEGIN
        RETURN QUERY
        SELECT e.carrera,COUNT(e.id) FROM egresados e 
        where e.añoegreso between a1 and a2 and e.estado=true
        group by e.carrera;
        END;
        $$ LANGUAGE plpgsql;";

        $reporteOfertaLaboral="CREATE FUNCTION reporteOfertas(a1 integer,a2 integer) returns table (area varchar,cantidad bigint)
        AS
        $$
        BEGIN
        RETURN QUERY
        SELECT o.area ,count(o.id) FROM ofertalaborals o 
        where EXTRACT(YEAR from o.fechaemision) between a1 and a2 and o.estado=true
        group by o.area;
        END;
        $$ LANGUAGE plpgsql;";

        $reporteCalidadUniversitaria="CREATE FUNCTION reporteCalidad(a1 integer,a2 integer) returns table (carrera varchar, cantidadTercioSuperior bigint)
        AS
        $$
        BEGIN
        RETURN QUERY
        SELECT e.carrera ,count(e.id) FROM egresados e 
        where e.añoegreso between a1 and a2 and e.estado=true
        group by e.carrera;
        END;
        $$ LANGUAGE plpgsql;";

        $reporteEmpleabilidad="CREATE FUNCTION reporteEmpleabilidad(a1 integer,a2 integer) returns table (area varchar, cantidadEstudiantes bigint)
        AS
        $$
        BEGIN
        RETURN QUERY
        SELECT el.area ,count(el.id) FROM egresados e 
        inner join experiencialaborals el on e.id=el.idegresado
        where 	extract(year from el.fechainicio) between a1 and a2 and 
                extract(year from el.fechatermino) between a1 and a2 and
                el.estado=true
        group by eL.area;
        END;
        $$ LANGUAGE plpgsql;";

        DB::unprepared($reporteTitulados);
        DB::unprepared($reporteOfertaLaboral);
        DB::unprepared($reporteCalidadUniversitaria);
        DB::unprepared($reporteEmpleabilidad);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION IF EXISTS reportetitulados(a1 integer,a2 integer)');
        DB::unprepared('DROP FUNCTION IF EXISTS reporteofertas(a1 integer,a2 integer)');
        DB::unprepared('DROP FUNCTION IF EXISTS reportecalidad(a1 integer,a2 integer)');
        DB::unprepared('DROP FUNCTION IF EXISTS reporteEmpleabilidad(a1 integer,a2 integer)');
    }
}
