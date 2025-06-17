<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LectureHasDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('lecture_has_details')->insert([
            'lecture_id'  => 1, 
            'type_lecture_id'        => 1,
            'titulo'      => 'Lectura del libro de Jeremías (23,1-6):',
            'descripcion' => "
                Ay de los pastores que dispersan y dejan perecer las ovejas de mi rebaño –oráculo del Señor–.
            ",
        ]);

       DB::table('lecture_has_details')->insert([
            'lecture_id'  => 1, 
            'type_lecture_id'        => 2,
            'titulo'      => 'Salmo 22',
            'descripcion' => "
               <p><strong>R/.</strong> <em>El Se&ntilde;or es mi pastor, nada me falta</em></p>
            ",
        ]);        

       DB::table('lecture_has_details')->insert([
            'lecture_id'  => 1, 
            'type_lecture_id'        => 3,
            'titulo'      => 'Lectura de la carta del apóstol san Pablo a los Efesios (2,13-18):',
            'descripcion' => "
                Ahora estáis en Cristo Jesús. Ahora, por la sangre de Cristo, estáis cerca los que antes estabais lejos. Él es nuestra paz. Él ha hecho de los dos pueblos una sola cosa, derribando con su carne el muro que los separaba: el odio. Él ha abolido la Ley con sus mandamientos y reglas, haciendo las paces, para crear con los dos, en él, un solo hombre nuevo. Reconcilió con Dios a los dos pueblos, uniéndolos en un solo cuerpo mediante la cruz, dando muerte, en él, al odio. Vino y trajo la noticia de la paz: paz a vosotros, los de lejos; paz también a los de cerca. Así, unos y otros, podemos acercarnos al Padre con un mismo Espíritu. 
            ",
        ]);   
        
       DB::table('lecture_has_details')->insert([
            'lecture_id'  => 1, 
            'type_lecture_id'        => 4,
            'titulo'      => 'Lectura del santo evangelio según san Marcos (6,30-34):',
            'descripcion' => "
                R. Gloria a ti, Senor.<br>

                        San Juan san Juan
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic ipsa similique accusantium quisquam, ab quas veritatis eveniet libero unde nesciunt eum expedita id soluta, maiores voluptatum vitae odio rerum ratione!
                        
                        En aquel tiempo, los ap&oacute;stoles volvieron a reunirse con Jes&uacute;s y le contaron todo lo que hab&iacute;an hecho y ense&ntilde;ado.<br>
                &Eacute;l les dijo: &laquo;Venid vosotros solos a un sitio tranquilo a descansar un poco.&raquo;<br>
                Porque eran tantos los que iban y ven&iacute;an que no encontraban tiempo ni   para comer. Se fueron en barca a un sitio tranquilo y apartado. Muchos   los vieron marcharse y los reconocieron; entonces de todas las aldeas   fueron corriendo por tierra a aquel sitio y se les adelantaron. Al   desembarcar, Jes&uacute;s vio una multitud y le dio l&aacute;stima de ellos, porque   andaban como ovejas sin pastor; y se puso a ense&ntilde;arles con calma.
                        
                        <br>
                        Palabra del Senor. R. Gloria a ti, Senor Jesus
            ",
        ]);           
    }
}
