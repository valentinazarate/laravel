<?php

namespace Database\Seeders;

use App\Models\Marca;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ========== MARCAS ==========
        $marca1 = Marca::create([
            'nombre' => 'Sin Gluten Natura',
            'slug' => 'sin-gluten-natura',
            'descripcion' => 'Marca especializada en productos libres de gluten, elaborados con ingredientes naturales y procesos certificados.',
            'activo' => true,
        ]);

        $marca2 = Marca::create([
            'nombre' => 'Orgánicos Andes',
            'slug' => 'organicos-andes',
            'descripcion' => 'Productos orgánicos cultivados en los valles de los Andes, libres de pesticidas y fertilizantes sintéticos.',
            'activo' => true,
        ]);

        $marca3 = Marca::create([
            'nombre' => 'Almendra Viva',
            'slug' => 'almendra-viva',
            'descripcion' => 'Harinas y productos derivados de almendras y frutos secos, ideales para dietas cetogénicas y sin gluten.',
            'activo' => true,
        ]);

        // ========== CATEGORÍAS (jerarquía) ==========
        $catHarinas = Categoria::create([
            'nombre' => 'Harinas sin gluten',
            'slug' => 'harinas-sin-gluten',
            'descripcion' => 'Harinas alternativas libres de gluten para panificación y cocina.',
            'activo' => true,
        ]);

        $catPanificacion = Categoria::create([
            'nombre' => 'Panificación',
            'slug' => 'panificacion',
            'descripcion' => 'Mezclas, levaduras y semillas para panificación sin gluten.',
            'activo' => true,
        ]);

        $catHarinaArroz = Categoria::create([
            'nombre' => 'Harina de arroz',
            'slug' => 'harina-de-arroz',
            'descripcion' => 'Harina fina de arroz blanco e integral.',
            'padre_id' => $catHarinas->id,
            'activo' => true,
        ]);

        $catHarinaArvejas = Categoria::create([
            'nombre' => 'Harina de arvejas',
            'slug' => 'harina-de-arvejas',
            'descripcion' => 'Harina proteica de arvejas amarillas.',
            'padre_id' => $catHarinas->id,
            'activo' => true,
        ]);

        $catHarinaAlmendras = Categoria::create([
            'nombre' => 'Harina de almendras',
            'slug' => 'harina-de-almendras',
            'descripcion' => 'Harina de almendras peladas y molidas finamente.',
            'padre_id' => $catHarinas->id,
            'activo' => true,
        ]);

        $catMezclas = Categoria::create([
            'nombre' => 'Mezclas',
            'slug' => 'mezclas',
            'descripcion' => 'Mezclas pre-elaboradas para panificación sin gluten.',
            'padre_id' => $catPanificacion->id,
            'activo' => true,
        ]);

        $catLevaduras = Categoria::create([
            'nombre' => 'Levaduras',
            'slug' => 'levaduras',
            'descripcion' => 'Levaduras secas y frescas aptas para celíacos.',
            'padre_id' => $catPanificacion->id,
            'activo' => true,
        ]);

        $catSemillas = Categoria::create([
            'nombre' => 'Semillas',
            'slug' => 'semillas',
            'descripcion' => 'Semillas orgánicas para panificación y decoración.',
            'padre_id' => $catPanificacion->id,
            'activo' => true,
        ]);

        // ========== PRODUCTOS ==========
        Producto::create([
            'nombre' => 'Harina de Almendras Orgánica',
            'slug' => 'harina-de-almendras-organica',
            'descripcion_corta' => 'Harina fina de almendras peladas, ideal para repostería keto y sin gluten.',
            'descripcion_larga' => 'Nuestra harina de almendras es elaborada a partir de almendras orgánicas seleccionadas, peladas y molidas en frío para preservar todos sus nutrientes. Rica en proteínas, grasas saludables y vitamina E. Perfecta para preparar panes, galletas y masas cetogénicas.',
            'precio_compra' => 3200.00,
            'precio_venta' => 4800.00,
            'stock' => 50,
            'stock_minimo' => 10,
            'unidad_medida' => 'kg',
            'marca_id' => $marca3->id,
            'categoria_id' => $catHarinaAlmendras->id,
            'destacado' => true,
            'activo' => true,
            'peso_gramos' => 1000.00,
            'ingredientes' => '100% almendras orgánicas peladas.',
        ]);

        Producto::create([
            'nombre' => 'Harina de Arroz Integral',
            'slug' => 'harina-de-arroz-integral',
            'descripcion_corta' => 'Harina de arroz integral finamente molida, libre de gluten.',
            'descripcion_larga' => 'Harina obtenida de arroz integral cultivado sin pesticidas. Molida en piedra para mantener la textura ideal. Versátil para usar en panes, tortillas, galletas y como espesante en salsas.',
            'precio_compra' => 1200.00,
            'precio_venta' => 1900.00,
            'stock' => 80,
            'stock_minimo' => 15,
            'unidad_medida' => 'kg',
            'marca_id' => $marca1->id,
            'categoria_id' => $catHarinaArroz->id,
            'destacado' => false,
            'activo' => true,
            'peso_gramos' => 1000.00,
            'ingredientes' => '100% arroz integral orgánico.',
        ]);

        Producto::create([
            'nombre' => 'Harina de Arvejas Proteica',
            'slug' => 'harina-de-arvejas-proteica',
            'descripcion_corta' => 'Harina rica en proteínas vegetales, ideal para panificación alta en proteínas.',
            'descripcion_larga' => 'Elaborada a partir de arvejas amarillas orgánicas deshidratadas y molidas. Contiene 22g de proteína por cada 100g. Excelente para mezclar con otras harinas sin gluten y mejorar el perfil nutricional de tus preparaciones.',
            'precio_compra' => 1800.00,
            'precio_venta' => 2800.00,
            'stock' => 40,
            'stock_minimo' => 8,
            'unidad_medida' => 'kg',
            'marca_id' => $marca2->id,
            'categoria_id' => $catHarinaArvejas->id,
            'destacado' => true,
            'activo' => true,
            'peso_gramos' => 1000.00,
            'ingredientes' => '100% arvejas amarillas orgánicas.',
        ]);

        Producto::create([
            'nombre' => 'Mezcla Panificable sin Gluten',
            'slug' => 'mezcla-panificable-sin-gluten',
            'descripcion_corta' => 'Mezcla lista para hornear pan sin gluten con textura esponjosa.',
            'descripcion_larga' => 'Mezcla equilibrada de harinas sin gluten (arroz, almendra y tapioca) con goma xántica y sal. Solo necesitas agregar agua y levadura para obtener un pan esponjoso y delicioso. Libre de lácteos y soja.',
            'precio_compra' => 2500.00,
            'precio_venta' => 3900.00,
            'stock' => 60,
            'stock_minimo' => 12,
            'unidad_medida' => 'kg',
            'marca_id' => $marca1->id,
            'categoria_id' => $catMezclas->id,
            'destacado' => true,
            'activo' => true,
            'peso_gramos' => 1000.00,
            'ingredientes' => 'Harina de arroz integral, harina de almendras, almidón de tapioca, goma xántica, sal marina.',
        ]);

        Producto::create([
            'nombre' => 'Levadura Seca Orgánica',
            'slug' => 'levadura-seca-organica',
            'descripcion_corta' => 'Levadura seca activa orgánica, apta para celíacos.',
            'descripcion_larga' => 'Levadura Saccharomyces cerevisiae cultivada en medios orgánicos. Presentación en gránulos finos de fácil hidratación. Ideal para panes, pizzas y masas sin gluten. Certificada libre de gluten.',
            'precio_compra' => 800.00,
            'precio_venta' => 1350.00,
            'stock' => 100,
            'stock_minimo' => 20,
            'unidad_medida' => 'unidad',
            'marca_id' => $marca2->id,
            'categoria_id' => $catLevaduras->id,
            'destacado' => false,
            'activo' => true,
            'peso_gramos' => 100.00,
            'ingredientes' => 'Saccharomyces cerevisiae, maltodextrina orgánica.',
        ]);

        Producto::create([
            'nombre' => 'Semillas de Chía Orgánicas',
            'slug' => 'semillas-de-chia-organicas',
            'descripcion_corta' => 'Semillas de chía orgánicas, ricas en omega-3 y fibra.',
            'descripcion_larga' => 'Semillas de chía (Salvia hispánica) cultivadas orgánicamente en los valles andinos. Fuente natural de ácidos grasos omega-3, antioxidantes y fibra soluble. Ideal para agregar a panes, budines, smoothies y pudines.',
            'precio_compra' => 1500.00,
            'precio_venta' => 2400.00,
            'stock' => 70,
            'stock_minimo' => 15,
            'unidad_medida' => 'kg',
            'marca_id' => $marca3->id,
            'categoria_id' => $catSemillas->id,
            'destacado' => true,
            'activo' => true,
            'peso_gramos' => 500.00,
            'ingredientes' => '100% semillas de chía orgánicas.',
        ]);

        Producto::create([
            'nombre' => 'Semillas de Lino Dorado',
            'slug' => 'semillas-de-lino-dorado',
            'descripcion_corta' => 'Semillas de lino dorado orgánicas, ricas en fibra y omega-3.',
            'descripcion_larga' => 'Semillas de lino dorado (Linum usitatissimum) seleccionadas y envasadas artesanalmente. Ideales para moler y usar como reemplazo de huevo en repostería vegana, o enteras para decorar panes y galletas.',
            'precio_compra' => 1100.00,
            'precio_venta' => 1800.00,
            'stock' => 90,
            'stock_minimo' => 15,
            'unidad_medida' => 'kg',
            'marca_id' => $marca1->id,
            'categoria_id' => $catSemillas->id,
            'destacado' => false,
            'activo' => true,
            'peso_gramos' => 500.00,
            'ingredientes' => '100% semillas de lino dorado orgánicas.',
        ]);

        // ========== MARCAS ADICIONALES ==========
        $marca4 = Marca::create([
            'nombre' => 'Cocovita',
            'slug' => 'cocovita',
            'descripcion' => 'Especializada en harina de coco, aceites y derivados orgánicos del coco, ideales para dietas cetogénicas y paleo.',
            'activo' => true,
        ]);

        $marca5 = Marca::create([
            'nombre' => 'Garbanzo Verde',
            'slug' => 'garbanzo-verde',
            'descripcion' => 'Harinas de legumbres y proteínas vegetales orgánicas, cultivadas de forma sostenible y libres de gluten.',
            'activo' => true,
        ]);

        // ========== CATEGORÍAS ADICIONALES ==========
        $catHarinaAvena = Categoria::create([
            'nombre' => 'Harina de avena',
            'slug' => 'harina-de-avena',
            'descripcion' => 'Harina fina de avena certificada sin gluten, ideal para desayunos y repostería.',
            'padre_id' => $catHarinas->id,
            'activo' => true,
        ]);

        $catHarinaCoco = Categoria::create([
            'nombre' => 'Harina de coco',
            'slug' => 'harina-de-coco',
            'descripcion' => 'Harina de coco desgrasado, rica en fibra y baja en carbohidratos.',
            'padre_id' => $catHarinas->id,
            'activo' => true,
        ]);

        $catHarinaGarbanzo = Categoria::create([
            'nombre' => 'Harina de garbanzo',
            'slug' => 'harina-de-garbanzo',
            'descripcion' => 'Harina de garbanzo tostado, alta en proteínas y fibra, ideal para fainá y panificados.',
            'padre_id' => $catHarinas->id,
            'activo' => true,
        ]);

        $catHarinaTapioca = Categoria::create([
            'nombre' => 'Harina de tapioca',
            'slug' => 'harina-de-tapioca',
            'descripcion' => 'Almidón de tapioca/yucca, ideal para dar textura esponjosa a masas sin gluten.',
            'padre_id' => $catHarinas->id,
            'activo' => true,
        ]);

        // ========== PRODUCTOS ADICIONALES ==========
        Producto::create([
            'nombre' => 'Harina de Avena Sin Gluten',
            'slug' => 'harina-de-avena-sin-gluten',
            'descripcion_corta' => 'Harina fina de avena certificada sin gluten, rica en fibra soluble.',
            'descripcion_larga' => 'Harina elaborada a partir de avena integral certificada libre de gluten. Perfecta para preparar galletas, panes, tortitas y desayunos nutritivos. Aporta beta-glucanos que ayudan a mantener niveles saludables de colesterol.',
            'precio_compra' => 1400.00,
            'precio_venta' => 2200.00,
            'stock' => 60,
            'stock_minimo' => 10,
            'unidad_medida' => 'kg',
            'marca_id' => $marca1->id,
            'categoria_id' => $catHarinaAvena->id,
            'destacado' => true,
            'activo' => true,
            'peso_gramos' => 1000.00,
            'ingredientes' => '100% avena integral certificada sin gluten.',
        ]);

        Producto::create([
            'nombre' => 'Harina de Coco Orgánica',
            'slug' => 'harina-de-coco-organica',
            'descripcion_corta' => 'Harina de coco desgrasado, alta en fibra y baja en carbohidratos.',
            'descripcion_larga' => 'Harina elaborada a partir de pulpa de coco orgánico desgrasada y molida finamente. Contiene 40% de fibra y solo 20g de carbohidratos por cada 100g. Ideal para dietas keto, paleo y sin gluten. Aporta un sutil sabor dulce y aroma a coco.',
            'precio_compra' => 2800.00,
            'precio_venta' => 4200.00,
            'stock' => 35,
            'stock_minimo' => 8,
            'unidad_medida' => 'kg',
            'marca_id' => $marca4->id,
            'categoria_id' => $catHarinaCoco->id,
            'destacado' => true,
            'activo' => true,
            'peso_gramos' => 500.00,
            'ingredientes' => '100% pulpa de coco orgánica desgrasada.',
        ]);

        Producto::create([
            'nombre' => 'Harina de Garbanzo Orgánica',
            'slug' => 'harina-de-garbanzo-organica',
            'descripcion_corta' => 'Harina de garbanzo tostado, rica en proteínas y fibra.',
            'descripcion_larga' => 'Harina obtenida de garbanzos orgánicos tostados y molidos en molino de piedra. Con 22g de proteína por cada 100g, es ideal para preparar fainá, panes, tortillas, falafel y masas saladas. Libre de gluten y alta en hierro.',
            'precio_compra' => 1600.00,
            'precio_venta' => 2500.00,
            'stock' => 45,
            'stock_minimo' => 10,
            'unidad_medida' => 'kg',
            'marca_id' => $marca5->id,
            'categoria_id' => $catHarinaGarbanzo->id,
            'destacado' => false,
            'activo' => true,
            'peso_gramos' => 1000.00,
            'ingredientes' => '100% garbanzos orgánicos tostados.',
        ]);

        Producto::create([
            'nombre' => 'Almidón de Tapioca Orgánico',
            'slug' => 'almidon-de-tapioca-organico',
            'descripcion_corta' => 'Almidón de tapioca puro, ideal para masas sin gluten esponjosas.',
            'descripcion_larga' => 'Almidón extraído de la yuca (mandioca) cultivada orgánicamente. Es el ingrediente secreto para lograr texturas suaves y esponjosas en panes y repostería sin gluten. También se usa como espesante en salsas y postres.',
            'precio_compra' => 900.00,
            'precio_venta' => 1500.00,
            'stock' => 75,
            'stock_minimo' => 15,
            'unidad_medida' => 'kg',
            'marca_id' => $marca2->id,
            'categoria_id' => $catHarinaTapioca->id,
            'destacado' => false,
            'activo' => true,
            'peso_gramos' => 1000.00,
            'ingredientes' => '100% almidón de tapioca orgánico.',
        ]);

        Producto::create([
            'nombre' => 'Mezcla para Tortitas sin Gluten',
            'slug' => 'mezcla-para-tortitas-sin-gluten',
            'descripcion_corta' => 'Mezcla lista para preparar tortitas/pancakes esponjosos sin gluten.',
            'descripcion_larga' => 'Mezcla equilibrada de harinas sin gluten y polvo de hornear. Solo agrega agua o leche vegetal y obtén tortitas doradas y esponjosas. Ideal para desayunos y meriendas libres de gluten. Sin conservantes ni aditivos artificiales.',
            'precio_compra' => 2000.00,
            'precio_venta' => 3200.00,
            'stock' => 40,
            'stock_minimo' => 8,
            'unidad_medida' => 'kg',
            'marca_id' => $marca1->id,
            'categoria_id' => $catMezclas->id,
            'destacado' => true,
            'activo' => true,
            'peso_gramos' => 500.00,
            'ingredientes' => 'Harina de arroz, harina de avena sin gluten, almidón de tapioca, polvo de hornear, sal, endulzante natural.',
        ]);

        Producto::create([
            'nombre' => 'Levadura Fresca Orgánica',
            'slug' => 'levadura-fresca-organica',
            'descripcion_corta' => 'Levadura fresca prensada orgánica, apta para celíacos.',
            'descripcion_larga' => 'Levadura fresca (Saccharomyces cerevisiae) cultivada en sustratos orgánicos. Presentación en bloque prensado de fácil desmenuzado. Ideal para panes, masas y pizzas sin gluten. Conservar refrigerada.',
            'precio_compra' => 500.00,
            'precio_venta' => 900.00,
            'stock' => 60,
            'stock_minimo' => 15,
            'unidad_medida' => 'unidad',
            'marca_id' => $marca3->id,
            'categoria_id' => $catLevaduras->id,
            'destacado' => false,
            'activo' => true,
            'peso_gramos' => 50.00,
            'ingredientes' => 'Saccharomyces cerevisiae, agua purificada.',
        ]);

        Producto::create([
            'nombre' => 'Semillas de Sésamo Orgánicas',
            'slug' => 'semillas-de-sesamo-organicas',
            'descripcion_corta' => 'Semillas de sésamo integral orgánicas, ricas en calcio y antioxidantes.',
            'descripcion_larga' => 'Semillas de sésamo (Sesamum indicum) cultivadas orgánicamente. Fuente natural de calcio, magnesio y vitamina E. Ideales para espolvorear sobre panes, galletas, ensaladas y budines sin gluten. También se pueden moler para preparar tahini casero.',
            'precio_compra' => 1300.00,
            'precio_venta' => 2100.00,
            'stock' => 55,
            'stock_minimo' => 10,
            'unidad_medida' => 'kg',
            'marca_id' => $marca2->id,
            'categoria_id' => $catSemillas->id,
            'destacado' => false,
            'activo' => true,
            'peso_gramos' => 500.00,
            'ingredientes' => '100% semillas de sésamo integral orgánicas.',
        ]);

        Producto::create([
            'nombre' => 'Harina de Almendras Clásica 500g',
            'slug' => 'harina-de-almendras-clasica-500g',
            'descripcion_corta' => 'Harina de almendras presentación económica de 500g.',
            'descripcion_larga' => 'La misma harina de almendras orgánicas de Almendra Viva, ahora en presentación de 500g para quienes prefieren probar antes de comprar el kilo completo. Ideal para recetas pequeñas y principiantes en repostería sin gluten.',
            'precio_compra' => 1800.00,
            'precio_venta' => 2700.00,
            'stock' => 30,
            'stock_minimo' => 10,
            'unidad_medida' => 'unidad',
            'marca_id' => $marca3->id,
            'categoria_id' => $catHarinaAlmendras->id,
            'destacado' => false,
            'activo' => true,
            'peso_gramos' => 500.00,
            'ingredientes' => '100% almendras orgánicas peladas.',
        ]);
    }
}
